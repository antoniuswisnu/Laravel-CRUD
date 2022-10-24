<html>
    <head>
        <title>Perpustakaan</title>
        <link rel="stylesheet" href="{{ asset(css/bootstrap.min.css) }}">
        <link rel="stylesheet" href="{{ asset(css/style.css) }}">
        <link rel="stylesheet" href="{{ asset(css/bootstrap-datepicker.css) }}">
        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>

    </head>

    <body>
        @include('layouts.header')
        @yield('content')

        <script type="text/javascript">
            $('.date').datepicker({
                format: 'yyyy/mm/dd',
                autoclose: 'true'
            });
        </script>

        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    </body>
</html>