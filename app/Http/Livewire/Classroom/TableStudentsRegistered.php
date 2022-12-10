<?php

namespace App\Http\Livewire\Classroom;

use App\Models\Student;
use Livewire\Component;

class TableStudentsRegistered extends Component
{
    protected $listeners = ['render' => 'render'];
    public $classroom;

    public function render()
    {
        try {
            $students = Student::where('classroom_id', $this->classroom)->get();
            return view('livewire.classroom.table-students-registered', ['students' => $students]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function remove($id)
    {
        try {
            $student = Student::find($id);
            $student->update([
                'classroom_id' => null
            ]);

            $this->render();
            $this->emit('render');

        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
