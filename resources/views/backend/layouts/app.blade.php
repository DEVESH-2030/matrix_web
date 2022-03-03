
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Matrix | Dashboard | Admin Panel</title>
        <!-- Dropzone CSS -->
        <link rel="stylesheet" href="{{ asset('plugins/dropzone/dropzone.css')}}">
        <!-- Quill stylesheet -->
        <link href="{{ asset('plugins/quill.snow.css') }}" rel="stylesheet">
        <!-- Custom styles -->
        <link rel="stylesheet" href="{{ asset('css/style.min.css')}}">
        {{--start js file --}}
        @include('backend.layouts.css')
        {{-- end js file --}}
        @toastr_css
    </head>

    <body>
        <div class="page-flex">
            {{--start sidebar --}}
            @include('backend.layouts.sidebar')
            {{-- end sidebar --}}
            
            <script>
                let darkMode = localStorage.getItem('darkMode');
                const darkModeToggle = document.querySelector('.theme-switcher');
      
                const enableDarkMode = () => {
                  document.body.classList.add('darkmode');
                  localStorage.setItem('darkMode', 'enabled');
                };
                if (darkMode === 'enabled') {
                  enableDarkMode();
                }
              </script> 
              
            <div class="main-wrapper">
                {{-- start header --}}
                @include('backend.layouts.header')
                {{-- end header --}}
                
                {{-- main content --}}
                @yield('content')
                {{-- start footer --}}
                @include('backend.layouts.footer')
                {{-- end footer --}}
            </div>            
        </div>
    </body>

    {{--start js file --}}
    @include('backend.layouts.js')
    {{-- end js file --}}

    @jquery 
    @toastr_js 
    @toastr_render
</html>
