<x-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">
            <div class="d-flex justify-content-between mb-4">
                <h3 class="mb-0">Transacciones</h3>
                <a href="{{ route('transacciones.create') }}" class="btn btn-primary">Nueva Transacción</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-white">
                            <th>ID</th>
                            <th>Tipo</th>
                            <th>Monto</th>
                            <th>Descripción</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transacciones as $transaccion)
                        <tr>
                            <td>{{ $transaccion->id }}</td>
                            <td>{{ ucfirst($transaccion->tipo) }}</td>
                            <td>${{ number_format($transaccion->monto, 2) }}</td>
                            <td>{{ $transaccion->descripcion }}</td>
                            <td>{{ $transaccion->fecha->format('d/m/Y H:i') }}</td>
                            <td>
                                <a href="{{ route('transacciones.show', $transaccion) }}" class="btn btn-sm btn-info">Ver</a>
                                <a href="{{ route('transacciones.edit', $transaccion) }}" class="btn btn-sm btn-warning">Editar</a>
                                <form action="{{ route('transacciones.destroy', $transaccion) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta transacción?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>