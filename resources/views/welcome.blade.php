<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    <!-- Styles / Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .bg-dots-darker {
            background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E")
        }
        .gradient-text {
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            transition: background-position 0.3s ease;
            background-position: 0 0;
            cursor: default;
            background-size: 200% 200%;
            background-image: radial-gradient(circle at 357.087px 45.4625px, rgb(255, 110, 196) 0%, rgb(252, 177, 224) 25%, rgb(200, 161, 224) 50%, rgb(143, 179, 224) 75%, rgb(120, 197, 245) 100%);
            background-repeat: no-repeat;;
        }
        .purple-border {
            border-color: #f174f1 !important; /* !important overrides any conflicting styles */
        }
    </style>
</head>
<body>
<header>
    <nav class="sm:flex sm:justify-between bg-slate-100 p-4 pr-10 pl-10">
        <div class="flex flex-col items-center">
{{--            <h1 class="text-6xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-purple-600 via-pink-500 to-yellow-400 animate-gradient-x">--}}
{{--                You Quest--}}
{{--            </h1>--}}
            <img class="h=40 w-40" src="img/logo.svg">
            @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/userquests') }}" class="sm:hidden mt-4 w-full px-4 py-3 text-center text-white bg-gradient-to-r from-purple-600 to-pink-500 rounded-full shadow-lg hover:from-purple-700 hover:to-pink-600 transition duration-300 ease-in-out transform hover:scale-105">
                            авторизоваться
                        </a>
                    @else
                        <a href="{{  route('login') }}" class="sm:hidden mt-4 w-full px-4 py-3 text-center text-white bg-gradient-to-r from-purple-600 to-pink-500 rounded-full shadow-lg hover:from-purple-700 hover:to-pink-600 transition duration-300 ease-in-out transform hover:scale-105">
                            авторизоваться
                        </a>
                    @if (Route::has('register'))
                        <a href="{{  route('register') }}" class="sm:hidden mt-4 w-full px-4 py-3 text-center text-white bg-gradient-to-r from-purple-600 to-pink-500 rounded-full shadow-lg hover:from-purple-700 hover:to-pink-600 transition duration-300 ease-in-out transform hover:scale-105">
                            зарегистрироваться
                        </a>
                    @endif
                @endauth
            @endif
        </div>

        <div class="invisible absolute sm:relative sm:visible sm:flex sm:items-center sm:space-x-4 sm:mr-4 md:space-x-6 lg:space-x-8">
            <div class="sm:hidden grid place-items-center">
                <div class="relative group">
                    <button class="bg-gray-100 text-gray-800 p-3 rounded-full shadow-md hover:shadow-lg transition duration-300 ease-in-out transform hover:-translate-y-0.5 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50">
                        <img width="30" height="30" src="img/login.svg" alt="...">
                        <span class="sr-only">Меню пользователя</span>
                    </button>
                    <ul class="hidden group-hover:block absolute z-10 w-56 py-2 mt-2 bg-white rounded-lg shadow-xl animate-fade-in-down right-0">
                        @if (Route::has('login'))
                            @auth
                                <li>
                                    <a href="{{ url('/userquests') }}" class="block px-4 py-3 text-gray-800 hover:bg-purple-50 hover:text-purple-600 transition duration-200 ease-in-out">
                                        Личный кабинет
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('login') }}" class="block px-4 py-3 text-gray-800 hover:bg-purple-50 hover:text-purple-600 transition duration-200 ease-in-out">
                                        Авторизация
                                    </a>
                                </li>
                                @if (Route::has('register'))
                                    <li>
                                        <a href="{{ route('register') }}" class="block px-4 py-3 text-gray-800 hover:bg-purple-50 hover:text-purple-600 transition duration-200 ease-in-out">
                                            Регистрация
                                        </a>
                                    </li>
                                @endif
                    </ul>
                    @endauth
                    @endif
                </div>
            </div>

            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/userquests') }}" class="hidden sm:inline-block group flex items-center space-x-2 text-violet hover:text-yellow-300 transition-all duration-300 ease-in-out">
                         <span class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-purple-500 to-indigo-600 text-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50">
                                Личный кабинет
                         </span>
                    </a>
                @else
                    <a href="{{ route('login') }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-purple-600 to-indigo-600 text-white rounded-l-full shadow-lg hover:shadow-xl transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50 hover:from-purple-700 hover:to-indigo-700">
                        авторизоваться
                    </a>
                @if (Route::has('register'))
                     <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-r-full shadow-lg hover:shadow-xl transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50 hover:from-indigo-700 hover:to-purple-700">
                        зарегистрироваться
                     </a>
                @endif
                    </div>
                @endauth
            @endif
        </div>
    </nav>
