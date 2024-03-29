<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    $gender = $faker->randomElements(['male', 'female'])[0];

    return [
        'first_name' => $faker->firstName($gender),
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'gender' => $gender,
        'lang' => $faker->languageCode,
        'timezone' => 'America/New_York',
        'level_id' => function() {
            return factory('App\Level')->create()->id;
        },
        'currency' => 'usd',
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'confirmed' => 0,
        'trial_ends_at' => \Carbon\Carbon::now()->addDays(config('membership.trial_duration'))
    ];
});

$factory->define(App\Admin::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'role' => 'manager',
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Asana::class, function (Faker $faker) {
    $name = $faker->unique()->word;

    return [
        'sanskrit' => $name,
        'name' => $faker->sentence,
        'slug' => str_slug($name),
        'etymology' => $faker->word,
        'also_known_as' => $faker->sentence,
    ];
});

$factory->define(App\AsanaType::class, function (Faker $faker) {
    $name = $faker->unique()->word;
    
    return [
        'name' => $name,
        'slug' => str_slug($name)
    ];
});

$factory->define(App\AsanaSubType::class, function (Faker $faker) {
    $name = $faker->unique()->word;
    
    return [
        'name' => $name,
        'slug' => str_slug($name)
    ];
});

$factory->define(App\AsanaBenefit::class, function (Faker $faker) {    
    return [
        'asana_id' => function() {
            return factory('App\Asana')->create()->id;
        },
        'content' => $faker->sentence,
        'content_pt' => $faker->sentence,
    ];
});

$factory->define(App\AsanaStep::class, function (Faker $faker) {    
    return [
        'asana_id' => function() {
            return factory('App\Asana')->create()->id;
        },
        'content' => $faker->sentence,
        'content_pt' => $faker->sentence,
    ];
});

$factory->define(App\Level::class, function (Faker $faker) {
    $name = $faker->unique()->word;

    return [
        'slug' => str_slug($name),
        'name' => $name
    ];
});

$factory->define(App\Category::class, function(Faker $faker) {
    $name = $faker->unique()->word;

    return [
        'slug' => str_slug($name),
        'name' => $faker->unique()->word,
        'subtitle' => $faker->sentence,
        'short_description' => $faker->sentence,
        'long_description' => $faker->sentence
    ];
});

$factory->define(App\Lesson::class, function(Faker $faker) {
    $name = $faker->unique()->sentence;

    return [
        'slug' => str_slug($name),
        'name' => $name,
        'description' => $faker->sentence,
        'duration' => $faker->numberBetween(5, 30),
        'program_id' => function() {
            return factory('App\Program')->create()->id;
        },
        'is_free' => $faker->boolean($chanceOfGettingTrue = 25),
        'teacher_id' => function() {
            return create('App\Teacher')->id;
        },
        'published' => now()
    ];
});

$factory->define(App\Program::class, function(Faker $faker) {
    $name = $faker->unique()->sentence;

    return [
        'slug' => str_slug($name),
        'name' => $name,
        'description' => $faker->sentence,
        'teacher_id' => function() {
            return create('App\Teacher')->id;
        },
        'published' => now()
    ];
});

$factory->define(App\Course::class, function(Faker $faker) {
    $name = $faker->unique()->sentence;

    return [
        'slug' => str_slug($name),
        'name' => $name,
        'cost' => 10000,
        'published' => 0,
        'headline' => $faker->sentence,
        'description' => $faker->sentence,
        'language' => 'en'
    ];
});

$factory->define(App\Teacher::class, function(Faker $faker) {
    $name = $faker->name;

    return [
        'slug' => str_slug($name),
        'name' => $name,
        'biography' => $faker->sentence,
        'email' => $faker->unique()->safeEmail,
        'website' => ''
    ];
});

$factory->define(App\Chapter::class, function(Faker $faker) {
    return [
        'course_id' => function() {
            return factory('App\Course')->create()->id;
        },
        'name' => $faker->word,
        'description' => $faker->sentence,
        'order' => $faker->randomDigitNotNull
    ];
});

$factory->define(App\SupportingMaterial::class, function(Faker $faker) {
    return [
        'chapter_id' => function() {
            return factory('App\Chapter')->create()->id;
        },
        'file_path' => $faker->imageUrl(),
        'name' => 'file'
    ];
});

$factory->define(App\Lecture::class, function(Faker $faker) {
    $types = ['lecture', 'demonstration'];

    return [
        'type' => $types[array_rand($types)],
        'name' => $faker->sentence,
        'duration' => $faker->numberBetween(5, 30),
        'description' =>$faker->sentence,
        'chapter_id' => function() {
            return factory('App\Chapter')->create()->id;
        },
        'order' => $faker->randomDigitNotNull
    ];
});

$factory->define(App\Assignment::class, function(Faker $faker) {
    return [
        'name' => $faker->sentence,
        'question' =>$faker->sentence,
        'chapter_id' => function() {
            return factory('App\Chapter')->create()->id;
        },
        'order' => $faker->randomDigitNotNull
    ];
});

