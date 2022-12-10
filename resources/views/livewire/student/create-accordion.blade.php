<div class="accordion-item card">
    <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconOne">
        <button type="button" class="accordion-button collapsed bg-dark text-white" data-bs-toggle="collapse"
            data-bs-target="#accordion-create" aria-controls="accordion-create">
            Añadir nuevo estudiante +
        </button>
    </h2>
    <div id="accordion-create" class="accordion-collapse" data-bs-parent="#accordionIcon">
        <div class="accordion-body">
            <div class="row g-2">
                <div class="col mb-0">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" wire:model.defer='name' id="name" class="form-control"
                        placeholder="Ingrese Nombre" />
                    @error('name')
                        <span class="invalid-feedback" style="display: block;" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col mb-0">
                    <label class="form-label" for="last_name">Apellido</label>
                    <input type="text" wire:model.defer='last_name' class="form-control" id="last_name"
                        placeholder="Ingrese apellido" />
                    @error('last_name')
                        <span class="invalid-feedback" style="display: block;" role="alert">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row g-2">
                <div class="col mb-0">
                    <label for="age" class="form-label">Edad</label>
                    <input type="number" wire:model.defer='age' class="form-control" id="age"
                        placeholder="Ingrese Edad" />
                    @error('age')
                        <span class="invalid-feedback" style="display: block;" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col mb-0">
                    <label class="form-label" for="classroom_id">Aula</label>
                    <select wire:model.defer='classroom_id' id="classroom_id" class="form-control">
                        <option value="" selected>Sin aula</option>
                        @foreach ($classrooms as $classroom)
                            <option value="{{ $classroom->id }}">
                                {{ $classroom->code }} | {{ $classroom->course }}
                            </option>
                        @endforeach
                    </select>
                    @error('classroom_id')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="mt-2">
                <button wire:click='store' onclick="openAccordion()" class="btn btn-primary">Añadir +</button>
            </div>
        </div>
    </div>
</div>
