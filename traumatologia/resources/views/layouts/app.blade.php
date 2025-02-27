<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TraumaMed - Panel Administrativo</title>
    <style>
        :root {
            --azul-medico: #1A73E8;
            --azul-claro: #d0e3ff;
            --azul-oscuro: #0D47A1;
            --naranja-suave: #FF9966;
            --verde-exito: #4CAF50;
            --verde-claro: #E8F5E9;
            --rojo-error: #F44336;
            --rojo-claro: #FFEBEE;
            --amarillo: #FFC107;
            --amarillo-claro: #FFF8E1;
            --blanco: #ffffff;
            --gris-claro: #f5f7fa;
            --gris: #E0E0E0;
            --texto-oscuro: #2D3748;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--gris-claro);
            color: var(--texto-oscuro);
            line-height: 1.6;
        }
        
        /* Agregar aquí todos los estilos necesarios para la bandeja */
        
        /* Estilos para la navbar */
        .navbar {
            background-color: var(--azul-medico);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            padding: 15px 0;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .navbar-brand {
            display: flex;
            align-items: center;
            text-decoration: none;
        }
        
        .navbar-nav {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
        }
        
        .nav-item {
            margin-left: 20px;
        }
        
        .nav-link {
            color: white;
            text-decoration: none;
        }
        
        .nav-link.active {
            font-weight: 600;
        }
    </style>
    @yield('styles')
</head>
<body>
    <!-- Navbar -->
    <nav style="background-color: #1A73E8; padding: 15px 0; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
        <div style="max-width: 1200px; margin: 0 auto; padding: 0 20px; display: flex; justify-content: space-between; align-items: center;">
            <a href="{{ route('inicio') }}" style="display: flex; align-items: center; text-decoration: none;">
                <div style="width: 40px; height: 40px; background-color: #1A73E8; clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%); display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; font-size: 22px;">T</div>
                <span style="color: white; font-weight: 700; font-size: 22px; margin-left: 10px;">Trauma<span style="color: #FF9966;">Med</span></span>
            </a>
            
            <ul style="display: flex; list-style-type: none; margin: 0; padding: 0;">
                <li>
                    <a href="{{ route('inicio') }}" style="color: white; text-decoration: none; font-weight: {{ request()->routeIs('inicio') ? '600' : '400' }}; padding: 8px 16px; border-radius: 4px; {{ request()->routeIs('inicio') ? 'background-color: rgba(255,255,255,0.2);' : '' }}">Inicio</a>
                </li>
                <li style="margin-left: 10px;">
                    <a href="{{ route('bandeja.solicitudes') }}" style="color: white; text-decoration: none; font-weight: {{ request()->routeIs('bandeja.solicitudes') ? '600' : '400' }}; padding: 8px 16px; border-radius: 4px; {{ request()->routeIs('bandeja.solicitudes') ? 'background-color: rgba(255,255,255,0.2);' : '' }}">Bandeja Centro</a>
                </li>
                <li style="margin-left: 10px;">
                    <a href="{{ route('bandeja.solicitudes') }}" style="color: white; text-decoration: none; font-weight: {{ request()->routeIs('bandeja.traumatologo') ? '600' : '400' }}; padding: 8px 16px; border-radius: 4px; {{ request()->routeIs('bandeja.traumatologo') ? 'background-color: rgba(255,255,255,0.2);' : '' }}">Bandeja Traumatólogo</a>
                </li>
            </ul>
        </div>
    </nav>

    @yield('content')
    
    <div style="text-align: center; padding: 30px 20px; font-size: 14px; color: #718096; background-color: var(--blanco); border-top: 1px solid #E2E8F0; margin-top: 30px;">
        <div class="container">
            TraumaMed - Centro Especializado en Traumatología y Ortopedia | Todos los derechos reservados © 2025
        </div>
    </div>

    @yield('scripts')
</body>
</html>