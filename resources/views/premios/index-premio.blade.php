<x-layout>
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary text-center rounded p-4">
        <div class="d-flex justify-content-between mb-3">
            <h3 class="text-white">Lista de Premios</h3>
            <a href="{{ route('premios.create') }}" class="btn btn-success">Crear Premio</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-dark table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Fecha Reclamado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($premios as $premio)
                        <tr>
                            <td>{{ $premio->id }}</td>
                            <td>{{ $premio->name }}</td>
                            <td>{{ $premio->descripcion }}</td>
                            <td>{{ $premio->fecha_reclamado ?? 'No reclamado' }}</td>
                            <td>
                                <a href="{{ route('premios.show', $premio) }}" class="btn btn-info btn-sm">Ver</a>
                                <a href="{{ route('premios.edit', $premio) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('premios.destroy', $premio) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este premio?')">Eliminar</button>
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