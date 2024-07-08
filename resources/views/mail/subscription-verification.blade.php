<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>
<body>
    <p>Haga clic en el enlace para verificar su correo electrónico.</p>
    <a href="{{route('newsletter-verify', $existSubscriber->verified_token)}}">haga clic aquí</a>
</body>
</html>
