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

    public function create()
    {
        $this->reset('title', 'date');
        $this->openModal();
        $this->resetValidation();
    }

    public function store(){
        $this->validate();
        Programs::create([
            'title' => $this->title,
            'date' => $this->date,
            'user_id' => auth()->user()->id
        ]);
        session()->flash('success', 'Program created successfully.');
        $this->reset('title', 'date');
        $this->closeModal();
    }

    public function edit($programId){
        $program = Programs::findOrFail($programId);
        $this->programId = $programId;
        $this->title = $program->title;
        $this->date = $program->date;
        $this->openModal();
    }

    public function update(){
        $this->validate();
        $program = Programs::findOrFail($this->programId);
        $program->update([
            'title' => $this->title,
            'date' => $this->date,
        ]);

        session()->flash('success', 'Program updated successfully.');
        $this->reset('title', 'date');
        $this->closeModal();
    }

    public function delete($programId){
        Programs::find($programId)->delete();
        session()->flash('success', 'Event deleted successfully.');
        $this->reset('title', 'date');
    }


    public function openModal(){
        $this->open = true;
    }

    public function closeModal(){
        $this->open = false;
        $this->resetValidation();
    }

    public function render()
    {
        $programs = Programs::where('user_id', auth()->user()->id)->latest('created_at')->get();
        return view('livewire.business.programs.program-component',[
            'programs' =>     $programs
        ]);
    }
}
