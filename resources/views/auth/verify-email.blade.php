<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificación de Email</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            position: relative;
            background-color: #f8f9fa;
        }

        .fondo {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            opacity: 0.7; /* Ajusta la opacidad según tus preferencias */
        }

        .contenido {
            z-index: 1;
            position: relative;
            padding-top: 100px; /* Ajusta según sea necesario para que el contenido no se superponga con la imagen de fondo */
        }

        .mensaje {
            margin-bottom: 1rem;
            font-size: 1rem;
            color: #333;
        }

        .mensaje-exito {
            color: #28a745;
        }

        .boton-reenviar {
            background-color: #007bff;
            color: #fff;
        }

        .boton-reenviar:hover {
            background-color: #0056b3;
        }

        .boton-cerrar-sesion {
            background-color: #dc3545;
            color: #fff;
        }

        .boton-cerrar-sesion:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>
    <img class="fondo" src="{{asset('/uploads/1_verificacion.jpg')}}" alt="">

    <div class="container contenido">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">¡Gracias por registrarte!</h5>
                        <p class="mensaje">Antes de empezar, ¿podrías verificar tu dirección de correo electrónico
                            haciendo clic en el enlace que acabamos de enviarte por correo electrónico? Si no recibiste
                            el correo electrónico, estaremos encantados de enviarte otro.</p>

                        @if (session('status') == 'verification-link-sent')
                            <div class="mensaje-exito">Se ha enviado un nuevo enlace de verificación a la dirección de
                                correo electrónico que proporcionaste durante el registro.</div>
                        @endif

                        <div class="d-grid gap-2 d-md-flex justify-content-md-between">
                            <form method="POST" action="{{ route('verification.send') }}" class="me-md-2">
                                @csrf
                                <button type="submit" class="btn btn-primary boton-reenviar">Reenviar correo de
                                    verificación</button>
                            </form>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-danger boton-cerrar-sesion">Cerrar sesión</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
