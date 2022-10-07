<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 50; $i++) {
            DB::table('articles')->insert([
                'title' => $i . 'The title of the article',
                'img' => 'articles/default.jpg',
                'text' => 'Щоб створити нову таблицю бази даних, використовуйте  на Schemaфасаді. Метод createприймає два аргументи: перший — ім’я таблиці, а другий — замикання, яке отримує Blueprintоб’єкт, який можна використовувати для визначення нової таблиці:' ,
                'active' => true,
                'created_at' =>  Carbon::today()->subDays(rand(0, 365))
            ]);
        }
    }
}
