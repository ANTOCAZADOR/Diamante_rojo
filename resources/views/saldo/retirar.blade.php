<x-layout>
    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded p-4 text-white">
            <h3 class="mb-4">Retirar saldo</h3>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @elseif(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="{{ route('saldo.retirar') }}" method="POST" class="col-md-6">
                @csrf
                <div class="mb-3">
                    <label for="monto" class="form-label">Monto a retirar</label>
                    <input type="number" name="monto" id="monto" class="form-control" min="1" required>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">Retirar</button>
                    <a href="{{ route('user.index') }}" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</x-layout>
