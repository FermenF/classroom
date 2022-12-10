@extends('dashboard.index')

@section('title')
    Editar {{ $classroom->code }} {{ $classroom->course }}
@endsection

@section('dash-content')
    <div>
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">
                <a href="{{ route('index') }}">Inicio</a> /
                <a href="{{ route('classrooms.index') }}">Lista de aulas</a> /
            </span>
            Editar aula
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
                    <form action="{{ route('classrooms.update', $classroom->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Codigo</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="mb-0">
                                            <input type="text" name="code" class="form-control" id="code"
                                                value="{{ $classroom->code }}" />
                                            @error('code')
                                                <span class="invalid-feedback" style="display: block;"
                                                    role="alert">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Curso</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="mb-0">
                                            <input type="text" name="course" class="form-control" id="course"
                                                value="{{ $classroom->course }}" />
                                            @error('course')
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
