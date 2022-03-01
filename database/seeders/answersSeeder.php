<?php

namespace Database\Seeders;

use App\Models\Answer;
use Illuminate\Database\Seeder;

class answersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $answers = [
            [
                'question_id'   => '1',
                'code'          => 'A',
                'answer'          => '42',
            ],
            [
                'question_id'   => '1',
                'code'          => 'B',
                'answer'          => '102',
            ],
            [
                'question_id'   => '1',
                'code'          => 'C',
                'answer'          => '72',
            ],
            [
                'question_id'   => '1',
                'code'          => 'D',
                'answer'          => '52',
            ],
            [
                'question_id'   => '2',
                'code'          => 'A',
                'answer'          => 'Phyton',
            ],
            [
                'question_id'   => '2',
                'code'          => 'B',
                'answer'          => 'PHP',
            ],
            [
                'question_id'   => '2',
                'code'          => 'C',
                'answer'          => 'R',
            ],
            [
                'question_id'   => '2',
                'code'          => 'D',
                'answer'          => 'C++',
            ],
            [
                'question_id'   => '3',
                'code'          => 'A',
                'answer'          => 'Push',
            ],
            [
                'question_id'   => '3',
                'code'          => 'B',
                'answer'          => 'Slice',
            ],
            [
                'question_id'   => '3',
                'code'          => 'C',
                'answer'          => 'Substr',
            ],
            [
                'question_id'   => '3',
                'code'          => 'D',
                'answer'          => 'Concat',
            ],
            [
                'question_id'   => '4',
                'code'          => 'A',
                'answer'          => 'Foreach',
            ],
            [
                'question_id'   => '4',
                'code'          => 'B',
                'answer'          => 'For',
            ],
            [
                'question_id'   => '4',
                'code'          => 'C',
                'answer'          => 'While',
            ],
            [
                'question_id'   => '4',
                'code'          => 'D',
                'answer'          => 'Switch',
            ],
            [
                'question_id'   => '5',
                'code'          => 'A',
                'answer'          => 'Javascript',
            ],
            [
                'question_id'   => '5',
                'code'          => 'B',
                'answer'          => 'Phyton',
            ],
            [
                'question_id'   => '5',
                'code'          => 'C',
                'answer'          => 'PHP',
            ],
            [
                'question_id'   => '5',
                'code'          => 'D',
                'answer'          => 'C++',
            ],
            
        ];

        Answer::insert($answers);
    }
}
