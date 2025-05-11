<x-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">
            <h3 class="mb-4 text-white">Editar Juego</h3>

            <form action="{{ route('juegos.update', $juego) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label text-white">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $juego->name) }}" required>
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label text-white">Descripción</label>
                    <textarea name="descripcion" id="descripcion" class="form-control" required>{{ old('descripcion', $juego->descripcion) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="tipo" class="form-label text-white">Tipo</label>
                    <select name="tipo" id="tipo" class="form-control bg-dark text-white" required>
                        <option value="ruleta simplificada" {{ $juego->tipo == 'ruleta simplificada' ? 'selected' : '' }}>Ruleta simplificada</option>
                        <option value="dado virtual" {{ $juego->tipo == 'dado virtual' ? 'selected' : '' }}>Dado virtual</option>
                        <option value="cara o cruz" {{ $juego->tipo == 'cara o cruz' ? 'selected' : '' }}>Cara o cruz</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="activo" class="form-label text-white">¿Está activo?</label>
                    <select name="activo" id="activo" class="form-control bg-dark text-white" required>
                        <option value="1" {{ $juego->activo ? 'selected' : '' }}>Sí</option>
                        <option value="0" {{ !$juego->activo ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-warning">Actualizar Juego</button>
                <a href="{{ route('juegos.index') }}" class="btn btn-danger">Cancelar</a>
            </form>
        </div>
    </div>
</x-layout>
