<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Taibah Accounts') }}</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('images/logo_icon.png') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-dropdown')

        <!-- Page Heading -->
        <header class="bg-white shadow print:hidden">
            <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts

    @yield('custom-js')

    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

    <script>
        const element = document.querySelector('.choices');
        const choices = new Choices(element);
    </script>

    <!-- Sweetalert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // From events
        window.addEventListener('swal:modal', event => {
            Swal.fire({
                // position: 'bottom-start',
                title: event.detail.title,
                text: event.detail.text,
                icon: event.detail.type,
                timer: 2000,
                timerProgressBar: true,
            });
        });

        // From session message
        $(document).ready(function() {
            "@if(session('success'))"
            Swal.fire({
                // position: 'bottom-start',
                icon: 'success',
                title: '{{ session("success") }}',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
            });
            "@elseif(session('warning'))"
            Swal.fire({
                // position: 'bottom-start',
                icon: 'warning',
                title: '{{ session("warning") }}',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
            });
            "@elseif(session('error'))"
            Swal.fire({
                // position: 'bottom-start',
                icon: 'error',
                title: '{{ session("error") }}',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
            });
            "@endif"
        });
    </script>
</body>

</html>