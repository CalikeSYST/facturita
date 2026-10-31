<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Mensaje</title>
</head>

<body style="font-family: Arial, Helvetica, sans-serif; color: #333">
    <div style="max-width: 600px; margin: auto; padding: 25px">
        <h2>Mensaje</h2>
        <div style="line-height: 1.7;">
            {{ nl2br(e($bodyMessage)) }}
        </div>
        <hr style="margin-top: 30px">
        <p style="font-size: 12px; color: #888">
            Este correo ha sido enviado de un sistema en desarrollo
        </p>
    </div>
</body>

</html>
