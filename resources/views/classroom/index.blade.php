@extends('dashboard.index')

@section('title')
        Aulas
@endsection

@section('dash-content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light"><a href="{{route('index')}}">Inicio</a> /</span> Lista de aulas
    </h4>
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

    <!-- Basic Bootstrap Table -->
    <div class="card">
        <div class="card-header">
            <h5>Listado de aulas</h5>
            <div>
                <livewire:classroom.create-accordion>
            </div>
        </div>
        <livewire:classroom.table />
    </div>
@endsection
