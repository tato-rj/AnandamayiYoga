<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait ManageContents
{
    public function createLecture(Request $request)
    {
    	$relationship = str_plural($request->type);

        return $this->$relationship()->create([
            'type' => $request->type,
            'name' => $request->name,
            'description' => $request->description,
            'duration' => $request->duration,
            'video_path' => videoToS3($request, "courses/{$relationship}"),
            'order' => $request->order,
        ]);
    }

    public function createAssignment(Request $request)
    {
        return $this->assignments()->create([
            'name' => $request->name,
            'question' => $request->question,
            'order' => $request->order,
        ]);
    }

    public function createQuiz(Request $request)
    {
        $validation = $this->validateQuiz($request->content);

        if ($validation)
            return $validation;

        return $this->quizzes()->create([
            'name' => $request->name,
            'content' => serialize($request->content),
            'order' => $request->order,
        ]);
    }

    public function stringToMethodName($model)
    {
        $array = explode('\\', $model);
        return 'create'.end($array);
    }

    public function validateQuiz($request)
    {
        foreach ($request as $quiz) {
            if (is_null($quiz['question']))
                return 'Every quiz must have a valid question.';

            foreach ($quiz['answers']['options'] as $answer) {
                if (is_null($answer))
                    return 'Each question must have all 4 answers.';
            }

            if (! array_key_exists('correct', $quiz['answers']))
                return 'At least one answer must be marked as correct.';
        }

        return null;
    }
}
