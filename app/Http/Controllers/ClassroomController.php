<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Traits\ClassroomTrait;
use App\Http\Requests\ClassroomRequest;
use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class ClassroomController extends Controller
{
    use ClassroomTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('classroom.index');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $classroom = DB::transaction(function () use ($id) {
            return $this->showClassroom($id);
        });

        return view('classroom.show', ['classroom' => $classroom['data']]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classroom = DB::transaction(function () use ($id){
            return $this->showClassroom($id);
        });

        return view('classroom.edit', ['classroom' => $classroom['data']]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClassroomRequest $request, $id)
    {
        try {
            $transaction = DB::transaction(function () use ($request, $id) {
                return $this->editClassroom($request, $id);
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
