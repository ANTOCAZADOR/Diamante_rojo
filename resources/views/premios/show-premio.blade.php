<x-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">
            <h3 class="mb-4 text-white">Detalles del Premio</h3>

            <div class="mb-3">
                <strong class="text-white">ID:</strong> {{ $premio->id }}
            </div>

            <div class="mb-3">
                <strong class="text-white">Nombre:</strong> {{ $premio->name }}
            </div>

            <div class="mb-3">
                <strong class="text-white">Descripción:</strong> {{ $premio->descripcion }}
            </div>

            <div class="mb-3">
                <strong class="text-white">Fecha Reclamado:</strong> {{ $premio->fecha_reclamado ?? 'No reclamado' }}
            </div>

            <div class="mb-3">
                <strong class="text-white">Creado:</strong> {{ $premio->created_at->format('d-m-Y H:i') }}
            </div>

            <a href="{{ route('premios.index') }}" class="btn btn-primary">Volver</a>
            <a href="{{ route('premios.edit', $premio)}}" class="btn btn-warning">Editar</a>

        </div>
    </div>
</x-layout>
