<div class="table-responsive text-nowrap">
    @if($students['data']->count() > 0)
    <table class="table">
        <thead>
            <tr>
                <th>Aula</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Edad</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach ($students['data'] as $student)
            <tr>
                <td>
                    <i class="fab fa-angular fa-lg text-danger me-3"></i> 
                    @if (isset($student->classroom_id))
                        <strong>{{ $student->getClassroom->code }} | {{ $student->getClassroom->course }}</strong>
                    @else
                        <strong>Sin aula registrada</strong>
                    @endif
                </td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->last_name }}</td>
                <td>{{ $student->age }}</td>
                <td>
                    <a href="{{ route('students.show', $student->id) }}">
                        <i class='bx bx-show text-info'
                            data-bs-toggle="tooltip"
                            data-bs-offset="0,4"
                            data-bs-placement="top"
                            data-bs-html="true"
                            title="<span>Ver</span>">
                        </i>
                    </a>
                    <a href="{{ route('students.edit', $student->id) }}">
                        <i class='bx bxs-cog'
                            data-bs-toggle="tooltip"
                            data-bs-offset="0,4"
                            data-bs-placement="top"
                            data-bs-html="true"
                            title="<span>Editar</span>">
                        </i>      
                    </a> 
                    </a>
                    <i wire:click='remove({{ $student->id }})' class='bx bxs-trash-alt text-danger'
                        role="button"
                        data-bs-toggle="tooltip"
                        data-bs-offset="0,4"
                        data-bs-placement="top"
                        data-bs-html="true"
                        title="<span>Eliminar</span>">
                    </i> 
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-5">
        {{ $students['data']->links() }}
    </div>
    @else
    <div>
        <h5>Sin estudiantes registrados</h5>
    </div>
    @endif
</div>