<x-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">
            <h1>Detalles de sesión</h1>

            <div class="mb-3">
                <strong class="text-white">ID:</strong> {{ $sesionJuego->id }}
            </div>

            <div class="mb-3">
                <strong class="text-white">Inicio:</strong> {{ $sesionJuego->inicioSesion }}
            </div>

            <div class="mb-3">
                <strong class="text-white">Fin:</strong> {{ $sesionJuego->finSesion }}
            </div>

            <div class="mb-3">
                <strong class="text-white">Total apostado:</strong> ${{ $sesionJuego->totalApostado }}
            </div>

            <div class="mb-3">
                <strong class="text-white">Total ganado:</strong> ${{ $sesionJuego->totalGanado }}
            </div>

            <a href="{{ route('sesionjuegos.index') }}" class="btn btn-primary">Volver</a>
            <a href="{{ route('sesionjuegos.edit', $sesionJuego) }}" class="btn btn-warning">Editar</a>
        </div>
    </div>
</x-layout>