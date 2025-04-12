<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BandejaTraumatologoController extends Controller
{
    public function index()
    {
        // Lógica para obtener los datos necesarios para la vista de la bandeja del traumatólogo
        
        // Ejemplo de datos (reemplaza esto con tu lógica real)
        $solicitudes = [
            [
                'id' => 1,
                'fecha' => '22-01-2025',
                'nombre' => 'Juan Pérez',
                'rut' => '12345678-9',
                'telefono' => '+569999999',
                'rodilla' => 'Izquierda',
                'centro' => 'Centro A',
                'estado' => 'Recibida'
            ],

            [
                'id' => 2,
                'fecha' => '26-01-2025',
                'nombre' => 'Sebastián Vera',
                'rut' => '11111111-1',
                'telefono' => '+569999999',
                'rodilla' => 'Derecha',
                'centro' => 'Centro A',
                'estado' => 'Recibida'
            ],

            [
                'id' => 3,
                'fecha' => '13-02-2025',
                'nombre' => 'Nicolas Carrillo',
                'rut' => '22222222-2',
                'telefono' => '+569999999',
                'rodilla' => 'Derecha',
                'centro' => 'Centro A',
                'estado' => 'Agendada'
            ],

            [
                'id' => 4,
                'fecha' => '01-03-2025',
                'nombre' => 'Anival Lufi',
                'rut' => '33333333-3',
                'telefono' => '+569999999',
                'rodilla' => 'Ambas',
                'centro' => 'Centro A',
                'estado' => 'Agendada'
            ],

            [
                'id' => 5,
                'fecha' => '13-03-2025',
                'nombre' => 'Renzo Vergara',
                'rut' => '44444444-4',
                'telefono' => '+569999999',
                'rodilla' => 'Derecha',
                'centro' => 'Centro A',
                'estado' => 'Rechazada'
            ],

            [
                'id' => 6,
                'fecha' => '14-03-2025',
                'nombre' => 'Pablo Pérez De Tudela',
                'rut' => '55555555-5',
                'telefono' => '+569999999',
                'rodilla' => 'Izquierda',
                'centro' => 'Centro A',
                'estado' => 'Rechazada'
            ],
            // Agrega más pacientes según sea necesario
        ];
        
        $total = count($solicitudes);
        $recibidas = count(array_filter($solicitudes, function($paciente) {
            return $paciente['estado'] == 'Recibida';
        }));
        $agendadas = count(array_filter($solicitudes, function($paciente) {
            return $paciente['estado'] == 'Agendada';
        }));
        
        $rechazadas = count(array_filter($solicitudes, function($paciente) {
            return $paciente['estado'] == 'Rechazada';
        }));

        $pendientes = $total - ($recibidas + $agendadas + $rechazadas);

        return view('bandeja.traumatologo.index', compact('solicitudes', 'total', 'pendientes', 'recibidas', 'agendadas', 'rechazadas'));
        }
    
    public function revisar($id)
    {
        // Lógica para marcar una solicitud como revisada
        
        // Ejemplo de actualización del estado (reemplaza esto con tu lógica real)
        // Aquí puedes actualizar el estado en tu base de datos
        
        return redirect()->route('bandeja.traumatologo')->with('success', 'Solicitud marcada como revisada.');
    }
    
    public function contactar($id)
    {
        // Lógica para marcar una solicitud como contactada
        
        // Ejemplo de actualización del estado (reemplaza esto con tu lógica real)
        // Aquí puedes actualizar el estado en tu base de datos
        
        return redirect()->route('bandeja.traumatologo')->with('success', 'Solicitud marcada como contactada.');
    }
}