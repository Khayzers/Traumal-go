<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// No importamos el modelo Solicitud ya que no lo usaremos
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class ExamenController extends Controller
{
    /**
     * Datos de ejemplo para trabajar sin BD
     */
    private function getSolicitudes()
    {
        return [
            'SO-1253' => [
                'id' => 'SO-1253',
                'fecha' => '25/02/2025',
                'paciente' => 'Roberto Gómez Morales',
                'rut' => '12.345.678-9',
                'rodilla' => 'Izquierda',
                'traumatologo' => 'JORGE EDUARDO CARO DIAZ',
                'rut_traumatologo' => '15.946.308-7',
                'estado' => 'pendiente'
            ],
            'SO-1252' => [
                'id' => 'SO-1252',
                'fecha' => '25/02/2025',
                'paciente' => 'María Eugenia Campos',
                'rut' => '14.562.987-0',
                'rodilla' => 'Derecha',
                'traumatologo' => 'CARMEN GLORIA PÉREZ SILVA',
                'rut_traumatologo' => '9.876.543-2',
                'estado' => 'pendiente'
            ],
            'SO-1251' => [
                'id' => 'SO-1251',
                'fecha' => '25/02/2025',
                'paciente' => 'Pedro Fernández Silva',
                'rut' => '17.890.123-4',
                'rodilla' => 'Ambas',
                'traumatologo' => 'MIGUEL ÁNGEL ROJAS MUÑOZ',
                'rut_traumatologo' => '11.222.333-4',
                'estado' => 'aprobada'
            ],
            'SO-1250' => [
                'id' => 'SO-1250',
                'fecha' => '24/02/2025',
                'paciente' => 'Luisa Martínez Rodríguez',
                'rut' => '9.876.543-2',
                'rodilla' => 'Izquierda',
                'traumatologo' => 'JORGE EDUARDO CARO DIAZ',
                'rut_traumatologo' => '15.946.308-7',
                'estado' => 'enviada'
            ],
            'SO-1249' => [
                'id' => 'SO-1249',
                'fecha' => '24/02/2025',
                'paciente' => 'José Carlos Araya',
                'rut' => '13.456.789-1',
                'rodilla' => 'Derecha',
                'traumatologo' => 'CARMEN GLORIA PÉREZ SILVA',
                'rut_traumatologo' => '9.876.543-2',
                'estado' => 'pendiente'
            ],
            'SO-1248' => [
                'id' => 'SO-1248',
                'fecha' => '24/02/2025',
                'paciente' => 'Catalina Vega Mendoza',
                'rut' => '15.678.912-3',
                'rodilla' => 'Ambas',
                'traumatologo' => 'MIGUEL ÁNGEL ROJAS MUÑOZ',
                'rut_traumatologo' => '11.222.333-4',
                'estado' => 'rechazada'
            ],
            'SO-1247' => [
                'id' => 'SO-1247',
                'fecha' => '23/02/2025',
                'paciente' => 'Fernando Valenzuela',
                'rut' => '8.765.432-1',
                'rodilla' => 'Derecha',
                'traumatologo' => 'JORGE EDUARDO CARO DIAZ',
                'rut_traumatologo' => '15.946.308-7',
                'estado' => 'aprobada'
            ],
            'SO-1246' => [
                'id' => 'SO-1246',
                'fecha' => '23/02/2025',
                'paciente' => 'Carla Muñoz Pinto',
                'rut' => '16.789.012-5',
                'rodilla' => 'Izquierda',
                'traumatologo' => 'CARMEN GLORIA PÉREZ SILVA',
                'rut_traumatologo' => '9.876.543-2',
                'estado' => 'enviada'
            ],
            'SO-1245' => [
                'id' => 'SO-1245',
                'fecha' => '23/02/2025',
                'paciente' => 'Jorge Fuentes Lagos',
                'rut' => '11.234.567-8',
                'rodilla' => 'Derecha',
                'traumatologo' => 'MIGUEL ÁNGEL ROJAS MUÑOZ',
                'rut_traumatologo' => '11.222.333-4',
                'estado' => 'pendiente'
            ],
            'SO-1244' => [
                'id' => 'SO-1244',
                'fecha' => '22/02/2025',
                'paciente' => 'Ana León Contreras',
                'rut' => '18.901.234-5',
                'rodilla' => 'Ambas',
                'traumatologo' => 'JORGE EDUARDO CARO DIAZ',
                'rut_traumatologo' => '15.946.308-7',
                'estado' => 'aprobada'
            ]
        ];
    }
    
    /**
     * Encuentra una solicitud por su ID
     */
    private function findSolicitud($id)
    {
        $solicitudes = $this->getSolicitudes();
        
        if (isset($solicitudes[$id])) {
            return (object) $solicitudes[$id]; // Convertir a objeto
        }
        
        abort(404, 'Solicitud no encontrada');
    }

    /**
     * Muestra la vista con el orden de examen.
     *
     * @param string $id
     * @return \Illuminate\View\View
     */
    public function mostrarOrden($id)
    {
        // Obtener la solicitud desde los datos de ejemplo
        $solicitud = $this->findSolicitud($id);
        
        return view('examenes.orden', compact('solicitud'));
    }
    
    /**
     * Genera o devuelve el PDF de la orden.
     *
     * @param string $id
     * @return \Illuminate\Http\Response
     */
    public function mostrarPDF($id)
    {
        // Obtener la solicitud desde los datos de ejemplo
        $solicitud = $this->findSolicitud($id);
        
        // Si tienes un PDF de ejemplo, podrías usarlo
        if (Storage::exists('examenes/orden_ejemplo.pdf')) {
            return Response::file(storage_path('app/examenes/orden_ejemplo.pdf'));
        }
        
        // Solución temporal para demostración - redirige a un PDF de ejemplo
        return redirect('https://archivo-pdf-ejemplo.s3.amazonaws.com/orden_ejemplo.pdf');
    }
}