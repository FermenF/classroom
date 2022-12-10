<?php

namespace App\Http\Livewire\Student;

use App\Models\Classroom;
use App\Models\Student;
use Livewire\Component;

class CreateAccordion extends Component
{

    public $name;
    public $last_name;
    public $age;
    public $classroom_id;

    public function render()
    {
        $classrooms = Classroom::get();
        return view('livewire..student.create-accordion', compact('classrooms'));
    }

    protected $rules = [
        'name' => 'required',
        'last_name' => 'required',
        'age' => 'required',
        'classroom_id' => 'nullable'
    ];

    public function store()
    {
        $data = $this->validate();
        Student::create($data);

        $this->name = null;
        $this->last_name = null;
        $this->age = null;
        $this->classroom_id = null;
        
        $this->emit('render');
    }
}
