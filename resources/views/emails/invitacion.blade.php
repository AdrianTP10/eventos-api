<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invitacion</title>
    <style>
        body{
            font-family: Helvetica, sans-serif;
        }
       div {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding:10px 7px;
        margin: 2px;
        background-color: #b3084991;
        
        border-radius: 5%
    }

        p {
        font-size: 22px;
       }
    </style>
</head>
<body>
    <div>
        <p>Hola, estás invitado al evento {{$evento->descripcion}}, con ubicación en {{$evento->ubicacion}}  </p>
        {{ QrCode::format('png')->size(200)->generate($invitado->identificador_qr) }}

        <p>Presenta este codigo de invitación en la entrada del evento.</p>
    </div>
   
</body>
</html>