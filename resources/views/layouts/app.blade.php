<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
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

        @yield('main')

    </main>

    @include('partials.footer')

    @vite('resources/js/app.js')

</body>

</html>
