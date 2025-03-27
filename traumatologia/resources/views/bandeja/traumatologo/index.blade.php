<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bandeja Traumatólogo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bandejas.css') }}">
</head>
<style>
/* Estilos mejorados para las tarjetas de estadísticas */
.stats-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 16px;
    margin-bottom: 20px;
}
</style>
<body>
    {{-- Include the navbar --}}
    @include('partials.navbar')

    <div class="container">
        <div class="dashboard">
            <div class="content">
                <!-- Header con título y acciones -->
                <div class="page-header">
                    <h1 class="page-title">
                        Resonancias Recibidas
                        <span class="badge-counter">{{ $total }}</span>
                    </h1>
                    <div class="page-title-actions">
                        <div class="search-box">
                            <span class="search-icon">
                                <i class="fas fa-search"></i>
                            </span>
                            <input type="text" class="search-input" placeholder="Buscar por nombre o RUT">
                        </div>
                        <select class="filter-dropdown">
                            <option value="all">Todos los estados</option>
                            <option value="recibida">Recibidas</option>
                            <option value="agendada">Agendadas</option>
                            <option value="rechazada">Rechazadas</option>
                        </select>
                    </div>
                </div>
                
                <!-- Notificaciones -->
                @if (session('success'))
                    <div class="alert alert-success">
                        <span class="alert-icon">✓</span>
                        <div class="alert-content">
                            {{ session('success') }}
                        </div>
                        <button class="alert-close">&times;</button>
                    </div>
                @endif
                
                <!-- Tarjetas de estadísticas -->
                <div class="stats-cards">
                    <div class="stat-card stat-card-blue">
                        <div class="stat-value">{{ $total }}</div>
                        <div class="stat-label">Ordenes Entregadas</div>
                        <div class="stat-progress">
                            <div class="stat-progress-bar" style="width: 100%"></div>
                        </div>
                    </div>
                    <div class="stat-card stat-card-yellow">
                        <div class="stat-value">{{ $pendientes }}</div>
                        <div class="stat-label">Pendientes</div>
                        <div class="stat-progress">
                            <div class="stat-progress-bar" style="width: {{ ($pendientes / max($total, 1)) * 100 }}%"></div>
                        </div>
                    </div>
                    <div class="stat-card stat-card-orange">
                        <div class="stat-value">{{ $recibidas }}</div>
                        <div class="stat-label">Recibidas</div>
                        <div class="stat-progress">
                            <div class="stat-progress-bar" style="width: {{ ($recibidas / max($total, 1)) * 100 }}%"></div>
                        </div>
                    </div>
                    <div class="stat-card stat-card-green">
                        <div class="stat-value">{{ $agendadas }}</div>
                        <div class="stat-label">Agendadas</div>
                        <div class="stat-progress">
                            <div class="stat-progress-bar" style="width: {{ ($agendadas / max($total, 1)) * 100 }}%"></div>
                        </div>
                    </div>
                    <div class="stat-card stat-card-red">
                        <div class="stat-value">{{ $rechazadas }}</div>
                        <div class="stat-label">Rechazadas</div>
                        <div class="stat-progress">
                            <div class="stat-progress-bar" style="width: {{ ($rechazadas / max($total, 1)) * 100 }}%"></div>
                        </div>
                    </div>
                </div>
                
                <!-- Tabla de solicitudes -->
                <div class="table-container">
                    <table class="requests-table">
                        <thead>
                            <tr>
                                <th>ID <span class="sort-icon">⇅</span></th>
                                <th>Fecha <span class="sort-icon">⇅</span></th>
                                <th>Paciente <span class="sort-icon">⇅</span></th>
                                <th>RUT</th>
                                <th>Teléfono</th>
                                <th>Rodilla</th>
                                <th>Centro</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($solicitudes as $solicitud)
                            <tr>
                                <td><div class="id-cell">{{ $solicitud['id'] }}</div></td>
                                <td>{{ $solicitud['fecha'] }}</td>
                                <td>
                                    <div class="paciente-cell">
                                        <div class="avatar">{{ substr($solicitud['nombre'], 0, 1) }}</div>
                                        <div class="paciente-info">{{ $solicitud['nombre'] }}</div>
                                    </div>
                                </td>
                                <td>{{ $solicitud['rut'] }}</td>
                                <td><a href="tel:{{ $solicitud['telefono'] }}" class="phone-link">{{ $solicitud['telefono'] }}</a></td>
                                <td>
                                    <div class="rodilla-cell">
                                        @if($solicitud['rodilla'] == 'Izquierda')
                                            <div class="rodilla-icon rodilla-left"></div> Izquierda
                                        @elseif($solicitud['rodilla'] == 'Derecha')
                                            <div class="rodilla-icon rodilla-right"></div> Derecha
                                        @else
                                            <div class="rodilla-icon rodilla-both"></div> Ambas
                                        @endif
                                    </div>
                                </td>
                                <td><span class="centro-badge">{{ $solicitud['centro'] }}</span></td>
                                <td>
                                    @if($solicitud['estado'] == 'Recibida')
                                        <span class="status-badge status-pending">Recibida</span>
                                    @elseif($solicitud['estado'] == 'Agendada')
                                        <span class="status-badge status-approved">Agendada</span>
                                    @elseif($solicitud['estado'] == 'Rechazada')
                                        <span class="status-badge status-rejected">Rechazada</span>
                                    @endif
                                </td>
                                <td style="text-align: center">
                                    <div class="action-buttons">
                                        @if($solicitud['estado'] == 'Recibida')
                                            <!-- Botón de accion para agendar o rechazar -->
                                            <a href="#" class="action-button action-info" title="Ver respuesta del centro" 
                                               data-id="{{ $solicitud['id'] }}">
                                                    <i class="fa-regular fa-eye"></i>
                                            </a>
                                        @elseif($solicitud['estado'] == 'Agendada')
                                            <!-- Sin botones para solicitudes agendadas -->
                                            <span class="text-gray-400"></span>
                                        @elseif($solicitud['estado'] == 'Rechazada')
                                            <!-- Sin botones para solicitudes rechazadas -->
                                            <span class="text-gray-400"></span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <!-- Paginación -->
                <div class="pagination">
                    <span class="pagination-info">Mostrando 1-{{ count($solicitudes) }} de {{ $total }} resultados</span>
                    <div class="pagination-controls">
                        <button class="pagination-button pagination-prev disabled">
                            <span class="pagination-icon">←</span> Anterior
                        </button>
                        <div class="pagination-numbers">
                            <button class="pagination-button active">1</button>
                            <button class="pagination-button">2</button>
                        </div>
                        <button class="pagination-button pagination-next">
                            Siguiente <span class="pagination-icon">→</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Modal para agendar o rechazar solicitud -->
