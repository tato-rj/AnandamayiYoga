<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
        	AdminsTableSeeder::class,
            // AsanasTableSeeder::class,
            // AsanaTypesTableSeeder::class,
            // AsanaSubTypesTableSeeder::class,
            CategoriesTableSeeder::class,
        	LevelsTableSeeder::class,
        	TeachersTableSeeder::class,
            // TeacherQuestionairesTableSeeder::class,
            ArticleTopicsTableSeeder::class,
            // ArticlesTableSeeder::class,
            // WallpaperCategoriesTableSeeder::class,
            // LessonsTableSeeder::class,
            // ProgramsTableSeeder::class,
            // CoursesTableSeeder::class,
            // WallpapersTableSeeder::class,
            // UsersTableSeeder::class,
            BooksTableSeeder::class,
        ]);
    }
}
