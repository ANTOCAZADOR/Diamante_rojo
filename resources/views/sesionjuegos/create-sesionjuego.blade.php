<x-layout>
<div class="container">
    <h1>Crear nueva sesión</h1>

    <form action="{{ route('sesionjuegos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="inicioSesion" class="form-label">Inicio de sesión</label>
            <input type="datetime-local" name="inicioSesion" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="finSesion" class="form-label">Fin de sesión</label>
            <input type="datetime-local" name="finSesion" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="totalApostado" class="form-label">Total apostado</label>
            <input type="number" step="0.01" name="totalApostado" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="totalGanado" class="form-label">Total ganado</label>
            <input type="number" step="0.01" name="totalGanado" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar sesión</button>
    </form>
</div>
</x-layout>