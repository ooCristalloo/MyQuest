<script src="https://cdn.tailwindcss.com"></script>
@vite(['resources/js/app.js', 'resources/js/testCreation.js'])
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-3xl font-bold mb-6">{{ $test->name }}</h1>
                <p class="mb-6 text-gray-600">{{ $test->description }}</p>
                <form action="{{ route('tests.submit', $test->url) }}" method="POST">
                    @csrf
                    @guest
                        <div class="mb-4">
                            <label for="guest_name" class="block text-sm font-medium text-gray-700">Ваше имя</label>
                            <input type="text" name="guest_name" id="guest_name" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                    @endguest
                    @foreach($test->questions as $question)
                        <div class="mb-6 p-4 bg-gray-50 rounded-lg">
                            <h2 class="text-xl font-semibold mb-2">{{ $question->text }}</h2>
                            @foreach($question->options as $option)
                                <div class="flex items-center mb-2">
                                    <input type="radio" id="option_{{ $option->id }}" name="answers[{{ $question->id }}]" value="{{ $option->id }}" class="mr-2" required>
                                    <label for="option_{{ $option->id }}">{{ $option->text }}</label>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Отправить ответы
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>


