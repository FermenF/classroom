<?php

namespace App\Http\Controllers\Traits;

use App\Models\Student;
use App\Http\Controllers\Traits\RestActions;

trait StudentTrait
{
    use RestActions;

    public function allStudent(){
        try {

            $student = Student::with('getClassroom')->orderBy('id', 'desc')->paginate(15);
            return $this->respond(200, $student, null, 'Listado de estudiantes');

        } catch (\Throwable $th) {
            return $this->respond(500, [], $th->getMessage(), 'Error al obtener listado de estudiantes');
        }
    }

    public function editStudent($request, $id) {
        try {

            $student = Student::find($id);
            $student->update([
                'classroom_id' => $request->classroom_id,
                'name' => $request->name,
                'last_name' => $request->last_name,
                'age' => $request->age
            ]);

            return $this->respond(200, [], null, 'Estudiante actualizado con exito');

        } catch (\Throwable $th) {
            return $this->respond(500, [], $th->getMessage(), 'Error al editar estudiante.');
        }
    }

    public function showStudent($id){
        try {

            $student = Student::find($id);
            if($student){
                return $this->respond(200, $student, null, 'Información del estudiante');
            }
            return $this->respond(404, [], null, 'Estudiante no registrado en el sistema');

        } catch (\Throwable $th) {
            return $this->respond(500, [], $th->getMessage(), 'Error al visualizar este estudiante');
        }
    }

    public function deleteStudent($id){
        try {
            
           Student::destroy($id);
           return $this->respond(200, [], null, 'Estudiante eliminado correctamente');

        } catch (\Throwable $th) {
            return $this->respond(500, [], $th->getMessage(), 'Error al eliminar estudiante');
        }
    }
}