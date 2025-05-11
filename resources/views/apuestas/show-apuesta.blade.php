<x-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">
            <h3 class="mb-4 text-white">Detalle de la Apuesta</h3>

            <div class="mb-3">
                <strong class="text-white">ID:</strong> {{ $apuesta->id }}
            </div>

            <div class="mb-3">
                <strong class="text-white">Monto Apostado:</strong> ${{ number_format($apuesta->montoApostado, 2) }}
            </div>

            <div class="mb-3">
                <strong class="text-white">Resultado:</strong> {{ ucfirst($apuesta->resultado) }}
            </div>

            <div class="mb-3">
                <strong class="text-white">Ganancia:</strong> ${{ number_format($apuesta->ganancia, 2) }}
            </div>

            <div class="mb-3">
                <strong class="text-white">Fecha:</strong> {{ $apuesta->created_at->format('d/m/Y H:i') }}
            </div>

            <a href="{{ route('apuestas.index') }}" class="btn btn-primary">Volver</a>
            <a href="{{ route('apuestas.edit', $apuesta) }}" class="btn btn-warning">Editar</a>
        </div>
    </div>
</x-layout>
