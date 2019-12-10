<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="//fonts.gstatic.com/" crossorigin>
    <link href="{{ asset('/css/modern.css')}}" rel="stylesheet">
    <link href="{{ asset('/css/corporate.css')}}" rel="stylesheet">
    <link href="{{ asset('/css/classic.css')}}" rel="stylesheet">
    <link href="{{ asset('/css/fix.css')}}" rel="stylesheet">
    
    @yield('style')
    <style>
        body {opacity: 0; }
        .loading{
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>

{{--     <script src="{{ asset('/js/settings.js')}}"></script> --}}
    <script src="{{ asset('/js/app.js')}}"></script>
    @stack('scripts')
    <script>
        window.Laravel = <?php
        echo json_encode([
            'csrfToken' => csrf_token(),
        ]);
        ?>

    </script>
    <!-- END SETTINGS -->
</head>

<body>

    @if (!Auth::guest())
    <div class="wrapper">
        <div class="main">
            @include('_menu.top', ['clear'=>true])
            <main class="content">
                @include('layouts.errors')
                @yield('content')
            </main>
        </div>
    </div>
    @else
    @yield('login')
    @endif

</body>
<script src="{{ asset('js/jquery.isloading.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

@yield('scripts')
<script src="{{ asset('js/jquery.isloading.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
    $('.simpleSelect2').select2();
    $('.simpleDatatables').DataTable({
        language: {url: "{{ asset('dist/datatables/Portuguese-Brasil.json') }}"},
        "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]],

    });

</script>
</html>
