<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Nuevo Proyecto</title>
</head>
<body>
    <h1>Crear Nuevo Proyecto</h1>

    <!-- Mostrar mensajes de éxito -->
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br>

        <label for="fecha_inicio">Fecha de Inicio:</label>
        <input type="date" id="fecha_inicio" name="fecha_inicio" required>
        <br>

        <label for="activo">Activo:</label>
        <input type="checkbox" id="activo" name="activo">
        <br>

        <label for="responsable">Responsable:</label>
        <input type="text" id="responsable" name="responsable" required>
        <br>

        <label for="monto">Monto:</label>
        <input type="number" id="monto" name="monto" step="0.01" min="0" required>
        <br>

        <button type="submit">Crear Proyecto</button>
    </form>

    <a href="{{ route('projects.index') }}">Volver a la lista</a>
</body>
</html>

