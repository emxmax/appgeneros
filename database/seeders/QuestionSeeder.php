<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = Question::factory()->count(5)->create();
        $questions->each(fn($question) => $question->answers()->sync(Answer::all()->pluck('id')) );
    }
}
