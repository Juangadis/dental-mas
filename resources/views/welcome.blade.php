<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full w-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                                    <button class="w-full bg-blue-600 text-white font-bold py-2 px-4 rounded-full hover:bg-blue-700 transition-colors duration-300 mb-2" data-plan="{{ $plan->id }}">
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

            <!-- Modal -->
            <div id="payment-modal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden">
                <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
                    <div class="mt-3 text-center">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Formulario de Pago</h3>
                        <div class="mt-2 px-7 py-3">
                            <!-- Payment Form -->
                            <form id="form-checkout" class="space-y-4">
                                <div class="space-y-2">
                                    <label for="form-checkout__cardNumber" class="block text-sm font-medium text-gray-700">Número de tarjeta</label>
                                    <div id="form-checkout__cardNumber" class="container h-10 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"></div>
                                </div>
                                <div class="space-y-2">
                                    <label for="form-checkout__expirationDate" class="block text-sm font-medium text-gray-700">Fecha de vencimiento</label>
                                    <div id="form-checkout__expirationDate" class="container h-10 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"></div>
                                </div>
                                <div class="space-y-2">
                                    <label for="form-checkout__securityCode" class="block text-sm font-medium text-gray-700">Código de seguridad</label>
                                    <div id="form-checkout__securityCode" class="container h-10 px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"></div>
                                </div>
                                <div class="space-y-2">
                                    <label for="form-checkout__cardholderName" class="block text-sm font-medium text-gray-700">Nombre del titular</label>
                                    <input type="text" id="form-checkout__cardholderName" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" />
                                </div>
                                <div class="space-y-2">
                                    <label for="form-checkout__issuer" class="block text-sm font-medium text-gray-700">Banco emisor</label>
                                    <select id="form-checkout__issuer" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"></select>
                                </div>
                                <div class="space-y-2">
                                    <label for="form-checkout__installments" class="block text-sm font-medium text-gray-700">Cuotas</label>
                                    <select id="form-checkout__installments" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"></select>
                                </div>
                                <div class="space-y-2">
                                    <label for="form-checkout__identificationType" class="block text-sm font-medium text-gray-700">Tipo de documento</label>
                                    <select id="form-checkout__identificationType" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"></select>
                                </div>
                                <div class="space-y-2">
                                    <label for="form-checkout__identificationNumber" class="block text-sm font-medium text-gray-700">Número de documento</label>
                                    <input type="text" id="form-checkout__identificationNumber" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" />
                                </div>
                                <div class="space-y-2">
                                    <label for="form-checkout__cardholderEmail" class="block text-sm font-medium text-gray-700">Email</label>
                                    <input type="email" id="form-checkout__cardholderEmail" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" />
                                </div>
                                <div class="flex justify-end space-x-3 mt-5">
                                    <button type="button" id="modal-close" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-300">
                                        Cerrar
                                    </button>
                                    <button type="submit" id="form-checkout__submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        Pagar
                                    </button>
                                </div>
                            </form>
                            <progress value="0" class="progress-bar mt-4 w-full"></progress>
                        </div>
                    </div>
                </div>
            </div>

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
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const mp = new MercadoPago('APP_USR-395a75b3-f8e8-4b00-9777-3cd0fcc21a99');

            // Modal functionality
            const modal = document.getElementById('payment-modal');
            const closeButton = document.getElementById('modal-close');
            const contractButtons = document.querySelectorAll('button[data-plan]');

            contractButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const planId = this.getAttribute('data-plan');
                    // Here you can use planId to set up the payment for the specific plan
                    modal.classList.remove('hidden');
                    initializeCardForm();
                });
            });

            closeButton.addEventListener('click', function() {
                modal.classList.add('hidden');
            });

            // Close modal if clicked outside
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.classList.add('hidden');
                }
            });

            function initializeCardForm() {
                const cardForm = mp.cardForm({
                    amount: "100.5",
                    iframe: true,
                    form: {
                        id: "form-checkout",
                        cardNumber: {
                            id: "form-checkout__cardNumber",
                            placeholder: "Numero de tarjeta",
                        },
                        expirationDate: {
                            id: "form-checkout__expirationDate",
                            placeholder: "MM/YY",
                        },
                        securityCode: {
                            id: "form-checkout__securityCode",
                            placeholder: "Código de seguridad",
                        },
                        cardholderName: {
                            id: "form-checkout__cardholderName",
                            placeholder: "Titular de la tarjeta",
                        },
                        issuer: {
                            id: "form-checkout__issuer",
                            placeholder: "Banco emisor",
                        },
                        installments: {
                            id: "form-checkout__installments",
                            placeholder: "Cuotas",
                        },        
                        identificationType: {
                            id: "form-checkout__identificationType",
                            placeholder: "Tipo de documento",
                        },
                        identificationNumber: {
                            id: "form-checkout__identificationNumber",
                            placeholder: "Número del documento",
                        },
                        cardholderEmail: {
                            id: "form-checkout__cardholderEmail",
                            placeholder: "E-mail",
                        },
                    },
                    callbacks: {
                        onFormMounted: error => {
                            if (error) return console.warn("Form Mounted handling error: ", error);
                            console.log("Form mounted");
                        },
                        onSubmit: event => {
                            event.preventDefault();

                            const {
                                paymentMethodId: payment_method_id,
                                issuerId: issuer_id,
                                cardholderEmail: email,
                                amount,
                                token,
                                installments,
                                identificationNumber,
                                identificationType,
                            } = cardForm.getCardFormData();

                            fetch("/process_payment", {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/json",
                                    "X-CSRF-TOKEN": csrfToken
                                },
                                body: JSON.stringify({
                                    token,
                                    issuer_id,
                                    payment_method_id,
                                    transaction_amount: Number(amount),
                                    installments: Number(installments),
                                    description: "Descripción del producto",
                                    payer: {
                                        email,
                                        identification: {
                                            type: identificationType,
                                            number: identificationNumber,
                                        },
                                    },
                                }),
                            }).then(response => response.json())
                            .then(result => {
                                // Handle the payment result here
                                console.log(result);
                                alert("Pago procesado. Revise la consola para ver el resultado.");
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                alert("Error al procesar el pago. Por favor, intente nuevamente.");
                            });
                        },
                        onFetching: (resource) => {
                            console.log("Fetching resource: ", resource);

                            // Animate progress bar
                            const progressBar = document.querySelector(".progress-bar");
                            progressBar.removeAttribute("value");

                            return () => {
                                progressBar.setAttribute("value", "0");
                            };
                        }
                    },
                });
            }
        });
    </script>
    
</body>
</html>