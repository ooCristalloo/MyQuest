<nav x-data="{ open: false }" class="bg-slate-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link class="text-gray-900" :href="route('userquests')" :active="request()->routeIs('userquests')">
                        {{ __('Мои тесты') }}
                    </x-nav-link>
                    <x-nav-link :href="route('tests.createquests')" :active="request()->routeIs('tests.createquests')">
                        {{ __('Создать тест') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden grid place-items-center sm:flex sm:items-center sm:ms-6">
                        <div class="relative group">
                        <button id="dropdownButton" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-purple-500 to-indigo-600 text-white rounded-full shadow-lg hover:shadow-xl transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-opacity-50">
                            <div class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>
                                <span class="font-medium">{{ Auth::user()->name }}</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition-transform duration-300" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                            <ul id="dropdownButtMenu" class="hidden group-focus:block absolute z-10 w-56 py-2 mt-2 bg-white rounded-lg shadow-xl animate-fade-in-down right-0">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Профиль') }}
                                </x-dropdown-link>
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link class="text-red-600" :href="route('logout')"
                                                     onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('Выйти из аккаунта') }}
                                    </x-dropdown-link>
                                </form>
                            </ul>
                    </div>
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button id="dropdownButtonMobile" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 focus:outline-none focus:bg-gray-100 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>


    <div id="dropdownButtMenuMobile" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('userquests')" :active="request()->routeIs('userquests')">
                {{__('мои тесты')}}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('tests.createquests')" :active="request()->routeIs('tests.createquests')">
                {{__('создать тест')}}
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-500">{{Auth::user()->name}}</div>
                <div class="font-medium text-sm text-indigo-300">{{Auth::user()->email}}</div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{__('Профиль') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{__('Выйти из аккаунта')}}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
