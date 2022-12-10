<?php

namespace App\Http\Livewire\Classroom;

use App\Models\Classroom;
use Livewire\Component;

class CreateAccordion extends Component
{

    public $course;
    public $code;

    protected $rules = [
        'course' => 'required',
        'code' => 'required|unique:classrooms,code'
    ];

    public function render()
    {
        return view('livewire.classroom.create-accordion');
    }

    public function store(){
        $data = $this->validate();
        Classroom::create($data);

        $this->course = null;
        $this->code = null;

        $this->emit('render');
    }
}
