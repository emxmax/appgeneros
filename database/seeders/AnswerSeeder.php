<?php

namespace Database\Seeders;

use App\Models\Answer;
use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Answer::query()->updateOrCreate(['id' => 1], [
            'name' => 'En desacuerdo',
            'order' => 1,
            'points' => 0
        ]);
        Answer::query()->updateOrCreate(['id' => 2], [
            'name' => ' Ligeramente en desacuerdo',
            'order' => 1,
            'points' => 1
        ]);
        Answer::query()->updateOrCreate(['id' => 3], [
            'name' => 'Neutral',
            'order' => 1,
            'points' => 2
        ]);
        Answer::query()->updateOrCreate(['id' => 4], [
            'name' => 'Poco de Acuerdo',
            'order' => 1,
            'points' => 3
        ]);
        Answer::query()->updateOrCreate(['id' => 5], [
            'name' => 'Muy de Acuerdo',
            'order' => 1,
            'points' => 4
        ]);


    }
}
