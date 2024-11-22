document.addEventListener('DOMContentLoaded', () => {
    const addQuestionBtn = document.getElementById('addQuestionBtn');
    const questionsContainer = document.getElementById('questionsContainer');
    let questionCount = 0;

    function createQuestionElement() {
        questionCount++;
        const questionDiv = document.createElement('div');
        questionDiv.className = 'mb-6 p-4 bg-gray-50 rounded-md';
        questionDiv.innerHTML = `
            <div class="flex justify-between items-center mb-2">
                <label class="block text-sm font-medium text-gray-700">Вопрос ${questionCount}</label>
                <button type="button" class="removeQuestionBtn text-red-600 hover:text-red-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
            <input type="text" name="questions[${questionCount - 1}][text]" class="w-full px-3 py-2 border text-gray-500 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 mb-2" placeholder="Введите вопрос" required>
            <div class="optionsContainer">
                <div class="flex items-center mb-2">
                    <input type="radio" name="questions[${questionCount - 1}][correct_option]" value="0" class="mr-2" required>
                    <input type="text" name="questions[${questionCount - 1}][options][]" class="w-full px-3 py-2 border text-gray-500  border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Вариант ответа 1" required>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" name="questions[${questionCount - 1}][correct_option]" value="1" class="mr-2" required>
                    <input type="text" name="questions[${questionCount - 1}][options][]" class="w-full px-3 py-2 border text-gray-500  border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Вариант ответа 2" required>
                </div>
            </div>
            <button type="button" class="addOptionBtn text-indigo-600 hover:text-indigo-800 text-sm font-medium">
                + Добавить вариант ответа
            </button>
        `;

        const removeQuestionBtn = questionDiv.querySelector('.removeQuestionBtn');
        removeQuestionBtn.addEventListener('click', () => {
            questionDiv.remove();
            updateQuestionNumbers();
        });

        const addOptionBtn = questionDiv.querySelector('.addOptionBtn');
        addOptionBtn.addEventListener('click', () => {
            const optionsContainer = questionDiv.querySelector('.optionsContainer');
            const newOptionDiv = document.createElement('div');
            newOptionDiv.className = 'flex items-center mb-2';
            newOptionDiv.innerHTML = `
                <input type="radio" name="questions[${questionCount - 1}][correct_option]" value="${optionsContainer.children.length}" class="mr-2" required>
                <input type="text" name="questions[${questionCount - 1}][options][]" class="w-full px-3 py-2 border text-gray-500  border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" placeholder="Вариант ответа ${optionsContainer.children.length + 1}" required>
            `;
            optionsContainer.appendChild(newOptionDiv);
        });

        return questionDiv;
    }

    function updateQuestionNumbers() {
        const questions = questionsContainer.querySelectorAll('.mb-6');
        questions.forEach((question, index) => {
            const label = question.querySelector('label');
            label.textContent = `Вопрос ${index + 1}`;
            const inputs = question.querySelectorAll('input[name^="questions["]');
            inputs.forEach(input => {
                const name = input.name;
                input.name = name.replace(/questions\[\d+\]/, `questions[${index}]`);
            });
        });
        questionCount = questions.length;
    }

    addQuestionBtn.addEventListener('click', () => {
        const newQuestion = createQuestionElement();
        questionsContainer.appendChild(newQuestion);
    });

    // Добавляем первый вопрос при загрузке страницы
    const firstQuestion = createQuestionElement();
    questionsContainer.appendChild(firstQuestion);
});

