<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Fale Mais!</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <link href="{{ asset('/assets/css') }}/style.css" rel="stylesheet"/>
        <link rel="stylesheet" href="{{ asset('/assets/components') }}/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('/assets/components') }}/font-awesome/css/font-awesome.min.css">
        <link href="{{ asset('/assets/components') }}/toastr/toastr.css" rel="stylesheet"/>

        <script src="{{ asset('/assets/components') }}/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('/assets/components') }}/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="{{ asset('/assets/components') }}/toastr/toastr.min.js"></script>
    </head>

    <body>

        <div class="wrapper">
            <header class="main-header">
                <div class="container">
                    <a href="{{ route('faleMais.consulta') }}"><p id="headerTitle" class="pull-left">Fale Mais!</p></a>
                    <button id="headerBtnLogin" class="pull-right btn btn-info">Login</button>
                </div>
            </header>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                @yield('content')
            </div>

            <footer class="main-footer">
                <div class="text-center">
                    <p>Esse projeto é um protótipo requisitado como avalição de qualificação de código</p>
                    <p>Realizado por <a href="https://www.linkedin.com/in/caio-vigiani-15a1771b4/" target="_blank"><b>Caio Vigiani</b></a>
                </div>
            </footer>
        
        </div>

    <script>
        $("#headerBtnLogin").click(() => {
            toastr.options = {"positionClass": "toast-bottom-right"};
            toastr.info("Login em desenvolvimento!");
        });
    </script>

    </body>
</html>