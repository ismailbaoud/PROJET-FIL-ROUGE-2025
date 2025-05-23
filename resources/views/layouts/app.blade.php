<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    @vite('resources/css/app.css')
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        success: '#22c55e',
                        info: '#0ea5e9',
                        warning: '#f59e0b',
                        danger: '#ef4444'
                        lightGray: "#f8f9fa",
                        mediumGray: "#e9ecef",
                        darkGray: "#666666",
                        darkBlue: "#0d1117",
                        green: "#28a745",
                        red: "#dc3545",
                        yellow: "#ffc107",
                        offWhite: "#f0f0f0"
                    }
                }
            }
        }
    </script>

</head>

<body>

    @guest
        @include('partials.header')
    @endguest

    <main>
        @include('sweetalert::alert')

        @yield('main')

    </main>
@guest
    
    @include('partials.footer')
    @endguest
    @vite('resources/js/app.js')

</body>

</html>
