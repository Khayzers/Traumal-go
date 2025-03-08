<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orden de Resonancia Gratuita - TraumaMed</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <style>
        /* Estilos para el modal */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .modal-container {
            background-color: white;
            width: 90%;
            max-width: 600px;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            max-height: 80vh;
            overflow-y: auto;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }

        .modal-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #777;
        }

        .modal-body {
            margin-bottom: 20px;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .btn-cancelar {
            background-color: #f2f2f2;
            color: #333;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }

        .btn-aceptar {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }

        .terminos-container {
            max-height: 300px;
            overflow-y: auto;
            padding: 10px;
            border: 1px solid #eee;
            border-radius: 4px;
            margin-bottom: 20px;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    @include('partials.navbar')
    
    <div class="container">
        <!-- Contenido original -->
        <div class="main-content">
            <div class="free-tag">¡GRATIS!</div>
            <div class="background-element"></div>
            <div class="knee-indicator"></div>
            <div class="medical-cross"></div>
            
            <div class="content-overlay">
                <div class="mri-icon"></div>
                <h1 class="title">Orden de Resonancia Magnética Gratuita</h1>
                <div class="subtitle">Enviamos la orden directamente al centro que elijas</div>
                
                <p class="description">Complete nuestro formulario de evaluación para obtener una orden de resonancia magnética <strong>totalmente gratuita</strong>. Nuestros especialistas analizarán su caso y enviarán la orden directamente al centro médico que usted elija, sin costo alguno.</p>
                
                <div class="benefits">
                    <div class="benefit-item">
                        <div class="benefit-icon">💯</div>
                        <div class="benefit-title">Completamente Gratuito</div>
                        <div class="benefit-text">Sin costos ocultos ni compromiso de pago</div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">⏱️</div>
                        <div class="benefit-title">Envío Directo</div>
                        <div class="benefit-text">Gestionamos todo con el centro que elijas</div>
                    </div>
                    <div class="benefit-item">
                        <div class="benefit-icon">👨‍⚕️</div>
                        <div class="benefit-title">Evaluación Profesional</div>
                        <div class="benefit-text">Validada por traumatólogos especializados</div>
                    </div>
                </div>
                
                <!-- Botón modificado para abrir el modal -->
                <button id="btnSolicitar" class="btn-redirect">Solicitar Orden Gratuita</button>
                
                <p class="disclaimer">* La orden de resonancia es completamente gratuita y se emite luego de una evaluación de su caso. En el formulario podrá seleccionar el centro médico de su preferencia dentro de nuestra red de centros afiliados. Nosotros nos encargamos de enviar la orden directamente al centro elegido y coordinar su cita. Consulte disponibilidad según su zona geográfica.</p>
            </div>
        </div>
    </div>
    
    <!-- Modal de Términos y Condiciones -->
    <div class="modal-overlay" id="modalTerminos">
        <div class="modal-container">
            <div class="modal-header">
                <div class="modal-title">Términos y Condiciones</div>
                <button class="modal-close" id="btnCerrarModal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="terminos-container">
                    <h3>TÉRMINOS Y CONDICIONES DE SERVICIO</h3>
                    <p>Al utilizar el servicio de TraumaMed para solicitar una orden de resonancia magnética gratuita, usted acepta los siguientes términos y condiciones:</p>
                    
                    <h4>1. DESCRIPCIÓN DEL SERVICIO</h4>
                    <p>TraumaMed ofrece la gestión de órdenes de resonancia magnética gratuitas para pacientes que cumplan con los criterios de evaluación médica establecidos por nuestro equipo de especialistas.</p>
                    
                    <h4>2. PROCESO DE EVALUACIÓN</h4>
                    <p>Para acceder al servicio, usted deberá completar el formulario de evaluación proporcionando información veraz y precisa sobre su condición médica. La emisión de la orden está sujeta a la valoración de nuestros profesionales.</p>
                    
                    <h4>3. GRATUIDAD DEL SERVICIO</h4>
                    <p>La emisión de la orden de resonancia magnética es completamente gratuita. Sin embargo, esto no implica que el estudio en sí sea gratuito. La cobertura del estudio dependerá de los acuerdos entre TraumaMed y los centros afiliados, así como de su cobertura médica personal.</p>
                    
                    <h4>4. RED DE CENTROS AFILIADOS</h4>
                    <p>TraumaMed trabaja con una red limitada de centros médicos afiliados. La disponibilidad de centros varía según la zona geográfica y está sujeta a cambios sin previo aviso.</p>
                    
                    <h4>5. USO DE DATOS PERSONALES</h4>
                    <p>Al completar el formulario, usted autoriza a TraumaMed a recopilar, almacenar y procesar sus datos personales y médicos con el fin de evaluar su caso y gestionar la orden de resonancia magnética. Sus datos serán compartidos únicamente con el centro médico elegido.</p>
                    
                    <h4>6. CONTACTO POSTERIOR</h4>
                    <p>Al aceptar estos términos, usted autoriza a TraumaMed a contactarle para realizar seguimiento de su caso, informarle sobre el estado de su orden y ofrecerle servicios relacionados con su condición médica.</p>
                    
                    <h4>7. LIMITACIÓN DE RESPONSABILIDAD</h4>
                    <p>TraumaMed no se responsabiliza por la calidad o disponibilidad de los servicios proporcionados por los centros médicos afiliados, ni por los resultados o interpretaciones de los estudios realizados.</p>
                    
                    <h4>8. MODIFICACIONES</h4>
                    <p>TraumaMed se reserva el derecho de modificar estos términos y condiciones en cualquier momento, siendo efectivos inmediatamente después de su publicación.</p>
                </div>
                
                <div class="checkbox-wrapper">
                    <input type="checkbox" id="checkTerminos" required>
                    <label for="checkTerminos">He leído y acepto los términos y condiciones del servicio</label>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn-cancelar" id="btnCancelar">Cancelar</button>
                <button class="btn-aceptar" id="btnAceptar" disabled>Aceptar y Continuar</button>
            </div>
        </div>
    </div>
    
    <div class="footer">
        <div class="container">
            TraumaMed - Centro Especializado en Traumatología y Ortopedia | Todos los derechos reservados © 2025
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Elementos del DOM
            const btnSolicitar = document.getElementById('btnSolicitar');
            const modalTerminos = document.getElementById('modalTerminos');
            const btnCerrarModal = document.getElementById('btnCerrarModal');
            const btnCancelar = document.getElementById('btnCancelar');
            const btnAceptar = document.getElementById('btnAceptar');
            const checkTerminos = document.getElementById('checkTerminos');
            
            // Ruta del formulario
            const urlFormulario = "{{ route('formulario.evaluacion') }}";
            
            // Abrir el modal al hacer clic en "Solicitar Orden Gratuita"
            btnSolicitar.addEventListener('click', function() {
                modalTerminos.style.display = 'flex';
            });
            
            // Cerrar el modal con el botón X
            btnCerrarModal.addEventListener('click', function() {
                modalTerminos.style.display = 'none';
            });
            
            // Cerrar el modal con el botón Cancelar
            btnCancelar.addEventListener('click', function() {
                modalTerminos.style.display = 'none';
            });
            
            // Habilitar/deshabilitar botón Aceptar según checkbox
            checkTerminos.addEventListener('change', function() {
                btnAceptar.disabled = !this.checked;
            });
            
            // Redirigir al formulario al aceptar los términos
            btnAceptar.addEventListener('click', function() {
                window.location.href = urlFormulario;
            });
            
            // Cerrar modal al hacer clic fuera del contenido
            modalTerminos.addEventListener('click', function(e) {
                if (e.target === modalTerminos) {
                    modalTerminos.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>