<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invitacion</title>
    <style>
       /* Estilos generales */
        body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        }
        .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ddd;
        align-items: center;
        }
        h1 {
        text-align: center;
        }
        p {
        text-align: justify;
        }
        a.button {
        display: inline-block;
        background-color: #0f7777;
        color: #fff;
        text-decoration: none;
        padding: 10px 20px;
        margin-top: 20px;
        }

        /* Estilos para dispositivos móviles */
        @media (max-width: 480px) {
        .container {
            padding: 10px;
        }
        }

      </style>
    
</head>
<body>
    {{-- <div>
        <p>Hola, estás invitado al evento {{$evento->descripcion}}, con ubicación en {{$evento->ubicacion}}  </p>
        <br>
       
        <a href={{route('invitados.show', $invitado->identificador_qr )}}>Sigue este enlace para ver tu código de invitación</a>
        
       
      
        <p>Presenta este codigo de invitación en la entrada del evento.</p>
    </div> --}}
    {{--  {{ QrCode::format('png')->size(200)->generate($invitado->identificador_qr) }}  --}}
   {{--  <div class="container">
        <h1>Eventos I.A</h1>
        <p>Estás cordialmente invitado/a al evento {{$evento->descripcion}}, con ubicación en {{$evento->ubicacion}}</p>
        <a class="button" href={{route('invitados.show', $invitado->identificador_qr )}}>Confirmar asistencia</a>
      </div> --}}


    <div class="container">
    <h1>Invitación a evento</h1>
    
    <p>Estás cordialmente invitado/a al evento {{$evento->descripcion}} </p>
    <p>Detalles del evento:</p>
    <ul>
        <li>Fecha: {{$evento->fecha}}</li>
        <li>Lugar: {{$evento->ubicacion}}</li>
    </ul>
    <p>¡Esperamos contar con su presencia!</p>
    <p>Sigue este enlace para ver tu código de invitación:</p>
    <p><a class="button" href={{route('invitados.show', $invitado->identificador_qr )}}>Confirmar asistencia</a></p>
    </div>
   
</body>
</html>