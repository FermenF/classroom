@extends('dashboard.index')

@section('title')
    Inicio
@endsection

@section('dash-content')
    <div class="row mb-5">
        <div class="col-md-6 col-lg-4 mb-3">
            <div class="card text-center">
                <div class="card-header">Estudiantes</div>
                <div class="card-body">
                    <h5 class="card-title">Modulo para la administración de estudiantes</h5>
                    <a href="{{route('students.index')}}" class="btn btn-primary">Ir</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-3">
            <div class="card text-center">
                <div class="card-header">Aulas</div>
                <div class="card-body">
                    <h5 class="card-title">Modulo para la administración de aulas</h5>
                    <a href="{{route('classrooms.index')}}" class="btn btn-primary">Ir</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-3">
            <div class="card text-center">
                <div class="card-header">Mi Perfil</div>
                <div class="card-body">
                    <h5 class="card-title">Fernando Fernandez</h5>
                    <p class="card-text">
                        De acuerdo con mi nivel de experiencia, mi aspiración salarial es:
                        <br> 
                        <strong>
                            $1,800,000 COP
                        </strong>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
