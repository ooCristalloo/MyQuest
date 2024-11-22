<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <h2 class="text-2xl font-bold mb-6 text-indigo-700">Создание нового теста</h2>

            <form id="testForm" action="{{ route('tests.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="test_name" class="block text-sm font-medium text-gray-700 mb-2">Название теста</label>
                    <input type="text" name="test_name" id="test_name" class="w-full px-3 py-2 border text-gray-500 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                </div>

                <div>
                    <label for="test_description" class="block text-sm font-medium text-gray-700 mb-2">Описание теста</label>
                    <textarea name="test_description" id="test_description" rows="3" class="w-full px-3 py-2 border text-gray-500 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
                </div>

                <div id="questionsContainer" class="space-y-4">
                    <h3 class="text-lg font-semibold mb-4 text-gray-800">Вопросы</h3>
                </div>

                <button type="button" id="addQuestionBtn" class="flex items-center text-indigo-600 hover:text-indigo-800 font-medium">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                    </svg>
                    Добавить вопрос
                </button>

                <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-300">
                    Создать тест
                </button>
            </form>
        </div>
    </div>
</div>
@vite(['resources/js/testCreation.js'])

