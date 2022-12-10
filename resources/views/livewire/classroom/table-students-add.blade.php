<div class="table-responsive text-nowrap">
    @if ($students->count() > 0)
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
                        <td>{{ Str::limit($student->name . ' ' . $student->last_name, 12) }}</td>
                        <td>
                            </a>
                            <i wire:click='add({{ $student->id }})' class='bx bx-plus-medical text-primary' role="button"
                                data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true"
                                title="<span>Añadir a este curso</span>">
                            </i>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h5>No hay estudiantes disponibles para añadir</h5>
    @endif
</div>
