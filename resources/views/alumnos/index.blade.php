@extends('template.base')

@section('title', 'Listado de Alumnos')

@section('content')
<h1 class="mb-4">Alumnos Registrados</h1>

<div class="row row-cols-1 row-cols-md-3 g-4">
  @foreach($alumnos as $alumno)
  <div class="col">
    <div class="card h-100">
      @if($alumno->fotografia)
        <img src="{{ route('alumnos.fotografia', $alumno) }}" 
             alt="{{ $alumno->nombre }}" 
             class="cv-foto">
      @else
        <div class="cv-foto d-flex align-items-center justify-content-center text-muted">
          Sin foto
        </div>
      @endif

      <div class="card-body text-center">
        <h5 class="card-title">{{ $alumno->nombre }} {{ $alumno->apellidos }}</h5>
        <p class="card-text text-muted">{{ $alumno->correo }}</p>
<a href="{{ route('alumnos.show', $alumno) }}" class="btn btn-dark btn-sm">Ver Perfil</a>
<a href="{{ route('alumnos.edit', $alumno) }}" class="btn btn-dark btn-sm">Editar</a>
        <form action="{{ route('alumnos.destroy', $alumno) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Seguro que quieres eliminar?');">
  @csrf
  @method('DELETE')
  <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
</form>
        </form>
      </div>
    </div>
  </div>
  @endforeach
</div>

<div class="mt-4">
  {{ $alumnos->links() }}
</div>
@endsection

