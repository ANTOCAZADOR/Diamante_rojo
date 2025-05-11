<x-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4">
            <!-- Bienvenida e Introducción -->
            <div class="text-white mb-4">
                <h2 class="text-center mb-3">🎰 Bienvenido a Diamante Rojo 🎲</h2>
                <p>
                    ¡Estás entrando al universo de <strong>Diamante Rojo</strong>, el casino en línea más confiable y emocionante para los amantes del juego!
                    Con años de experiencia brindando entretenimiento digital, nos enorgullece ofrecerte un espacio seguro, justo y lleno de emoción.
                </p>
                <p>
                    En nuestro sitio podrás encontrar:
                    <ul>
                        <li>🃏 Juegos clásicos y modernos que garantizan diversión.</li>
                        <li>💰 Premios justos y grandes oportunidades de ganar.</li>
                        <li>🔒 Seguridad en todas tus transacciones y datos personales.</li>
                        <li>🎁 Promociones frecuentes y recompensas para nuestros jugadores leales.</li>
                    </ul>
                </p>
                <p>
                    Nuestro compromiso es con tu diversión y seguridad. Si tienes dudas, sugerencias o necesitas ayuda, escríbenos a: 
                    <a href="mailto:soporte@diamanterojo.com" class="text-info">soporte@diamanterojo.com</a>
                </p>
                <p class="mt-3">
                    Gracias por formar parte de esta gran familia. ¡Tu próxima gran victoria podría estar a un clic!
                </p>
                <hr class="border-light">
            </div>

            <!-- Si el usuario NO ha iniciado sesión -->
            @guest
                <div class="text-center mb-4">
                    <a href="{{ route('login') }}" class="btn btn-primary me-2">Iniciar Sesión</a>
                    <a href="{{ route('register') }}" class="btn btn-success">Registrarse</a>
                </div>
            @else
                <!-- Encabezado para usuarios logueados -->
                <div class="d-flex justify-content-between mb-4">
                    <h3 class="mb-0 text-white">Lista de Usuarios</h3>

                    @if (auth()->user()->rol === 'admin')
                        <a href="{{ route('user.create') }}" class="btn btn-primary">Crear Usuario</a>
                    @endif
                </div>

                <!-- Mensaje de éxito -->
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <!-- Tabla de usuarios -->
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

                                        @if (auth()->user()->rol === 'admin')
                                            <a href="{{ route('user.edit', $user) }}" class="btn btn-warning btn-sm me-2">Editar</a>
                                            <form action="{{ route('user.destroy', $user) }}" method="POST" onsubmit="return confirm('¿Seguro que quieres eliminar este usuario?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm">Eliminar</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endguest
        </div>
    </div>
</x-layout>
