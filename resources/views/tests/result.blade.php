<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-3xl font-bold mb-6">Результаты теста: {{ $result->test->name }}</h1>
                    <p class="text-xl mb-4">
                        @if($result->user_id)
                            {{ optional($result->user)->name ?? 'Пользователь' }}
                        @else
                            {{ $result->guest_name ?? 'Гость' }}
                        @endif
                        ответил(а) правильно на {{ $result->score }} из {{ $result->total_questions }} вопросов.
                    </p>
                    <p class="text-2xl font-semibold mb-6">Результат: {{ number_format(($result->score / $result->total_questions) * 100, 2) }}%</p>

                    <h2 class="text-2xl font-bold mt-8 mb-4">Детали ответов:</h2>
                    @if($result->test && $result->test->questions)
                        @foreach($result->test->questions as $index => $question)
                            @php
                                $userAnswer = $userAnswers[$index] ?? null;
                                $isCorrect = $userAnswer && $userAnswer['is_correct'];
                            @endphp
                            <div class="mb-6 p-4 {{ $isCorrect ? 'bg-green-100' : 'bg-red-100' }} rounded-lg">
                                <h3 class="text-xl font-semibold mb-2">{{ $question->text }}</h3>
                                @foreach($question->options as $option)
                                    <div class="flex items-center mb-2">
                                        <input type="radio" disabled {{ $userAnswer && $userAnswer['selected_option_id'] == $option->id ? 'checked' : '' }} class="mr-2">
                                        <label class="{{ $option->is_correct ? 'font-bold' : '' }} {{ $userAnswer && $userAnswer['selected_option_id'] == $option->id ? ($option->is_correct ? 'text-green-700' : 'text-red-700') : '' }}">
                                            {{ $option->text }}
                                            @if($option->is_correct)
                                                <span class="ml-2 text-green-600">(Правильный ответ)</span>
                                            @endif
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    @else
                        <p class="text-red-500">Извините, данные о вопросах недоступны.</p>
                    @endif

                    <a href="{{ route('tests.show', $result->test->url) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-4">
                        Пройти тест снова
                    </a>
                    <a href="{{ route('userquests') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        Вернуться к списку тестов
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

