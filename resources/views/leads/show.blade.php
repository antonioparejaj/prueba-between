<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Lead</title>
</head>
<body>
    <h1>Detalles del Lead</h1>
    <p><strong>Nombre:</strong> {{ $lead->name }}</p>
    <p><strong>Email:</strong> {{ $lead->email }}</p>
    <p><strong>Teléfono:</strong> {{ $lead->phone }}</p>
</body>
</html>
