<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Panel de Administración - TraumaMed</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background-color: #f8f9fa;
        }
        
        .dashboard {
            padding: 20px;
        }
        
        .card {
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            border: none;
        }
        
        .card-header {
            background-color: #fff;
            border-bottom: 1px solid #eaeaea;
            padding: 15px 20px;
            font-weight: 600;
            border-radius: 10px 10px 0 0 !important;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .card-body {
            padding: 20px;
        }
        
        .stats-cards {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }
        
        .stat-card {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .stat-card-blue {
            border-left: 4px solid #3b82f6;
        }
        
        .stat-card-green {
            border-left: 4px solid #10b981;
        }
        
        .stat-card-orange {
            border-left: 4px solid #f59e0b;
        }
        
        .stat-card-purple {
            border-left: 4px solid #8b5cf6;
        }
        
        .stat-value {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 5px;
            color: #1f2937;
        }
        
        .stat-label {
            color: #6b7280;
            font-size: 14px;
            font-weight: 500;
        }
        
        .stat-icon {
            float: right;
            font-size: 24px;
            color: rgba(59, 130, 246, 0.2);
        }
        
        .table-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        
        .custom-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }
        
        .custom-table th {
            background-color: #f9fafb;
            color: #4b5563;
            font-weight: 600;
            text-align: left;
            padding: 15px;
            border-bottom: 1px solid #e5e7eb;
        }
        
        .custom-table td {
            padding: 15px;
            border-bottom: 1px solid #e5e7eb;
            color: #1f2937;
        }
        
        .custom-table tr:last-child td {
            border-bottom: none;
        }
        
        .custom-table tr:hover {
            background-color: #f9fafb;
        }
        
        .avatar {
            width: 35px;
            height: 35px;
            background-color: #e5e7eb;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #4b5563;
            font-weight: 600;
            margin-right: 10px;
            text-transform: uppercase;
        }
        
        .paciente-cell {
            display: flex;
            align-items: center;
        }
        
        .badge {
            padding: 6px 10px;
            border-radius: 20px;
            font-weight: 500;
            font-size: 12px;
        }
        
        .badge-pending {
            background-color: #fff7ed;
            color: #f59e0b;
        }
        
        .badge-approved {
            background-color: #f0fdf4;
            color: #10b981;
        }
        
        .badge-sent {
            background-color: #eff6ff;
            color: #3b82f6;
        }
        
        .badge-rejected {
            background-color: #fef2f2;
            color: #ef4444;
        }
        
        .action-button {
            width: 32px;
            height: 32px;
            border-radius: 6px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: white;
            margin-right: 5px;
            transition: all 0.2s;
        }
        
        .action-info {
            background-color: #3b82f6;
        }
        
        .action-info:hover {
            background-color: #2563eb;
        }
        
        .action-edit {
            background-color: #f59e0b;
        }
        
        .action-edit:hover {
            background-color: #d97706;
        }
        
        .action-delete {
            background-color: #ef4444;
        }
        
        .action-delete:hover {
            background-color: #dc2626;
        }
        
        .activity-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .activity-item {
            padding: 15px 0;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
        }
        
        .activity-item:last-child {
            border-bottom: none;
        }
        
        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #eff6ff;
            color: #3b82f6;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
        }
        
        .activity-content {
            flex: 1;
        }
        
        .activity-title {
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 5px;
        }
        
        .activity-time {
            font-size: 13px;
            color: #6b7280;
        }
        
        .admin-nav {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            padding: 15px;
        }
        
        .admin-nav-links {
            display: flex;
            gap: 20px;
        }
        
        .admin-nav-link {
            color: #4b5563;
            text-decoration: none;
            font-weight: 500;
            padding: 8px 16px;
            border-radius: 8px;
            transition: all 0.2s;
        }
        
        .admin-nav-link:hover {
            background-color: #f9fafb;
            color: #1f2937;
        }
        
        .admin-nav-link.active {
            background-color: #eff6ff;
            color: #3b82f6;
        }
    </style>
