<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Diventa revisore</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 20px; background-color: #f4f4f4;">
    <div style="max-width: 600px; margin: auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
        <h1 style="color: #333;">Un utente ha chiesto di lavorare con noi</h1>
        <h2 style="color: #555;">Ecco i suoi dati:</h2>
        <p style="color: #666;"><strong>Nome:</strong> {{$name}}</p>
        <p style="color: #666;"><strong>Email:</strong> {{$email}}</p>
        <p style="color: #666;"><strong>Motivazione:</strong> {{$description}}</p>
        <p style="color: #333;">Se vuoi rendere revisor clicca qui:</p>
        <a href="{{route('make.revisor', compact('user'))}}" style="display: inline-block; padding: 10px 20px; background-color: #28a745; color: white; text-decoration: none; border-radius: 5px; font-weight: bold;">Rendi revisor</a>
    </div>
</body>
</html>