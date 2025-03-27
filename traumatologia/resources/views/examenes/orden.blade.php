<!-- resources/views/examenes/orden.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orden de Examen - TraumaMed</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/orden.css') }}">
    <style>

    </style>
</head>
<body>
    {{-- Include the navbar --}}
    @include('partials.navbar')

    <div class="container-fluid">
        <div class="order-container">
            <!-- Información inicial y botón para ver la orden -->
            <div class="document-info">
                <h2>Orden de Examen - {{ $solicitud->id }}</h2>
                <p>Paciente: {{ $solicitud->paciente }}</p>
                <p>Fecha: {{ $solicitud->fecha }}</p>
                <p>Examen: Resonancia Magnética - Rodilla {{ $solicitud->rodilla }}</p>
            </div>
            
            <div class="buttons-container">
                <button id="btnViewOrder" class="btn btn-view">
                    <i class="fas fa-file-medical me-2"></i> Ver Orden de Examen
                </button>
            </div>
            
            <!-- Orden oculta inicialmente -->
            <div class="pdf-viewer" id="orderViewer">
                <div class="order-document">
                    <!-- Cabecera del documento -->
                    <div class="doc-header">
                        <div class="logo-container">
                            <div class="logo">T</div>
                            <div class="brand-name">Trauma<span class="brand-name-accent">Med</span></div>
                        </div>
                        <div class="order-info">
                            <div>Orden n° {{ substr($solicitud->id, 3) }}</div>
                            <div>Fecha de emisión {{ $solicitud->fecha }}</div>
                        </div>
                    </div>

                    <!-- Título del documento -->
                    <h1 class="doc-title">Solicitud de exámenes</h1>

                    <!-- Información del paciente -->
                    <div class="section-label">Paciente</div>
                    <div class="input-field">{{ $solicitud->paciente }}</div>

                    <!-- Información en 2 columnas -->
                    <div class="two-columns">
                        <div>
                            <div class="section-label">Edad</div>
                            <div class="input-field">{{ rand(25, 70) }} años</div>
                        </div>
                        <div>
                            <div class="section-label">Rut</div>
                            <div class="input-field">{{ $solicitud->rut }}</div>
                        </div>
                    </div>

                    <div class="divider"></div>

                    <!-- Sección de exámenes -->
                    <div class="section-title">Laboratorio</div>

                    <div class="exam-grid">
                        <div class="exam-item">
                            <div class="exam-name">Resonancia Magnética</div>
                            <div class="exam-prep">No necesita preparación</div>
                        </div>
                        <div class="exam-item">
                            <div class="exam-name">Rodilla {{ $solicitud->rodilla }}</div>
                            <div class="exam-prep">No necesita preparación</div>
                        </div>
                        @if($solicitud->rodilla == 'Ambas')
                        <div class="exam-item">
                            <div class="exam-name">Evaluación bilateral</div>
                            <div class="exam-prep">No necesita preparación</div>
                        </div>
                        @else
                        <div class="exam-item">
                            <div class="exam-name">Informe detallado</div>
                            <div class="exam-prep">Ayuno 8-12hrs</div>
                        </div>
                        @endif
                    </div>

                    <!-- Firma del médico -->
                    <div class="signature-area">
                        <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMjAiIGhlaWdodD0iNDAiIHZpZXdCb3g9IjAgMCAxMjAgNDAiPjxwYXRoIGQ9Ik0xMCAyMCBDMjAgMTAgNDAgMzAgNzAgMTAgQzkwIDAgMTEwIDMwIDEyMCAyMCIgc3Ryb2tlPSIjMzMzIiBmaWxsPSJub25lIiBzdHJva2Utd2lkdGg9IjEuNSIvPjwvc3ZnPg==" class="signature-img" alt="Firma">
                        <div class="signature-line"></div>
                        <div class="doctor-name">Dr(a) {{ $solicitud->traumatologo }}</div>
                        <div class="doctor-id">RUT: {{ $solicitud->rut_traumatologo }}</div>
                    </div>
                </div>
            </div>
            
            <div class="btn-actions" id="orderActions" style="display: none;">
                <a href="{{ url()->previous() }}" class="btn btn-custom btn-back">
                    <i class="fas fa-arrow-left me-2"></i> Volver
                </a>
                <button onclick="imprimirOrden()" class="btn btn-custom btn-print">
                    <i class="fas fa-print me-2"></i> Imprimir
                </button>
            </div>
        </div>
    </div>
    
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Configurar el botón para mostrar la orden
        document.getElementById('btnViewOrder').addEventListener('click', function() {
            // Mostrar la orden
            document.getElementById('orderViewer').style.display = 'block';
            // Mostrar los botones de acción
            document.getElementById('orderActions').style.display = 'flex';
            // Ocultar el botón de "Ver Orden"
            this.style.display = 'none';
            // Ocultar la información inicial
            document.querySelector('.document-info').style.display = 'none';
        });
    });
    
    function imprimirOrden() {
        // Crear un iframe oculto para la impresión
        const iframe = document.createElement('iframe');
        iframe.style.display = 'none';
        document.body.appendChild(iframe);
        
        // Escribir el contenido en el iframe con estilos que aseguren el centrado
        iframe.contentDocument.write(`
            <!DOCTYPE html>
            <html>
            <head>
                <title>Orden de Examen</title>
                <style>
                    @page {
                        size: letter portrait;
                        margin: 0.5cm;
                    }
                    
                    body {
                        font-family: 'Segoe UI', Arial, sans-serif;
                        margin: 0;
                        padding: 0;
                        display: flex;
                        justify-content: center;
                        background-color: white;
                    }
                    
                    .print-container {
                        width: 21cm;
                        max-width: 21cm;
                        margin: 0 auto;
                        padding: 1cm;
                        box-sizing: border-box;
                        background-color: white;
                    }
                    
                    .doc-header {
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                        margin-bottom: 20px;
                    }
                    
                    .logo-container {
                        display: flex;
                        align-items: center;
                    }
                    
                    .logo {
                        width: 40px;
                        height: 40px;
                        background-color: #5595e9;
                        clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        color: white;
                        font-weight: bold;
                        font-size: 22px;
                        margin-right: 10px;
                    }
                    
                    .brand-name {
                        font-weight: 700;
                        font-size: 22px;
                        color: #333;
                    }
                    
                    .brand-name-accent {
                        color: #FF9966;
                    }
                    
                    .order-info {
                        text-align: right;
                        font-size: 14px;
                        color: #6b7280;
                    }
                    
                    .doc-title {
                        text-align: center;
                        font-size: 24px;
                        color: #1f2937;
                        font-weight: 600;
                        margin: 30px 0;
                    }
                    
                    .section-label {
                        font-size: 14px;
                        color: #6b7280;
                        margin-bottom: 5px;
                    }
                    
                    .input-field {
                        border: 1px solid #d1d5db;
                        border-radius: 6px;
                        padding: 10px 15px;
                        font-size: 16px;
                        margin-bottom: 15px;
                        width: 100%;
                        background-color: #f9fafb;
                        box-sizing: border-box;
                    }
                    
                    .divider {
                        height: 1px;
                        background-color: #e5e7eb;
                        margin: 25px 0;
                        width: 100%;
                    }
                    
                    .section-title {
                        font-size: 18px;
                        font-weight: 600;
                        color: #1f2937;
                        margin-bottom: 20px;
                    }
                    
                    .exam-grid {
                        display: grid;
                        grid-template-columns: repeat(3, 1fr);
                        gap: 20px;
                        margin-bottom: 30px;
                    }
                    
                    .exam-item {
                        margin-bottom: 15px;
                    }
                    
                    .exam-name {
                        font-weight: 600;
                        margin-bottom: 5px;
                        color: #1f2937;
                    }
                    
                    .exam-prep {
                        font-size: 13px;
                        color: #6b7280;
                    }
                    
                    .signature-area {
                        margin-top: 50px;
                        text-align: center;
                    }
                    
                    .signature-img {
                        max-width: 120px;
                        max-height: 50px;
                        margin: 0 auto;
                        display: block;
                    }
                    
                    .signature-line {
                        width: 200px;
                        height: 1px;
                        background-color: #d1d5db;
                        margin: 10px auto;
                    }
                    
                    .doctor-name {
                        font-weight: 600;
                        font-size: 14px;
                        margin-bottom: 2px;
                    }
                    
                    .doctor-id {
                        font-size: 13px;
                        color: #6b7280;
                    }
                    
                    .two-columns {
                        display: grid;
                        grid-template-columns: 1fr 1fr;
                        gap: 20px;
                        width: 100%;
                    }
                    
                    @media print {
                        body { 
                            -webkit-print-color-adjust: exact; 
                            print-color-adjust: exact; 
                        }
                        .print-container {
                            width: 100%;
                            max-width: 100%;
                            padding: 0;
                        }
                    }
                </style>
            </head>
            <body>
                <div class="print-container">
                    <!-- Cabecera del documento -->
                    <div class="doc-header">
                        <div class="logo-container">
                            <div class="logo">T</div>
                            <div class="brand-name">Trauma<span class="brand-name-accent">Med</span></div>
                        </div>
                        <div class="order-info">
                            <div>Orden n° ${document.querySelector('.order-info').innerText.split('Orden n° ')[1].split('\n')[0]}</div>
                            <div>Fecha de emisión ${document.querySelector('.order-info').innerText.split('Fecha de emisión ')[1]}</div>
                        </div>
                    </div>

                    <!-- Título del documento -->
                    <h1 class="doc-title">Solicitud de exámenes</h1>

                    <!-- Información del paciente -->
                    <div class="section-label">Paciente</div>
                    <div class="input-field">${document.querySelectorAll('.input-field')[0].innerText}</div>

                    <!-- Información en 2 columnas -->
                    <div class="two-columns">
                        <div>
                            <div class="section-label">Edad</div>
                            <div class="input-field">${document.querySelectorAll('.input-field')[1].innerText}</div>
                        </div>
                        <div>
                            <div class="section-label">Rut</div>
                            <div class="input-field">${document.querySelectorAll('.input-field')[2].innerText}</div>
                        </div>
                    </div>

                    <div class="divider"></div>

                    <!-- Sección de exámenes -->
                    <div class="section-title">Laboratorio</div>

                    <div class="exam-grid">
                        <div class="exam-item">
                            <div class="exam-name">${document.querySelectorAll('.exam-name')[0].innerText}</div>
                            <div class="exam-prep">${document.querySelectorAll('.exam-prep')[0].innerText}</div>
                        </div>
                        <div class="exam-item">
                            <div class="exam-name">${document.querySelectorAll('.exam-name')[1].innerText}</div>
                            <div class="exam-prep">${document.querySelectorAll('.exam-prep')[1].innerText}</div>
                        </div>
                        <div class="exam-item">
                            <div class="exam-name">${document.querySelectorAll('.exam-name')[2].innerText}</div>
                            <div class="exam-prep">${document.querySelectorAll('.exam-prep')[2].innerText}</div>
                        </div>
                    </div>

                    <!-- Firma del médico -->
                    <div class="signature-area">
                        <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMjAiIGhlaWdodD0iNDAiIHZpZXdCb3g9IjAgMCAxMjAgNDAiPjxwYXRoIGQ9Ik0xMCAyMCBDMjAgMTAgNDAgMzAgNzAgMTAgQzkwIDAgMTEwIDMwIDEyMCAyMCIgc3Ryb2tlPSIjMzMzIiBmaWxsPSJub25lIiBzdHJva2Utd2lkdGg9IjEuNSIvPjwvc3ZnPg==" class="signature-img" alt="Firma">
                        <div class="signature-line"></div>
                        <div class="doctor-name">${document.querySelector('.doctor-name').innerText}</div>
                        <div class="doctor-id">${document.querySelector('.doctor-id').innerText}</div>
                    </div>
                </div>
            </body>
            </html>
        `);
        iframe.contentDocument.close();
        
        // Esperar a que el contenido se cargue completamente
        iframe.onload = function() {
            // Imprimir y remover el iframe después
            setTimeout(function() {
                iframe.contentWindow.focus();
                iframe.contentWindow.print();
                document.body.removeChild(iframe);
            }, 500);
        };
    }
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>