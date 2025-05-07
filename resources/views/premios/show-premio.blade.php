<x-layout>
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded p-4 text-white">
        <h3 class="mb-4">Detalles del Premio</h3>

        <p><strong>ID:</strong> {{ $premio->id }}</p>
        <p><strong>Nombre:</strong> {{ $premio->name }}</p>
        <p><strong>Descripción:</strong> {{ $premio->descripcion }}</p>
        <p><strong>Fecha Reclamado:</strong> {{ $premio->fecha_reclamado ?? 'No reclamado' }}</p>
        <p><strong>Creado:</strong> {{ $premio->created_at->format('d-m-Y H:i') }}</p>

        <a href="{{ route('premios.index') }}" class="btn btn-light">Volver</a>
    </div>
</div>
</x-layout>