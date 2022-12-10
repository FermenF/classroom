<div class="accordion-item card">
    <h2 class="accordion-header text-body d-flex justify-content-between" id="accordionIconOne">
        <button type="button" class="accordion-button collapsed bg-dark text-white" data-bs-toggle="collapse"
            data-bs-target="#accordion-create" aria-controls="accordion-create">
            Añadir nueva aula +
        </button>
    </h2>
    <div id="accordion-create" class="accordion-collapse" data-bs-parent="#accordionIcon">
        <div class="accordion-body">
            <div class="row g-2">
                <div class="col mb-0">
                    <label for="code" class="form-label">Codigo</label>
                    <input type="text" wire:model.defer='code' id="code" class="form-control"
                        placeholder="Ingrese Codigo" />
                    @error('code')
                        <span class="invalid-feedback" style="display: block;" role="alert">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col mb-0">
                    <label class="form-label" for="course">Curso</label>
                    <input type="text" wire:model.defer='course' class="form-control" id="course"
                        placeholder="Ingrese Curso" />
                    @error('course')
                        <span class="invalid-feedback" style="display: block;" role="alert">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="mt-2">
                <button wire:click='store' onclick="openAccordion()" class="btn btn-primary">Añadir +</button>
            </div>
        </div>
    </div>
</div>
