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

    <!-- Categorías Section -->
    <section id="categorias" class="py-12 bg-white dark:bg-gray-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-gray-200">Categorías</h2>
            <ul class="mt-4">
                @foreach ($categories as $category)
                    <li class="text-center text-gray-600 dark:text-gray-400">{{ $category->name }}</li>
                @endforeach
            </ul>
        </div>
    </section>

    <!-- Tratamientos Section -->
    <section id="tratamientos" class="py-12 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-gray-200">Tratamientos</h2>
            <ul class="mt-4">
                @foreach ($treatments as $treatment)
                    <li class="text-center text-gray-600 dark:text-gray-400">{{ $treatment->title }} ({{ $treatment->category->name }})</li>
                @endforeach
            </ul>
        </div>
    </section>

    <!-- Planes Section -->
    <section id="planes" class="py-12 bg-white dark:bg-gray-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-gray-200">Planes</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-4">
                <div class="p-6 bg-gray-100 dark:bg-gray-900 rounded-lg shadow-md">
                    <h3 class="text-xl font-bold text-center text-gray-800 dark:text-gray-200">Básico</h3>
                    <p class="mt-4 text-center text-gray-600 dark:text-gray-400">Descripción del plan básico.</p>
                </div>
                <div class="p-6 bg-gray-100 dark:bg-gray-900 rounded-lg shadow-md">
                    <h3 class="text-xl font-bold text-center text-gray-800 dark:text-gray-200">Premium</h3>
                    <p class="mt-4 text-center text-gray-600 dark:text-gray-400">Descripción del plan premium.</p>
                </div>
                <div class="p-6 bg-gray-100 dark:bg-gray-900 rounded-lg shadow-md">
                    <h3 class="text-xl font-bold text-center text-gray-800 dark:text-gray-200">VIP</h3>
                    <p class="mt-4 text-center text-gray-600 dark:text-gray-400">Descripción del plan VIP.</p>
                </div>
            </div>
        </div>
    </section>
@endsection