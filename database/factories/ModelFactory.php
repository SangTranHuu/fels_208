<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'role' => $faker->numberBetween(0, 1),
        'birthday' => $faker->date(),
        'avatar' => 'avatar.png',
    ];
});

$factory->define(App\Models\Course::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->text(30),
        'description' => $faker->paragraph,
        'level' => $faker->numberBetween(1, 20),
    ];
});

$factory->define(App\Models\Grammar::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->text(30),
        'structure' => $faker->paragraph,
        'example' => $faker->text(50),
        'lesson_id' => $faker->randomElement(App\Models\Lesson::pluck('id')->toArray()),
        'description' => $faker->paragraph,
    ];
});

$factory->define(App\Models\Lesson::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->text(30),
        'course_id' => $faker->randomElement(App\Models\Course::pluck('id')->toArray()),
    ];
});

$factory->define(App\Models\Question::class, function (Faker\Generator $faker) {
    return [
        'question' => $faker->unique()->paragraph,
        'course_id' => $faker->randomElement(App\Models\Course::pluck('id')->toArray()),
    ];
});

$factory->define(App\Models\Answer::class, function (Faker\Generator $faker) {
    return [
        'answer' => $faker->unique()->paragraph,
        'is_correct' => $faker->boolean,
        'question_id' => $faker->randomElement(App\Models\Question::pluck('id')->toArray()),
    ];
});

$factory->define(App\Models\Word::class, function (Faker\Generator $faker) {
    return [
        'word' => $faker->unique()->title,
        'meaning' => $faker->text(10),
        'lesson_id' => $faker->randomElement(App\Models\Lesson::pluck('id')->toArray()),
    ];
});

$factory->define(App\Models\Test::class, function (Faker\Generator $faker) {
    return [
        'mark' => $faker->numberBetween(0, 20),
        'user_id' => $faker->randomElement(App\Models\User::pluck('id')->toArray()),
        'course_id' => $faker->randomElement(App\Models\Course::pluck('id')->toArray()),
    ];
});

$factory->define(App\Models\Activity::class, function (Faker\Generator $faker) {
    return [
        'description' => $faker->paragraph,
        'user_id' => $faker->randomElement(App\Models\User::pluck('id')->toArray()),
    ];
});
