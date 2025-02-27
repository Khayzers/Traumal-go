<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orden de Resonancia Gratuita - TraumaMed</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>
<body>
    @include('partials.navbar')
    
    <div class="container">
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
                
                <a href="{{ route('formulario.evaluacion') }}" class="btn-redirect">Solicitar Orden Gratuita</a>
                
                <p class="disclaimer">* La orden de resonancia es completamente gratuita y se emite luego de una evaluación de su caso. En el formulario podrá seleccionar el centro médico de su preferencia dentro de nuestra red de centros afiliados. Nosotros nos encargamos de enviar la orden directamente al centro elegido y coordinar su cita. Consulte disponibilidad según su zona geográfica.</p>
            </div>
        </div>
    </div>
    
    <div class="footer">
        <div class="container">
            TraumaMed - Centro Especializado en Traumatología y Ortopedia | Todos los derechos reservados © 2025
        </div>
    </div>

</body>
</html>