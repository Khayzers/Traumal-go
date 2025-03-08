<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta - TraumaMed</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Estilos globales */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: 'Segoe UI', 'Helvetica Neue', Arial, sans-serif;
            background-color: #f0f2f5;
            color: #333;
            line-height: 1.5;
        }
        
        /* Barra de navegación */
        .navbar {
            background-color: #1A73E8;
            padding: 15px 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .navbar-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            display: flex;
            align-items: center;
            text-decoration: none;
        }
        
        .logo-icon {
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
        }
        
        .logo-text {
            color: white;
            font-weight: 700;
            font-size: 22px;
            margin-left: 10px;
        }
        
        .logo-highlight {
            color: #FF9966;
        }
        
        .navbar-menu {
            display: flex;
            list-style-type: none;
        }
        
        .nav-item a {
            color: white;
            text-decoration: none;
            font-weight: 400;
            padding: 8px 16px;
            border-radius: 4px;
            transition: background-color 0.2s;
        }
        
        .nav-item a:hover {
            background-color: rgba(255,255,255,0.1);
        }
        
        .nav-item a.active {
            background-color: rgba(255,255,255,0.2);
            font-weight: 600;
        }
        
        .nav-item:not(:first-child) {
            margin-left: 10px;
        }
        
        /* Contenedor principal */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
        }
        
        /* Formulario de registro */
        .register-container {
            max-width: 550px;
            margin: 0 auto;
            padding: 30px;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }
        
        .register-header {
            text-align: center;
            margin-bottom: 25px;
        }
        
        .register-title {
            font-size: 24px;
            font-weight: 600;
            color: #0D47A1;
            margin-bottom: 10px;
        }
        
        .register-subtitle {
            font-size: 14px;
            color: #727272;
        }
        
        /* Formulario */
        .register-form {
            margin-top: 20px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: #4A5568;
            margin-bottom: 8px;
        }
        
        .form-input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.3s;
        }
        
        .form-input:focus {
            border-color: #1A73E8;
            box-shadow: 0 0 0 3px rgba(26, 115, 232, 0.2);
            outline: none;
        }
        
        .input-with-icon {
            position: relative;
        }
        
        .input-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #9e9e9e;
            cursor: pointer;
        }
        
        /* Medidor de fortaleza */
        .password-strength {
            margin-top: 12px;
        }
        
        .strength-meter {
            height: 4px;
            background-color: #e0e0e0;
            border-radius: 2px;
            margin-bottom: 10px;
            overflow: hidden;
        }
        
        .strength-meter-fill {
            height: 100%;
            width: 0;
            border-radius: 2px;
            background-color: #F44336;
            transition: width 0.3s, background-color 0.3s;
        }
        
        .password-requirements {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 8px;
            font-size: 12px;
            color: #727272;
        }
        
        .requirement {
            display: flex;
            align-items: center;
        }
        
        .requirement i {
            font-size: 8px;
            margin-right: 6px;
            color: #9e9e9e;
        }
        
        .requirement.valid i {
            color: #4CAF50;
        }
        
        /* Términos y checkbox */
        .terms-container {
            margin-bottom: 25px;
        }
        
        .checkbox-container {
            display: flex;
            align-items: flex-start;
        }
        
        .checkbox-input {
            margin-right: 8px;
            margin-top: 3px;
        }
        
        .terms-link {
            color: #1A73E8;
            text-decoration: none;
            transition: color 0.2s;
        }
        
        .terms-link:hover {
            color: #0D47A1;
            text-decoration: underline;
        }
        
        /* Botón de registro */
        .register-button {
            width: 100%;
            padding: 12px;
            background-color: #1A73E8;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        
        .register-button:hover {
            background-color: #0D47A1;
        }
        
        /* Separador */
        .or-divider {
            display: flex;
            align-items: center;
            margin: 25px 0;
            color: #727272;
        }
        
        .divider-line {
            flex-grow: 1;
            height: 1px;
            background-color: #e0e0e0;
        }
        
        .divider-text {
            padding: 0 15px;
            font-size: 14px;
        }
        
        /* Botones sociales */
        .social-login {
            display: flex;
            gap: 15px;
        }
        
        .social-button {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            background-color: white;
            cursor: pointer;
            transition: all 0.2s;
            font-size: 14px;
        }
        
        .google-button:hover {
            background-color: #f8f9fa;
            border-color: #DB4437;
        }
        
        .microsoft-button:hover {
            background-color: #f8f9fa;
            border-color: #0078D4;
        }
        
        .social-icon {
            font-size: 18px;
            margin-right: 8px;
        }
        
        .fa-google {
            color: #DB4437;
        }
        
        .fa-microsoft {
            color: #0078D4;
        }
        
        /* Enlace a login */
        .login-link {
            text-align: center;
            margin-top: 25px;
            font-size: 14px;
            color: #727272;
        }
        
        .login-link a {
            color: #1A73E8;
            text-decoration: none;
            font-weight: 500;
        }
        
        .login-link a:hover {
            text-decoration: underline;
        }
        
        /* Footer */
        .footer {
            background-color: #f5f5f5;
            padding: 20px 0;
            margin-top: 60px;
            text-align: center;
            font-size: 14px;
            color: #727272;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .navbar-menu {
                display: none;
            }
            
            .social-login {
                flex-direction: column;
            }
            
            .password-requirements {
                grid-template-columns: 1fr;
            }
            
            .register-container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    @include('partials.navbar')

    <!-- Contenido principal -->
    <div class="container">
        <div class="register-container">
            <div class="register-header">
                <h1 class="register-title">Crear Cuenta</h1>
                <p class="register-subtitle">Regístrese para acceder al sistema de gestión de órdenes de examen</p>
            </div>
            
            <form action="#" method="POST" class="register-form">
                <div class="form-group">
                    <label for="name" class="form-label">Nombre completo</label>
                    <input type="text" id="name" name="name" class="form-input" placeholder="Ingrese su nombre completo" required>
                </div>
                
                <div class="form-group">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" id="email" name="email" class="form-input" placeholder="correo@ejemplo.com" required>
                </div>
                
                <div class="form-group">
                    <label for="phone" class="form-label">Teléfono</label>
                    <input type="tel" id="phone" name="phone" class="form-input" placeholder="+56 9 12345678">
                </div>
                
                <div class="form-group">
                    <label for="password" class="form-label">Contraseña</label>
                    <div class="input-with-icon">
                        <input type="password" id="password" name="password" class="form-input" placeholder="Cree una contraseña segura" required>
                        <i class="far fa-eye input-icon toggle-password"></i>
                    </div>
                    <div class="password-strength">
                        <div class="strength-meter">
                            <div class="strength-meter-fill" id="strength-meter-fill"></div>
                        </div>
                        <div class="password-requirements">
                            <div class="requirement" id="req-length"><i class="fas fa-circle"></i> Mínimo 8 caracteres</div>
                            <div class="requirement" id="req-capital"><i class="fas fa-circle"></i> Al menos una mayúscula</div>
                            <div class="requirement" id="req-number"><i class="fas fa-circle"></i> Al menos un número</div>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
                    <div class="input-with-icon">
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-input" placeholder="Confirme su contraseña" required>
                        <i class="far fa-eye input-icon toggle-confirm-password"></i>
                    </div>
                </div>
                
                <div class="terms-container">
                    <div class="checkbox-container">
                        <input type="checkbox" id="terms" name="terms" class="checkbox-input" required>
                        <label for="terms">Acepto los <a href="#" class="terms-link">Términos y Condiciones</a> y la <a href="#" class="terms-link">Política de Privacidad</a></label>
                    </div>
                </div>
                
                <button type="submit" class="register-button">Crear Cuenta</button>
            </form>
            
            <div class="or-divider">
                <div class="divider-line"></div>
                <span class="divider-text">o registrarse con</span>
                <div class="divider-line"></div>
            </div>
            
            <div class="social-login">
                <button type="button" class="social-button google-button">
                    <i class="fab fa-google social-icon"></i>
                    Google
                </button>
                <button type="button" class="social-button microsoft-button">
                    <i class="fab fa-microsoft social-icon"></i>
                    Microsoft
                </button>
            </div>
            
            <div class="login-link">
                ¿Ya tiene una cuenta? <a href="#">Inicie sesión aquí</a>
            </div>
        </div>
    </div>
    
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            TraumaMed - Centro Especializado en Traumatología y Ortopedia | Todos los derechos reservados © 2025
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mostrar/ocultar contraseña
            const togglePassword = document.querySelector('.toggle-password');
            const password = document.querySelector('#password');
            
            togglePassword.addEventListener('click', function() {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
            
            // Mostrar/ocultar confirmación de contraseña
            const toggleConfirmPassword = document.querySelector('.toggle-confirm-password');
            const confirmPassword = document.querySelector('#password_confirmation');
            
            toggleConfirmPassword.addEventListener('click', function() {
                const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
                confirmPassword.setAttribute('type', type);
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
            
            // Validación de fortaleza de contraseña
            const strengthMeter = document.getElementById('strength-meter-fill');
            const reqLength = document.getElementById('req-length');
            const reqCapital = document.getElementById('req-capital');
            const reqNumber = document.getElementById('req-number');
            
            password.addEventListener('input', function() {
                const val = password.value;
                let strength = 0;
                
                // Requisitos
                const hasLength = val.length >= 8;
                const hasCapital = /[A-Z]/.test(val);
                const hasNumber = /[0-9]/.test(val);
                
                // Actualizar indicadores visuales
                reqLength.classList.toggle('valid', hasLength);
                reqCapital.classList.toggle('valid', hasCapital);
                reqNumber.classList.toggle('valid', hasNumber);
                
                // Calcular fortaleza
                if (hasLength) strength += 33;
                if (hasCapital) strength += 33;
                if (hasNumber) strength += 34;
                
                // Actualizar medidor
                strengthMeter.style.width = strength + '%';
                
                // Cambiar color según fortaleza
                if (strength <= 33) {
                    strengthMeter.style.backgroundColor = '#F44336'; // Rojo
                } else if (strength <= 66) {
                    strengthMeter.style.backgroundColor = '#FFC107'; // Amarillo
                } else {
                    strengthMeter.style.backgroundColor = '#4CAF50'; // Verde
                }
            });
        });
    </script>
</body>
</html>