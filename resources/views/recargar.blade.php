<x-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-dark rounded p-5 text-white shadow-lg text-center">
            <h2 class="mb-3 fw-bold">¡Recarga tu saldo y sigue ganando!</h2>
            <p class="mb-4 fs-5 text-success">Entre más saldo tengas, más oportunidades tienes de participar y llevarte grandes premios.</p>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="d-flex flex-wrap justify-content-center gap-4">
                @foreach([100, 200, 500, 1000, 10000] as $cantidad)
                    <form action="{{ route('saldo.recargar') }}" method="POST">
                        @csrf
                        <input type="hidden" name="monto" value="{{ $cantidad }}">
                        <button type="submit" class="btn btn-success btn-lg px-4 py-3 rounded-4">
                            💳 Recargar ${{ number_format($cantidad, 0) }}
                        </button>
                    </form>
                @endforeach
            </div>

            <div class="mt-5">
                <p class="fs-6 fst-italic text-light">Tu saldo se acredita al instante y sin comisiones. ¡No te quedes sin jugar!</p>
                <p class="fs-6 text-muted">¿Tienes dudas? Contáctanos y te ayudamos a recargar.</p>
            </div>
        </div>
    </div>
</x-layout>
