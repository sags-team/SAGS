<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\BankInfo;
use App\Affiliated;
use Storage;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth.admin');
    }

    public function create()
    {
        $user = Auth::user();
        $bankInfos = $user->branch->bankInfos()->select('name')->get();
        return view('admin.files.create')->with(compact('bankInfos'));
    }

    public function generate(Request $request)
    {
        $user = Auth::user();
        $bankInfo = BankInfo::where('branch_id', $user->branch->id)
        ->where('name', $request->input('name'))->first();

        $affiliates = Affiliated::where('branch_id', $user->branch->id)->get();
        $content = "";

        //Criando o Header do arquivo
        //A.01 - Código de registro = "A" - tamanho: 1 caractere;
        $content = $content."A";
        //A.02 - Código de Remessa - "1" - Remessa -> Enviado pela empresa para o banco "2" - Retorno Enviado pelo
        //Banco para a empresa - tamanho: 1 caractere
        $content = $content."1";
        //A.03 Código do Convenio - Informado pelo Banco - 6 digitos do convenio
        //- tamanho: 20 caracteres(completar com brancos),
        $agreementCode = str_pad($bankInfo->agreementCode, 20, " ");
        $content = $content.$agreementCode;
        //A.04 Nome da empresa - tamanho: 20 caracteres(completar com brancos);
        $branchName = str_pad($bankInfo->branchName, 20, " ");
        $content = $content.$branchName;
        //A.05 Código do Banco - tamanho: 3 caracteres;
        $content = $content.$bankInfo->bankCode;
        //A.06 Nome do Banco - Tamanho: 20 caracteres (Completar com brancos);
        $bankName = str_pad($bankInfo->name, 20, " ");
        $content = $content.$bankName;
        //A.07 Data de geração do arquivo formato: (AAAAMMDD)
        $data = date('Ymd');
        $content = $content.$data;
        //A.08 Número sequencial do arquivo (completar com zeros a esquerda)
        $NSA = $bankInfo->fileCounter + 1;
        $fileCounter = str_pad($NSA, 6, "0", STR_PAD_LEFT);
        $content = $content.$fileCounter;
        //A.09 Versão do LAYOUT - "04" padrão "05" quando precisar de validação CPF/CNPJ
        $content = $content."04";
        //A.10 Identificação do serviço - "DEBITO AUTOMATICO" ou "CREDIT AUTOMATICO" - tamanho: 17 Caracteres
        $content = $content."DEBITO AUTOMATICO";
        //A.11 Reservado para o futuro (filler)
        $filler = str_pad("", 52, " ");
        $content = $content.$filler;
        //Fim da geração do Registro de HEADER

        $totalRegisters = 2;
        $totalValue = 0;

        foreach ($affiliates as $affiliated) {
            if (!$affiliated->bankAccount) {
                continue;
            }
            if ($affiliated->bankAccount->active && $affiliated->bankAccount->name == $bankInfo->name) {
                //E.01 Código do registro = E
                $EContent = "E";
                //E.02 Identificação do cliente na empresa
                $affiliated_id = str_pad($affiliated->id, 25, " ");
                $EContent = $EContent.$affiliated_id;
                //E.03 Agência para débito
                $EContent = $EContent.$affiliated->bankAccount->agency;
                //E.04 Identificação do cliente no banco
                $affiliatedBankId = $affiliated->bankAccount->operationCode.$affiliated->bankAccount->accountNumber;
                $affiliatedBankId = $affiliatedBankId.$affiliated->bankAccount->vdNumber;
                $affiliatedBankId = str_pad($affiliatedBankId, 14, " ");
                $EContent = $EContent.$affiliatedBankId;
                //E.05 Data de vencimento
                $date = date('Ymd', strtotime('+7 days'));
                $EContent = $EContent.$date;
                //E.06 Valor de débito
                $totalValue = $totalValue + $affiliated->contribution; //Somar para por no trailler
                $value = $affiliated->contribution;
                $value = str_pad($value, 15, "0", STR_PAD_LEFT);
                $EContent = $EContent.$value;
                //E.07 Código da moeda
                $EContent = $EContent.'03';
                //E.08 Livre para uso da empresa
                $freeContent = "ConteudoEmpresa";
                $freeContent = str_pad($freeContent, 60, " ");
                $EContent = $EContent.$freeContent;
                //E.09 Reservado para o futuro
                $filler = str_pad("", 20, " ");
                $EContent = $EContent.$filler;
                //E.10 Código de movimento
                $EContent = $EContent.'0';
                //Fim do Registro E
                $totalRegisters = $totalRegisters + 1;
                $content = $content.$EContent;
            }
        }

        //Criando o Trailler do arquivo
        //Z.01 Código de registro = "Z";
        $content = $content."Z";
        //Z.02 Total de registros do arquivo

        $totalRegisters = str_pad($totalRegisters, 6, "0", STR_PAD_LEFT);
        $content = $content.$totalRegisters;
        //Z.03 Valor total  dos campos E.06 e F.06 para arquivos de débito

        $total = str_pad($totalValue, 17, "0", STR_PAD_LEFT);
        $content = $content.$total;
        //Z.04 Mesmo do Z.03 só que para Crédito
        $total = "";
        $total = str_pad($total, 17, "0", STR_PAD_LEFT);
        $content = $content.$total;
        //Z.05 Reservado para o futuro
        $filler = str_pad("", 109, " ");
        $content = $content.$filler;

        Storage::disk('file')->put('COV'.date('m').'1'.'.TXT', $content);
        $bankInfo->fileCounter = $bankInfo->fileCounter + 1;
        $bankInfo->save();
        $downloadFile = public_path().DIRECTORY_SEPARATOR.'files'.DIRECTORY_SEPARATOR.'COV'.date('m').'1'.'.TXT';
        return response()->download($downloadFile)->deleteFileAfterSend(true);
        //return Storage::download('file.txt');
        //Storage::delete('file.txt');
    }
}
