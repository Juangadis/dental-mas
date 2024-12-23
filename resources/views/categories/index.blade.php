<!-- filepath: resources/views/index.blade.php -->
@extends('layouts.app')

@section('content')
    @include('layouts.navigation')

    <!-- Bienvenido Section -->
    <section id="bienvenido" class="py-12 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold text-center text-gray-800 dark:text-gray-200">Bienvenido</h1>
            <p class="mt-4 text-center text-gray-600 dark:text-gray-400">Bienvenido a nuestro sistema de suscripciones.</p>
        </div>
    </section>

@endsection