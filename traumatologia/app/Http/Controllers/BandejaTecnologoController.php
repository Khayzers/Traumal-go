<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BandejaTecnologoController extends Controller
{
    public function index()
    {
        // Datos de ejemplo para la bandeja de tecnólogo
        // Enfocado en solicitudes que están en estado "visado"
        $solicitudes = [
            [
                'id' => 'SO-1252',
                'fecha' => '25/02/2025',
                'paciente' => 'María Eugenia Campos',
                'rut' => '14.562.987-0',
                'rodilla' => 'Derecha',
                'traumatologo' => 'Traumatólogo 2',
                'rut_traumatologo' => '22222222-2',
                'estado' => 'visado'
            ],
            [
                'id' => 'SO-1251',
                'fecha' => '25/02/2025',
                'paciente' => 'Pedro Fernández Silva',
                'rut' => '17.890.123-4',
                'rodilla' => 'Ambas',
                'traumatologo' => 'Traumatólogo 3',
                'rut_traumatologo' => '33333333-3',
                'estado' => 'visado'
            ],
            [
                'id' => 'SO-1250',
                'fecha' => '24/02/2025',
                'paciente' => 'Luisa Martínez Rodríguez',
                'rut' => '9.876.543-2',
                'rodilla' => 'Izquierda',
                'traumatologo' => 'Traumatólogo 4',
                'rut_traumatologo' => '44444444-4',
                'estado' => 'visado'
            ],
            [
                'id' => 'SO-1253',
                'fecha' => '25/02/2025',
                'paciente' => 'Roberto Gómez Morales',
                'rut' => '12.345.678-9',
                'rodilla' => 'Izquierda',
                'traumatologo' => 'Traumatólogo 1',
                'rut_traumatologo' => '11111111-1',
                'estado' => 'respondido'
            ]
        ];

        // Contadores para las estadísticas
        $total = count($solicitudes);
        $visadas = count(array_filter($solicitudes, function($item) {
            return $item['estado'] === 'visado';
        }));
        $respondidas = count(array_filter($solicitudes, function($item) {
            return $item['estado'] === 'respondido';
        }));

        return view('bandeja.tecnologo.index', compact('solicitudes', 'total', 'visadas', 'respondidas'));
    }

    public function subirInforme($id)
    {
        // En un entorno real, buscaríamos la solicitud por su ID
        // Para este ejemplo, simulamos que la encontramos
        $solicitud = [
            'id' => $id,
            'paciente' => 'Paciente de Ejemplo',
            'rut' => '12.345.678-9',
            'rodilla' => 'Derecha',
            'fecha' => '25/02/2025',
            'estado' => 'visado'
        ];

        // Si la solicitud no está visada, redirigir con un mensaje
        if ($solicitud['estado'] !== 'visado') {
            return redirect()->route('bandeja.tecnologo')
                ->with('error', "La solicitud $id no está en estado visado");
        }

        return view('bandeja.tecnologo.subir', compact('solicitud'));
    }

    public function guardarInforme(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'solicitud_id' => 'required',
            'pdf_file' => 'required|mimes:pdf|max:10240', // 10MB máx
        ]);

        $id = $request->solicitud_id;

        // En un entorno real, aquí manejaríamos el archivo
        if ($request->hasFile('pdf_file')) {
            $file = $request->file('pdf_file');
            
            // Guardar el archivo
            // En producción, podría usar Storage::disk('public') o algún otro disco
            $path = $file->store('informes', 'public');
            
            // Actualizar el estado de la solicitud a "respondido"
            // En un entorno real, aquí actualizaríamos la BD

            return redirect()->route('bandeja.tecnologo')
                ->with('success', "Informe subido correctamente para la solicitud $id");
        }

        return redirect()->route('bandeja.tecnologo')
            ->with('error', "Hubo un problema al subir el archivo");
    }
}