<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Proyecto</title>
</head>
<body>
    <h1>Editar Proyecto</h1>

    <form action="{{ route('projects.update', $proyecto['id']) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="{{ $proyecto['nombre'] }}" required>
        <br>
        <label for="fecha_inicio">Fecha de Inicio:</label>
        <input type="date" id="fecha_inicio" name="fecha_inicio" value="{{ $proyecto['fecha_inicio'] }}" required>
        <br>
        <label for="activo">Activo:</label>
        <input type="checkbox" id="activo" name="activo" value="1" {{ $proyecto['activo'] ? 'checked' : '' }}>
        <br>
        <label for="responsable">Responsable:</label>
        <input type="text" id="responsable" name="responsable" value="{{ $proyecto['responsable'] }}" required>
        <br>
        <label for="monto">Monto:</label>
        <input type="number" id="monto" name="monto" value="{{ $proyecto['monto'] }}" step="0.01" min="0" required>
        <br>
        <button type="submit">Actualizar Proyecto</button>
    </form>

    <a href="{{ route('projects.index') }}">Volver a la lista</a>
</body>
</html>

