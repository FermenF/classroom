<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\StudentTrait;
use App\Models\Classroom;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    use StudentTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = DB::transaction(function () use ($id){
           return $this->showStudent($id);
        });

        return view('student.show', ['student' => $student['data']]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $student = DB::transaction(function () use ($id){
                return $this->showStudent($id);
            });
    
            $classrooms = Classroom::get();
            
            return view('student.edit', ['student' => $student['data'], 'classrooms' => $classrooms]);

        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, $id)
    {
        try {
            $transaction = DB::transaction(function () use ($request, $id) {
                return $this->editStudent($request, $id);
            });

            $status = $transaction['state'] == 200 ? 'success' : 'reject';

            return redirect()->back()->with($status, $transaction['message']);

        } catch (\Throwable $th) {
            return redirect()->back()->with($status, 'Server Error'.' '.$th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
