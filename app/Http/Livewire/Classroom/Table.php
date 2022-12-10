<?php

namespace App\Http\Livewire\Classroom;

use Livewire\Component;
use App\Http\Controllers\Traits\ClassroomTrait;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class Table extends Component
{
    use ClassroomTrait;
    use WithPagination;
    
    protected $listeners = ['render' => 'render'];
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $classrooms = $this->allClassroom();
        return view('livewire.classroom.table', compact('classrooms'));
    }

    public function remove($id)
    {
        try {
            
            DB::transaction(function () use ($id){
                return $this->deleteClassroom($id);
            });

            $this->render();

        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
