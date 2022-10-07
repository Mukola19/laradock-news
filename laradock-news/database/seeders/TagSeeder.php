<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 20; $i++) {
            DB::table('tags')->insert([
                'name' => 'tag'. $i,
                'article_id' => rand(1, 50),
                'created_at' =>  Carbon::today()->subDays(rand(0, 365)) 
            ]);
        }
    }
}
