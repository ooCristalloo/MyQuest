<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\TestResult;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TestController extends Controller
{
    public function index()
    {
        $tests = Test::where('user_id', auth()->id())->withCount('results')->get();
        return view('userquests', compact('tests'));
    }

    public function create()
    {
        return view('tests.createquests');
    }

    public function destroy($id)
    {
        $test = Test::findOrFail($id);

        if ($test->user_id !== auth()->id()) {
            return redirect()->route('userquests')->with('error', 'У вас нет прав для удаления этого теста.');
        }

        $test->delete();
        return redirect()->route('userquests')->with('success', 'Тест успешно удален.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'test_name' => 'required|string|max:255',
            'test_description' => 'nullable|string',
            'questions' => 'required|array|min:1',
            'questions.*.text' => 'required|string|max:255',
            'questions.*.options' => 'required|array|min:2',
            'questions.*.options.*' => 'required|string|max:255',
            'questions.*.correct_option' => 'required|integer|min:0',
        ]);

        $test = Test::create([
            'user_id' => auth()->id(),
            'name' => $request->test_name,
            'description' => $request->test_description,
            'url' => Str::slug($request->test_name) . '-' . Str::random(6),
        ]);

        foreach ($request->questions as $questionData) {
            $question = $test->questions()->create([
                'text' => $questionData['text'],
            ]);


            foreach ($questionData['options'] as $index => $optionText) {
                $isCorrect = $index == $questionData['correct_option'];
                $question->options()->create([
                    'text' => $optionText,
                    'is_correct' => $isCorrect,
                ]);
            }
        }

        return redirect()->route('userquests')->with('success', 'Тест успешно создан!');
    }


    public function show($url)
    {
        $test = Test::where('url', $url)->with('questions.options')->firstOrFail();
        return view('tests.show', compact('test'));
    }


    public function submit(Request $request, $url)
    {
        $test = Test::where('url', $url)->with('questions.options')->firstOrFail();

        $rules = [
            'answers' => 'required|array',
        ];

        if (!auth()->check()) {
            $rules['guest_name'] = 'required|string|max:255';
        }

        $request->validate($rules);

        $answers = $request->input('answers');
        $score = 0;
        $totalQuestions = $test->questions->count();
        $userAnswers = [];

        foreach ($test->questions as $question) {
            $correctOption = $question->options->where('is_correct', true)->first();
            $userAnswer = $answers[$question->id] ?? null;
            $isCorrect = $userAnswer && $userAnswer == $correctOption->id;

            if ($isCorrect) {
                $score++;
            }

            $userAnswers[] = [
                'question_id' => $question->id,
                'selected_option_id' => $userAnswer,
                'is_correct' => $isCorrect,
            ];
        }

        $result = TestResult::create([
            'test_id' => $test->id,
            'user_id' => auth()->id(),
            'guest_name' => auth()->check() ? null : $request->input('guest_name'),
            'score' => $score,
            'total_questions' => $totalQuestions,
            'answers' => json_encode($userAnswers),
        ]);

        return redirect()->route('tests.result', $result->id);
    }

    public function results($id)
    {
        $test = Test::findOrFail($id);
        $results = $test->results()->with('user')->get();
        return view('tests.results', compact('test', 'results'));
    }

    public function result($id)
    {
        $result = TestResult::with(['test.questions.options', 'user'])->findOrFail($id);
        $userAnswers = json_decode($result->answers, true) ?? [];

        return view('tests.result', compact('result', 'userAnswers'));
    }

    public function viewResults($id)
    {
        $test = Test::with(['questions.options', 'results.user'])->findOrFail($id);

        if ($test->user_id !== auth()->id()) {
            return redirect()->route('tests.index')->with('error', 'У вас нет прав для просмотра результатов этого теста.');
        }

        return view('tests.view-results', compact('test'));
    }
}

