<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Solicitudes de Resonancia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/bandejas.css') }}">
</head>
<body>
    {{-- Include the navbar --}}
    @include('partials.navbar')

    <div class="container">
        <div class="dashboard">
            <div class="content">
                <!-- Header con título y acciones -->
                <div class="page-header">
                    <h1 class="page-title">
                        Solicitudes de Resonancia
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
                            <option value="pendiente">Pendientes</option>
                            <option value="aprobada">Aprobadas</option>
                            <option value="enviada">Enviadas</option>
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
                        <div class="stat-label">Total Solicitudes</div>
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
                    <div class="stat-card stat-card-green">
                        <div class="stat-value">{{ $visadas }}</div>
                        <div class="stat-label">Visadas</div>
                        <div class="stat-progress">
                            <div class="stat-progress-bar" style="width: {{ ($visadas / max($total, 1)) * 100 }}%"></div>
                        </div>
                    </div>
                    <div class="stat-card stat-card-orange">
                        <div class="stat-value">{{ $respondidas }}</div>
                        <div class="stat-label">Respondidas</div>
                        <div class="stat-progress">
                            <div class="stat-progress-bar" style="width: {{ ($respondidas / max($total, 1)) * 100 }}%"></div>
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
                                <th>Rodilla</th>
                                <th>Estado</th>
                                <th style="text-align: center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($solicitudes as $solicitud)
                            <tr>
                                <td><div class="id-cell">{{ $solicitud['id'] }}</div></td>
                                <td>{{ $solicitud['fecha'] }}</td>
                                <td>
                                    <div class="paciente-cell">
                                        <div class="avatar">{{ substr($solicitud['paciente'], 0, 1) }}</div>
                                        <div class="paciente-info">{{ $solicitud['paciente'] }}</div>
                                    </div>
                                </td>
                                <td>{{ $solicitud['rut'] }}</td>
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
                                <td>
                                    @if($solicitud['estado'] == 'pendiente')
                                        <span class="status-badge status-pending">Pendiente</span>
                                    @elseif($solicitud['estado'] == 'visado')
                                        <span class="status-badge status-sent">Visado</span>
                                    @elseif($solicitud['estado'] == 'respondido')
                                        <span class="status-badge status-approved">Respondido</span>
                                    @endif
                                </td>
                                <!-- Modal para subir archivos -->
                                <div id="uploadModal" class="modal">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title">Subir informe</h3>
                                            <div class="modal-icon" style="background-color: rgba(16, 185, 129, 0.2); color: #10b981;">
                                                <i class="fas fa-file-upload"></i>
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <p>Seleccione el archivo PDF con el informe médico para la solicitud <span id="solicitudIdUpload"></span>:</p>
                                            <form id="uploadForm" method="POST" enctype="multipart/form-data" class="mt-3">
                                                @csrf
                                                <input type="hidden" id="uploadSolicitudId" name="solicitud_id">
                                                <div class="mb-3" style="position: relative; padding: 15px; border: 2px dashed rgba(255,255,255,0.2); border-radius: 8px; text-align: center;">
                                                    <input type="file" id="pdfFile" name="pdf_file" accept=".pdf" style="opacity: 0; position: absolute; top: 0; left: 0; width: 100%; height: 100%; cursor: pointer;">
                                                    <label for="pdfFile" style="display: block; cursor: pointer;">
                                                        <i class="fas fa-cloud-upload-alt mb-2" style="font-size: 24px; color: #10b981;"></i>
                                                        <div id="fileNameDisplay">Haga clic o arrastre el archivo aquí</div>
                                                    </label>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-buttons">
                                            <button class="modal-btn modal-btn-cancel" id="btnCancelarUpload">Cancelar</button>
                                            <button class="modal-btn modal-btn-confirm" id="btnSubirPDF" style="background-color: #10b981;">Subir informe</button>
                                        </div>
                                    </div>
                                </div>
                                <td style="text-align: center">
                                    <div class="action-buttons">
                                        @if($solicitud['estado'] == 'pendiente')
                                            <!-- Botón de información para solicitudes pendientes -->
                                            <a href="#" class="action-button action-info" title="Ver orden de examen" 
                                               data-id="{{ $solicitud['id'] }}">
                                                    <i class="fa-regular fa-eye"></i>
                                            </a>
                                        @elseif($solicitud['estado'] == 'visado')
                                            <!-- Botón para subir PDF para solicitudes visadas -->
                                            <a href="#" class="action-button action-upload" style="background-color: #10b981;" title="Subir informe PDF" 
                                               data-id="{{ $solicitud['id'] }}" onclick="mostrarModalSubida('{{ $solicitud['id'] }}')">
                                                <i class="fas fa-file-upload"></i>
                                            </a>
                                        @elseif($solicitud['estado'] == 'respondido')
                                            <!-- Sin botones para solicitudes respondidas -->
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
                    <span class="pagination-info">Mostrando 1-10 de {{ $total }} resultados</span>
                    <div class="pagination-controls">
                        <button class="pagination-button pagination-prev disabled">
                            <span class="pagination-icon">←</span> Anterior
                        </button>
                        <div class="pagination-numbers">
                            <button class="pagination-button active">1</button>
                            <button class="pagination-button">2</button>
                            <button class="pagination-button">3</button>
                        </div>
                        <button class="pagination-button pagination-next">
                            Siguiente <span class="pagination-icon">→</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de confirmación -->
    <div id="confirmModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Confirmar visación</h3>

                <div class="modal-icon" style="background-color: rgba(59, 130, 246, 0.2); color: #3b82f6;">
                    <i class="fas fa-file"></i>
                </div>
            </div>
            <div class="modal-body">
                ¿Está seguro que desea abrir la orden de examen? cambiara el estado de la solicitud a visado
            </div>
            <div class="modal-buttons">
                <button class="modal-btn modal-btn-cancel" id="btnCancelar">Cancelar</button>
                <button class="modal-btn modal-btn-confirm" id="btnConfirmar">Aceptar</button>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        function mostrarModalSubida(id) {
            // Establecer el ID de solicitud en el modal
            $("#solicitudIdUpload").text(id);
            $("#uploadSolicitudId").val(id);
            
            // Mostrar el modal
            $("#uploadModal").css("display", "block");
            
            // Evitar que el evento se propague
            event.preventDefault();
        }
        
        $(document).ready(function() {
            // Cerrar modal de subida al hacer clic en Cancelar
            $("#btnCancelarUpload").on("click", function() {
                $("#uploadModal").css("display", "none");
            });
            
            // Manejar clic en el botón subir PDF
            $("#btnSubirPDF").on("click", function() {
                // Comprobar si se ha seleccionado un archivo
                if ($("#pdfFile")[0].files.length > 0) {
                    // Aquí puedes implementar la lógica para subir el archivo
                    // Por ahora, solo simularemos una respuesta exitosa
                    
                    // Ocultar el modal
                    $("#uploadModal").css("display", "none");
                    
                    // Mostrar mensaje de éxito (puedes personalizar esto)
                    alert("Archivo subido correctamente. La solicitud ahora está en estado 'respondido'.");
                    
                    // Recargar la página para ver los cambios
                    // En un entorno real, esto sería manejado por el controlador
                    setTimeout(function() {
                        location.reload();
                    }, 1000);
                } else {
                    alert("Por favor, seleccione un archivo PDF para subir.");
                }
            });
            
            // Mostrar nombre del archivo seleccionado
            $("#pdfFile").on("change", function() {
                if (this.files.length > 0) {
                    $("#fileNameDisplay").text(this.files[0].name);
                } else {
                    $("#fileNameDisplay").text("Haga clic o arrastre el archivo aquí");
                }
            });
            
            // Cerrar modal al hacer clic fuera de él
            $(window).on("click", function(event) {
                if (event.target === $("#uploadModal")[0]) {
                    $("#uploadModal").css("display", "none");
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Variables para el modal
            let solicitudId = null;
            const modal = $("#confirmModal");
            
            // Mostrar modal al hacer clic en el botón de info
            $(".action-info").on("click", function(e) {
                e.preventDefault();
                solicitudId = $(this).data("id");
                console.log("ID de solicitud capturado:", solicitudId);
                modal.css("display", "block");
            });
            
            // Cerrar modal al hacer clic en Cancelar
            $("#btnCancelar").on("click", function() {
                modal.css("display", "none");
            });
            
            // Abrir orden de examen al hacer clic en Aceptar
            $("#btnConfirmar").on("click", function() {
                if (solicitudId) {
                    console.log("Redirigiendo a /examenes/orden/" + solicitudId);
                    window.location.href = "{{ url('/examenes/orden') }}/" + solicitudId;
                }
                modal.css("display", "none");
            });
            
            // Cerrar modal al hacer clic fuera de él
            $(window).on("click", function(event) {
                if (event.target === modal[0]) {
                    modal.css("display", "none");
                }
            });
            
            // Funcionalidad para el filtro de estados
            $('.filter-dropdown').on('change', function() {
                const filter = $(this).val();
                const rows = $('.requests-table tbody tr');
                
                rows.each(function() {
                    const statusCell = $(this).find('td:eq(5)').text().toLowerCase().trim();
                    
                    if (filter === 'all' || statusCell.includes(filter)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
            
            // Funcionalidad para la búsqueda
            $('.search-input').on('input', function() {
                const searchTerm = $(this).val().toLowerCase();
                const rows = $('.requests-table tbody tr');
                
                rows.each(function() {
                    const paciente = $(this).find('td:eq(2)').text().toLowerCase();
                    const rut = $(this).find('td:eq(3)').text().toLowerCase();
                    
                    if (paciente.includes(searchTerm) || rut.includes(searchTerm)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
            
            // Cerrar alertas
            $('.alert-close').on('click', function() {
                $(this).closest('.alert').fadeOut();
            });
        });
    </script>
</body>
</html>