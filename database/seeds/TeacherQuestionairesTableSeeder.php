<?php

use Illuminate\Database\Seeder;
use App\TeacherQuestionaire;

class TeacherQuestionairesTableSeeder extends Seeder
{
    public function run()
    {
        TeacherQuestionaire::create([
            'teacher_id' => 1,
            'questions' => serialize('["How old are you?","What are your interests?","How long do you want your classes to be?"]'),
            'questions_pt' => serialize('["Quantos anos você tem?","Quais são os seus interesses?","Qual a duração das aulas você gostaria?"]'),
            'published' => now()
        ]);
    }
}