<div id="decisionModal" class="modal-resp">
    <div class="modal-content-resp">
        <div class="modal-header-resp">
            <h2 class="modal-title-resp">Gestionar Solicitud</h2>
            <span class="modal-close-resp" id="closeDecisionModal">&times;</span>
        </div>
        <div class="modal-body-resp">
            <div class="solicitud-info">
                <h3>Detalles de la Solicitud</h3>
                <div class="info-row">
                    <div class="info-label">Paciente:</div>
                    <div class="info-value" id="modalPaciente"></div>
                </div>
                <div class="info-row">
                    <div class="info-label">RUT:</div>
                    <div class="info-value" id="modalRut"></div>
                </div>
                <div class="info-row">
                    <div class="info-label">Fecha:</div>
                    <div class="info-value" id="modalFecha"></div>
                </div>
                <div class="info-row">
                    <div class="info-label">Rodilla:</div>
                    <div class="info-value" id="modalRodilla"></div>
                </div>
            </div>
            
            <div class="decision-options">
                <h3>¿Qué deseas hacer con esta solicitud?</h3>
                
                <div class="decision-tabs">
                    <button type="button" class="tab-button active" data-tab="tab-agendar">Agendar Paciente</button>
                    <button type="button" class="tab-button" data-tab="tab-rechazar">Rechazar Solicitud</button>
                </div>
                
                <div id="tab-agendar" class="tab-content active">
                    <div class="option-agendar">
                        <h4>Datos de la Cita</h4>
                        <form id="formAgendar">
                            <input type="hidden" id="solicitudId" name="solicitudId">
                            
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="fechaAgenda">Fecha de Agenda:</label>
                                    <input type="date" id="fechaAgenda" name="fechaAgenda" class="form-control" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="horaAgenda">Hora de Agenda:</label>
                                    <input type="time" id="horaAgenda" name="horaAgenda" class="form-control" required>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn-agendar">Confirmar Agenda</button>
                        </form>
                    </div>
                </div>
                
                <div id="tab-rechazar" class="tab-content">
                    <div class="option-rechazar">
                        <h4>Motivo del Rechazo</h4>
                        <form id="formRechazar">
                            <input type="hidden" id="solicitudIdRechazar" name="solicitudId">
                            
                            <div class="form-group">
                                <label for="motivoRechazo">Motivo del rechazo:</label>
                                <select id="motivoRechazo" name="motivoRechazo" class="form-control" required>
                                    <option value="" disabled selected>Seleccione un motivo</option>
                                    <option value="No contesta">No contesta</option>
                                    <option value="Número equivocado">Número equivocado</option>
                                    <option value="Rechaza la cita">Rechaza la cita</option>
                                    <option value="Otro">Otro</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="detalleRechazo">Detalles adicionales:</label>
                                <textarea id="detalleRechazo" name="detalleRechazo" class="form-control" rows="3" placeholder="Explique con detalle el motivo del rechazo" required></textarea>
                            </div>
                            
                            <button type="submit" class="btn-rechazar">Confirmar Rechazo</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- JavaScript -->
    <script>
