<x-layout>
    <div class="container text-center mt-5">
        <h2 class="mb-4">¡Apóyanos con $10 USD!</h2>

        <a href="{{ route('paypal.payment') }}" class="btn btn-primary btn-lg">
            <i class="fab fa-paypal"></i> Pagar con PayPal
        </a>
    </div>
</x-layout>