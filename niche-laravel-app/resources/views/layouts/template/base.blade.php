<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title') | {{ config('app.name', 'Research Niche') }} </title>
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600;700&display=swap"
            rel="stylesheet">
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        @vite(['resources/css/app.css'])
    </head>

    <body @isset($cssClass) class="{{ $cssClass }} flex flex-col min-h-screen" @endisset>
        @yield('childContent')

        <x-popups.login-successful-m />
        <x-popups.login-failed-m />
        <x-popups.email-verified-m />

        @if (session('showLoginSuccessModal'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const modal = document.getElementById('login-success-modal');
                    const msgEl = document.getElementById('ls-message');
                    modal.style.display = 'flex';
                    if (msgEl) {
                        msgEl.textContent = @json(session('login_success_message', 'Login successful.'));
                    }
                    setTimeout(() => modal.style.display = 'none', 2000);
                });
            </script>
        @endif

        @if (session('showLoginFailModal'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const modal = document.getElementById('login-fail-modal');
                    const msgEl = document.getElementById('lf-message');
                    modal.style.display = 'flex';
                    if (msgEl) {
                        msgEl.textContent = @json(session('login_fail_message', 'Login failed.'));
                    }
                    setTimeout(() => modal.style.display = 'none', 3000);
                });
            </script>
        @endif

    </body>

</html>
