<x-layout>
    <div class="container">
        <h1>Detalles del Juego</h1>

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

        <a href="{{ route('juegos.index') }}" class="btn btn-secondary">Volver</a>
        <a href="{{ route('juegos.edit', $juego) }}" class="btn btn-primary">Editar</a>
    </div>
</x-layout>