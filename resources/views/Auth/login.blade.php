<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - TraumaMed</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', 'Helvetica Neue', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f2f5;
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .logo-container {
            background-color: #1A73E8;
            padding: 15px 0;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
        }
        
        .logo-hexagon {
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
        
        .login-container {
            max-width: 450px;
            margin: 60px auto;
            padding: 30px;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }
        
        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .login-title {
            font-size: 24px;
            font-weight: 600;
            color: #0D47A1;
            margin-bottom: 10px;
        }
        
        .login-subtitle {
            font-size: 14px;
            color: #727272;
        }
        
        .login-form {
            margin-top: 25px;
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
            box-sizing: border-box;
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
        
        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            font-size: 14px;
        }
        
        .checkbox-container {
            display: flex;
            align-items: center;
        }
        
        .checkbox-input {
            margin-right: 8px;
        }
        
        .forgot-link {
            color: #1A73E8;
            text-decoration: none;
            transition: color 0.2s;
        }
        
        .forgot-link:hover {
            color: #0D47A1;
            text-decoration: underline;
        }
        
        .login-button {
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
        
        .login-button:hover {
            background-color: #0D47A1;
        }
        
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
        
        .social-login {
            display: flex;
            gap: 15px;
        }
        
        .social-button {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            background-color: white;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        
        .social-button:hover {
            background-color: #f5f7fa;
        }
        
        .social-icon {
            font-size: 20px;
            margin-right: 8px;
        }
        
        .google-icon {
            color: #DB4437;
        }
        
        .microsoft-icon {
            color: #0078D4;
        }
        
        .register-link {
            text-align: center;
            margin-top: 25px;
            font-size: 14px;
            color: #727272;
        }
        
        .register-link a {
            color: #1A73E8;
            text-decoration: none;
            font-weight: 500;
        }
        
        .register-link a:hover {
            text-decoration: underline;
        }
        
        .footer {
            margin-top: auto;
            padding: 20px;
            background-color: #f5f7fa;
            text-align: center;
            font-size: 13px;
            color: #727272;
        }
        
        /* Responsive */
        @media (max-width: 500px) {
            .login-container {
                margin: 30px 15px;
                padding: 20px;
            }
            
            .social-login {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    @include('partials.navbar')

    <!-- Contenedor de login -->
    <div class="login-container">
        <div class="login-header">
            <h1 class="login-title">Iniciar Sesión</h1>
            <p class="login-subtitle">Accede al sistema de gestión de órdenes de examen</p>
        </div>
        
        <form class="login-form">
            <div class="form-group">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" id="email" class="form-input" placeholder="correo@ejemplo.com" required>
            </div>
            
            <div class="form-group">
                <label for="password" class="form-label">Contraseña</label>
                <div class="input-with-icon">
                    <input type="password" id="password" class="form-input" placeholder="Ingrese su contraseña" required>
                    <i class="far fa-eye input-icon"></i>
                </div>
            </div>
            
            <div class="remember-forgot">
                <div class="checkbox-container">
                    <input type="checkbox" id="remember" class="checkbox-input">
                    <label for="remember">Recordarme</label>
                </div>
                <a href="#" class="forgot-link">¿Olvidó su contraseña?</a>
            </div>
            
            <button type="submit" class="login-button">Iniciar Sesión</button>
        </form>
        
        <div class="or-divider">
            <div class="divider-line"></div>
            <span class="divider-text">o continuar con</span>
            <div class="divider-line"></div>
        </div>
        
        <div class="social-login">
            <button class="social-button">
                <i class="fab fa-google social-icon google-icon"></i>
                Google
            </button>
            <button class="social-button">
                <i class="fab fa-microsoft social-icon microsoft-icon"></i>
                Microsoft
            </button>
        </div>
        
        <div class="register-link">
            ¿No tiene una cuenta? <a href="{{ route('register') }}">Regístrese aquí</a>
        </div>
    </div>
    
    <div class="footer">
        TraumaMed - Centro Especializado en Traumatología y Ortopedia | Todos los derechos reservados © 2025
    </div>
</body>
</html>