<x-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">
            <h3 class="mb-4 text-white">Registrar Nueva Apuesta</h3>
            <form action="{{ route('apuestas.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="montoApostado" class="form-label text-white">Monto Apostado</label>
                    <input type="number" step="0.01" name="montoApostado" id="montoApostado" class="form-control bg-dark text-white" required>
                </div>
                <div class="mb-3">
                    <label for="resultado" class="form-label text-white">Resultado</label>
                    <select name="resultado" id="resultado" class="form-select bg-dark text-white" required>
                        <option value="">Selecciona...</option>
                        <option value="gano">Ganó</option>
                        <option value="perdio">Perdió</option>
                        <option value="empate">Empate</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="ganancia" class="form-label text-white">Ganancia</label>
                    <input type="number" step="0.01" name="ganancia" id="ganancia" class="form-control bg-dark text-white">
                </div>
                <button type="submit" class="btn btn-danger">Guardar Apuesta</button>
            </form>
        </div>
    </div>
</x-layout>