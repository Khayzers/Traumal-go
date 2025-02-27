<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bandeja Traumatólogo</title>
    
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
                        Resonancias Recibidas
                        <span class="badge-counter">{{ $total }}</span>
                    </h1>
                    <div class="page-title-actions">
                        <div class="search-box">
                            <span class="search-icon">🔍</span>
                            <input type="text" class="search-input" placeholder="Buscar por nombre o RUT">
                        </div>
                        <select class="filter-dropdown">
                            <option value="all">Todos los estados</option>
                            <option value="recibida">Por revisar</option>
                            <option value="revisada">Revisadas</option>
                            <option value="contactada">Contactadas</option>
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
                        <div class="stat-label">Total Pacientes</div>
                        <div class="stat-progress">
                            <div class="stat-progress-bar" style="width: 100%"></div>
                        </div>
                    </div>
                    <div class="stat-card stat-card-yellow">
                        <div class="stat-icon">⏳</div>
                        <div class="stat-value">{{ $pendientes }}</div>
                        <div class="stat-label">Por Revisar</div>
                        <div class="stat-progress">
                            <div class="stat-progress-bar" style="width: {{ ($pendientes / max($total, 1)) * 100 }}%"></div>
                        </div>
                    </div>
                    <div class="stat-card stat-card-green">
                        <div class="stat-icon">✅</div>
                        <div class="stat-value">{{ $revisadas }}</div>
                        <div class="stat-label">Revisadas</div>
                        <div class="stat-progress">
                            <div class="stat-progress-bar" style="width: {{ ($revisadas / max($total, 1)) * 100 }}%"></div>
                        </div>
                    </div>
                    <div class="stat-card stat-card-orange">
                        <div class="stat-icon">📞</div>
                        <div class="stat-value">{{ $contactadas }}</div>
                        <div class="stat-label">Contactadas</div>
                        <div class="stat-progress">
                            <div class="stat-progress-bar" style="width: {{ ($contactadas / max($total, 1)) * 100 }}%"></div>
                        </div>
                    </div>
                </div>
                
                <!-- Tabla de pacientes -->
                <div class="table-container">
                    <table class="requests-table">
                        <thead>
                            <tr>
                                <th>ID <span class="sort-icon">⇅</span></th>
                                <th>Fecha <span class="sort-icon">⇅</span></th>
                                <th>Paciente <span class="sort-icon">⇅</span></th>
                                <th>RUT</th>
                                <th>Teléfono</th>
                                <th>Rodilla</th>
                                <th>Centro</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pacientes as $paciente)
                            <tr>
                                <td><div class="id-cell">{{ $paciente['id'] }}</div></td>
                                <td>{{ $paciente['fecha'] }}</td>
                                <td>
                                    <div class="paciente-cell">
                                        <div class="avatar">{{ substr($paciente['nombre'], 0, 1) }}</div>
                                        <div class="paciente-info">{{ $paciente['nombre'] }}</div>
                                    </div>
                                </td>
                                <td>{{ $paciente['rut'] }}</td>
                                <td><a href="tel:{{ $paciente['telefono'] }}" class="phone-link">{{ $paciente['telefono'] }}</a></td>
                                <td>
                                    <div class="rodilla-cell">
                                        @if($paciente['rodilla'] == 'Izquierda')
                                            <div class="rodilla-icon rodilla-left">◀</div> Izquierda
                                        @elseif($paciente['rodilla'] == 'Derecha')
                                            <div class="rodilla-icon rodilla-right">▶</div> Derecha
                                        @else
                                            <div class="rodilla-icon rodilla-both">◀▶</div> Ambas
                                        @endif
                                    </div>
                                </td>
                                <td><span class="centro-badge">{{ $paciente['centro'] }}</span></td>
                                <td>
                                    @if($paciente['estado'] == 'recibida')
                                        <span class="status-badge status-pending">⏳ Por revisar</span>
                                    @elseif($paciente['estado'] == 'revisada')
                                        <span class="status-badge status-approved">✓ Revisada</span>
                                    @elseif($paciente['estado'] == 'contactada')
                                        <span class="status-badge status-sent">📞 Contactada</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="#" class="action-button action-view" title="Ver resultados" onclick="verResultados('{{ $paciente['id'] }}')">
                                            <span class="action-icon">👁️</span>
                                        </a>
                                        
                                        @if($paciente['estado'] == 'recibida')
                                            <a href="{{ route('bandeja.traumatologo.revisar', $paciente['id']) }}" class="action-button action-approve" title="Marcar como revisado">
                                                <span class="action-icon">✓</span>
                                            </a>
                                        @endif
                                        
                                        @if($paciente['estado'] != 'contactada')
                                            <a href="{{ route('bandeja.traumatologo.contactar', $paciente['id']) }}" class="action-button action-contact" title="Marcar como contactado">
                                                <span class="action-icon">📞</span>
                                            </a>
                                        @endif
                                        
                                        <a href="#" class="action-button action-notes" title="Agregar notas" onclick="agregarNotas('{{ $paciente['id'] }}')">
                                            <span class="action-icon">📝</span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <!-- Paginación -->
                <div class="pagination">
                    <span class="pagination-info">Mostrando 1-{{ count($pacientes) }} de {{ $total }} resultados</span>
                    <div class="pagination-controls">
                        <button class="pagination-button pagination-prev disabled">
                            <span class="pagination-icon">←</span> Anterior
                        </button>
                        <div class="pagination-numbers">
                            <button class="pagination-button active">1</button>
                            <button class="pagination-button">2</button>
                        </div>
                        <button class="pagination-button pagination-next">
                            Siguiente <span class="pagination-icon">→</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para ver resultados -->
    <div id="resultadosModal" class="modal">
        <!-- Modal content remains the same as in the original file -->
    </div>

    <!-- Modal para agregar notas -->
    <div id="notasModal" class="modal">
        <!-- Modal content remains the same as in the original file -->
    </div>

    <!-- JavaScript -->
    <script>
        // Existing script remains the same as in the original file
        // Filtering and searching functionality
        document.querySelector('.filter-dropdown').addEventListener('change', function() {
            const filter = this.value;
            const rows = document.querySelectorAll('.requests-table tbody tr');
            
            rows.forEach(row => {
                const statusCell = row.cells[7].textContent.toLowerCase().trim();
                
                if (filter === 'all' || statusCell.includes(filter)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
        
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
    </script>
</body>
</html>