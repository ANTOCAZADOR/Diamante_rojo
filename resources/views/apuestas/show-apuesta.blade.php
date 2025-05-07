<x-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">
            <h3 class="mb-4 text-white">Detalles de la Apuesta</h3>
            <ul class="list-group list-group-flush">
                <li class="list-group-item bg-dark text-white"><strong>ID:</strong> {{ $apuesta->id }}</li>
                <li class="list-group-item bg-dark text-white"><strong>Monto Apostado:</strong> ${{ number_format($apuesta->montoApostado, 2) }}</li>
                <li class="list-group-item bg-dark text-white"><strong>Resultado:</strong> {{ ucfirst($apuesta->resultado) }}</li>
                <li class="list-group-item bg-dark text-white"><strong>Ganancia:</strong> ${{ number_format($apuesta->ganancia, 2) }}</li>
            </ul>
            <a href="{{ route('apuestas.index') }}" class="btn btn-danger mt-3">Volver al Listado</a>
        </div>
    </div>
</x-layout>