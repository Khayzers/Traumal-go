<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Muestra el dashboard con datos de muestra
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Datos estáticos de muestra para el prototipo
        $datos = [
            // Estadísticas principales
            'totalSolicitudes' => 42,
            'solicitudesCentro' => 25,
            'solicitudesTraumatologo' => 17, 
            'solicitudesCompletadasHoy' => 12,
            
            // Datos para el gráfico semanal
            'datosGrafico' => [
                ['dia' => 'Lunes', 'valor' => 8],
                ['dia' => 'Martes', 'valor' => 12],
                ['dia' => 'Miércoles', 'valor' => 9],
                ['dia' => 'Jueves', 'valor' => 14],
                ['dia' => 'Viernes', 'valor' => 11],
                ['dia' => 'Sábado', 'valor' => 7],
                ['dia' => 'Domingo', 'valor' => 4]
            ],
            
            // Distribución por centros médicos
            'distribucionCentros' => [
                ['nombre' => 'Imagen Plus', 'solicitudes_count' => 12],
                ['nombre' => 'MediScan', 'solicitudes_count' => 8],
                ['nombre' => 'Centro Imagen', 'solicitudes_count' => 10],
                ['nombre' => 'Clínica Resonancia', 'solicitudes_count' => 12]
            ],
            
            // Distribución por traumatólogos
            'distribucionTraumatologos' => [
                ['nombre' => 'Dr. Martínez', 'solicitudes_count' => 6],
                ['nombre' => 'Dra. González', 'solicitudes_count' => 4],
                ['nombre' => 'Dr. Rodríguez', 'solicitudes_count' => 5],
                ['nombre' => 'Dr. Pérez', 'solicitudes_count' => 2]
            ]
        ];
        
        return view('dashboard.index', $datos);
    }
}