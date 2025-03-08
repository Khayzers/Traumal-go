<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TraumaMed - Sistema de Gestión de Órdenes de Examen</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', 'Helvetica Neue', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f2f5;
            color: #333;
        }
        
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
        }
        
        /* Dashboard */
        .dashboard {
            background-color: #f5f7fa;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-top: 20px;
            overflow: hidden;
        }
        
        .content {
            padding: 25px;
            background-color: #ffffff;
        }
        
        /* Header de la página */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }
        
        .page-title {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
            color: #0D47A1;
            display: flex;
            align-items: center;
        }
        
        .badge-counter {
            background-color: #1A73E8;
            color: white;
            font-size: 14px;
            padding: 4px 8px;
            border-radius: 20px;
            margin-left: 10px;
            font-weight: 500;
        }
        
        .page-actions {
            display: flex;
            align-items: center;
        }
        
        /* Filtro de mes */
        .month-filter {
            display: flex;
            align-items: center;
            background-color: #f0f5ff;
            border: 1px solid #d0e3ff;
            border-radius: 8px;
            padding: 6px 12px;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .month-filter:hover {
            background-color: #e0ecff;
        }
        
        .month-label {
            margin-right: 8px;
            font-weight: 500;
            color: #0D47A1;
        }
        
        .current-month {
            font-weight: 600;
            color: #1A73E8;
            margin-right: 10px;
        }
        
        .dropdown-icon {
            color: #1A73E8;
        }
        
        .month-dropdown {
            position: relative;
            display: inline-block;
        }
        
        .month-dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            top: 100%;
            background-color: #fff;
            min-width: 160px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
            z-index: 1;
            border-radius: 8px;
            margin-top: 5px;
        }
        
        .month-dropdown:hover .month-dropdown-content {
            display: block;
        }
        
        .month-option {
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            color: #333;
            transition: all 0.2s;
        }
        
        .month-option:hover {
            background-color: #f1f5f9;
            color: #1A73E8;
        }
        
        .month-option.active {
            background-color: #e0ecff;
            color: #1A73E8;
            font-weight: 600;
        }
        
        /* Tarjetas de estadísticas */
        .stats-cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background-color: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            display: flex;
            flex-direction: column;
            position: relative;
            overflow: hidden;
        }
        
        .stat-card-blue {
            border-top: 4px solid #1A73E8;
        }
        
        .stat-card-yellow {
            border-top: 4px solid #FFC107;
        }
        
        .stat-card-green {
            border-top: 4px solid #4CAF50;
        }
        
        .stat-card-orange {
            border-top: 4px solid #FF9966;
        }
        
        .stat-card-purple {
            border-top: 4px solid #9C27B0;
        }
        
        .stat-card-red {
            border-top: 4px solid #F44336;
        }
        
        .stat-icon {
            font-size: 20px;
            margin-bottom: 5px;
        }
        
        .stat-value {
            font-size: 28px;
            font-weight: 700;
            margin: 5px 0;
        }
        
        .stat-label {
            color: #727272;
            font-size: 14px;
            font-weight: 500;
        }
        
        .stat-progress {
            height: 4px;
            background-color: #E0E0E0;
            border-radius: 2px;
            margin-top: 15px;
            overflow: hidden;
        }
        
        .stat-progress-bar {
            height: 100%;
            border-radius: 2px;
        }
        
        .stat-card-blue .stat-progress-bar {
            background-color: #1A73E8;
        }
        
        .stat-card-yellow .stat-progress-bar {
            background-color: #FFC107;
        }
        
        .stat-card-green .stat-progress-bar {
            background-color: #4CAF50;
        }
        
        .stat-card-orange .stat-progress-bar {
            background-color: #FF9966;
        }
        
        /* Sección */
        .section-container {
            background-color: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            margin-bottom: 30px;
        }
        
        .section-title {
            font-size: 20px;
            font-weight: 600;
            color: #0D47A1;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #e0e0e0;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        
        .section-icon {
            margin-right: 10px;
            color: #1A73E8;
        }
        
        .period-label {
            font-size: 14px;
            color: #727272;
            font-weight: normal;
        }
        
        .period-value {
            color: #1A73E8;
            font-weight: 600;
        }
        
        /* Tabla de centros y traumatólogos */
        .data-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .data-table th,
        .data-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }
        
        .data-table th {
            font-weight: 600;
            color: #4A5568;
            background-color: #f5f7fa;
        }
        
        .data-table tbody tr:last-child td {
            border-bottom: none;
        }
        
        .data-table tbody tr:hover {
            background-color: #f8f9fa;
        }
        
        .data-table .numeric {
            text-align: right;
            font-weight: 600;
        }
        
        .centro-badge {
            background-color: #E8EAF6;
            color: #3F51B5;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 13px;
            font-weight: 500;
        }
        
        .doctor-badge {
            background-color: #E8F5E9;
            color: #4CAF50;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 13px;
            font-weight: 500;
        }
        
        /* Responsive */
        @media (max-width: 1200px) {
            .stats-cards {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 768px) {
            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .page-actions {
                margin-top: 15px;
            }
            
            .stats-cards {
                grid-template-columns: 1fr;
            }
            
            .data-table {
                display: block;
                overflow-x: auto;
            }
        }
    </style>
</head>
<body>
    @include('partials.navbar')

    <div class="container">
        <div class="dashboard">
            <div class="content">
                <!-- Cabecera de la página -->
                <div class="page-header">
                    <h1 class="page-title">
                        Dashboard de Órdenes de Examen
                        <span class="badge-counter">175</span>
                    </h1>
                    
                    <!-- Filtro de mes -->
                    <div class="page-actions">
                        <div class="month-dropdown">
                            <div class="month-filter">
                                <span class="month-label">Período:</span>
                                <span class="current-month">Febrero 2025</span>
                                <i class="fas fa-chevron-down dropdown-icon"></i>
                            </div>
                            <div class="month-dropdown-content">
                                <a href="#" class="month-option">Enero 2025</a>
                                <a href="#" class="month-option active">Febrero 2025</a>
                                <a href="#" class="month-option">Marzo 2025</a>
                                <a href="#" class="month-option">Abril 2025</a>
                                <a href="#" class="month-option">Mayo 2025</a>
                                <a href="#" class="month-option">Junio 2025</a>
                                <a href="#" class="month-option">Julio 2025</a>
                                <a href="#" class="month-option">Agosto 2025</a>
                                <a href="#" class="month-option">Septiembre 2025</a>
                                <a href="#" class="month-option">Octubre 2025</a>
                                <a href="#" class="month-option">Noviembre 2025</a>
                                <a href="#" class="month-option">Diciembre 2025</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Sección General -->
                <div class="section-container">
                    <div class="section-title">
                        <div>
                            <i class="fas fa-chart-pie section-icon"></i> Resumen General
                        </div>
                        <div class="period-label">
                            Período: <span class="period-value">Febrero 2025</span>
                        </div>
                    </div>
                    
                    <div class="stats-cards">
                        <div class="stat-card stat-card-blue">
                            <div class="stat-icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <div class="stat-value">129</div>
                            <div class="stat-label">Usuarios Únicos</div>
                            <div class="stat-progress">
                                <div class="stat-progress-bar" style="width: 100%"></div>
                            </div>
                        </div>
                        <div class="stat-card stat-card-yellow">
                            <div class="stat-icon">
                                <i class="fa fa-file-medical"></i>
                            </div>
                            <div class="stat-value">175</div>
                            <div class="stat-label">Órdenes Solicitadas</div>
                            <div class="stat-progress">
                                <div class="stat-progress-bar" style="width: 100%"></div>
                            </div>
                        </div>
                        <div class="stat-card stat-card-green">
                            <div class="stat-icon">
                                <i class="fa fa-check-circle"></i>
                            </div>
                            <div class="stat-value">112</div>
                            <div class="stat-label">Órdenes Realizadas</div>
                            <div class="stat-progress">
                                <div class="stat-progress-bar" style="width: 64%"></div>
                            </div>
                        </div>
                        <div class="stat-card stat-card-orange">
                            <div class="stat-icon">
                                <i class="fa fa-clock"></i>
                            </div>
                            <div class="stat-value">63</div>
                            <div class="stat-label">Órdenes Pendientes</div>
                            <div class="stat-progress">
                                <div class="stat-progress-bar" style="width: 36%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Sección Centros -->
                <div class="section-container">
                    <div class="section-title">
                        <div>
                            <i class="fas fa-hospital section-icon"></i> Centros Médicos
                        </div>
                        <div class="period-label">
                            Período: <span class="period-value">Febrero 2025</span>
                        </div>
                    </div>
                    
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Centro</th>
                                <th>Órdenes Solicitadas</th>
                                <th>Órdenes Realizadas</th>
                                <th>Órdenes Pendientes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><span class="centro-badge">Imagen Plus</span></td>
                                <td class="numeric">58</td>
                                <td class="numeric">34</td>
                                <td class="numeric">24</td>
                            </tr>
                            <tr>
                                <td><span class="centro-badge">MediScan</span></td>
                                <td class="numeric">47</td>
                                <td class="numeric">31</td>
                                <td class="numeric">16</td>
                            </tr>
                            <tr>
                                <td><span class="centro-badge">Centro Imagen</span></td>
                                <td class="numeric">42</td>
                                <td class="numeric">29</td>
                                <td class="numeric">13</td>
                            </tr>
                            <tr>
                                <td><span class="centro-badge">Clínica Resonancia</span></td>
                                <td class="numeric">28</td>
                                <td class="numeric">18</td>
                                <td class="numeric">10</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <!-- Sección Traumatólogos -->
                <div class="section-container">
                    <div class="section-title">
                        <div>
                            <i class="fas fa-user-md section-icon"></i> Traumatólogos
                        </div>
                        <div class="period-label">
                            Período: <span class="period-value">Febrero 2025</span>
                        </div>
                    </div>
                    
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Traumatólogo</th>
                                <th>Órdenes Recibidas</th>
                                <th>Usuarios Recurrentes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><span class="doctor-badge">Dr. Martínez</span></td>
                                <td class="numeric">42</td>
                                <td class="numeric">15</td>
                            </tr>
                            <tr>
                                <td><span class="doctor-badge">Dra. González</span></td>
                                <td class="numeric">38</td>
                                <td class="numeric">12</td>
                            </tr>
                            <tr>
                                <td><span class="doctor-badge">Dr. Rodríguez</span></td>
                                <td class="numeric">36</td>
                                <td class="numeric">9</td>
                            </tr>
                            <tr>
                                <td><span class="doctor-badge">Dr. Pérez</span></td>
                                <td class="numeric">28</td>
                                <td class="numeric">7</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        // JavaScript para animación sencilla de las barras de progreso
        document.addEventListener('DOMContentLoaded', function() {
            // Animación de las barras de progreso
            const progressBars = document.querySelectorAll('.stat-progress-bar');
            progressBars.forEach(bar => {
                const width = bar.style.width;
                bar.style.width = '0';
                setTimeout(() => {
                    bar.style.transition = 'width 1s ease';
                    bar.style.width = width;
                }, 300);
            });
        });
    </script>
</body>
</html>