<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Proyectos</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    @if (isset($showList) && $showList)



        <h1>Lista de Proyectos</h1>

        <ul>
            @foreach ($proyectos as $proyecto)
                <li>
                    <a href="{{ route('projects.show', $proyecto['id']) }}">{{ $proyecto['nombre'] }}</a>
                    <!-- Modificar -->
                    <a href="{{ route('projects.edit', $proyecto['id']) }}" title="Modificar">
                        <i class="fas fa-edit"></i>
                    </a>
                    <!-- Eliminar -->
                        <!-- Eliminar -->
                        <a href="{{ route('projects.delete.show', $proyecto['id']) }}" title="Eliminar">
                            <i class="fas fa-trash"></i>
                        </a>
                </li>
            @endforeach
        </ul>
    @else
        <h1>Detalles del Proyecto</h1>
        @if (isset($proyecto))
            <p><strong>ID:</strong> {{ $proyecto->id }}</p>
            <p><strong>Nombre:</strong> {{ $proyecto->nombre }}</p>
            <p><strong>Fecha de Inicio:</strong> {{ $proyecto->fecha_inicio }}</p>
            <p><strong>Activo:</strong> {{ $proyecto->activo ? 'Sí' : 'No' }}</p>
            <p><strong>Responsable:</strong> {{ $proyecto->responsable }}</p>
            <p><strong>Monto:</strong> ${{ $proyecto->monto }}</p>
            <a href="{{ route('projects.index') }}">Volver a la lista</a>
        @else
            <p>Detalles del proyecto no disponibles.</p>
        @endif
    @endif

                <!-- Formulario de búsqueda -->
                <h1>Buscar proyecto por ID</h1>
    <form action="{{ route('projects.search') }}" method="GET">
        <label for="search_id">ID:</label>
        <input type="number" id="search_id" name="search_id" required>
        <button type="submit">Buscar</button>
    </form>
</body>
</html>



