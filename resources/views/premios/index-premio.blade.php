<x-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">
            <div class="d-flex justify-content-between mb-4">
                <h3 class="mb-0 text-white">Lista de Premios</h3>
                <a href="{{ route('premios.create') }}" class="btn btn-primary">Crear Premio</a>
            </div>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr class="text-white">
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Saldo del Premio</th> <!-- Mostrar saldo del premio -->
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
                                <td>${{ number_format($premio->monto, 2) }}</td>
                                <td>{{ $premio->fechaObtenido ?? 'No reclamado' }}</td>
                                <td>
                                    <a href="{{ route('premios.show', $premio) }}" class="btn btn-sm btn-info">Ver</a>
                                    <a href="{{ route('premios.edit', $premio) }}" class="btn btn-sm btn-warning">Editar</a>
                                    <form action="{{ route('premios.destroy', $premio) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este premio?')">Eliminar</button>
                                    </form>

                                    <!-- Botón para reclamar el premio -->
                                    <form action="{{ route('saldo.reclamar', $premio->id) }}" method="POST" class="d-inline mt-1">
                                        @csrf
                                        @if(is_null($premio->fechaObtenido))
                                            <button type="submit" class="btn btn-sm btn-success">Reclamar</button>
                                        @else
                                            <button type="button" class="btn btn-sm btn-secondary" disabled>Reclamado</button>
                                        @endif
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
