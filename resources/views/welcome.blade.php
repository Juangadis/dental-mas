<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full w-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dental Mas</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-white text-black h-full w-full">
    <div class="h-full w-full flex flex-col">
        <!-- Navbar -->
        <header class="bg-white shadow-md">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center py-4">
                    <div class="flex items-center">
                        <img src="https://dentalmas.com.ar/wp-content/uploads/2022/01/logo-dental-mas.svg" alt="Dental Mas Logo" class="h-12 w-auto">
                    </div>
                    <nav class="hidden md:flex items-center space-x-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-gray-700 hover:text-blue-600 transition-colors">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 transition-colors">Login</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-gray-700 hover:text-blue-600 transition-colors">Register</a>
                            @endif
                        @endauth
                    </nav>
                    <div class="md:hidden">
                        <button id="mobile-menu-button" class="text-gray-700 hover:text-blue-600 focus:outline-none">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Menú móvil -->
            <div id="mobile-menu" class="md:hidden hidden">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="block px-3 py-2 text-gray-700 hover:text-blue-600 transition-colors">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="block px-3 py-2 text-gray-700 hover:text-blue-600 transition-colors">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="block px-3 py-2 text-gray-700 hover:text-blue-600 transition-colors">Register</a>
                        @endif
                    @endauth
                </div>
            </div>
        </header>

        <main class="flex-grow">
            <!-- Sección Hero -->
            <section class="relative bg-cover bg-center h-[80vh]" style="background-image: url('https://dentalmas.com.ar/wp-content/uploads/2022/01/home-background.jpeg');">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-900/70 to-transparent"></div>
                <div class="relative z-10 h-full flex items-center">
                    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="max-w-2xl text-white">
                            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-4">
                                Una sonrisa<br>a tu alcance
                            </h1>
                            <p class="text-lg md:text-xl mb-8">
                                ¡Te invitamos a lucir una hermosa sonrisa!<br>
                                Con el diagnóstico adecuado, realizado por expertos, obtendrás los resultados que esperás.
                            </p>
                            <a href="https://wa.me/5491122729959" target="_blank" class="bg-[#FF2D20] hover:bg-[#FF4D40] text-white font-bold py-3 px-6 rounded-full inline-block transition duration-300">
                                Solicitar turno
                            </a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Sección de categorías y tratamientos -->
            <section id="section-categories" class="bg-gray-100 py-16">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                    <h2 class="text-3xl font-bold text-center mb-8">Nuestros Servicios</h2>
                    <!-- Categorías -->
                    <div class="flex flex-wrap justify-center gap-4 mb-12">
                        @foreach($categories as $category)
                            <button 
                                class="category-item px-6 py-2 rounded-full text-sm font-medium transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500" 
                                data-category="{{ $category->id }}"
                            >
                                {{ $category->name }}
                            </button>
                        @endforeach
                    </div>
                    
                    <!-- Tratamientos -->
                    <div class="mt-8">
                        @foreach($categories as $category)
                            <div class="tratamientos tratamiento-{{ $category->id }} {{ $loop->first ? '' : 'hidden' }}">
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                                    @foreach($category->treatments as $treatment)
                                        <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform duration-300 hover:scale-105">
                                            <img 
                                                src="{{ $treatment->image_url }}" 
                                                alt="{{ $treatment->title }}" 
                                                class="w-full h-48 object-cover"
                                            >
                                            <div class="p-6">
                                                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $treatment->title }}</h3>
                                                <p class="text-gray-600 mb-4">{{ $treatment->description }}</p>
                                                <a 
                                                    href={{$treatment->id}}
                                                    class="inline-flex items-center text-blue-600 hover:text-blue-800 transition-colors"
                                                >
                                                    Ver más
                                                    <svg class="w-4 h-4 ml-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M5 12h14M12 5l7 7-7 7"/>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <!-- Nueva sección de planes -->
            <section id="section-plans" class="bg-gradient-to-b from-blue-100 to-white py-16">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                    <h2 class="text-3xl font-bold text-center mb-12">Nuestros Planes</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <!-- Plan  -->
                        @foreach($plans as $plan)
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform duration-300 hover:scale-105 hover:shadow-xl">
                            <div class="p-6">
                                    <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ $plan->name }}</h3>
                                    <p class="text-gray-600 mb-6"> {{$plan->description }}</p>
                                    <p class="text-3xl font-bold text-blue-600 mb-6">${{ $plan->price }} <span class="text-sm text-gray-500">/mes</span></p>
                                    <ul class="mb-8">
                                        <li class="flex items-center mb-2">
                                            <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                            Limpieza dental anual
                                        </li>
                                        <li class="flex items-center mb-2">
                                            <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                            Examen dental completo
                                        </li>
                                        <li class="flex items-center mb-2">
                                            <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                            Radiografías básicas
                                        </li>
                                    </ul>
                                    <button class="w-full bg-blue-600 text-white font-bold py-2 px-4 rounded-full hover:bg-blue-700 transition-colors duration-300 mb-2">
                                        Contratar Mensual
                                    </button>
                                    <button class="w-full bg-green-600 text-white font-bold py-2 px-4 rounded-full hover:bg-green-700 transition-colors duration-300">
                                        Contratar Anual
                                    </button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </main>
        
        <footer class="bg-gray-800 text-white py-8">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-2xl font-bold mb-4">Comunicate con nosotros</h2>
                <p class="mb-2">Para comunicarte con nosotros, podés completar el formulario y nos pondremos en contacto pronto.</p>
                <p>También nos encontrás en redes sociales y WhatsApp.</p>
            </div>
        </footer>
    </div>

    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const categoryButtons = document.querySelectorAll('.category-item');
            const treatmentSections = document.querySelectorAll('.tratamientos');
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');

            // Funcionalidad para las categorías
            categoryButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const categoryId = this.getAttribute('data-category');
                    
                    treatmentSections.forEach(section => {
                        section.classList.add('hidden');
                    });
            
                    const activeSection = document.querySelector(`.tratamiento-${categoryId}`);
                    if (activeSection) {
                        activeSection.classList.remove('hidden');
                    }
            
                    categoryButtons.forEach(btn => {
                        btn.classList.remove('bg-blue-600', 'text-white');
                        btn.classList.add('bg-white', 'text-gray-800');
                    });
            
                    this.classList.remove('bg-white', 'text-gray-800');
                    this.classList.add('bg-blue-600', 'text-white');
                });
            });

            // Funcionalidad para el menú móvil
            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });

            // Inicializar MercadoPago
            const mp = new MercadoPago("YOUR_PUBLIC_KEY");
        });
    </script>
</body>
</html>