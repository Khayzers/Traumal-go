<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TraumaMed - Sistema de Gestión de Órdenes de Examen</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

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