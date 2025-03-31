<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')

</head>
<body>
    @if(1 == 0)

    @include('partials.header')
    @include('partials.sidebar')
    @else
    @endif


    <main>
          
          
        @yield('main')
    
    </main>
    @if(1 == 0)

    @include('partials.footer')
    @else
    @endif

    @vite('resources/js/app.js')
</body>
</html>
