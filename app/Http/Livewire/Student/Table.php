<?php

namespace App\Http\Livewire\Student;

use Livewire\Component;
use App\Http\Controllers\Traits\StudentTrait;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class Table extends Component
{
    use StudentTrait;
    use WithPagination;

    protected $listeners = ['render' => 'render'];
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $students = $this->allStudent();
        return view('livewire.student.table', compact('students'));
    }

    public function remove($id)
    {
        try {
            $transaction = DB::transaction(function () use ($id){
                return $this->deleteStudent($id);
            });

            $this->render();

        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
