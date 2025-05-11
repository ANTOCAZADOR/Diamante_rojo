<x-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">
            <div class="d-flex justify-content-between mb-4">
                <h3 class="text-white">Historial de Apuestas</h3>
                <a href="{{ route('apuestas.create') }}" class="btn btn-danger">Crear Apuesta</a>
            </div>

            <div class="table-responsive">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr class="text-white">
                            <th>ID</th>
                            <th>Monto</th>
                            <th>Resultado</th>
                            <th>Ganancia</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($apuestas as $apuesta)
                            <tr>
                                <td>{{ $apuesta->id }}</td>
                                <td>${{ number_format($apuesta->montoApostado, 2) }}</td>
                                <td>{{ ucfirst($apuesta->resultado) }}</td>
                                <td>${{ number_format($apuesta->ganancia, 2) }}</td>
                                <td>{{ $apuesta->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <a href="{{ route('apuestas.show', $apuesta) }}" class="btn btn-sm btn-info">Ver</a>
                                    <a href="{{ route('apuestas.edit', $apuesta) }}" class="btn btn-sm btn-warning">Editar</a>
                                    <form action="{{ route('apuestas.destroy', $apuesta) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar apuesta?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-white">No hay apuestas registradas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
