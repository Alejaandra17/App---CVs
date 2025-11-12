@extends('template.base')

@section('title', 'Editar Alumno')

@section('content')
<h1 class="mb-4">Editar Alumno</h1>

<form action="{{ route('alumnos.update', $alumno) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $alumno->nombre) }}" required>
        @error('nombre')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="apellidos" class="form-label">Apellidos</label>
        <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{ old('apellidos', $alumno->apellidos) }}" required>
        @error('apellidos')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="telefono" class="form-label">Teléfono</label>
        <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono', $alumno->telefono) }}">
        @error('telefono')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="correo" class="form-label">Correo</label>
        <input type="email" class="form-control" id="correo" name="correo" value="{{ old('correo', $alumno->correo) }}" required>
        @error('correo')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento</label>
        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $alumno->fecha_nacimiento?->format('Y-m-d')) }}">
        @error('fecha_nacimiento')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="nota_media" class="form-label">Nota media</label>
        <input type="number" step="0.01" min="0" max="10" class="form-control" id="nota_media" name="nota_media" value="{{ old('nota_media', $alumno->nota_media) }}">
        @error('nota_media')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="experiencia" class="form-label">Experiencia</label>
        <textarea class="form-control" id="experiencia" name="experiencia">{{ old('experiencia', $alumno->experiencia) }}</textarea>
        @error('experiencia')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="formacion" class="form-label">Formación</label>
        <textarea class="form-control" id="formacion" name="formacion">{{ old('formacion', $alumno->formacion) }}</textarea>
        @error('formacion')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="habilidades" class="form-label">Habilidades (separadas por comas)</label>
        <input type="text" class="form-control" id="habilidades" name="habilidades" value="{{ old('habilidades', $alumno->habilidades) }}">
        @error('habilidades')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="fotografia" class="form-label">Fotografía</label>
        @if($alumno->fotografia)
            <div class="mb-2">
                <img src="{{ asset('storage/' . $alumno->fotografia) }}" alt="Foto actual" class="img-thumbnail" style="max-height:150px;">
            </div>
        @endif
        <input class="form-control" type="file" id="fotografia" name="fotografia" accept="image/*">
        @error('fotografia')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Actualizar Alumno</button>
</form>
@endsection

