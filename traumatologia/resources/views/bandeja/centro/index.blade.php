<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitudes de Resonancia</title>
    
    <!-- Bootstrap CSS (optional, if you're using it) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Your custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/bandejas.css') }}">
</head>
<body>
    {{-- Include the navbar --}}
    @include('partials.navbar')

    <div class="container">
        <div class="dashboard">
            <div class="content">
                <!-- Header con título y acciones -->
                <div class="page-header">
                    <h1 class="page-title">
                        Solicitudes de Resonancia
                        <span class="badge-counter">{{ $total }}</span>
                    </h1>
                    <div class="page-title-actions">
                        <div class="search-box">
                            <span class="search-icon">🔍</span>
                            <input type="text" class="search-input" placeholder="Buscar por nombre o RUT">
                        </div>
                        <select class="filter-dropdown">
                            <option value="all">Todos los estados</option>
                            <option value="pendiente">Pendientes</option>
                            <option value="aprobada">Aprobadas</option>
                            <option value="enviada">Enviadas</option>
                            <option value="rechazada">Rechazadas</option>
                        </select>
                    </div>
                </div>
                
                <!-- Notificaciones -->
                @if (session('success'))
                    <div class="alert alert-success">
                        <span class="alert-icon">✓</span>
                        <div class="alert-content">
                            {{ session('success') }}
                        </div>
                        <button class="alert-close">&times;</button>
                    </div>
                @endif
                
                <!-- Tarjetas de estadísticas -->
                <div class="stats-cards">
                    <div class="stat-card stat-card-blue">
                        <div class="stat-icon">📋</div>
                        <div class="stat-value">{{ $total }}</div>
                        <div class="stat-label">Total Solicitudes</div>
                        <div class="stat-progress">
                            <div class="stat-progress-bar" style="width: 100%"></div>
                        </div>
                    </div>
                    <div class="stat-card stat-card-yellow">
                        <div class="stat-icon">⏳</div>
                        <div class="stat-value">{{ $pendientes }}</div>
                        <div class="stat-label">Pendientes</div>
                        <div class="stat-progress">
                            <div class="stat-progress-bar" style="width: {{ ($pendientes / max($total, 1)) * 100 }}%"></div>
                        </div>
                    </div>
                    <div class="stat-card stat-card-green">
                        <div class="stat-icon">✅</div>
                        <div class="stat-value">{{ $aprobadas }}</div>
                        <div class="stat-label">Aprobadas</div>
                        <div class="stat-progress">
                            <div class="stat-progress-bar" style="width: {{ ($aprobadas / max($total, 1)) * 100 }}%"></div>
                        </div>
                    </div>
                    <div class="stat-card stat-card-orange">
                        <div class="stat-icon">📤</div>
                        <div class="stat-value">{{ $enviadas }}</div>
                        <div class="stat-label">Enviadas</div>
                        <div class="stat-progress">
                            <div class="stat-progress-bar" style="width: {{ ($enviadas / max($total, 1)) * 100 }}%"></div>
                        </div>
                    </div>
                </div>
                
                <!-- Tabla de solicitudes -->
                <div class="table-container">
                    <table class="requests-table">
                        <thead>
                            <tr>
                                <th>ID <span class="sort-icon">⇅</span></th>
                                <th>Fecha <span class="sort-icon">⇅</span></th>
                                <th>Paciente <span class="sort-icon">⇅</span></th>
                                <th>RUT</th>
                                <th>Rodilla</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($solicitudes as $solicitud)
                            <tr>
                                <td><div class="id-cell">{{ $solicitud['id'] }}</div></td>
                                <td>{{ $solicitud['fecha'] }}</td>
                                <td>
                                    <div class="paciente-cell">
                                        <div class="avatar">{{ substr($solicitud['paciente'], 0, 1) }}</div>
                                        <div class="paciente-info">{{ $solicitud['paciente'] }}</div>
                                    </div>
                                </td>
                                <td>{{ $solicitud['rut'] }}</td>
                                <td>
                                    <div class="rodilla-cell">
                                        @if($solicitud['rodilla'] == 'Izquierda')
                                            <div class="rodilla-icon rodilla-left">◀</div> Izquierda
                                        @elseif($solicitud['rodilla'] == 'Derecha')
                                            <div class="rodilla-icon rodilla-right">▶</div> Derecha
                                        @else
                                            <div class="rodilla-icon rodilla-both">◀▶</div> Ambas
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    @if($solicitud['estado'] == 'pendiente')
                                        <span class="status-badge status-pending">⏳ Pendiente</span>
                                    @elseif($solicitud['estado'] == 'aprobada')
                                        <span class="status-badge status-approved">✓ Aprobada</span>
                                    @elseif($solicitud['estado'] == 'enviada')
                                        <span class="status-badge status-sent">📤 Enviada</span>
                                    @elseif($solicitud['estado'] == 'rechazada')
                                        <span class="status-badge status-rejected">✗ Rechazada</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="#" class="action-button action-view" title="Ver detalles">
                                            <span class="action-icon">👁️</span>
                                        </a>
                                        
                                        @if($solicitud['estado'] == 'pendiente')
                                            <a href="{{ route('bandeja.aprobar', $solicitud['id']) }}" class="action-button action-approve" title="Aprobar solicitud">
                                                <span class="action-icon">✓</span>
                                            </a>
                                            <a href="{{ route('bandeja.rechazar', $solicitud['id']) }}" class="action-button action-reject" title="Rechazar solicitud">
                                                <span class="action-icon">✗</span>
                                            </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <!-- Paginación -->
                <div class="pagination">
                    <span class="pagination-info">Mostrando 1-10 de {{ $total }} resultados</span>
                    <div class="pagination-controls">
                        <button class="pagination-button pagination-prev disabled">
                            <span class="pagination-icon">←</span> Anterior
                        </button>
                        <div class="pagination-numbers">
                            <button class="pagination-button active">1</button>
                            <button class="pagination-button">2</button>
                            <button class="pagination-button">3</button>
                        </div>
                        <button class="pagination-button pagination-next">
                            Siguiente <span class="pagination-icon">→</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        // Funcionalidad para el filtro de estados
        document.querySelector('.filter-dropdown').addEventListener('change', function() {
            const filter = this.value;
            const rows = document.querySelectorAll('.requests-table tbody tr');
            
            rows.forEach(row => {
                const statusCell = row.cells[5].textContent.toLowerCase().trim();
                
                if (filter === 'all' || statusCell.includes(filter)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
        
        // Funcionalidad para la búsqueda
        document.querySelector('.search-input').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('.requests-table tbody tr');
            
            rows.forEach(row => {
                const paciente = row.cells[2].textContent.toLowerCase();
                const rut = row.cells[3].textContent.toLowerCase();
                
                if (paciente.includes(searchTerm) || rut.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
        
        // Cerrar alertas
        document.querySelectorAll('.alert-close').forEach(button => {
            button.addEventListener('click', function() {
                this.closest('.alert').style.display = 'none';
            });
        });
    </script>
</body>
</html>