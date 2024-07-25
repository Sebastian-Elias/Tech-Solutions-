<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Información del Proyecto</title>
</head>
<body>
    <h1>Información del Proyecto</h1>

    <p><strong>ID:</strong> {{ $proyecto['id'] }}</p>
    <p><strong>Nombre:</strong> {{ $proyecto['nombre'] }}</p>
    <p><strong>Fecha de Inicio:</strong> {{ $proyecto['fecha_inicio'] }}</p>
    <p><strong>Activo:</strong> {{ $proyecto['activo'] ? 'Sí' : 'No' }}</p>
    <p><strong>Responsable:</strong> {{ $proyecto['responsable'] }}</p>
    <p><strong>Monto:</strong> ${{ number_format($proyecto['monto'], 2) }}</p>

    <a href="{{ route('projects.index') }}">Volver a la lista</a>
</body>
</html>
