<!DOCTYPE html>
<html>
<head>
    <title>Crear Lead</title>
</head>
<body>

<h2>Crear Nuevo Lead</h2>

<form method="POST" action="{{ url('/leads') }}">
    @csrf <!-- Directiva de Blade para proteger el formulario contra ataques CSRF -->

    <label for="name">Nombre:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="email">Correo Electrónico:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="phone">Teléfono:</label>
    <input type="text" id="phone" name="phone"><br><br>

    <button type="submit">Crear Lead</button>
</form>

</body>
</html>
