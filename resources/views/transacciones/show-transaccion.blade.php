<x-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">
            <h3 class="mb-4">Detalle de la Transacción</h3>
            <ul class="list-group">
                <li class="list-group-item"><strong>ID:</strong> {{ $transaccion->id }}</li>
                <li class="list-group-item"><strong>Tipo:</strong> {{ ucfirst($transaccion->tipo) }}</li>
                <li class="list-group-item"><strong>Monto:</strong> ${{ number_format($transaccion->monto, 2) }}</li>
                <li class="list-group-item"><strong>Descripción:</strong> {{ $transaccion->descripcion }}</li>
                <li class="list-group-item"><strong>Fecha:</strong> {{ $transaccion->fecha->format('d/m/Y H:i') }}</li>
            </ul>
            <div class="mt-4">
                <a href="{{ route('transacciones.edit', $transaccion) }}" class="btn btn-warning">Editar</a>
                <a href="{{ route('transacciones.index') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </div>
</x-layout>