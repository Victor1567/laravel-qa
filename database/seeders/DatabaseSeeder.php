<?php


namespace Database\Seeders;

use App\Models\User;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(5)->create()->each(function($u){
            $u->questions()
              ->saveMany(
                Question::factory()->count(9)->create()
              )
              ->each(function ($q)
              {
                $q->answers()->saveMany(Answer::factory()->count(1)->make());
              });
        });
    }
}
