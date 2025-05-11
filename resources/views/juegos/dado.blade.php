<x-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-dark text-white rounded p-4 shadow-lg">
            <h2 class="mb-4 text-center">🎲 ¡Juego del Dado!</h2>

            @if(session('error'))
                <div class="alert alert-danger text-center">{{ session('error') }}</div>
            @endif

            @if(session('resultado'))
                <div class="alert alert-info text-center fw-bold">
                    Número elegido: {{ session('numero') }} <br>
                    Número lanzado: {{ session('lanzado') }} <br>
                    Resultado: {!! session('resultado') == 'ganaste' ? '<span class="text-success">🎉 ¡Ganaste!</span>' : '<span class="text-danger">😢 Perdiste</span>' !!}
                </div>
            @endif

            <form action="{{ route('dado.jugar') }}" method="POST" id="form-dado">
                @csrf

                <div class="text-center mb-4">
                    <p>Elige un número:</p>
                    <div class="d-flex justify-content-center gap-2 flex-wrap">
                        @for ($i = 1; $i <= 6; $i++)
                            <input type="radio" class="btn-check" name="numero" id="numero{{ $i }}" value="{{ $i }}" required>
                            <label class="btn btn-outline-light rounded-pill px-4 py-2" for="numero{{ $i }}">
                                🎲 {{ $i }}
                            </label>
                        @endfor
                    </div>
                </div>

                <div class="mb-3 text-center">
                    <label for="monto" class="form-label">Monto a apostar</label>
                    <input type="number" name="monto" class="form-control w-50 mx-auto border-danger bg-dark text-white" min="1" required>
                </div>


                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success btn-lg">
                        Lanzar Dado 🎲
                    </button>
                </div>
            </form>

            <!-- Animación del dado (solo visual, sin lógica del backend) -->
            <div id="dadoAnimado" class="text-center mt-4" style="display: none;">
                <img src="https://media.giphy.com/media/l0HlNQ03J5JxX6lva/giphy.gif" alt="Dado girando" width="100">
                <p class="mt-2">Lanzando el dado...</p>
            </div>
        </div>
    </div>

    <script>
        const form = document.getElementById('form-dado');
        const dadoAnimado = document.getElementById('dadoAnimado');

        form.addEventListener('submit', function () {
            dadoAnimado.style.display = 'block';
        });
    </script>
</x-layout>