</head>
<body>
    {{-- Include the navbar --}}
    @include('partials.navbar')
    
    <div class="container-fluid">
        <div class="dashboard">
            <!-- Navegación de administrador -->
            <div class="admin-nav">
                <div class="admin-nav-links">
                    <a href="{{ route('bandeja.administrador') }}" class="admin-nav-link active">
                        <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                    </a>
                    <a href="{{ route('bandeja.administrador.usuarios') }}" class="admin-nav-link">
                        <i class="fas fa-users me-2"></i> Usuarios
                    </a>
                    <a href="{{ route('bandeja.administrador.estadisticas') }}" class="admin-nav-link">
                        <i class="fas fa-chart-bar me-2"></i> Estadísticas
                    </a>
                </div>
            </div>
            
            <!-- Notificaciones -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
            <!-- Tarjetas de estadísticas -->
            <div class="stats-cards">
                <div class="stat-card stat-card-blue">
                    <i class="fas fa-clipboard-list stat-icon"></i>
                    <div class="stat-value">{{ $estadisticas['solicitudes_totales'] }}</div>
                    <div class="stat-label">Solicitudes Totales</div>
                </div>
                <div class="stat-card stat-card-green">
                    <i class="fas fa-calendar-check stat-icon"></i>
                    <div class="stat-value">{{ $estadisticas['solicitudes_mes'] }}</div>
                    <div class="stat-label">Solicitudes del Mes</div>
                </div>
                <div class="stat-card stat-card-orange">
                    <i class="fas fa-users stat-icon"></i>
                    <div class="stat-value">{{ $estadisticas['usuarios_activos'] }}</div>
                    <div class="stat-label">Usuarios Activos</div>
                </div>
                <div class="stat-card stat-card-purple">
                    <i class="fas fa-stopwatch stat-icon"></i>
                    <div class="stat-value">{{ $estadisticas['tiempo_promedio'] }}</div>
                    <div class="stat-label">Tiempo Promedio Respuesta</div>
                </div>
            </div>
            
            <div class="row">
                <!-- Tabla de solicitudes recientes -->
                <div class="col-lg-8 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <span><i class="fas fa-clipboard-list me-2"></i> Solicitudes recientes</span>
                            <a href="{{ route('bandeja.solicitudes') }}" class="btn btn-sm btn-outline-primary">Ver todas</a>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-container">
                                <table class="custom-table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Paciente</th>
                                            <th>Fecha</th>
                                            <th>Traumatólogo</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($solicitudes_recientes as $solicitud)
                                        <tr>
                                            <td><strong>{{ $solicitud['id'] }}</strong></td>
                                            <td>
                                                <div class="paciente-cell">
                                                    <div class="avatar">{{ substr($solicitud['paciente'], 0, 1) }}</div>
                                                    {{ $solicitud['paciente'] }}
                                                </div>
                                            </td>
                                            <td>{{ $solicitud['fecha'] }}</td>
                                            <td>{{ $solicitud['traumatologo'] }}</td>
                                            <td>
                                                @if($solicitud['estado'] == 'pendiente')
                                                    <span class="badge badge-pending">Pendiente</span>
                                                @elseif($solicitud['estado'] == 'visado')
                                                    <span class="badge badge-sent">Visado</span>
                                                @elseif($solicitud['estado'] == 'respondido')
                                                    <span class="badge badge-approved">Respondido</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="#" class="action-button action-info">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Actividades recientes -->
                <div class="col-lg-4 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <span><i class="fas fa-history me-2"></i> Actividades recientes</span>
                        </div>
                        <div class="card-body">
                            <ul class="activity-list">
                                @foreach($actividades as $actividad)
                                <li class="activity-item">
                                    <div class="activity-icon">
                                        <i class="fas fa-user-circle"></i>
                                    </div>
                                    <div class="activity-content">
                                        <div class="activity-title">
                                            <strong>{{ $actividad['usuario'] }}</strong> {{ $actividad['accion'] }}
                                        </div>
                                        <div>{{ $actividad['detalle'] }}</div>
                                        <div class="activity-time">{{ $actividad['fecha'] }}</div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Accesos rápidos -->
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card">
                        <div class="card-header">
                            <span><i class="fas fa-bolt me-2"></i> Acciones rápidas</span>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <a href="{{ route('bandeja.administrador.usuarios') }}" class="btn btn-outline-primary w-100 py-3">
                                        <i class="fas fa-user-plus mb-2 d-block" style="font-size: 24px;"></i>
                                        Crear nuevo usuario
                                    </a>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <a href="{{ route('bandeja.administrador.estadisticas') }}" class="btn btn-outline-success w-100 py-3">
                                        <i class="fas fa-chart-line mb-2 d-block" style="font-size: 24px;"></i>
                                        Ver estadísticas
                                    </a>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <a href="#" class="btn btn-outline-info w-100 py-3">
                                        <i class="fas fa-file-pdf mb-2 d-block" style="font-size: 24px;"></i>
                                        Generar reportes
                                    </a>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <a href="#" class="btn btn-outline-secondary w-100 py-3">
                                        <i class="fas fa-cog mb-2 d-block" style="font-size: 24px;"></i>
                                        Configuración
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Cerrar alertas automáticamente después de 5 segundos
            setTimeout(function() {
                $('.alert').alert('close');
            }, 5000);
        });
    </script>
</body>
</html>