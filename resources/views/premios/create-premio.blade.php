<x-layout>
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded p-4">
        <h3 class="text-white mb-4">Crear Premio</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('premios.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label text-white">Nombre</label>
                <input type="text" name="name" class="form-control bg-dark text-white" required>
            </div>

            <div class="mb-3">
                <label class="form-label text-white">Descripción</label>
                <textarea name="descripcion" class="form-control bg-dark text-white" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label text-white">Fecha Reclamado (opcional)</label>
                <input type="datetime-local" name="fecha_reclamado" class="form-control bg-dark text-white">
            </div>

            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('premios.index') }}" class="btn btn-light">Cancelar</a>
        </form>
    </div>
</div>
</x-layout>