@extends('dashboard.index')

@section('title')
    Editar {{ $student->name }} {{ $student->last_name }}
@endsection

@section('dash-content')
    <div>
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">
                <a href="{{ route('index') }}">Inicio</a> /
                <a href="{{ route('students.index') }}">Lista de estudiantes</a> /
            </span>
            Editar estudiante
        </h4>
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="{{ asset('assets/img/avatars/student.jpg') }}" alt="avatar"
                                class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">{{ $student->name }} {{ $student->last_name }}</h5>
                        </div>
                    </div>
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if (Session::has('reject'))
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            {{ Session::get('reject') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
                <div class="col-lg-8">
                    <form action="{{ route('students.update', $student->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Nombre</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="mb-0">
                                            <input type="text" name="name" class="form-control" id="name"
                                                value="{{ $student->name }}" />
                                            @error('name')
                                                <span class="invalid-feedback" style="display: block;"
                                                    role="alert">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Apellido</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="mb-0">
                                            <input type="text" name="last_name" class="form-control" id="last_name"
                                                value="{{ $student->last_name }}" />
                                            @error('last_name')
                                                <span class="invalid-feedback" style="display: block;"
                                                    role="alert">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Edad</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="mb-0">
                                            <input type="number" name="age" class="form-control" id="age"
                                                value="{{ $student->age }}" />
                                            @error('age')
                                                <span class="invalid-feedback" style="display: block;"
                                                    role="alert">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Aula</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="mb-0">
                                            <select name="classroom_id" class="form-control" id="classroom_id">
                                                <option value="" selected>Sin aula</option>
                                                @foreach ($classrooms as $classroom)
                                                    <option value="{{ $classroom->id }}"
                                                        {{ $student->classroom_id == $classroom->id ? 'selected' : '' }}>
                                                        {{ $classroom->code }} | {{ $classroom->course }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('classroom_id')
                                                <span class="invalid-feedback" style="display: block;"
                                                    role="alert">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary m-4">Guardar cambios</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
