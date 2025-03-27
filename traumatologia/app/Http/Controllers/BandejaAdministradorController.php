<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BandejaAdministradorController extends Controller
{
    public function index()
    {
        // Datos de ejemplo para el dashboard del administrador
        $estadisticas = [
            'solicitudes_totales' => 145,
            'solicitudes_mes' => 37,
            'usuarios_activos' => 24,
            'tiempo_promedio' => '2.3 días'
        ];

        // Solicitudes recientes para mostrar en el dashboard
        $solicitudes_recientes = [
            [
                'id' => 'SO-1253',
                'fecha' => '25/02/2025',
                'paciente' => 'Roberto Gómez Morales',
                'rut' => '12.345.678-9',
                'rodilla' => 'Izquierda',
                'traumatologo' => 'Traumatólogo 1',
                'estado' => 'respondido'
            ],
            [
                'id' => 'SO-1252',
                'fecha' => '25/02/2025',
                'paciente' => 'María Eugenia Campos',
                'rut' => '14.562.987-0',
                'rodilla' => 'Derecha',
                'traumatologo' => 'Traumatólogo 2',
                'estado' => 'visado'
            ],
            [
                'id' => 'SO-1251',
                'fecha' => '25/02/2025',
                'paciente' => 'Pedro Fernández Silva',
                'rut' => '17.890.123-4',
                'rodilla' => 'Ambas',
                'traumatologo' => 'Traumatólogo 3',
                'estado' => 'visado'
            ],
            [
                'id' => 'SO-1250',
                'fecha' => '24/02/2025',
                'paciente' => 'Luisa Martínez Rodríguez',
                'rut' => '9.876.543-2',
                'rodilla' => 'Izquierda',
                'traumatologo' => 'Traumatólogo 4',
                'estado' => 'visado'
            ],
            [
                'id' => 'SO-1249',
                'fecha' => '24/02/2025',
                'paciente' => 'José Carlos Araya',
                'rut' => '13.456.789-1',
                'rodilla' => 'Derecha',
                'traumatologo' => 'Traumatólogo 5',
                'estado' => 'pendiente'
            ]
        ];

        // Lista de actividades recientes
        $actividades = [
            [
                'usuario' => 'Admin Principal',
                'accion' => 'Creó nuevo usuario',
                'detalle' => 'Dr. Carlos Fuentes (Traumatólogo)',
                'fecha' => '26/02/2025 14:30'
            ],
            [
                'usuario' => 'Tecnólogo 2',
                'accion' => 'Subió informe',
                'detalle' => 'Solicitud SO-1251',
                'fecha' => '25/02/2025 16:45'
            ],
            [
                'usuario' => 'Traumatólogo 1',
                'accion' => 'Creó solicitud',
                'detalle' => 'Paciente Roberto Gómez',
                'fecha' => '25/02/2025 10:15'
            ],
            [
                'usuario' => 'Admin Principal',
                'accion' => 'Actualización de sistema',
                'detalle' => 'Versión 2.3.1',
                'fecha' => '24/02/2025 08:30'
            ],
            [
                'usuario' => 'Tecnólogo 1',
                'accion' => 'Subió informe',
                'detalle' => 'Solicitud SO-1248',
                'fecha' => '24/02/2025 15:20'
            ]
        ];

        return view('bandeja.administrador.index', compact('estadisticas', 'solicitudes_recientes', 'actividades'));
    }

    public function usuarios()
    {
        // Datos de ejemplo para la gestión de usuarios
        $usuarios = [
            [
                'id' => 1,
                'nombre' => 'Admin Principal',
                'email' => 'admin@traumamed.cl',
                'rol' => 'Administrador',
                'estado' => 'Activo',
                'ultimo_acceso' => '26/02/2025 16:45'
            ],
            [
                'id' => 2,
                'nombre' => 'Dr. Juan Pérez',
                'email' => 'jperez@traumamed.cl',
                'rol' => 'Traumatólogo',
                'estado' => 'Activo',
                'ultimo_acceso' => '26/02/2025 14:30'
            ],
            [
                'id' => 3,
                'nombre' => 'Dra. Ana López',
                'email' => 'alopez@traumamed.cl',
                'rol' => 'Traumatólogo',
                'estado' => 'Activo',
                'ultimo_acceso' => '25/02/2025 11:20'
            ],
            [
                'id' => 4,
                'nombre' => 'Mario Soto',
                'email' => 'msoto@traumamed.cl',
                'rol' => 'Tecnólogo',
                'estado' => 'Activo',
                'ultimo_acceso' => '26/02/2025 09:15'
            ],
            [
                'id' => 5,
                'nombre' => 'Carmen Vargas',
                'email' => 'cvargas@traumamed.cl',
                'rol' => 'Tecnólogo',
                'estado' => 'Activo',
                'ultimo_acceso' => '26/02/2025 13:45'
            ],
            [
                'id' => 6,
                'nombre' => 'Dr. Roberto Fuentes',
                'email' => 'rfuentes@traumamed.cl',
                'rol' => 'Traumatólogo',
                'estado' => 'Inactivo',
                'ultimo_acceso' => '15/02/2025 10:30'
            ],
            [
                'id' => 7,
                'nombre' => 'Sandra Muñoz',
                'email' => 'smunoz@traumamed.cl',
                'rol' => 'Centro',
                'estado' => 'Activo',
                'ultimo_acceso' => '26/02/2025 15:20'
            ],
            [
                'id' => 8,
                'nombre' => 'Rodrigo Lizama',
                'email' => 'rlizama@traumamed.cl',
                'rol' => 'Centro',
                'estado' => 'Activo',
                'ultimo_acceso' => '26/02/2025 12:10'
            ],
            [
                'id' => 9,
                'nombre' => 'Patricia Jiménez',
                'email' => 'pjimenez@traumamed.cl',
                'rol' => 'Tecnólogo',
                'estado' => 'Activo',
                'ultimo_acceso' => '25/02/2025 16:40'
            ],
            [
                'id' => 10,
                'nombre' => 'Dr. Carlos Méndez',
                'email' => 'cmendez@traumamed.cl',
                'rol' => 'Traumatólogo',
                'estado' => 'Activo',
                'ultimo_acceso' => '26/02/2025 08:50'
            ]
        ];

        // Roles disponibles para crear/editar usuarios
        $roles = ['Administrador', 'Traumatólogo', 'Tecnólogo', 'Centro'];

        return view('bandeja.administrador.usuarios', compact('usuarios', 'roles'));
    }

    public function estadisticas()
    {
        // Datos de ejemplo para las estadísticas
        $datos_mensuales = [
            [
                'mes' => 'Enero',
                'solicitudes' => 28,
                'tiempo_respuesta' => 2.5,
                'satisfaccion' => 4.2
            ],
            [
                'mes' => 'Febrero',
                'solicitudes' => 36,
                'tiempo_respuesta' => 2.3,
                'satisfaccion' => 4.3
            ],
            [
                'mes' => 'Marzo',
                'solicitudes' => 42,
                'tiempo_respuesta' => 2.1,
                'satisfaccion' => 4.4
            ],
            [
                'mes' => 'Abril',
                'solicitudes' => 35,
                'tiempo_respuesta' => 2.2,
                'satisfaccion' => 4.3
            ],
            [
                'mes' => 'Mayo',
                'solicitudes' => 40,
                'tiempo_respuesta' => 2.0,
                'satisfaccion' => 4.5
            ],
            [
                'mes' => 'Junio',
                'solicitudes' => 38,
                'tiempo_respuesta' => 2.2,
                'satisfaccion' => 4.4
            ]
        ];

        // Estadísticas por traumatólogo
        $estadisticas_traumatologos = [
            [
                'nombre' => 'Dr. Juan Pérez',
                'solicitudes' => 42,
                'tiempo_promedio' => 1.8,
                'satisfaccion' => 4.6
            ],
            [
                'nombre' => 'Dra. Ana López',
                'solicitudes' => 35,
                'tiempo_promedio' => 2.1,
                'satisfaccion' => 4.4
            ],
            [
                'nombre' => 'Dr. Roberto Fuentes',
                'solicitudes' => 28,
                'tiempo_promedio' => 2.5,
                'satisfaccion' => 4.1
            ],
            [
                'nombre' => 'Dr. Carlos Méndez',
                'solicitudes' => 38,
                'tiempo_promedio' => 2.0,
                'satisfaccion' => 4.5
            ]
        ];

        // Distribución por tipo de rodilla
        $distribucion_rodilla = [
            'Izquierda' => 35,
            'Derecha' => 40,
            'Ambas' => 25
        ];

        return view('bandeja.administrador.estadisticas', compact('datos_mensuales', 'estadisticas_traumatologos', 'distribucion_rodilla'));
    }

    public function crearUsuario(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'rol' => 'required|in:Administrador,Traumatólogo,Tecnólogo,Centro'
        ]);

        // En un entorno real, aquí crearíamos el usuario en la BD
        // Por ahora solo redirigimos con un mensaje de éxito

        return redirect()->route('bandeja.administrador.usuarios')
            ->with('success', 'Usuario creado correctamente');
    }

    public function editarUsuario(Request $request, $id)
    {
        // Validar la solicitud
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email',
            'rol' => 'required|in:Administrador,Traumatólogo,Tecnólogo,Centro',
            'estado' => 'required|in:Activo,Inactivo'
        ]);

        // En un entorno real, aquí actualizaríamos el usuario en la BD
        // Por ahora solo redirigimos con un mensaje de éxito

        return redirect()->route('bandeja.administrador.usuarios')
            ->with('success', "Usuario ID $id actualizado correctamente");
    }

    public function eliminarUsuario($id)
    {
        // En un entorno real, aquí eliminaríamos o desactivaríamos el usuario en la BD
        // Por ahora solo redirigimos con un mensaje de éxito

        return redirect()->route('bandeja.administrador.usuarios')
            ->with('success', "Usuario ID $id eliminado correctamente");
    }

    public function generarReporte(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'tipo_reporte' => 'required|in:solicitudes,usuarios,traumatologos',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio'
        ]);

        $tipo = $request->tipo_reporte;
        $fechaInicio = $request->fecha_inicio;
        $fechaFin = $request->fecha_fin;

        // En un entorno real, aquí generaríamos el reporte basado en los datos de la BD
        // Por ahora solo redirigimos con un mensaje

        return redirect()->route('bandeja.administrador.estadisticas')
            ->with('success', "Reporte de $tipo generado correctamente para el período $fechaInicio - $fechaFin");
    }
}