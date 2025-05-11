<x-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">
            <h3 class="mb-4">Editar Sesión</h3>
            <form action="{{ route('sesionjuegos.update', $sesionJuego) }}" method="POST">
                @csrf @method('PUT')

                <div class="mb-3">
                    <label for="inicioSesion" class="form-label">Inicio de sesión</label>
                    <input type="datetime-local" name="inicioSesion" class="form-control" value="{{ \Carbon\Carbon::parse($sesionJuego->inicioSesion)->format('Y-m-d\TH:i') }}" required>
                </div>

                <div class="mb-3">
                    <label for="finSesion" class="form-label">Fin de sesión</label>
                    <input type="datetime-local" name="finSesion" class="form-control" value="{{ \Carbon\Carbon::parse($sesionJuego->finSesion)->format('Y-m-d\TH:i') }}" required>
                </div>

                <div class="mb-3">
                    <label for="totalApostado" class="form-label">Total apostado</label>
                    <input type="number" step="0.01" name="totalApostado" class="form-control" value="{{ $sesionJuego->totalApostado }}" required>
                </div>

                <div class="mb-3">
                    <label for="totalGanado" class="form-label">Total ganado</label>
                    <input type="number" step="0.01" name="totalGanado" class="form-control" value="{{ $sesionJuego->totalGanado }}" required>
                </div>

                <button type="submit" class="btn btn-warning">Actualizar sesión</button>
                <a href="{{ route('sesionjuegos.index') }}" class="btn btn-danger">Cancelar</a>
            </form>
        </div>
    </div>
</x-layout>