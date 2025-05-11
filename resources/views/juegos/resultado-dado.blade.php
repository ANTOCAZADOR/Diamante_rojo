<x-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">
            <h3 class="mb-4 text-white">Resultado del Dado</h3>

            <div class="mb-3 text-white">
                <p><strong>Elegiste:</strong> {{ $numeroElegido }}</p>
                <p><strong>Cayó:</strong> {{ $numeroLanzado }}</p>
                <p><strong>Resultado:</strong>
                    <span class="{{ $resultado == 'gano' ? 'text-success' : 'text-danger' }}">
                        {{ ucfirst($resultado) }}
                    </span>
                </p>
                <p><strong>Ganancia:</strong> ${{ number_format($ganancia, 2) }}</p>
            </div>

            <a href="{{ route('dado.index') }}" class="btn btn-success">Volver a jugar</a>
            <a href="/user" class="btn btn-danger">Salir</a>
        </div>
    </div>
</x-layout>
