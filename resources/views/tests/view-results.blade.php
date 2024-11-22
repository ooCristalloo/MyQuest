<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-3xl font-bold mb-6">Результаты теста: {{ $test->name }}</h1>

                    @if($test->results->isEmpty())
                        <p class="text-gray-600">Пока никто не прошел этот тест.</p>
                    @else
                        @foreach($test->results as $result)
                            <div class="mb-8 p-4 bg-gray-100 rounded-lg">
                                <div class="flex justify-between items-center mb-2">
                                    <h2 class="text-xl font-semibold">
                                        {{ $result->user ? $result->user->name : $result->guest_name }}
                                        ({{ $result->score }} / {{ $result->total_questions }})
                                    </h2>
                                    <button class="toggle-answers bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" data-target="answers-{{ $result->id }}">
                                        Показать ответы
                                    </button>
                                </div>
                                <p class="mb-4">Дата прохождения: {{ $result->created_at->format('d.m.Y H:i') }}</p>

                                <div id="answers-{{ $result->id }}" class="hidden">
                                    @php
                                        $userAnswers = json_decode($result->answers, true);
                                    @endphp

                                    @foreach($test->questions as $question)
                                        <div class="mb-4 p-3 bg-white rounded">
                                            <p class="font-medium">{{ $question->text }}</p>
                                            @foreach($question->options as $option)
                                                @php
                                                    $userAnswer = collect($userAnswers)->firstWhere('question_id', $question->id);
                                                    $isSelected = $userAnswer && $userAnswer['selected_option_id'] == $option->id;
                                                @endphp
                                                <div class="ml-4 {{ $isSelected ? ($option->is_correct ? 'text-green-600' : 'text-red-600') : '' }}">
                                                    {{ $option->text }}
                                                    @if($isSelected)
                                                        (Выбран)
                                                    @endif
                                                    @if($option->is_correct)
                                                        (Правильный)
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    @endif

                    <a href="{{ route('userquests') }}" class="mt-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Вернуться к списку тестов
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButtons = document.querySelectorAll('.toggle-answers');
            toggleButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const targetId = this.getAttribute('data-target');
                    const targetElement = document.getElementById(targetId);
                    if (targetElement.classList.contains('hidden')) {
                        targetElement.classList.remove('hidden');
                        this.textContent = 'Скрыть ответы';
                    } else {
                        targetElement.classList.add('hidden');
                        this.textContent = 'Показать ответы';
                    }
                });
            });
        });
    </script>
</x-app-layout>

