@extends('template.base')

@section('title', 'Perfil de Alumno')

@section('content')
<div class="card shadow-sm border-0">
  @if($alumno->fotografia)
    <img src="{{ route('alumnos.fotografia', $alumno) }}" 
         alt="{{ $alumno->nombre }}" 
         class="cv-foto mb-3">
  @else
    <div class="cv-foto d-flex align-items-center justify-content-center text-muted mb-3">
      Sin foto
    </div>
  @endif

  <div class="card-body">
    <h1 class="mb-4">{{ $alumno->nombre }} {{ $alumno->apellidos }}</h1>

    <ul class="list-group mb-4">
      <li class="list-group-item"><strong>Correo:</strong> {{ $alumno->correo }}</li>
      @if($alumno->telefono)
        <li class="list-group-item"><strong>Teléfono:</strong> {{ $alumno->telefono }}</li>
      @endif
      @if($alumno->fecha_nacimiento)
        <li class="list-group-item"><strong>Fecha de nacimiento:</strong> 
          {{ \Carbon\Carbon::parse($alumno->fecha_nacimiento)->format('d/m/Y') }}
        </li>
      @endif
      @if($alumno->nota_media)
        <li class="list-group-item"><strong>Nota media:</strong> {{ $alumno->nota_media }}</li>
      @endif
    </ul>

    <a href="{{ route('alumnos.edit', $alumno) }}" class="btn btn-warning">Editar Alumno</a>
    <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Volver al Listado</a>
  </div>
</div>
@endsection
