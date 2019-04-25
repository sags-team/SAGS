<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sidenav.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{route('admin.home')}}">
            <img src="{{ asset('images/SAGS.png')}}" width="260" height="50" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <!-- nav do lado esquerdo -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="navbar-brand" >
                        <img src="{{ asset('images/defaultpfp.png')}}" class="rounded-circle" width="50" height="50" alt="">
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link profileName">Bem vindo {{Auth::user()->name}}</a>
                </li>
            </ul>
            <!-- nav do lado direito -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <button type="button" class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Desconectar
                    </button>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <!-- sidenavbar -->
            <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-left">
                <a class="navbar-brand font-size-sidebar-brand"  href>Filial</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
                        aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                    <ul class="navbar-nav">
                        <li class="nav-item {{ Request::is('admin/branch/information') ? 'active background-selection' : '' }}">
                            <a class="nav-link font-size-sidebar-options" href="{{ route('branch.information') }}">Informações</a>
                        </li>
                        <a class="navbar-brand font-size-sidebar-brand" href>Filiados</a>
                        <li class="nav-item {{ Request::is('admin/affiliated/create') ? 'active background-selection' : '' }}">
                            <a class="nav-link font-size-sidebar-options" href="{{ route('affiliated.create') }}">Novo filiado</a>
                        </li>
                        <li class="nav-item {{ Request::is('admin/affiliated/list') ? 'active background-selection' : '' }}">
                            <a class="nav-link font-size-sidebar-options" href="{{ route('affiliates') }}">ver listagem</a>
                        </li>
                    </ul>
                </div>
            </nav>
    @yield('content')

    <!-- Scripts -->
    <!-- <script type="text/javascript" src="{{ asset('js/plugins/jquery/jquery-3.4.0.min.js') }}"></script> -->
    
    <script src="{{ asset('js/app.js') }}"></script>
    
    @yield('scripts')
</body>
</html>