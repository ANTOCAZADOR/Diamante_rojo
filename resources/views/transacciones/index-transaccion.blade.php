<x-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">
            <div class="d-flex justify-content-between mb-4">
                <h3 class="mb-0 text-white">
                    {{ auth()->user()->rol === 'admin' ? 'Transacciones del Sistema' : 'Mis Transacciones' }}
                </h3>
                @if(auth()->user()->rol === 'admin')
                    <a href="{{ route('transacciones.create') }}" class="btn btn-primary">Crear Transacción</a>
                @endif
            </div>

            <div class="table-responsive">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr class="text-white">
                            <th>ID</th>
                            <th>Tipo</th>
                            <th>Monto</th>
                            <th>Descripción</th>
                            <th>Fecha</th>
                            @if(auth()->user()->rol === 'admin')
                                <th>Usuario</th>
                            @endif
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transacciones as $transaccion)
                            @if(auth()->user()->rol === 'admin' || $transaccion->user_id === auth()->id())
                            <tr>
                                <td>{{ $transaccion->id }}</td>
                                <td>{{ ucfirst($transaccion->tipo) }}</td>
                                <td>${{ number_format($transaccion->monto, 2) }}</td>
                                <td>{{ $transaccion->descripcion }}</td>
                                <td>{{ $transaccion->fecha->format('d/m/Y H:i') }}</td>
                                @if(auth()->user()->rol === 'admin')
                                    <td>{{ $transaccion->user->name }} {{ $transaccion->user->apellido }}</td>
                                @endif
                                <td>
                                    <a href="{{ route('transacciones.show', $transaccion) }}" class="btn btn-sm btn-info">Ver</a>
                                    @if(auth()->user()->rol === 'admin')
                                        <a href="{{ route('transacciones.edit', $transaccion) }}" class="btn btn-sm btn-warning">Editar</a>
                                        <form action="{{ route('transacciones.destroy', $transaccion) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar esta transacción?')">Eliminar</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
