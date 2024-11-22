<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>You Quest</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <script src="https://cdn.tailwindcss.com"></script>
        @vite(['resources/js/app.js', 'resources/js/testCreation.js'])

        <!-- Styles -->
       <style>
           .bg-dots-darker {
               background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E")
           }
       </style>
    </head>
    <body class="font-sans antialiased">
    @include('layouts.navigation')

        <div class="min-h-screen bg-dots-darker bg-white">
            @if (isset($header))
                <header class="bg-white bg-slate-400 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <main>
                {{ $slot }}
            </main>
        </div>
    <script>
        const dropDownButton = document.getElementById("dropdownButton");
        const dropDownButtonMobile = document.getElementById("dropdownButtonMobile");
        const dropDownButtonMenu = document.getElementById("dropdownButtMenu");
        const dropDownButtonMenuMobile = document.getElementById("dropdownButtMenuMobile");

        let isOpen = false;
        let isOpenMobile = false;

        dropDownButton.addEventListener("click", function() {
            isOpen = !isOpen;
            dropDownButtonMenu.style.display = isOpen ? "block" : "none";
        });

        dropDownButtonMobile.addEventListener("click", function() {
            isOpenMobile = !isOpenMobile;
            dropDownButtonMenuMobile.style.display = isOpenMobile ? "block" : "none";
        });

        document.addEventListener("click", function(event) {
            if (!dropDownButton.contains(event.target) && isOpen) {
                dropDownButtonMenu.style.display = "none";
                isOpen = false;
            }
            if (!dropDownButtonMobile.contains(event.target) && isOpenMobile) {
                dropDownButtonMenuMobile.style.display = "none";
                isOpenMobile = false;
            }
        });
    </script>
    </body>
</html>
