@extends('dashboard.index')

@section('title')
    Información de {{ $classroom->code }} {{ $classroom->course }}
@endsection

@section('dash-content')
    <div>
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">
                <a href="{{ route('index') }}">Inicio</a> /
                <a href="{{ route('classrooms.index') }}">Lista de aulas</a> /
            </span>
            Información del aula
        </h4>
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="{{ asset('assets/img/avatars/classroom.jpg') }}" alt="avatar"
                                class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">{{ $classroom->course }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Codigo</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $classroom->code }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Curso</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">
                                        {{ $classroom->course }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                                <p class="mb-4"><span class="text-primary font-italic me-1">Información
                                        adicional</span></p>
                                <p class="mb-1">Fecha de registro:
                                    {{ date('d-m-Y', strtotime($classroom->created_at)) }}</p>
                                <p class="mb-1">Ultima actualización:
                                    {{ date('d-m-Y', strtotime($classroom->updated_at)) }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4 mb-md-0">
                                <div class="card-body">
                                    <p class="mb-4"><span class="text-primary font-italic me-1">Estudiantes
                                            registrados</span></p>
                                    <livewire:classroom.table-students-registered :classroom="$classroom->id">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-4 mb-md-0">
                                <div class="card-body">
                                    <p class="mb-4"><span class="text-primary font-italic me-1">Añadir estudiantes a este
                                            curso</span></p>
                                    <livewire:classroom.table-students-add :classroom="$classroom->id">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
