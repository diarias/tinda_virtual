<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificación de Restablecimiento de Contraseña</title>
    <style>
   .container {
    max-width: 600px;
    margin: 100px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center; /* Para centrar todo el contenido */
}

.message {
    margin-bottom: 20px;
}

.logo {
    width: auto; /* Ajusta el ancho de la imagen según sea necesario */
    margin-bottom: 20px; /* Espacio entre la imagen y el texto */
}

.button {
    display: inline-block; /* Para que el botón se muestre en línea */
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.button:hover {
    background-color: #0056b3;
}

    </style>
</head>

<body>
    <div class="container">
        <div class="message">
            <img src="https://briskstore.shop/uploads/media_65a464f70c02f.png" alt="Imagen de Restablecimiento de Contraseña" class="logo">
            <h1>¡Restablece tu Contraseña Ahora!</h1>
            <p>Estás recibiendo este correo electrónico porque recibimos una solicitud para restablecer la contraseña de tu cuenta.</p>
            <p><strong>Por tu seguridad:</strong> Te recomendamos restablecer tu contraseña regularmente para mantener tu cuenta segura.</p>
            <p>Este enlace de restablecimiento de contraseña expirará en <strong>{{ config('auth.passwords.'.config('auth.defaults.passwords').'.expire') }} minutos</strong>.</p>
            <p>Si no solicitaste restablecer la contraseña, no es necesario realizar ninguna otra acción.</p>
            <a href="{{ $url }}" class="button">Restablecer Contraseña</a>
        </div>
    </div>
    
</body>

</html>
