<?php

use Illuminate\Database\Seeder;
use App\Lesson;

class LessonsTableSeeder extends Seeder
{
    public function run()
    {
        Lesson::create([
        	'slug' => str_slug('Poses to get you balanced'), 
        	'name' => 'Poses to get you balanced', 
        	'name_pt' => 'Posturas para o equilíbrio',
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        	'description_pt' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        	'image_path' => 'app/demo/images/demo-1.jpg',
        	'video_path' => 'app/demo/videos/demo-lesson.mp4',
        	'duration' => mt_rand(300,800),
        	'program_id' => 3,
        	'order' => null,
        	'is_free' => true,
        	'teacher_id' => 1
        ]);

        \DB::insert('insert into lesson_level (lesson_id, level_id) values (1, 1)');
        \DB::insert('insert into category_lesson (lesson_id, category_id) values (1, 1), (1, 3), (1, 5)');

        Lesson::create([
        	'slug' => str_slug('Life benefits of Yoga'), 
        	'name' => 'Life benefits of Yoga', 
        	'name_pt' => 'Benefícios do Yoga',
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        	'description_pt' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        	'image_path' => 'app/demo/images/demo-2.jpg',
        	'video_path' => 'app/demo/videos/demo-lesson.mp4',
        	'duration' => mt_rand(300,800),
        	'program_id' => 1,
        	'order' => null,
        	'is_free' => false,
        	'teacher_id' => 1
        ]);

        \DB::insert('insert into lesson_level (lesson_id, level_id) values (2, 3)');
        \DB::insert('insert into category_lesson (lesson_id, category_id) values (2, 2), (2, 3)');

        Lesson::create([
        	'slug' => str_slug('Beginner\'s balance class'), 
        	'name' => 'Beginner\'s balance class', 
        	'name_pt' => 'Equilíbio para iniciantes',
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        	'description_pt' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        	'image_path' => 'app/demo/images/demo-3.jpg',
        	'video_path' => 'app/demo/videos/demo-lesson.mp4',
        	'duration' => mt_rand(300,800),
        	'program_id' => 3,
        	'order' => null,
        	'is_free' => true,
        	'teacher_id' => 1
        ]);

        \DB::insert('insert into lesson_level (lesson_id, level_id) values (3, 1)');
        \DB::insert('insert into category_lesson (lesson_id, category_id) values (3, 3), (3, 6), (3, 9), (3, 11)');

        Lesson::create([
        	'slug' => str_slug('Yoga to relieve back pain'), 
        	'name' => 'Yoga to relieve back pain', 
        	'name_pt' => 'Yoga para aliviar dores nas costas',
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        	'description_pt' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        	'image_path' => 'app/demo/images/demo-4.jpg',
        	'video_path' => 'app/demo/videos/demo-lesson.mp4',
        	'duration' => mt_rand(300,800),
        	'program_id' => 1,
        	'order' => null,
        	'is_free' => false,
        	'teacher_id' => 1
        ]);

        \DB::insert('insert into lesson_level (lesson_id, level_id) values (4, 1), (4, 2), (4, 3)');
        \DB::insert('insert into category_lesson (lesson_id, category_id) values (4, 6), (4, 9), (4, 11)');

        Lesson::create([
        	'slug' => str_slug('Yoga to help headaches'), 
        	'name' => 'Yoga to help headaches', 
        	'name_pt' => 'Yoga para aliviar dores de cabeça',
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        	'description_pt' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        	'image_path' => 'app/demo/images/demo-5.jpg',
        	'video_path' => 'app/demo/videos/demo-lesson.mp4',
        	'duration' => mt_rand(300,800),
        	'program_id' => 2,
        	'order' => null,
        	'is_free' => true,
        	'teacher_id' => 2
        ]);

        \DB::insert('insert into lesson_level (lesson_id, level_id) values (5, 1), (5, 2), (5, 3)');
        \DB::insert('insert into category_lesson (lesson_id, category_id) values (5, 1), (5, 2), (5, 7), (5, 10)');

        Lesson::create([
        	'slug' => str_slug('Mobility on the mat'), 
        	'name' => 'Mobility on the mat', 
        	'name_pt' => 'Mobilidade',
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        	'description_pt' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        	'image_path' => 'app/demo/images/demo-6.jpg',
        	'video_path' => 'app/demo/videos/demo-lesson.mp4',
        	'duration' => mt_rand(300,800),
        	'program_id' => 1,
        	'order' => null,
        	'is_free' => true,
        	'teacher_id' => 1
        ]);

        \DB::insert('insert into lesson_level (lesson_id, level_id) values (6, 1), (6, 2), (6, 3)');
        \DB::insert('insert into category_lesson (lesson_id, category_id) values (6, 2), (6, 6), (6, 9), (6, 10)');

        Lesson::create([
        	'slug' => str_slug('Arm balancing flow'), 
        	'name' => 'Arm balancing flow', 
        	'name_pt' => 'Fluxo de equilíbrio nos braços',
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        	'description_pt' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        	'image_path' => 'app/demo/images/demo-7.jpg',
        	'video_path' => 'app/demo/videos/demo-lesson.mp4',
        	'duration' => mt_rand(300,800),
        	'program_id' => 4,
        	'order' => null,
        	'is_free' => true,
        	'teacher_id' => 1
        ]);

        \DB::insert('insert into lesson_level (lesson_id, level_id) values (7, 2), (7, 3)');
        \DB::insert('insert into category_lesson (lesson_id, category_id) values (7, 3), (7, 4)');

        Lesson::create([
        	'slug' => str_slug('Core strength'), 
        	'name' => 'Core strength', 
        	'name_pt' => 'Fortalecimento do core',
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        	'description_pt' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        	'image_path' => 'app/demo/images/demo-8.jpg',
        	'video_path' => 'app/demo/videos/demo-lesson.mp4',
        	'duration' => mt_rand(300,800),
        	'program_id' => 4,
        	'order' => null,
        	'is_free' => true,
        	'teacher_id' => 1
        ]);

        \DB::insert('insert into lesson_level (lesson_id, level_id) values (8, 3)');
        \DB::insert('insert into category_lesson (lesson_id, category_id) values (8, 1), (8, 4), (8, 8)');

        Lesson::create([
        	'slug' => str_slug('The Yoga core & breath'), 
        	'name' => 'The Yoga core & breath', 
        	'name_pt' => 'Core e respiração no Yoga',
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        	'description_pt' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        	'image_path' => 'app/demo/images/demo-9.jpg',
        	'video_path' => 'app/demo/videos/demo-lesson.mp4',
        	'duration' => mt_rand(300,800),
        	'program_id' => 2,
        	'order' => null,
        	'is_free' => false,
        	'teacher_id' => 2
        ]);

        \DB::insert('insert into lesson_level (lesson_id, level_id) values (9, 1)');
        \DB::insert('insert into category_lesson (lesson_id, category_id) values (9, 4), (9, 6)');

        Lesson::create([
        	'slug' => str_slug('Yoga for the spine'), 
        	'name' => 'Yoga for the spine', 
        	'name_pt' => 'Yoga para a coluna',
        	'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        	'description_pt' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        	'image_path' => 'app/demo/images/demo-10.jpg',
        	'video_path' => 'app/demo/videos/demo-lesson.mp4',
        	'duration' => mt_rand(300,800),
        	'program_id' => null,
        	'order' => null,
        	'is_free' => false,
        	'teacher_id' => 1
        ]);

        \DB::insert('insert into lesson_level (lesson_id, level_id) values (10, 1)');
        \DB::insert('insert into category_lesson (lesson_id, category_id) values (10, 3), (10, 6), (10, 7), (10, 8)');
    }
}
