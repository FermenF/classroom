<?php

namespace App\Http\Livewire\Classroom;

use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TableStudentsAdd extends Component
{
    public $classroom;

    protected $listeners = ['render' => 'render'];

    public function render()
    {
        $students = DB::transaction(function(){
            return Student::where('classroom_id', null)->get();
        });
        return view('livewire.classroom.table-students-add', ['students'=> $students]);
    }

    public function add($student_id)
    {
        try {
            $student = Student::find($student_id);
            $student->update([
                'classroom_id' => $this->classroom
            ]);
            $this->emit('render');

        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
