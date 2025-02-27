<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BandejaController extends Controller
{
    public function index()
    {
        // Datos de ejemplo para la bandeja
        $solicitudes = [
            [
                'id' => 'SO-1253',
                'fecha' => '25/02/2025',
                'paciente' => 'Roberto Gómez Morales',
                'rut' => '12.345.678-9',
                'rodilla' => 'Izquierda',
                'estado' => 'pendiente'
            ],
            [
                'id' => 'SO-1252',
                'fecha' => '25/02/2025',
                'paciente' => 'María Eugenia Campos',
                'rut' => '14.562.987-0',
                'rodilla' => 'Derecha',
                'estado' => 'pendiente'
            ],
            [
                'id' => 'SO-1251',
                'fecha' => '25/02/2025',
                'paciente' => 'Pedro Fernández Silva',
                'rut' => '17.890.123-4',
                'rodilla' => 'Ambas',
                'estado' => 'aprobada'
            ],
            [
                'id' => 'SO-1250',
                'fecha' => '24/02/2025',
                'paciente' => 'Luisa Martínez Rodríguez',
                'rut' => '9.876.543-2',
                'rodilla' => 'Izquierda',
                'estado' => 'enviada'
            ],
            [
                'id' => 'SO-1249',
                'fecha' => '24/02/2025',
                'paciente' => 'José Carlos Araya',
                'rut' => '13.456.789-1',
                'rodilla' => 'Derecha',
                'estado' => 'pendiente'
            ],
            [
                'id' => 'SO-1248',
                'fecha' => '24/02/2025',
                'paciente' => 'Catalina Vega Mendoza',
                'rut' => '15.678.912-3',
                'rodilla' => 'Ambas',
                'estado' => 'rechazada'
            ],
            [
                'id' => 'SO-1247',
                'fecha' => '23/02/2025',
                'paciente' => 'Fernando Valenzuela',
                'rut' => '8.765.432-1',
                'rodilla' => 'Derecha',
                'estado' => 'aprobada'
            ],
            [
                'id' => 'SO-1246',
                'fecha' => '23/02/2025',
                'paciente' => 'Carla Muñoz Pinto',
                'rut' => '16.789.012-5',
                'rodilla' => 'Izquierda',
                'estado' => 'enviada'
            ],
            [
                'id' => 'SO-1245',
                'fecha' => '23/02/2025',
                'paciente' => 'Jorge Fuentes Lagos',
                'rut' => '11.234.567-8',
                'rodilla' => 'Derecha',
                'estado' => 'pendiente'
            ],
            [
                'id' => 'SO-1244',
                'fecha' => '22/02/2025',
                'paciente' => 'Ana León Contreras',
                'rut' => '18.901.234-5',
                'rodilla' => 'Ambas',
                'estado' => 'aprobada'
            ]
        ];

        // Contadores para las estadísticas
        $total = count($solicitudes);
        $pendientes = count(array_filter($solicitudes, function($item) {
            return $item['estado'] === 'pendiente';
        }));
        $aprobadas = count(array_filter($solicitudes, function($item) {
            return $item['estado'] === 'aprobada';
        }));
        $enviadas = count(array_filter($solicitudes, function($item) {
            return $item['estado'] === 'enviada';
        }));

        // Change this line to match your view path
        return view('bandeja.centro.index', compact('solicitudes', 'total', 'pendientes', 'aprobadas', 'enviadas'));
    }

    public function aprobar($id)
    {
        // En un entorno real, aquí actualizaríamos la BD
        // Por ahora solo redirigimos con un mensaje
        return redirect()->route('bandeja.solicitudes')
            ->with('success', "Solicitud $id aprobada correctamente");
    }

    public function rechazar($id)
    {
        // En un entorno real, aquí actualizaríamos la BD
        // Por ahora solo redirigimos con un mensaje
        return redirect()->route('bandeja.solicitudes')
            ->with('success', "Solicitud $id rechazada correctamente");
    }
}