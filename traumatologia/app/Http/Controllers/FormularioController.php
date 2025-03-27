<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Http\Request;

class FormularioController extends Controller
{
    /**
     * Muestra la página con el botón.
     */
    public function index()
    {
        return view('pagina-con-boton');
    }

    /**
     * Muestra el formulario de evaluación.
     */
    public function formulario()
    {
        return view('formulario');
    }

    /**
     * Procesa los datos del formulario enviado.
     */
    public function guardarFormulario(Request $request)
    {
        // Valida los datos
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'rut' => 'required|string|max:12',
            'fechaNacimiento' => 'required|date',
            'telefono' => 'required|string',
            'email' => 'required|email',
            'altura' => 'required|numeric|min:100|max:250',
            'peso' => 'required|numeric|min:30|max:200',
            'rodilla' => 'required|in:izquierda,derecha,ambas',
            'subirEscaleras' => 'required|in:si,no',
            'bajarEscaleras' => 'required|in:si,no',
            'sentarse' => 'required|in:si,no',
            'comuna' => 'required|string',
            'centro' => 'required|string',
        ]);

        // Crear nueva solicitud en la base de datos
        $solicitud = new Solicitud();
        $solicitud->nombre = $validated['nombre'];
        $solicitud->rut = $validated['rut'];
        $solicitud->fecha_nacimiento = $validated['fechaNacimiento'];
        $solicitud->altura = $validated['altura'];
        $solicitud->peso = $validated['peso'];
        $solicitud->rodilla = $validated['rodilla'];
        $solicitud->subir_escaleras = $validated['subirEscaleras'];
        $solicitud->bajar_escaleras = $validated['bajarEscaleras'];
        $solicitud->sentarse = $validated['sentarse'];
        $solicitud->comuna = $validated['comuna'];
        $solicitud->centro_id = $validated['centro'];
        $solicitud->estado = 'pendiente';
        
        // Añadir teléfono y email al modelo
        $solicitud->telefono = $validated['telefono'];
        $solicitud->email = $validated['email'];
        
        $solicitud->save();

        // Devuelve respuesta JSON con los datos necesarios para el modal
        return response()->json([
            'success' => true,
            'data' => [
                'nombre' => $solicitud->nombre,
                'rut' => $solicitud->rut,
                'email' => $validated['email'],
                'centro' => $request->input('centro_nombre') // Este campo debe ser enviado desde el formulario
            ]
        ]);
    }
}