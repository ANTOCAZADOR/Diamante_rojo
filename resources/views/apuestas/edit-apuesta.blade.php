<x-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">
            <h3 class="mb-4 text-white">Editar Apuesta</h3>
            <form action="{{ route('apuestas.update', $apuesta->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="montoApostado" class="form-label text-white">Monto Apostado</label>
                    <input type="number" step="0.01" name="montoApostado" id="montoApostado" class="form-control bg-dark text-white" value="{{ $apuesta->montoApostado }}" required>
                </div>
                <div class="mb-3">
                    <label for="resultado" class="form-label text-white">Resultado</label>
                    <select name="resultado" id="resultado" class="form-select bg-dark text-white" required>
                        <option value="gano" {{ $apuesta->resultado == 'gano' ? 'selected' : '' }}>Ganó</option>
                        <option value="perdio" {{ $apuesta->resultado == 'perdio' ? 'selected' : '' }}>Perdió</option>
                        <option value="empate" {{ $apuesta->resultado == 'empate' ? 'selected' : '' }}>Empate</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="ganancia" class="form-label text-white">Ganancia</label>
                    <input type="number" step="0.01" name="ganancia" id="ganancia" class="form-control bg-dark text-white" value="{{ $apuesta->ganancia }}">
                </div>
                <button type="submit" class="btn btn-danger">Actualizar Apuesta</button>
            </form>
        </div>
    </div>
</x-layout>