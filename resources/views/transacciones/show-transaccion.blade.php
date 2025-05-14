<x-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">
            <h3 class="mb-4 text-white">Detalle de la Transacción</h3>

            <div class="mb-3">
                <strong class="text-white">ID:</strong> {{ $transaccion->id }}
            </div>

            <div class="mb-3">
                <strong class="text-white">Tipo:</strong> {{ ucfirst($transaccion->tipo) }}
            </div>

            <div class="mb-3">
                <strong class="text-white">Monto:</strong> ${{ number_format($transaccion->monto, 2) }}
            </div>

            <div class="mb-3">
                <strong class="text-white">Descripción:</strong> {{ $transaccion->descripcion }}
            </div>

            <div class="mb-3">
                <strong class="text-white">Fecha:</strong> {{ $transaccion->fecha->format('d/m/Y H:i') }}
            </div>

            <a href="{{ route('transacciones.index') }}" class="btn btn-primary">Volver</a>
            @if (auth()->user()->rol === 'admin')
            <a href="{{ route('transacciones.edit', $transaccion) }}" class="btn btn-warning">Editar</a>
            @endif
        </div>
    </div>
</x-layout>
