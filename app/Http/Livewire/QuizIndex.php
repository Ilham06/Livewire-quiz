<?php

namespace App\Http\Livewire;

use App\Models\Question;
use Livewire\Component;

class QuizIndex extends Component
{
    public $number = 1;
    public $question;
    public $answerSelected;

    public function render()
    {
        $question = Question::where('number', $this->number)->first();
        $this->question = $question;

        return view('livewire.quiz-index', [
            'question' => $question
        ])
            ->extends('layouts.home')
            ->section('content');
    }

    public function answer()
    {
        if ($this->answerSelected == $this->question->correct) {
            $this->emit('answer', ['message' => 'Jawaban Anda Benar']);
        } else {
            $this->emit('answer', ['message' => 'Jawaban Anda Salah']);
        }
    }

    public function next()
    {
        $this->number++;
        $this->emit('resetTimer');
    }
}
