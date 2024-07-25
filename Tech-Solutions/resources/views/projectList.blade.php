<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Proyectos</title>
</head>
<body>
    <h1>Lista de Proyectos</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Fecha de Inicio</th>
                <th>Activo</th>
                <th>Responsable</th>
                <th>Monto</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proyectos as $proyecto)
            <tr>
                <td>{{ $proyecto->id }}</td>
                <td>{{ $proyecto->nombre }}</td>
                <td>{{ $proyecto->fecha_inicio }}</td>
                <td>{{ $proyecto->activo ? 'Sí' : 'No' }}</td>
                <td>{{ $proyecto->responsable }}</td>
                <td>${{ $proyecto->monto }}</td>
                <td>
                    <a href="{{ route('projects.show', $proyecto->id) }}">Ver</a> |
                    <a href="{{ route('projects.edit', $proyecto->id) }}">Editar</a> |
                    <form action="{{ route('projects.destroy', $proyecto->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
