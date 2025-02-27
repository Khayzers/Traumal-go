<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BandejaTraumatologoController extends Controller
{
    public function index()
    {
        // Lógica para obtener los datos necesarios para la vista de la bandeja del traumatólogo
        
        // Ejemplo de datos (reemplaza esto con tu lógica real)
        $pacientes = [
            [
                'id' => 1,
                'fecha' => '2023-05-22',
                'nombre' => 'Juan Pérez',
                'rut' => '12345678-9',
                'telefono' => '+56912345678',
                'rodilla' => 'Izquierda',
                'centro' => 'Centro A',
                'estado' => 'recibida'
            ],
            // Agrega más pacientes según sea necesario
        ];
        
        $total = count($pacientes);
        $pendientes = count(array_filter($pacientes, function($paciente) {
            return $paciente['estado'] == 'recibida';
        }));
        $revisadas = count(array_filter($pacientes, function($paciente) {
            return $paciente['estado'] == 'revisada';
        }));
        $contactadas = count(array_filter($pacientes, function($paciente) {
            return $paciente['estado'] == 'contactada';
        }));
        
        return view('bandeja.traumatologo.index', compact('pacientes', 'total', 'pendientes', 'revisadas', 'contactadas'));
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