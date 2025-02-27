<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orden de Resonancia Gratuita - TraumaMed</title>
    <link rel="stylesheet" href="{{ asset('css/formulario.css') }}">

</head>
<body>
    <div class="header">
        <div class="container">
            <div class="logo-container">
                <div class="hexagon-icon">T</div>
                <div class="logo">Trauma<span>Med</span></div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="form-title-container">
            <div class="mri-icon"></div>
            <h2 class="form-title">Solicitud de Orden de Resonancia Gratuita</h2>
        </div>
        
        <div class="form-container">
            <div class="free-tag">¡GRATIS!</div>
            <div class="pattern-bg"></div>
            
            <form id="evaluacionForm" method="POST" action="">
                @csrf
                <div class="section-title">Datos Personales</div>
                
                <div class="form-group">
                    <label for="nombre" class="required-field">Nombre Completo:</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>
                
                <div class="form-group">
                    <label for="rut" class="required-field">RUT:</label>
                    <input type="text" id="rut" name="rut" placeholder="Ej: 12345678-9" required>
                    <div class="form-note">Ingrese su RUT sin puntos y con guion</div>
                </div>
                
                <div class="form-group">
                    <label for="fechaNacimiento" class="required-field">Fecha de Nacimiento:</label>
                    <input type="date" id="fechaNacimiento" name="fechaNacimiento" required>
                </div>

                <div class="form-group">
                    <label for="telefono" class="required-field">Teléfono:</label>
                    <input type="tel" id="telefono" name="telefono" placeholder="Ej: +56 9 1234 5678" required pattern="(\+56\s?9\s?[0-9]{4}\s?[0-9]{4})">
                    <div class="form-note">Ingrese su número de teléfono con código de país</div>
                </div>
                
                <div class="form-group">
                    <label for="email" class="required-field">Correo Electrónico:</label>
                    <input type="email" id="email" name="email" placeholder="Ej: nombre@ejemplo.com" required>
                </div>
                
                <div class="section-title">Datos Físicos</div>
                
                <div class="form-group">
                    <label for="altura" class="required-field">Altura (cm):</label>
                    <input type="number" id="altura" name="altura" min="100" max="250" placeholder="Ej: 170" required>
                </div>
                
                <div class="form-group">
                    <label for="peso" class="required-field">Peso (kg):</label>
                    <input type="number" id="peso" name="peso" min="30" max="200" placeholder="Ej: 70" required>
                </div>
                
                <div class="section-title">Evaluación Funcional</div>
                
                <div class="form-group">
                    <label class="required-field">¿Qué rodilla es la afectada?</label>
                    <div class="radio-group">
                        <div class="radio-option">
                            <input type="radio" id="rodilla-izq" name="rodilla" value="izquierda" required>
                            <label for="rodilla-izq">Izquierda</label>
                        </div>
                        <div class="radio-option">
                            <input type="radio" id="rodilla-der" name="rodilla" value="derecha">
                            <label for="rodilla-der">Derecha</label>
                        </div>
                        <div class="radio-option">
                            <input type="radio" id="rodilla-ambas" name="rodilla" value="ambas">
                            <label for="rodilla-ambas">Ambas</label>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="required-field">¿Puede subir escaleras?</label>
                    <div class="radio-group">
                        <div class="radio-option">
                            <input type="radio" id="subir-si" name="subirEscaleras" value="si" required>
                            <label for="subir-si">Sí</label>
                        </div>
                        <div class="radio-option">
                            <input type="radio" id="subir-no" name="subirEscaleras" value="no">
                            <label for="subir-no">No</label>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="required-field">¿Puede bajar escaleras?</label>
                    <div class="radio-group">
                        <div class="radio-option">
                            <input type="radio" id="bajar-si" name="bajarEscaleras" value="si" required>
                            <label for="bajar-si">Sí</label>
                        </div>
                        <div class="radio-option">
                            <input type="radio" id="bajar-no" name="bajarEscaleras" value="no">
                            <label for="bajar-no">No</label>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="required-field">¿Puede sentarse?</label>
                    <div class="radio-group">
                        <div class="radio-option">
                            <input type="radio" id="sentar-si" name="sentarse" value="si" required>
                            <label for="sentar-si">Sí</label>
                        </div>
                        <div class="radio-option">
                            <input type="radio" id="sentar-no" name="sentarse" value="no">
                            <label for="sentar-no">No</label>
                        </div>
                    </div>
                </div>
                
                <div class="section-title">Selección de Centro Médico</div>
                
                <div class="form-group">
                    <label for="comuna" class="required-field">Seleccione su comuna:</label>
                    <select id="comuna" name="comuna" required>
                        <option value="">Seleccione una comuna</option>
                        <option value="valparaiso">Valparaíso</option>
                        <option value="vina">Viña del Mar</option>
                        <option value="quilpue">Quilpué</option>
                        <option value="villa-alemana">Villa Alemana</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label class="required-field">Seleccione el centro médico:</label>
                    
                    <!-- Centros de Valparaíso -->
                    <div id="centros-valparaiso" class="centro-medico-container">
                        <div class="centro-option" onclick="selectCentro('centro-1')">
                            <input type="radio" id="centro-1" name="centro" value="centro-1" class="centro-radio" required>
                            <div class="centro-check"></div>
                            <div class="centro-info">
                                <div class="centro-nombre">Centro Médico San José</div>
                                <div class="centro-direccion">Av. Brasil 1950, Valparaíso</div>
                                <div class="centro-disponibilidad">Disponibilidad: Inmediata</div>
                            </div>
                        </div>
                        
                        <div class="centro-option" onclick="selectCentro('centro-2')">
                            <input type="radio" id="centro-2" name="centro" value="centro-2" class="centro-radio">
                            <div class="centro-check"></div>
                            <div class="centro-info">
                                <div class="centro-nombre">Hospital Clínico Valparaíso</div>
                                <div class="centro-direccion">Av. Pedro Montt 2465, Valparaíso</div>
                                <div class="centro-disponibilidad">Disponibilidad: 3 días</div>
                            </div>
                        </div>
                        
                        <div class="centro-option" onclick="selectCentro('centro-3')">
                            <input type="radio" id="centro-3" name="centro" value="centro-3" class="centro-radio">
                            <div class="centro-check"></div>
                            <div class="centro-info">
                                <div class="centro-nombre">Centro de Diagnóstico Avanzado</div>
                                <div class="centro-direccion">Calle Condell 1236, Valparaíso</div>
                                <div class="centro-disponibilidad">Disponibilidad: 2 días</div>
                            </div>
                        </div>
                        
                        <div class="centro-option" onclick="selectCentro('centro-4')">
                            <input type="radio" id="centro-4" name="centro" value="centro-4" class="centro-radio">
                            <div class="centro-check"></div>
                            <div class="centro-info">
                                <div class="centro-nombre">Clínica Porteña</div>
                                <div class="centro-direccion">Av. Errázuriz 1178, Valparaíso</div>
                                <div class="centro-disponibilidad">Disponibilidad: 5 días</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Centros de Viña del Mar -->
                    <div id="centros-vina" class="centro-medico-container">
                        <div class="centro-option" onclick="selectCentro('centro-5')">
                            <input type="radio" id="centro-5" name="centro" value="centro-5" class="centro-radio">
                            <div class="centro-check"></div>
                            <div class="centro-info">
                                <div class="centro-nombre">Clínica Ciudad Jardín</div>
                                <div class="centro-direccion">Av. Libertad 1348, Viña del Mar</div>
                                <div class="centro-disponibilidad">Disponibilidad: Inmediata</div>
                            </div>
                        </div>
                        
                        <div class="centro-option" onclick="selectCentro('centro-6')">
                            <input type="radio" id="centro-6" name="centro" value="centro-6" class="centro-radio">
                            <div class="centro-check"></div>
                            <div class="centro-info">
                                <div class="centro-nombre">Hospital Dr. Gustavo Fricke</div>
                                <div class="centro-direccion">Av. Alvares 1532, Viña del Mar</div>
                                <div class="centro-disponibilidad">Disponibilidad: 4 días</div>
                            </div>
                        </div>
                        
                        <div class="centro-option" onclick="selectCentro('centro-7')">
                            <input type="radio" id="centro-7" name="centro" value="centro-7" class="centro-radio">
                            <div class="centro-check"></div>
                            <div class="centro-info">
                                <div class="centro-nombre">Centro ImagenSalud</div>
                                <div class="centro-direccion">Calle Viana 478, Viña del Mar</div>
                                <div class="centro-disponibilidad">Disponibilidad: 1 día</div>
                            </div>
                        </div>
                        
                        <div class="centro-option" onclick="selectCentro('centro-8')">
                            <input type="radio" id="centro-8" name="centro" value="centro-8" class="centro-radio">
                            <div class="centro-check"></div>
                            <div class="centro-info">
                                <div class="centro-nombre">Instituto de Diagnóstico Viña</div>
                                <div class="centro-direccion">Av. San Martín 965, Viña del Mar</div>
                                <div class="centro-disponibilidad">Disponibilidad: 2 días</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Centros de Quilpué -->
                    <div id="centros-quilpue" class="centro-medico-container">
                        <div class="centro-option" onclick="selectCentro('centro-9')">
                            <input type="radio" id="centro-9" name="centro" value="centro-9" class="centro-radio">
                            <div class="centro-check"></div>
                            <div class="centro-info">
                                <div class="centro-nombre">Centro Médico Quilpué</div>
                                <div class="centro-direccion">Av. Los Carrera 645, Quilpué</div>
                                <div class="centro-disponibilidad">Disponibilidad: 2 días</div>
                            </div>
                        </div>
                        
                        <div class="centro-option" onclick="selectCentro('centro-10')">
                            <input type="radio" id="centro-10" name="centro" value="centro-10" class="centro-radio">
                            <div class="centro-check"></div>
                            <div class="centro-info">
                                <div class="centro-nombre">Hospital de Quilpué</div>
                                <div class="centro-direccion">Av. Bernardo O'Higgins 834, Quilpué</div>
                                <div class="centro-disponibilidad">Disponibilidad: 3 días</div>
                            </div>
                        </div>
                        
                        <div class="centro-option" onclick="selectCentro('centro-11')">
                            <input type="radio" id="centro-11" name="centro" value="centro-11" class="centro-radio">
                            <div class="centro-check"></div>
                            <div class="centro-info">
                                <div class="centro-nombre">Centro de Imágenes El Sol</div>
                                <div class="centro-direccion">Calle Claudio Vicuña 328, Quilpué</div>
                                <div class="centro-disponibilidad">Disponibilidad: Inmediata</div>
                            </div>
                        </div>
                        
                        <div class="centro-option" onclick="selectCentro('centro-12')">
                            <input type="radio" id="centro-12" name="centro" value="centro-12" class="centro-radio">
                            <div class="centro-check"></div>
                            <div class="centro-info">
                                <div class="centro-nombre">Clínica Valle del Sol</div>
                                <div class="centro-direccion">Av. Diego Portales 542, Quilpué</div>
                                <div class="centro-disponibilidad">Disponibilidad: 4 días</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Centros de Villa Alemana -->
                    <div id="centros-villa-alemana" class="centro-medico-container">
                        <div class="centro-option" onclick="selectCentro('centro-13')">
                            <input type="radio" id="centro-13" name="centro" value="centro-13" class="centro-radio">
                            <div class="centro-check"></div>
                            <div class="centro-info">
                                <div class="centro-nombre">Centro Médico Villa Alemana</div>
                                <div class="centro-direccion">Av. Valparaíso 792, Villa Alemana</div>
                                <div class="centro-disponibilidad">Disponibilidad: 1 día</div>
                            </div>
                        </div>
                        
                        <div class="centro-option" onclick="selectCentro('centro-14')">
                            <input type="radio" id="centro-14" name="centro" value="centro-14" class="centro-radio">
                            <div class="centro-check"></div>
                            <div class="centro-info">
                                <div class="centro-nombre">Instituto Diagnóstico Peñablanca</div>
                                <div class="centro-direccion">Calle Santiago 487, Villa Alemana</div>
                                <div class="centro-disponibilidad">Disponibilidad: Inmediata</div>
                            </div>
                        </div>
                        
                        <div class="centro-option" onclick="selectCentro('centro-15')">
                            <input type="radio" id="centro-15" name="centro" value="centro-15" class="centro-radio">
                            <div class="centro-check"></div>
                            <div class="centro-info">
                                <div class="centro-nombre">Clínica La Araucana</div>
                                <div class="centro-direccion">Av. Latorre 245, Villa Alemana</div>
                                <div class="centro-disponibilidad">Disponibilidad: 3 días</div>
                            </div>
                        </div>
                        
                        <div class="centro-option" onclick="selectCentro('centro-16')">
                            <input type="radio" id="centro-16" name="centro" value="centro-16" class="centro-radio">
                            <div class="centro-check"></div>
                            <div class="centro-info">
                                <div class="centro-nombre">Centro Radiológico Central</div>
                                <div class="centro-direccion">Calle Condell 356, Villa Alemana</div>
                                <div class="centro-disponibilidad">Disponibilidad: 2 días</div>
                            </div>
                        </div>
                    </div>

                    <div class="form-note">Seleccione primero una comuna para ver los centros disponibles</div>
                </div>
                
                <button type="submit" class="btn-submit">Solicitar Orden Gratuita</button>
            </form>
        </div>
    </div>
    
    <div class="footer">
        <div class="container">
            TraumaMed - Centro Especializado en Traumatología y Ortopedia | Todos los derechos reservados © 2025
        </div>
    </div>

        <!-- Modal for Success Submission -->
        <div id="successModal" class="modal-overlay">
            <div class="modal-container">
                <div class="modal-header">
                    <h2>Solicitud Enviada</h2>
                    <button class="modal-close" onclick="closeModal()">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="modal-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <h3>¡Solicitud Procesada Exitosamente!</h3>
                    <p>Hemos recibido su solicitud de resonancia gratuita.</p>
                    
                    <div class="modal-details">
                        <p><strong>Centro Médico:</strong> <span id="modalCentroNombre"></span></p>
                        <p><strong>Nombre:</strong> <span id="modalNombrePaciente"></span></p>
                        <p><strong>RUT:</strong> <span id="modalRutPaciente"></span></p>
                        <p><strong>Correo Electrónico:</strong> <span id="modalEmailPaciente"></span></p>
                    </div>
                    
                    <button class="modal-btn" onclick="closeModal()">Entendido</button>
                </div>
            </div>
        </div>
    
    <script>
        // Funcionalidad para mostrar los centros según la comuna seleccionada
        document.getElementById('comuna').addEventListener('change', function() {
            // Ocultar todos los contenedores de centros
            const centrosContainers = document.querySelectorAll('.centro-medico-container');
            centrosContainers.forEach(container => {
                container.style.display = 'none';
            });
            
            // Deseleccionar todos los centros
            const centrosRadios = document.querySelectorAll('.centro-radio');
            centrosRadios.forEach(radio => {
                radio.checked = false;
            });
            
            const centrosOptions = document.querySelectorAll('.centro-option');
            centrosOptions.forEach(option => {
                option.classList.remove('selected');
            });
            
            // Mostrar los centros de la comuna seleccionada
            const comunaSeleccionada = this.value;
            if (comunaSeleccionada) {
                const contenedorCentros = document.getElementById('centros-' + comunaSeleccionada);
                if (contenedorCentros) {
                    contenedorCentros.style.display = 'block';
                }
            }
        });
        
        // Función para seleccionar un centro
        function selectCentro(centroId) {
            // Deseleccionar todos los centros
            const centrosOptions = document.querySelectorAll('.centro-option');
            centrosOptions.forEach(option => {
                option.classList.remove('selected');
            });
            
            // Seleccionar el centro clickeado
            document.getElementById(centroId).checked = true;
            document.getElementById(centroId).closest('.centro-option').classList.add('selected');
        }
        
        // Validación del formulario antes de enviar
        document.getElementById('evaluacionForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Validar que se haya seleccionado una comuna
            const comuna = document.getElementById('comuna').value;
            if (!comuna) {
                alert('Por favor, seleccione una comuna.');
                return;
            }
            
            // Validar que se haya seleccionado un centro médico
            const centroSeleccionado = document.querySelector('input[name="centro"]:checked');
            if (!centroSeleccionado) {
                alert('Por favor, seleccione un centro médico.');
                return;
            }
            
            // Si todo está correcto, mostrar mensaje de éxito
            const nombreCentro = centroSeleccionado.closest('.centro-option').querySelector('.centro-nombre').textContent;
            
            alert('¡Solicitud enviada con éxito!\n\nHemos procesado su solicitud para una orden de resonancia gratuita en ' + nombreCentro + '.\n\nEn las próximas 24 horas, un especialista revisará su caso y enviaremos la orden directamente al centro seleccionado.\n\nRecibirá un correo de confirmación con los detalles de su cita.');
            
            // Aquí iría el código para enviar los datos al servidor
            // form.submit();
        });
    </script>
</body>
</html>