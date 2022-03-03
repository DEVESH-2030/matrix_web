<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        {{-- <link rel="stylesheet" href="{{ url('/css/css-custom.css') }}"/> --}}
        <title>Matrix | Frontend</title>
        @toastr_css
    </head>
    <body data-spy="scroll" data-target="#navbar-example">
        {{-- header  --}}
        @include('frontend.layout.header')

        {{-- container  --}}
            @yield('content')

        {{-- @include('frontend.layout.footer') --}}
        @yield('after-scripts')
    </body>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    @jquery
    @toastr_js 
    @toastr_render 

</html>
