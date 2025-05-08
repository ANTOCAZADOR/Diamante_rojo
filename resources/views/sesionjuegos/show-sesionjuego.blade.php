<x-layout>
<div class="container">
    <h1>Detalles de sesión</h1>

    <div class="mb-3">
        <strong>ID:</strong> {{ $sesionJuego->id }}
    </div>
    <div class="mb-3">
        <strong>Inicio:</strong> {{ $sesionJuego->inicioSesion }}
    </div>
    <div class="mb-3">
        <strong>Fin:</strong> {{ $sesionJuego->finSesion }}
    </div>
    <div class="mb-3">
        <strong>Total apostado:</strong> ${{ $sesionJuego->totalApostado }}
    </div>
    <div class="mb-3">
        <strong>Total ganado:</strong> ${{ $sesionJuego->totalGanado }}
    </div>

    <a href="{{ route('sesionjuegos.index') }}" class="btn btn-secondary">Volver</a>
</div>
</x-layout>