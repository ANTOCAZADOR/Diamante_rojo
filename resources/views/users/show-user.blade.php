<x-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">
            <h3 class="mb-4 text-white">Detalles del Usuario</h3>

            <div class="mb-3">
                <strong class="text-white">Nombre:</strong> {{ $user->name }}
            </div>

            <div class="mb-3">
                <strong class="text-white">Apellido:</strong> {{ $user->apellido }}
            </div>

            <div class="mb-3">
                <strong class="text-white">Email:</strong> {{ $user->email }}
            </div>

            <div class="mb-3">
                <strong class="text-white">Saldo:</strong> ${{ number_format($user->saldo, 2) }}
            </div>

            <div class="mb-3">
                <strong class="text-white">Rol:</strong> {{ ucfirst($user->rol) }}
            </div>

            <div class="mb-3">
                <strong class="text-white">Estado:</strong> {{ $user->estado }}
            </div>

            <div class="mb-3">
                <strong class="text-white">Fecha de Registro:</strong> {{ $user->fechaRegistro }}
            </div>

            <a href="{{ route('user.index') }}" class="btn btn-primary">Volver</a>
            <a href="{{ route('user.edit', $user) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('vista.retirar') }}" class="btn btn-danger">Retirar saldo</a>
        </div>
    </div>
</x-layout>
