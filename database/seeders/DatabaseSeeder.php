<?php


namespace Database\Seeders;

use App\Models\User;
use App\Models\Question;
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
        User::factory()->count(3)->create()->each(function($u){
            $u->questions()
              ->saveMany(
                Question::factory()->count(3)->create()
              );
        });
    }
}