</header>
    <div class="relative pt-8 sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-white">
        <div class="container mx-auto flex flex-col items-center">
            <h1 id="gradientTitle" class="hidden sm:inline-block text-3xl sm:text-4xl md:text-5xl lg:text-7xl font-bold gradient-text select-none" aria-label="Как это работает?">
                Как это работает?
            </h1>
            <div class="pt-10 md:pt-40 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-12 px-4">
                <div class="box-border h-auto p-6 bg-gradient-to-br from-purple-500 to-indigo-600 rounded-xl shadow-lg transform transition-all duration-300 hover:scale-105 shadow-xl">
                    <div class="flex items-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-lightbulb w-8 h-8 text-yellow-300 mr-3" data-id="4"><path d="M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1 .2 2.2 1.5 3.5.7.7 1.3 1.5 1.5 2.5"></path><path d="M9 18h6"></path><path d="M10 22h4"></path></svg>
                        <h3 class="text-xl font-bold text-white">Создайте тест</h3>
                    </div>
                    <p class="text-purple-100">который можно пройти на любом устройстве</p>
                </div>

                <div class="box-border h-auto p-6 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl shadow-lg transform transition-all duration-300 hover:scale-105">
                    <div class="flex items-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-send w-8 h-8 text-blue-200 mr-3" data-id="9"><path d="m22 2-7 20-4-9-9-4Z"></path><path d="M22 2 11 13"></path></svg>
                        <h3 class="text-xl font-bold text-white">Отправьте готовый тест</h3>
                    </div>
                    <p class="text-blue-100">удобным для вас способом</p>
                </div>

                <div class="box-border h-auto p-6 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl shadow-lg transform transition-all duration-300 hover:scale-105 md:col-span-2 md:justify-self-center lg:col-span-1 lg:justify-self-auto">
                    <div class="flex items-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-text w-8 h-8 text-green-200 mr-3" data-id="14"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path><path d="M14 2v4a2 2 0 0 0 2 2h4"></path><path d="M10 9H8"></path><path d="M16 13H8"></path><path d="M16 17H8"></path></svg>
                        <h3 class="text-xl font-bold text-white">Получите доступ к результатам онлайн</h3>
                    </div>
                    <p class="text-green-100">а также просматривайте каждый ответ</p>
                </div>
            </div>
        </div>
    </div>

<script>
    // Получаем все элементы, id которых начинается с 'gradientTitle'
    const titles = document.querySelectorAll('[id^="gradientTitle"]');

    // Добавляем обработчики событий для каждого элемента
    titles.forEach(title => {
        title.addEventListener('mousemove', handleMouseMove);
        title.addEventListener('touchmove', handleTouchMove);
    });

    function handleMouseMove(e) {
        updateGradient(e, e.target);
    }

    function handleTouchMove(e) {
        e.preventDefault();
        updateGradient(e.touches[0], e.target);
    }

    function updateGradient(event, element) {
        const rect = element.getBoundingClientRect();
        const x = event.clientX - rect.left;
        const y = event.clientY - rect.top;

        element.style.backgroundSize = `${rect.width}px ${rect.height}px`;
        element.style.backgroundImage = `
            radial-gradient(
                circle at ${x}px ${y}px,
                #ff6ec4 0%,
                #fcb1e0 25%,
                #c8a1e0 50%,
                #8fb3e0 75%,
                #78c5f5 100%
            )`;
        element.style.backgroundRepeat = 'no-repeat';
    }
</script>
</body>
</html>
