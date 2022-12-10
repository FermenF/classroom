@extends('dashboard.index')

@section('title')
    Estudiantes
@endsection

@section('dash-content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light"><a href="{{route('index')}}">Inicio</a> /</span> Lista de estudiantes
    </h4>
    <!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="card-header">
            <h5>Listado de estudiantes</h5>
            <div>
                <livewire:student.create-accordion>
            </div>
        </div>
        <livewire:student.table />
    </div>
@endsection
