<!-- resources/views/plans/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Plan</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Asegúrate de incluir tus estilos -->
</head>
<body>
    <div class="container">
        <h1>Crear un Nuevo Plan</h1>
        
        <!-- Muestra los errores de validación -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('plans.store') }}" method="POST">
            @csrf <!-- Token CSRF para seguridad -->
            <div class="form-group">
                <label for="name">Nombre del Plan</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="price">Precio</label>
                <input type="number" id="price" name="price" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea id="description" name="description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="url">URL</label>
                <input type="text" id="url" name="url" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Crear Plan</ button>
        </form>
    </div>
</body>
</html>