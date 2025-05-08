<x-layout>
<div class="container">
    <h1>Sesiones de Juegos</h1>
    <a href="{{ route('sesionjuegos.create') }}" class="btn btn-primary mb-3">Crear nueva sesión</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
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
                        <a href="{{ route('sesionjuegos.show', $sesion) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('sesionjuegos.edit', $sesion) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('sesionjuegos.destroy', $sesion) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar esta sesión?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-layout>