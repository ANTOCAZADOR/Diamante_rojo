<x-layout>
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded p-4">
        <div class="d-flex justify-content-between mb-4">
            <h3 class="mb-0 text-white">Sesiones de Juego</h3>
            <a href="{{ route('sesionjuegos.create') }}" class="btn btn-primary">Crear Nueva Sesión</a>
        </div>


        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-dark table-striped">
                <thead>
                    <tr class="text white">
                        <th>ID</th>
                        <th>Inicio</th>
                        <th>Fin</th>
                        <th>Total Apostado</th>
                        <th>Total Ganado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sesiones as $sesion)
                        <tr>
                            <td>{{ $sesion->id }}</td>
                            <td>{{ $sesion->inicioSesion }}</td>
                            <td>{{ $sesion->finSesion }}</td>
                            <td>${{ $sesion->totalApostado }}</td>
                            <td>${{ $sesion->totalGanado }}</td>
                            <td>
                                <a href="{{ route('sesionjuegos.show', $sesion) }}" class="btn btn-sm btn-info">Ver</a>
                                <a href="{{ route('sesionjuegos.edit', $sesion) }}" class="btn btn-sm btn-warning">Editar</a>
                                <form action="{{ route('sesionjuegos.destroy', $sesion) }}" method="POST" class="d-inline">
                                    @csrf 
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar esta sesión?')">Eliminar</button>
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