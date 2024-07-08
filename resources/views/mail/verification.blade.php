<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Verificación de Correo Electrónico</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">

    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
        <img src="https://briskstore.shop/uploads/media_65a464f70c02f.png" alt="Logo de la empresa" style="display: block; margin: 0 auto; max-width: 100%; height: auto;">

        <h1 style="text-align: center; color: #333333;">¡Hola!</h1>

        <p style="font-size: 16px; color: #666666;">Hemos recibido una solicitud para verificar tu dirección de correo electrónico. Por favor, haz clic en el botón a continuación para completar el proceso de verificación. Recuerda iniciar sesión para completar la verificación.</p>

        <table cellspacing="0" cellpadding="0" border="0" align="center" style="margin: 0 auto;">
            <tr>
                <td style="background-color: #183afa; border-radius: 4px;">
                    <a href="{{ $url }}" target="_blank" style="font-size: 16px; color: #ffffff; text-decoration: none; display: inline-block; padding: 12px 20px; border-radius: 4px;" class="btn btn-primary">Verificar Correo Electrónico</a>
                </td>
            </tr>
        </table>

        <p style="font-size: 14px; color: #666666; text-align: center; margin-top: 20px;">Si no solicitaste esta verificación o no creaste una cuenta, ignora este mensaje.</p>
    </div>

</body>
</html>
