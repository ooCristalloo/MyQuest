@php
    use App\Helpers\TextHelper;
@endphp
<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-3xl md:text-4xl font-bold py-6 px-4 border-b-2 border-indigo-300 mb-6 font-sans tracking-wide">
                <span class="bg-gradient-to-r from-indigo-600 to-indigo-400 bg-clip-text text-transparent">
                    Недавние тесты
                </span>
            </h1>
            @if(!isset($tests) or $tests->isEmpty())
                <div class="bg-gradient-to-br from-slate-100 to-slate-200 overflow-hidden shadow-lg sm:rounded-xl border border-indigo-100">
                    <div class="p-8 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clipboard-list mx-auto h-12 w-12 text-indigo-400 mb-4"><rect width="8" height="4" x="8" y="2" rx="1" ry="1"></rect><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><path d="M12 11h4"></path><path d="M12 16h4"></path><path d="M8 11h.01"></path><path d="M8 16h.01"></path></svg>
                        <h2 class="text-2xl font-semibold text-gray-800 mb-2">У вас нет созданных тестов</h2>
                        <p class="text-gray-600 mb-6">Начните создавать их прямо сейчас!</p>
                        <button class="bg-indigo-500 hover:bg-indigo-600 text-white font-medium py-2 px-4 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
                            <x-create-card-link :href="route('tests.createquests')" :active="request()->routeIs('tests.createquests')">
                                {{__('создать тест')}}
                            </x-create-card-link>
                        </button>
                    </div>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($tests as $test)
                        <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-300 ease-in-out transform hover:-translate-y-2 border border-gray-200">
                            <div class="bg-gradient-to-r from-indigo-500 to-purple-600 p-4">
                                <h2 class="text-2xl font-bold mb-2 text-white truncate">{{ $test->name }}</h2>
                            </div>
                            <div class="p-6">
                                <p class="text-gray-600 mb-4 h-20 overflow-hidden">{{ Str::limit($test->description, 100) }}</p>
                                <div class="flex items-center mb-4">
                                    <svg class="w-5 h-5 text-yellow-500 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    <p class="text-sm text-gray-500">Пройдено: <span class="font-semibold text-indigo-600">{{ $test->results_count }}</span> {{ TextHelper::pluralize($test->results_count, 'раз', 'раза', 'раз') }}</p>
                                </div>
                                <div class="flex flex-col space-y-2">
                                    <a href="{{ route('tests.view-results', $test->id) }}" class="text-indigo-600 hover:text-indigo-800 font-semibold transition duration-300 ease-in-out flex items-center justify-center bg-indigo-100 rounded-lg py-2">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                                        Результаты
                                    </a>
                                    <a href="{{ route('tests.show', $test->url) }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300 ease-in-out text-center">
                                        Пройти тест
                                    </a>
                                    <form action="{{ route('tests.destroy', $test->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg transition duration-300 ease-in-out w-full" onclick="return confirm('Вы уверены, что хотите удалить этот тест?')">
                                            Удалить
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
