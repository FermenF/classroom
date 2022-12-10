<?php

namespace App\Http\Controllers\Traits;

use App\Models\Classroom;
use App\Http\Controllers\Traits\RestActions;
use App\Models\Student;

trait ClassroomTrait
{
    use RestActions;

    public function allClassroom()
    {
        try {

            $Classroom = Classroom::with('getStudents')->orderBy('id', 'desc')->paginate(15);
            return $this->respond(200, $Classroom, null, 'Listado de aulas');
        } catch (\Throwable $th) {
            return $this->respond(500, [], $th->getMessage(), 'Error al obtener listado de aulas');
        }
    }

    public function editClassroom($request, $id)
    {
        try {

            $Classroom = Classroom::find($id);
            $Classroom->update([
                'code' => $request->code,
                'course' => $request->course
            ]);

            return $this->respond(200, [], null, 'Aula actualizada con exito');
        } catch (\Throwable $th) {
            return $this->respond(500, [], $th->getMessage(), 'Error al editar aula.');
        }
    }

    public function showClassroom($id)
    {
        try {

            $Classroom = Classroom::with('getStudents')->find($id);
            if ($Classroom) {
                return $this->respond(200, $Classroom, null, 'Información del aula');
            }
            return $this->respond(404, [], null, 'Aula no registrada en el sistema');
        } catch (\Throwable $th) {
            return $this->respond(500, [], $th->getMessage(), 'Error al visualizar esta aula');
        }
    }

    public function deleteClassroom($id)
    {
        try {

            $student = Student::where('classroom_id', $id);
            $student->update([
                'classroom_id' => null
            ]);

            Classroom::destroy($id);

            return $this->respond(200, [], null, 'Aula eliminada correctamente');
        } catch (\Throwable $th) {
            return $this->respond(500, [], $th->getMessage(), 'Error al eliminar aula');
        }
    }
}