$factory->define(App\Quiz::class, function(Faker $faker) {
    return [
        'name' => $faker->sentence,
        'content' => 'a:1:{i:0;a:2:{s:8:"question";s:56:"Lorem ipsum dolor sit amet, consectetur adipiscing elit?";s:7:"answers";a:2:{s:7:"options";a:4:{i:0;s:32:"Aliquip ex ea commodo consequat.";i:1;s:37:"Nostrud exercitation ullamco laboris.";i:2;s:26:"Quis nostrud exercitation.";i:3;s:45:"Exercitation ullamco laboris nisi ut aliquip.";}s:7:"correct";a:1:{i:1;s:2:"on";}}}}',
        'chapter_id' => function() {
            return factory('App\Chapter')->create()->id;
        },
        'order' => $faker->randomDigitNotNull
    ];
});

$factory->define(App\Answer::class, function(Faker $faker) {
    $models = [factory('App\Assignment')->create(), factory('App\Quiz')->create()];
    $model = $models[array_rand($models)];

    return [
        'answerable_type' => get_class($model),
        'answerable_id' => $model->id,
        'user_id' => function() {
            return factory('App\User')->create()->id;
        },
        'content' => $faker->sentence
    ];
});

$factory->define(App\Discussion::class, function(Faker $faker) {
    $course = factory('App\Course')->create();
    $chapter = factory('App\Chapter')->create(['course_id' => $course->id]);

    return [
        'course_id' => function() use ($course) {
            return $course->id;
        },
        'chapter_id' => function() use ($chapter) {
            return $chapter->id;
        },
        'subject' => $faker->sentence,
        'body' => $faker->paragraph,
        'user_id' => function() {
            return factory('App\User')->create()->id;
        }
    ];
});

$factory->define(App\Reply::class, function(Faker $faker) {
    return [
        'discussion_id' => function() {
            return factory('App\Discussion')->create()->id;
        },
        'body' => $faker->paragraph,
        'user_id' => function() {
            return factory('App\User')->create()->id;
        }
    ];
});

$factory->define(App\Wallpaper::class, function(Faker $faker) {
    return [
        'image_path' => 'image.jpg',
        'category_id' => function() {
            return factory('App\WallpaperCategory')->create()->id;
        }
    ];
});

$factory->define(App\WallpaperCategory::class, function(Faker $faker) {
    return [
        'name' => $faker->word
    ];
});

$factory->define(App\Billing\Coupon::class, function(Faker $faker) {
    return [
        'code' => $faker->word,
        'discount' => 10
    ];
});

$factory->define(App\Article::class, function(Faker $faker) {
    $title = $faker->sentence;
    return [
        'slug' => str_slug($title),
        'title' => $title,
        'content' => $faker->paragraph,
        'author_id' => function() {
            return create('App\Teacher')->id;
        }
    ];
});

$factory->define(App\ArticleTopic::class, function(Faker $faker) {
    $name = $faker->unique()->word;

    return [
        'slug' => str_slug($name),
        'name' => $name
    ];
});

$factory->define(App\Subscription::class, function(Faker $faker) {
    $lists = \App\Subscription::lists();

    return [
        'list' => $lists[array_rand($lists)],
        'email' => 'testemail@email.com'
    ];
});

$factory->define(App\Book::class, function(Faker $faker) {
    return [
        'title' => $faker->word,
        'subtitle' => $faker->sentence,
        'description' => $faker->paragraph,
        'lang' => 'en',
        'image_path' => $faker->imageUrl(),
        'amazon_url' => $faker->url
    ];
});

$factory->define(App\RoutineQuestionaire::class, function(Faker $faker) {
    return [
            'user_id' => function() {
                return create('App\User')->id;
            },
            'teacher_id' => function() {
                return create('App\Teacher')->id;
            },
            'schedule' => '"[{\"day\":\"2\",\"time\":\"afternoon\",\"duration\":\"10\"},{\"day\":\"4\",\"time\":\"evening\",\"duration\":\"35\"}]"',
            'questions' => 'a:4:{i:0;s:43:"Dapibus ultrices in iaculis nunc sed augue?";i:1;s:124:"A condimentum vitae sapien pellentesque habitant morbi. Aliquam vestibulum morbi blandit cursus risus at ultrices mi tempus?";i:2;s:252:"Morbi tristique senectus et netus et malesuada fames ac turpis. Leo vel orci porta non. Porttitor eget dolor morbi non arcu risus quis varius quam. Orci nulla pellentesque dignissim enim sit amet. Felis eget velit aliquet sagittis id consectetur purus?";i:3;s:58:"Sed ullamcorper morbi tincidunt ornare massa eget egestas?";}',
            'answers' => 'a:4:{i:0;s:7:"asdssss";i:1;s:4:"adas";i:2;s:6:"asdasd";i:3;s:5:"asdas";}'
    ];
});

$factory->define(App\Routine::class, function(Faker $faker) {
    $questionaire = create('App\RoutineQuestionaire');

    return [
            'request_id' => $questionaire->id,
            'user_id' => $questionaire->user_id,
            'teacher_id' => $questionaire->teacher_id
    ];
});

$factory->define(App\TeacherQuestionaire::class, function(Faker $faker) {
    return [
            'teacher_id' => function() {
                return create('App\Teacher')->id;
            },
            'questions' => serialize($faker->paragraphs(3))
    ];
});
