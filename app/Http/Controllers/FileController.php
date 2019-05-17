<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\BankInfo;
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





        //Criando o Trailler do arquivo
        //Z.01 Código de registro = "Z";
        $content = $content."Z";
        //Z.02 Total de registros do arquivo
        $totalRegisters = "2";
        $totalRegisters = str_pad($totalRegisters, 6, "0", STR_PAD_LEFT);
        $content = $content.$totalRegisters;
        //Z.03 Valor total  dos campos E.06 e F.06 para arquivos de débito
        $total = "";
        $total = str_pad($total, 17, "0", STR_PAD_LEFT);
        $content = $content.$total;
        //Z.04 Mesmo do Z.03 só que para Crédito
        $total = "";
        $total = str_pad($total, 17, "0", STR_PAD_LEFT);
        $content = $content.$total;
        //Z.05 Reservado para o futuro
        $filler = str_pad("", 109, " ");
        $content = $content.$filler;
        
        Storage::put('file.txt', $content);
        return Storage::download('file.txt');
        //Storage::delete('file.txt');
    }
}
