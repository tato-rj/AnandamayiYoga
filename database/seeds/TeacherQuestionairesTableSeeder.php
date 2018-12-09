<?php

use Illuminate\Database\Seeder;
use App\TeacherQuestionaire;

class TeacherQuestionairesTableSeeder extends Seeder
{
    public function run()
    {
        TeacherQuestionaire::create([
            'teacher_id' => 1,
            'questions' => serialize('[
            	"Lorem ipsum dolor sit amet?",
            	"Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua?",
            	"Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat?",
            	"Adipiscing elit duis tristique sollicitudin nibh. Id porta nibh venenatis cras sed felis?"
            ]'),
            'questions_pt' => serialize('[
            	"Enim facilisis gravida neque convallis?",
            	"Risus viverra adipiscing at in?",
            	"Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua?",
            	"Adipiscing elit duis tristique sollicitudin nibh. Id porta nibh venenatis cras sed felis?"
            ]'),
            'published' => now()
        ]);

        TeacherQuestionaire::create([
            'teacher_id' => 2,
            'questions' => serialize('[
            	"Dapibus ultrices in iaculis nunc sed augue?",
            	"A condimentum vitae sapien pellentesque habitant morbi. Aliquam vestibulum morbi blandit cursus risus at ultrices mi tempus?",
            	"Morbi tristique senectus et netus et malesuada fames ac turpis. Leo vel orci porta non. Porttitor eget dolor morbi non arcu risus quis varius quam. Orci nulla pellentesque dignissim enim sit amet. Felis eget velit aliquet sagittis id consectetur purus?",
            	"Sed ullamcorper morbi tincidunt ornare massa eget egestas purus?"
            ]'),
            'questions_pt' => serialize('[
            	"Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat?",
            	"Massa id neque aliquam vestibulum morbi blandit cursus risus?",
            	"Donec et odio pellentesque diam volutpat?",
            	"Risus viverra adipiscing at in?"
            ]'),
            'published' => now()
        ]);
    }
}
