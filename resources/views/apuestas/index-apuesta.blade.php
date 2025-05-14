<x-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">

            <div class="d-flex justify-content-between mb-4">
                <h3 class="text-white">Historial de Apuestas</h3>
                @if (auth()->user()->rol === 'admin')
                <a href="{{ route('apuestas.create') }}" class="btn btn-danger">Crear Apuesta</a>
                @endif
            </div>

            <!-- ADMINISTRADOR: muestra todas las apuestas -->
            @if (auth()->user()->rol === 'admin')
                <div class="table-responsive">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr class="text-white">
                                <th>ID</th>
                                <th>Usuario</th>
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
                                    <td>{{ $apuesta->user->name }} {{ $apuesta->user->apellido }}</td>
                                    <td>${{ number_format($apuesta->montoApostado, 2) }}</td>
                                    <td>{{ ucfirst($apuesta->resultado) }}</td>
                                    <td>${{ number_format($apuesta->ganancia, 2) }}</td>
                                    <td>{{ $apuesta->created_at->format('d/m/Y H:i') }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('apuestas.show', $apuesta) }}" class="btn btn-sm btn-info me-2">Ver</a>
                                        <a href="{{ route('apuestas.edit', $apuesta) }}" class="btn btn-sm btn-warning me-2">Editar</a>
                                        <form action="{{ route('apuestas.destroy', $apuesta) }}" method="POST" onsubmit="return confirm('¿Eliminar apuesta?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-white">No hay apuestas registradas.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            @else
            <!-- USUARIO NORMAL: solo ve sus apuestas -->
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
                            @php
                                $misApuestas = $apuestas->where('user_id', auth()->id());
                            @endphp

                            @forelse($misApuestas as $apuesta)
                                <tr>
                                    <td>{{ $apuesta->id }}</td>
                                    <td>${{ number_format($apuesta->montoApostado, 2) }}</td>
                                    <td>{{ ucfirst($apuesta->resultado) }}</td>
                                    <td>${{ number_format($apuesta->ganancia, 2) }}</td>
                                    <td>{{ $apuesta->created_at->format('d/m/Y H:i') }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('apuestas.show', $apuesta) }}" class="btn btn-sm btn-info me-2">Ver</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-white">No has hecho ninguna apuesta.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</x-layout>
