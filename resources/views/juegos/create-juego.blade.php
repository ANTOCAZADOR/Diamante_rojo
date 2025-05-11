<x-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">
            <h3 class="mb-4">Crear Nuevo Juego</h3>
            <form action="{{ route('juegos.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea name="descripcion" id="descripcion" class="form-control" required>{{ old('descripcion') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo</label>
                    <select name="tipo" id="tipo" class="form-select" required>
                        <option value="">Selecciona un tipo</option>
                        <option value="ruleta simplificada" {{ old('tipo') == 'ruleta simplificada' ? 'selected' : '' }}>Ruleta simplificada</option>
                        <option value="dado virtual" {{ old('tipo') == 'dado virtual' ? 'selected' : '' }}>Dado virtual</option>
                        <option value="cara o cruz" {{ old('tipo') == 'cara o cruz' ? 'selected' : '' }}>Cara o cruz</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="activo" class="form-label">¿Está activo?</label>
                    <select name="activo" id="activo" class="form-select" required>
                        <option value="1" {{ old('activo') == '1' ? 'selected' : '' }}>Sí</option>
                        <option value="0" {{ old('activo') == '0' ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="{{ route('juegos.index') }}" class="btn btn-warning">Cancelar</a>
            </form>
        </div>
    </div>
</x-layout>
