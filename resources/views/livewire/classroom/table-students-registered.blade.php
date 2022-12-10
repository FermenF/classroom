<div class="table-responsive text-nowrap">
    @if($students->count() > 0)
    <table class="table">
        <thead>
            <tr>
                <th>Nombres</th>
                <th>Opciónes</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @foreach ($students as $student)
            <tr>
                <td>{{ Str::limit($student->name.' '.$student->last_name, 12) }}</td>
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
                    </a>
                    <i wire:click='remove({{ $student->id }})' class='bx bx-exit text-danger'
                        role="button"
                        data-bs-toggle="tooltip"
                        data-bs-offset="0,4"
                        data-bs-placement="top"
                        data-bs-html="true"
                        title="<span>Remover de este curso</span>">
                    </i> 
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <div>
            <h5>Sin estudiantes añadidos para este curso</h5>
        </div>
    @endif
</div>