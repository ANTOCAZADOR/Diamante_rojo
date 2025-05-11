<x-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">
            <h3 class="mb-4 text-white">Detalle del Juego</h3>

            <div class="mb-3">
                <strong>Nombre:</strong> {{ $juego->name }}
            </div>
            <div class="mb-3">
                <strong>Descripción:</strong> {{ $juego->descripcion }}
            </div>
            <div class="mb-3">
                <strong>Tipo:</strong> {{ $juego->tipo }}
            </div>
            <div class="mb-3">
                <strong>Activo:</strong> {{ $juego->activo ? 'Sí' : 'No' }}
            </div>
            <div class="mb-3">
                <strong>Creado en:</strong> {{ $juego->created_at->format('d/m/Y H:i') }}
            </div>

            <a href="{{ route('juegos.index') }}" class="btn btn-primary">Volver</a>
            <a href="{{ route('juegos.edit', $juego) }}" class="btn btn-warning">Editar</a>
        </div>
    </div>
</x-layout>