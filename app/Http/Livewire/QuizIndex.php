<?php

namespace App\Http\Livewire;

use App\Models\Question;
use Livewire\Component;

class QuizIndex extends Component
{
    public $number = 1;
    public $countdown = 60;
    public $status = 'start';
    public $question;
    public $questionCount;
    public $answerSelected;
    public $score;

    public function render()
    {
        $this->question = Question::where('number', $this->number)->first();
        $this->questionCount = Question::count();

        return view('livewire.quiz-index', [
            'question' => $this->question
        ])
            ->extends('layouts.home')
            ->section('content');
    }

    public function start()
    {
        $this->status = 'in_progress';
        $this->score = 0;
        $this->emit('startTimer');
    }

    public function restart()
    {
        $this->number = 1;
        $this->status = 'start';
    }

    public function next()
    {
        if ($this->answerSelected == $this->question->correct) {
            $this->score += 1;
        }

        if ($this->number < $this->questionCount) {
            $this->number++;
            $this->answerSelected = null;
            $this->emit('resetTimer');
        } else {
            $this->status = 'finish';
        }   
    }
}
