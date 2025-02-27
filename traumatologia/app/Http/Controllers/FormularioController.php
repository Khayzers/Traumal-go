<?php

namespace App\Http\Controllers;

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
            'altura' => 'required|numeric|min:100|max:250',
            'peso' => 'required|numeric|min:30|max:200',
            'rodilla' => 'required|in:izquierda,derecha,ambas',
            'subirEscaleras' => 'required|in:si,no',
            'bajarEscaleras' => 'required|in:si,no',
            'sentarse' => 'required|in:si,no',
        ]);

        // Aquí procesarías los datos (guardar en base de datos, etc.)
        
        // Redirecciona con un mensaje de éxito
        return redirect()->route('pagina.boton')
                        ->with('success', 'Formulario enviado correctamente');
    }
}