<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Solicitudes de Resonancia Visadas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
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
                        Solicitudes de Resonancia Visadas
                        <span class="badge-counter">{{ $visadas }}</span>
                    </h1>
                    <div class="page-title-actions">
                        <div class="search-box">
                            <span class="search-icon">
                                <i class="fas fa-search"></i>
                            </span>
                            <input type="text" class="search-input" placeholder="Buscar por nombre o RUT">
                        </div>
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
                
                <!-- Tarjeta de estadísticas -->
                <div class="stats-cards">
                    <div class="stat-card stat-card-green">
                        <div class="stat-value">{{ $visadas }}</div>
                        <div class="stat-label">Visadas</div>
                        <div class="stat-progress">
                            <div class="stat-progress-bar" style="width: 100%"></div>
                        </div>
                    </div>
                </div>
                
                <!-- Tabla de solicitudes visadas -->
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
                                @if($solicitud['estado'] == 'visado')
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
                                        <span class="status-badge status-sent">Visado</span>
                                    </td>
                                    <td style="text-align: center">
                                        <div class="action-buttons">
                                            <!-- Botón para subir PDF para solicitudes visadas -->
                                            <a href="#" class="action-button action-upload" style="background-color: #10b981;" title="Subir informe PDF" 
                                               data-id="{{ $solicitud['id'] }}" onclick="mostrarModalSubida('{{ $solicitud['id'] }}')">
                                                <i class="fas fa-file-upload"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <!-- Paginación -->
                <div class="pagination">
                    <span class="pagination-info">Mostrando 1-{{ min($visadas, 10) }} de {{ $visadas }} resultados</span>
                    <div class="pagination-controls">
                        <button class="pagination-button pagination-prev disabled">
                            <span class="pagination-icon">←</span> Anterior
                        </button>
                        <div class="pagination-numbers">
                            <button class="pagination-button active">1</button>
                            @if($visadas > 10)
                                <button class="pagination-button">2</button>
                                @if($visadas > 20)
                                    <button class="pagination-button">3</button>
                                @endif
                            @endif
                        </div>
                        <button class="pagination-button pagination-next {{ $visadas <= 10 ? 'disabled' : '' }}">
                            Siguiente <span class="pagination-icon">→</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

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