<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>@yield('title')</title>
    
    <!-- Fonts -->
    {{-- <link rel="stylesheet" href="{{assets("css/app.css")}}"> --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300&family=Poppins:wght@300&display=swap"
    rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-stacked100@1.0.0"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"> --}}
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            overflow-x: hidden;

        }
    </style>
    <!-- Styles -->
</head>

<body class=" ">
    <div class="d-flex  " id="test">
        @include('component.sidebar')
        <div class=" col-lg-11 col-12 p-0 overflow-auto min-vh-100">
            @include('component.navbar')
            <div class="p-lg-5 pt-5 p-sm-3 p-1 mb-5">
                @yield('main')
            </div>
        </div>
    </div>

    <div id="loading" class="loading show">
        <span>loading...</span>
    </div>

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script>
       
        $(document).ready(function () {
            setTimeout(() => {
                $('#loading').removeClass('show')
            }, 100);
     $('#table').DataTable();
});
  </script>
</body>

</html>
