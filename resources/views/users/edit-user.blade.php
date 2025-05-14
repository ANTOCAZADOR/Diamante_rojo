<x-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">
            <h3 class="mb-4 text-white">Editar Usuario</h3>

            <form action="{{ route('user.update', $user) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label text-white">Nombre</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label text-white">Apellido</label>
                    <input type="text" name="apellido" class="form-control" value="{{ $user->apellido }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label text-white">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                </div>

                @if (auth()->user()->rol === 'admin')
                    <div class="mb-3">
                        <label class="form-label text-white">Saldo</label>
                        <input type="number" step="0.01" name="saldo" class="form-control" value="{{ $user->saldo }}" required>
                    </div>
                @endif

                @if (auth()->user()->rol === 'admin')
                    <div class="mb-3">
                        <label class="form-label text-white">Rol</label>
                        <select name="rol" class="form-select" required>
                            <option value="jugador" {{ $user->rol == 'jugador' ? 'selected' : '' }}>Jugador</option>
                            <option value="admin" {{ $user->rol == 'admin' ? 'selected' : '' }}>Administrador</option>
                        </select>
                    </div>
                @endif

                <div class="mb-3">
                    <label class="form-label text-white">Password</label>
                    <input type="password" name="password" class="form-control" value="{{ $user->password }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label text-white">Estado</label>
                    <select name="estado" class="form-select" required>
                        <option value="activo" {{ $user->estado == 'activo' ? 'selected' : '' }}>Activo</option>
                        <option value="inactivo" {{ $user->estado == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-warning">Actualizar Usuario</button>
                <a href="{{ route('user.index') }}" class="btn btn-danger">Cancelar</a>
            </form>
        </div>
    </div>
</x-layout>
