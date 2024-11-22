<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-3xl font-bold mb-6">Результаты теста: {{ $test->name }}</h1>

                    @if($results->isEmpty())
                        <p>Пока никто не проходил этот тест.</p>
                    @else
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Пользователь</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Результат</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Дата</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($results as $result)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $result->user ? $result->user->name : 'Гость' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $result->score }} / {{ $result->total_questions }}
                                        ({{ number_format(($result->score / $result->total_questions) * 100, 2) }}%)
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $result->created_at->format('d.m.Y H:i') }}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif

                    <a href="{{ route('userquests') }}" class="mt-6 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Вернуться к списку тестов
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
