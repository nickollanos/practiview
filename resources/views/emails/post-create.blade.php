<!DOCTYPE html>
<html>
<head>
    <title>Bienvenido a la plataforma</title>
</head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se ha creado correctamente el evento</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white rounded-lg shadow-lg p-6 max-w-lg w-full">
        <h1 class="text-2xl font-semibold text-green-600 mb-4">
            ✅ Evento Creado Exitosamente
        </h1>
        <p class="text-gray-700 text-sm mb-4">
            Tu evento ha sido creado correctamente. A continuación, puedes revisar los detalles y continuar con la planificación.
        </p>
        <h1>Hola, {{ $nombre }}!</h1>
    <p>Tu cuenta ha sido creada exitosamente como instructor en nuestra plataforma.</p>
    <p>Tu contraseña temporal es: <strong>{{ $password }}</strong></p>
    <p>Por favor, inicia sesión y cámbiala lo antes posible para proteger tu cuenta.</p>
    <p>Gracias por ser parte de nuestra comunidad.</p>
        <div class="mt-6 flex justify-center">
            <a href="#" class="bg-[#059212] text-white mb-4 px-6 py-2 text-sm sm:text-base">
                Ver Evento
            </a>
        </div>
    </div>
</body>
</html>
