<x-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">
            <h3 class="mb-4 text-white">Crear Usuario</h3>

            <form action="{{ route('user.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label text-white">Nombre</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label text-white">Apellido</label>
                    <input type="text" name="apellido" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label text-white">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label text-white">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <!--<div class="mb-3">
                    <label class="form-label text-white">Saldo</label>
                    <input type="number" step="0.01" name="saldo" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label text-white">Rol</label>
                    <input type="text" name="rol" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label text-white">Estado</label>
                    <select name="estado" class="form-select" required>
                        <option value="activo">Activo</option>
                        <option value="inactivo">Inactivo</option>
                    </select>
                </div>-->

                <button type="submit" class="btn btn-success">Crear Usuario</button>
                <a href="{{ route('user.index') }}" class="btn btn-warning">Cancelar</a>
            </form>
        </div>
    </div>
</x-layout>