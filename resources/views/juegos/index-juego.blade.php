<x-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">
            <div class="d-flex justify-content-between mb-4">
                <h3 class="mb-0 text-white">Listado de Juegos</h3>
                <a href="{{ route('juegos.create') }}" class="btn btn-primary">Crear Nuevo Juego</a>
            </div>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr class="text-white">
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
                                    <div class="d-flex">
                                        <a href="{{ route('juegos.show', $juego) }}" class="btn btn-sm btn-info me-2">Ver</a>
                                        <a href="{{ route('juegos.edit', $juego) }}" class="btn btn-sm btn-warning me-2">Editar</a>
                                        <form action="{{ route('juegos.destroy', $juego) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este juego?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>  
        </div>
    </div>
</x-layout>
