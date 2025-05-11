<x-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">
            <h3 class="mb-4">Editar Transacción</h3>
            <form action="{{ route('transacciones.update', $transaccion) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo</label>
                    <select name="tipo" id="tipo" class="form-select">
                        <option value="recarga" {{ $transaccion->tipo == 'recarga' ? 'selected' : '' }}>Recarga</option>
                        <option value="retiro" {{ $transaccion->tipo == 'retiro' ? 'selected' : '' }}>Retiro</option>
                        <option value="premio" {{ $transaccion->tipo == 'premio' ? 'selected' : '' }}>Premio</option>
                        <option value="ajuste" {{ $transaccion->tipo == 'ajuste' ? 'selected' : '' }}>Ajuste</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="monto" class="form-label">Monto</label>
                    <input type="number" step="0.01" name="monto" id="monto" class="form-control" value="{{ $transaccion->monto }}" required>
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{ $transaccion->descripcion }}" required>
                </div>
                <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="datetime-local" name="fecha" id="fecha" class="form-control" value="{{ $transaccion->fecha->format('Y-m-d\TH:i') }}" required>
                </div>
                <button type="submit" class="btn btn-warning">Actualizar Transacción</button>
                <a href="{{ route('transacciones.index') }}" class="btn btn-danger">Cancelar</a>
            </form>
        </div>
    </div>
</x-layout>