<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

    <title>Invitación</title>
    <title>Invitación al Evento</title>
  <style>
    /* Estilos generales */
    body {
      font-family: 'Roboto', sans-serif;
      background-color: #0f7777;
      margin: 0;
      padding: 0;
    }
    
    /* Estilos de la tarjeta */
    .card {
      max-width: 400px;
      margin: 20px auto;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      border-radius: 4px;
      display: flex;
      flex-direction: column;
      align-items: center;
    }
    
    /* Estilos del código QR */
    .qr-code {
      margin-top: 20px;
    }
    
    /* Estilos de los textos */
    h1 {
      margin-top: 0;
      color: #3f51b5;
      font-size: 24px;
      text-align: center;
    }
    
    p {
      color: #666;
      font-size: 16px;
      text-align: center;
      line-height: 1.5;
      margin-bottom: 20px;
    }
    
    /* Estilos responsivos */
    @media only screen and (max-width: 480px) {
      .card {
        max-width: 100%;
        margin: 10px;
      }
    }
  </style>
</head>
<body>
    <div class="card">
        <h1>Invitación al Evento</h1>
        <p>Muestra el código QR a continuación para marcar tu asistencia.</p>
        {{QrCode::size(200)->generate($qr)}}
      </div>
    
</body>
</html>