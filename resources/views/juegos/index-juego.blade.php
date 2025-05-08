<x-layout>
    <div class="container">
        <h1 class="mb-4">Listado de Juegos</h1>
        <a href="{{ route('juegos.create') }}" class="btn btn-primary mb-3">Crear Nuevo Juego</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Tipo</th>
                    <th>Activo</th>
                    <th>Creado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($juegos as $juego)
                    <tr>
                        <td>{{ $juego->id }}</td>
                        <td>{{ $juego->name }}</td>
                        <td>{{ $juego->descripcion }}</td>
                        <td>{{ $juego->tipo }}</td>
                        <td>{{ $juego->activo ? 'Sí' : 'No' }}</td>
                        <td>{{ $juego->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <a href="{{ route('juegos.show', $juego) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('juegos.edit', $juego) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('juegos.destroy', $juego) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('¿Estás seguro de eliminar este juego?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>