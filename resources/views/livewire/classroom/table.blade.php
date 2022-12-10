<div class="table-responsive text-nowrap">
    @if($classrooms['data']->count() > 0)
    <table class="table">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Curso</th>
                <th>Cantidad Estudiantes</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach ($classrooms['data'] as $classroom)
            <tr>
                <td>
                    <i class="fab fa-angular fa-lg text-danger me-3"></i>
                        <strong>{{ $classroom->code }}</strong>
                </td>
                <td>{{ $classroom->course }}</td>
                <td>{{ $classroom->getStudents->count() }} Estuadiante/s </td>
                <td>
                    <a href="{{ route('classrooms.show', $classroom->id) }}">
                        <i class='bx bx-show text-info'
                            data-bs-toggle="tooltip"
                            data-bs-offset="0,4"
                            data-bs-placement="top"
                            data-bs-html="true"
                            title="<span>Ver</span>">
                        </i>
                    </a>
                    <a href="{{ route('classrooms.edit', $classroom->id) }}">
                        <i class='bx bxs-cog'
                            data-bs-toggle="tooltip"
                            data-bs-offset="0,4"
                            data-bs-placement="top"
                            data-bs-html="true"
                            title="<span>Editar</span>">
                        </i>      
                    </a> 
                    </a>
                    <i wire:click='remove({{ $classroom->id }})' class='bx bxs-trash-alt text-danger'
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
        {{ $classrooms['data']->links() }}
    </div>
    @else
        <div>
            <h5>Sin aulas añadidas</h5>
        </div>
    @endif
</div>