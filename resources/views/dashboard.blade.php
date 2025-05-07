<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div>

    <div class="flex justify-center mt-6">
        <a href="{{ url('/user') }}" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
            Volver al inicio
        </a>
    </div>

</x-app-layout>
