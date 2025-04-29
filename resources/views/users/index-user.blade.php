<x-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">
            <div class="d-flex justify-content-between mb-4">
                <h3 class="mb-0 text-white">Lista de Usuarios</h3>
                <a href="{{ route('user.create') }}" class="btn btn-primary">Agregar Usuario</a>
            </div>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Email</th>
                            <th>Saldo</th>
                            <th>Rol</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->apellido }}</td>
                                <td>{{ $user->email }}</td>
                                <td>${{ number_format($user->saldo, 2) }}</td>
                                <td>{{ ucfirst($user->rol) }}</td>
                                <td>{{ $user->estado }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('user.show', $user) }}" class="btn btn-info btn-sm me-2">Ver</a>
                                    <a href="{{ route('user.edit', $user) }}" class="btn btn-warning btn-sm me-2">Editar</a>
                                    <form action="{{ route('user.destroy', $user) }}" method="POST" onsubmit="return confirm('¿Seguro que quieres eliminar este usuario?');">
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
        </div>
    </div>
</x-layout>
