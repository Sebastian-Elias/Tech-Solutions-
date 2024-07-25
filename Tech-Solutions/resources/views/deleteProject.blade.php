<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar Proyecto</title>
</head>
<body>
    <h1>Eliminar Proyecto</h1>

    <!-- Mostrar mensajes de éxito -->
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <!-- Mostrar los detalles del proyecto -->
    <p><strong>ID:</strong> {{ $proyecto['id'] }}</p>
    <p><strong>Nombre:</strong> {{ $proyecto['nombre'] }}</p>
    <p><strong>Fecha de Inicio:</strong> {{ $proyecto['fecha_inicio'] }}</p>
    <p><strong>Activo:</strong> {{ $proyecto['activo'] ? 'Sí' : 'No' }}</p>
    <p><strong>Responsable:</strong> {{ $proyecto['responsable'] }}</p>
    <p><strong>Monto:</strong> ${{ $proyecto['monto'] }}</p>

    <!-- Formulario para eliminar el proyecto -->
    <form action="{{ route('projects.delete', $proyecto['id']) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Eliminar Proyecto</button>
    </form>

    <a href="{{ route('projects.index') }}">Volver a la lista</a>
</body>
</html>

