<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="" content="">
    <meta name="generator" content="">
    <title>@yield('title')</title>

    <link rel="canonical" href="">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- iconos -->
    <link href="{{ asset('assets/dist/bootstrap-icons.css') }}" rel="stylesheet">
    <!-- toastr.min.css -->
    <link href="{{ asset('assets/dist/css/toastr.min.css') }}" rel="stylesheet">
    <!-- jquery -->
    <script src="{{ asset('assets/dist/js/jquery-3.6.0.js') }}"></script>
    <!-- bootstrap.min.js -->
    <script src="{{ asset('assets/dist/js/bootstrap.min.js') }}"></script>
    <!-- bootstrap.bundle.min.js -->
    <script src="{{ asset('assets/dist/js/bootstrap.bundle.min.js') }}"></script>

    <!-- redireccionar d_login -->
    @if((session('usuario')=='')))

    <script>
        var pathname = window.location.pathname;
        if(pathname!='/login'){
            window.location.replace("/login");
        }
    </script>
    @endif


    @livewireStyles


</head>
<body>
<header>
    @include('layouts.navbar')
</header>
<br>
<main>
        <div class="container marketing">
            <div class="row">
                @yield('content')
            </div>
            <br>
        </div><!-- /.container -->


    <!-- FOOTER -->
    <footer class="container">
        <p class="float-end"><a href="#">Inicio</a></p>
        <p>&copy;2022 Colegio C&V, Cuso tecnologias web</p>
    </footer>
</main>


@livewireScripts


<!-- toastr.min.js -->
<script src="{{ asset('assets/dist/js/toastr.min.js') }}"></script>
<!-- popper.min.js -->
<script src="{{ asset('assets/dist/js/popper.min.js') }}"></script>



<script>
    // alerta para crear
    window.addEventListener('alert',event =>{
        toastr.success(event.detail.message)
    })
   // alerta para editar
    window.addEventListener('alert2',event =>{
        toastr.info(event.detail.message)
        var obj=document.getElementById('cerrar');
        obj.click();
    })
   /// alerta para eliminar
    window.addEventListener('alert3',event =>{
        toastr.error(event.detail.message)
    })
    // alerta para imagen asignada
    window.addEventListener('alertasignar',event =>{
        toastr.success(event.detail.message)
        var obj=document.getElementById('cerrarformasignar');
        obj.click();
    })
    // alerta para editar imagen asignada
    window.addEventListener('alerteditasignar',event =>{
        toastr.info(event.detail.message)
        var obj=document.getElementById('cerrarasignar');
        obj.click();
    })

</script>








</body>

</html>
