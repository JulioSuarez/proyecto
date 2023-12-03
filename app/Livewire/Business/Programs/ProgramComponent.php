<?php

namespace App\Livewire\Business\Programs;

use App\Models\Programs;
use Livewire\Component;
use Livewire\Attributes\Rule;

class ProgramComponent extends Component
{

    #[Rule('required')]
    public $title;

    #[Rule('required')]
    public $date;

    public $programId;
    public $open = false;

    public function create(){
        session()->flash('success', 'Event created successfully.');
    }

    public function update(){

    }

    public function delete(){

    }


    public function openModal(){
        $this->open = true;
    }

    public function closeModal(){
        $this->open = false;
    }

    public function render()
    {
        $programs = Programs::where('user_id', auth()->user()->id)->get();
        return view('livewire.business.programs.program-component',[
            'programs' =>     $programs
        ]);
    }
}