// JavaScript mejorado para el modal con pestañas
document.addEventListener('DOMContentLoaded', function() {
    // Referencias al modal y sus elementos
    const decisionModal = document.getElementById('decisionModal');
    const closeBtn = document.getElementById('closeDecisionModal');
    const formAgendar = document.getElementById('formAgendar');
    const formRechazar = document.getElementById('formRechazar');
    
    // Campos para mostrar la información del paciente
    const modalPaciente = document.getElementById('modalPaciente');
    const modalRut = document.getElementById('modalRut');
    const modalFecha = document.getElementById('modalFecha');
    const modalRodilla = document.getElementById('modalRodilla');
    
    // IDs ocultos para los formularios
    const solicitudId = document.getElementById('solicitudId');
    const solicitudIdRechazar = document.getElementById('solicitudIdRechazar');
    
    // Manejo de las pestañas
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabContents = document.querySelectorAll('.tab-content');
    
    // Agregar listeners a los botones de pestañas
    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Remover clase activa de todas las pestañas
            tabButtons.forEach(btn => btn.classList.remove('active'));
            tabContents.forEach(content => content.classList.remove('active'));
            
            // Agregar clase activa al botón actual
            this.classList.add('active');
            
            // Mostrar el contenido de la pestaña seleccionada
            const tabId = this.getAttribute('data-tab');
            document.getElementById(tabId).classList.add('active');
        });
    });
    
    // Agregar event listeners a todos los botones de "Ver respuesta"
    document.querySelectorAll('.action-button.action-info').forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            const id = this.getAttribute('data-id');
            openModal(id);
        });
    });
    
    // Cerrar el modal cuando se hace clic en la X
    closeBtn.addEventListener('click', function() {
        decisionModal.style.display = 'none';
        
        // Resetear a la primera pestaña cuando se cierra el modal
        tabButtons.forEach(btn => btn.classList.remove('active'));
        tabContents.forEach(content => content.classList.remove('active'));
        tabButtons[0].classList.add('active');
        tabContents[0].classList.add('active');
    });
    
    // Cerrar el modal cuando se hace clic fuera de él
    window.addEventListener('click', function(event) {
        if (event.target === decisionModal) {
            decisionModal.style.display = 'none';
            
            // Resetear a la primera pestaña cuando se cierra el modal
            tabButtons.forEach(btn => btn.classList.remove('active'));
            tabContents.forEach(content => content.classList.remove('active'));
            tabButtons[0].classList.add('active');
            tabContents[0].classList.add('active');
        }
    });
    
    // Manejar la tecla Escape para cerrar el modal
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape' && decisionModal.style.display === 'block') {
            decisionModal.style.display = 'none';
            
            // Resetear a la primera pestaña cuando se cierra el modal
            tabButtons.forEach(btn => btn.classList.remove('active'));
            tabContents.forEach(content => content.classList.remove('active'));
            tabButtons[0].classList.add('active');
            tabContents[0].classList.add('active');
        }
    });
    
    // Manejar el envío del formulario de agendar
    formAgendar.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Obtener los datos del formulario
        const formData = new FormData(formAgendar);
        
        // Mostrar indicador de carga (opcional)
        const submitBtn = formAgendar.querySelector('button[type="submit"]');
        const originalText = submitBtn.textContent;
        submitBtn.textContent = 'Procesando...';
        submitBtn.disabled = true;
        
        // Enviar los datos mediante AJAX
        fetch('/solicitud/agendar', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Mostrar mensaje de éxito
                alert('Solicitud agendada correctamente');
                
                // Cerrar el modal
                decisionModal.style.display = 'none';
                
                // Recargar la página para ver los cambios
                window.location.reload();
            } else {
                alert('Error: ' + (data.message || 'Ha ocurrido un error al procesar la solicitud'));
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Ocurrió un error al procesar la solicitud');
            submitBtn.textContent = originalText;
            submitBtn.disabled = false;
        });
    });
    
    // Manejar el envío del formulario de rechazar
    formRechazar.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Obtener los datos del formulario
        const formData = new FormData(formRechazar);
        
        // Mostrar indicador de carga (opcional)
        const submitBtn = formRechazar.querySelector('button[type="submit"]');
        const originalText = submitBtn.textContent;
        submitBtn.textContent = 'Procesando...';
        submitBtn.disabled = true;
        
        // Enviar los datos mediante AJAX
        fetch('/solicitud/rechazar', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Mostrar mensaje de éxito
                alert('Solicitud rechazada correctamente');
                
                // Cerrar el modal
                decisionModal.style.display = 'none';
                
                // Recargar la página para ver los cambios
                window.location.reload();
            } else {
                alert('Error: ' + (data.message || 'Ha ocurrido un error al procesar la solicitud'));
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Ocurrió un error al procesar la solicitud');
            submitBtn.textContent = originalText;
            submitBtn.disabled = false;
        });
    });
    
    // Función para abrir el modal y cargar los datos de la solicitud
    function openModal(id) {
        // Obtener los datos de la solicitud desde la fila de la tabla
        const row = document.querySelector(`[data-id="${id}"]`).closest('tr');
        
        // Extraer los datos de las celdas
        const paciente = row.cells[2].querySelector('.paciente-info').textContent;
        const rut = row.cells[3].textContent;
        const fecha = row.cells[1].textContent;
        const rodilla = row.cells[5].querySelector('.rodilla-cell').textContent.trim();
        
        // Actualizar los campos del modal
        modalPaciente.textContent = paciente;
        modalRut.textContent = rut;
        modalFecha.textContent = fecha;
        modalRodilla.textContent = rodilla;
        
        // Establecer el ID de solicitud en ambos formularios
        solicitudId.value = id;
        solicitudIdRechazar.value = id;
        
        // Establecer una fecha mínima para el campo de fecha (hoy)
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('fechaAgenda').setAttribute('min', today);
        
        // Limpiar los formularios
        formAgendar.reset();
        formRechazar.reset();
        
        // Mostrar el modal
        decisionModal.style.display = 'block';
        
        // Asegurarse de que la primera pestaña esté activa al abrir
        tabButtons.forEach(btn => btn.classList.remove('active'));
        tabContents.forEach(content => content.classList.remove('active'));
        tabButtons[0].classList.add('active');
        tabContents[0].classList.add('active');
    }
});
    </script>
</body>
</html>