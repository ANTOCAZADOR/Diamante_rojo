<x-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">
            <h3 class="mb-4">Crear Nueva Transacción</h3>
            <form action="{{ route('transacciones.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo</label>
                    <select name="tipo" id="tipo" class="form-select">
                        <option value="recarga">Recarga</option>
                        <option value="retiro">Retiro</option>
                        <option value="premio">Premio</option>
                        <option value="ajuste">Ajuste</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="monto" class="form-label">Monto</label>
                    <input type="number" step="0.01" name="monto" id="monto" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <input type="text" name="descripcion" id="descripcion" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="datetime-local" name="fecha" id="fecha" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('transacciones.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</x-layout>