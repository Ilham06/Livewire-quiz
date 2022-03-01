<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Seeder;

class questionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            [
                'number'   => '1',
                'body'          => '12+5*6',
                'correct'          => 'A',
            ],
            [
                'number'   => '2',
                'body'          => 'bahasa pemograman untuk machine learning kecuali',
                'correct'          => 'B',
            ],
            [
                'number'   => '3',
                'body'          => 'fungsi untuk menganbil nilai string',
                'correct'          => 'C',
            ],
            [
                'number'   => '4',
                'body'          => 'syntax untuk perulangan kecuali',
                'correct'          => 'D',
            ],
            [
                'number'   => '5',
                'body'          => 'Rasmus Lerdorf adalah pencipta bahasa pemrograman?',
                'correct'          => 'C',
            ],
            
        ];

        Question::insert($questions);
    }
}
