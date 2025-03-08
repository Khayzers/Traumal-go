<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuestros Traumatólogos - TraumaMed</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <style>
        /* Estilos específicos para la página de traumatólogos */
        .specialists-header {
            background-color: #f5f8fd;
            padding: 60px 0 40px;
            text-align: center;
            border-bottom: 1px solid #e0e6ed;
        }
        
        .specialists-header h1 {
            color: #0066cc;
            font-size: 36px;
            margin-bottom: 15px;
        }
        
        .specialists-header p {
            color: #5a6a7e;
            max-width: 800px;
            margin: 0 auto;
            font-size: 18px;
            line-height: 1.6;
        }
        
        .filter-section {
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            margin: -20px auto 40px;
            max-width: 1100px;
            position: relative;
        }
        
        .filter-form {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            align-items: end;
        }
        
        .form-field {
            display: flex;
            flex-direction: column;
        }
        
        .form-field label {
            font-weight: 600;
            margin-bottom: 8px;
            color: #33485d;
            font-size: 14px;
        }
        
        .form-field select,
        .form-field input {
            padding: 12px 15px;
            border: 1px solid #dce2e9;
            border-radius: 6px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        
        .form-field select:focus,
        .form-field input:focus {
            border-color: #0066cc;
            outline: none;
        }
        
        .filter-button {
            background-color: #0066cc;
            color: white;
            border: none;
            border-radius: 6px;
            padding: 12px 25px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .filter-button:hover {
            background-color: #0055aa;
        }
        
        .doctors-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .doctors-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 30px;
            margin-bottom: 60px;
        }
        
        .doctor-card {
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 3px 15px rgba(0,0,0,0.07);
            transition: transform 0.3s, box-shadow 0.3s;
            border: 1px solid #f0f3f7;
        }
        
        .doctor-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }
        
        .doctor-header {
            position: relative;
            height: 120px;
            background-color: #e7f1fb;
        }
        
        .doctor-image {
            position: absolute;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-color: #fff;
            border: 4px solid white;
            bottom: -50px;
            left: 20px;
            background-size: cover;
            background-position: center;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        }
        
        .doctor-specialty-tag {
            position: absolute;
            right: 15px;
            bottom: 15px;
            background-color: #0066cc;
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .doctor-info {
            padding: 60px 20px 25px;
        }
        
        .doctor-name {
            font-size: 22px;
            font-weight: 700;
            color: #0066cc;
            margin-bottom: 5px;
        }
        
        .doctor-title {
            color: #5a6a7e;
            font-weight: 500;
            margin-bottom: 20px;
            font-size: 16px;
        }
        
        .doctor-bio {
            color: #526172;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #edf1f6;
        }
        
        .doctor-details {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-bottom: 20px;
        }
        
        .detail-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            color: #526172;
        }
        
        .detail-icon {
            flex-shrink: 0;
            width: 20px;
            text-align: center;
            color: #0066cc;
        }
        
        .doctor-action {
            text-align: center;
        }
        
        .btn-order {
            display: inline-block;
            background-color: #e63946;
            color: white;
            font-weight: 600;
            padding: 12px 30px;
            border-radius: 6px;
            text-decoration: none;
            transition: background-color 0.3s;
            width: 100%;
            box-sizing: border-box;
            text-align: center;
        }
        
        .btn-order:hover {
            background-color: #d52635;
        }
        
        .pagination {
            display: flex;
            justify-content: center;
            gap: 5px;
            margin-top: 40px;
        }
        
        .page-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 8px;
            background-color: white;
            border: 1px solid #e0e6ed;
            color: #33485d;
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .page-link:hover,
        .page-link.active {
            background-color: #0066cc;
            color: white;
            border-color: #0066cc;
        }
        
        .doctors-counter {
            margin-bottom: 30px;
            color: #5a6a7e;
            font-size: 16px;
        }
        
        @media (max-width: 768px) {
            .filter-form {
                grid-template-columns: 1fr;
            }
            
            .doctors-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    @include('partials.navbar')
    
    <div class="specialists-header">
        <div class="container">
            <h1>Nuestro Equipo de Especialistas</h1>
            <p>Contamos con traumatólogos altamente capacitados en diferentes áreas de especialización. Seleccione un profesional y solicite su orden de examen médico de forma gratuita.</p>
        </div>
    </div>
    
    <div class="container">
        <div class="filter-section">
            <form class="filter-form">
                <div class="form-field">
                    <label for="specialty">Especialidad</label>
                    <select id="specialty" name="specialty">
                        <option value="">Todas las especialidades</option>
                        <option value="rodilla">Rodilla</option>
                        <option value="cadera">Cadera</option>
                        <option value="columna">Columna</option>
                        <option value="hombro">Hombro</option>
                        <option value="infantil">Traumatología Infantil</option>
                        <option value="deportiva">Medicina Deportiva</option>
                    </select>
                </div>
                
                <div class="form-field">
                    <label for="location">Ubicación</label>
                    <select id="location" name="location">
                        <option value="">Todas las ubicaciones</option>
                        <option value="santiago">Santiago Centro</option>
                        <option value="providencia">Providencia</option>
                        <option value="lascondes">Las Condes</option>
                        <option value="vitacura">Vitacura</option>
                        <option value="nunoa">Ñuñoa</option>
                    </select>
                </div>
                
                <div class="form-field">
                    <label for="searchName">Nombre del especialista</label>
                    <input type="text" id="searchName" name="searchName" placeholder="Buscar por nombre">
                </div>
                
                <button type="submit" class="filter-button">Buscar especialistas</button>
            </form>
        </div>
    </div>
    
    <div class="doctors-container">
        <div class="doctors-counter">Mostrando <strong>6</strong> especialistas</div>
        
        <div class="doctors-grid">
            <!-- Doctor 1 -->
            <div class="doctor-card">
                <div class="doctor-header">
                    <div class="doctor-image" style="background-image: url('/api/placeholder/100/100')"></div>
                    <div class="doctor-specialty-tag">Rodilla y Cadera</div>
                </div>
                <div class="doctor-info">
                    <h3 class="doctor-name">Dr. Carlos Méndez</h3>
                    <div class="doctor-title">Traumatólogo Especialista en Articulaciones Mayores</div>
                    <p class="doctor-bio">Especialista con 15 años de experiencia en procedimientos quirúrgicos de rodilla y cadera. Formado en la Universidad de Chile con estudios de especialización en España y Estados Unidos. Referente en cirugía de reemplazo articular.</p>
                    <div class="doctor-details">
                        <div class="detail-item">
                            <div class="detail-icon">📍</div>
                            <div>Las Condes, Santiago</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-icon">🏥</div>
                            <div>Hospital Clínico Universidad de Chile</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-icon">⏰</div>
                            <div>Disponibilidad: Lunes a Jueves</div>
                        </div>
                    </div>
                    <div class="doctor-action">
                        <button class="btn-order" onclick="alert('Funcionalidad en desarrollo')">Solicitar orden de examen</button>
                    </div>
                </div>
            </div>
            
            <!-- Doctor 2 -->
            <div class="doctor-card">
                <div class="doctor-header">
                    <div class="doctor-image" style="background-image: url('/api/placeholder/100/100')"></div>
                    <div class="doctor-specialty-tag">Traumatología Deportiva</div>
                </div>
                <div class="doctor-info">
                    <h3 class="doctor-name">Dra. Ana Martínez</h3>
                    <div class="doctor-title">Especialista en Medicina Deportiva</div>
                    <p class="doctor-bio">Especializada en lesiones deportivas de alto rendimiento con enfoque en medicina regenerativa y tratamientos mínimamente invasivos. Amplia experiencia con deportistas de élite y rehabilitación acelerada.</p>
                    <div class="doctor-details">
                        <div class="detail-item">
                            <div class="detail-icon">📍</div>
                            <div>Providencia, Santiago</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-icon">🏥</div>
                            <div>Clínica Las Condes</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-icon">⏰</div>
                            <div>Disponibilidad: Martes a Viernes</div>
                        </div>
                    </div>
                    <div class="doctor-action">
                        <button class="btn-order" onclick="alert('Funcionalidad en desarrollo')">Solicitar orden de examen</button>
                    </div>
                </div>
            </div>
            
            <!-- Doctor 3 -->
            <div class="doctor-card">
                <div class="doctor-header">
                    <div class="doctor-image" style="background-image: url('/api/placeholder/100/100')"></div>
                    <div class="doctor-specialty-tag">Columna Vertebral</div>
                </div>
                <div class="doctor-info">
                    <h3 class="doctor-name">Dr. Roberto Sánchez</h3>
                    <div class="doctor-title">Especialista en Patologías de Columna</div>
                    <p class="doctor-bio">Referente en tratamientos de columna con más de 20 años de trayectoria. Pionero en técnicas quirúrgicas mínimamente invasivas para patologías degenerativas y traumáticas de la columna vertebral.</p>
                    <div class="doctor-details">
                        <div class="detail-item">
                            <div class="detail-icon">📍</div>
                            <div>Vitacura, Santiago</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-icon">🏥</div>
                            <div>Clínica Alemana</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-icon">⏰</div>
                            <div>Disponibilidad: Lunes, Miércoles y Viernes</div>
                        </div>
                    </div>
                    <div class="doctor-action">
                        <button class="btn-order" onclick="alert('Funcionalidad en desarrollo')">Solicitar orden de examen</button>
                    </div>
                </div>
            </div>
            
            <!-- Doctor 4 -->
            <div class="doctor-card">
                <div class="doctor-header">
                    <div class="doctor-image" style="background-image: url('/api/placeholder/100/100')"></div>
                    <div class="doctor-specialty-tag">Hombro y Codo</div>
                </div>
                <div class="doctor-info">
                    <h3 class="doctor-name">Dra. Laura Fernández</h3>
                    <div class="doctor-title">Especialista en Miembro Superior</div>
                    <p class="doctor-bio">Especialista en patologías de extremidad superior con formación internacional. Experta en artroscopía avanzada y cirugía reconstructiva de hombro y codo, con enfoque en lesiones complejas y deportivas.</p>
                    <div class="doctor-details">
                        <div class="detail-item">
                            <div class="detail-icon">📍</div>
                            <div>Las Condes, Santiago</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-icon">🏥</div>
                            <div>Clínica Santa María</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-icon">⏰</div>
                            <div>Disponibilidad: Martes, Jueves y Viernes</div>
                        </div>
                    </div>
                    <div class="doctor-action">
                        <button class="btn-order" onclick="alert('Funcionalidad en desarrollo')">Solicitar orden de examen</button>
                    </div>
                </div>
            </div>
            
            <!-- Doctor 5 -->
            <div class="doctor-card">
                <div class="doctor-header">
                    <div class="doctor-image" style="background-image: url('/api/placeholder/100/100')"></div>
                    <div class="doctor-specialty-tag">Trauma Infantil</div>
                </div>
                <div class="doctor-info">
                    <h3 class="doctor-name">Dr. Miguel Torres</h3>
                    <div class="doctor-title">Especialista en Traumatología Pediátrica</div>
                    <p class="doctor-bio">Especializado en traumatología pediátrica y adolescente con más de 12 años de experiencia. Enfoque en el tratamiento conservador y quirúrgico de patologías congénitas y adquiridas del sistema musculoesquelético.</p>
                    <div class="doctor-details">
                        <div class="detail-item">
                            <div class="detail-icon">📍</div>
                            <div>Santiago Centro</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-icon">🏥</div>
                            <div>Hospital Roberto del Río</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-icon">⏰</div>
                            <div>Disponibilidad: Lunes a Miércoles</div>
                        </div>
                    </div>
                    <div class="doctor-action">
                        <button class="btn-order" onclick="alert('Funcionalidad en desarrollo')">Solicitar orden de examen</button>
                    </div>
                </div>
            </div>
            
            <!-- Doctor 6 -->
            <div class="doctor-card">
                <div class="doctor-header">
                    <div class="doctor-image" style="background-image: url('/api/placeholder/100/100')"></div>
                    <div class="doctor-specialty-tag">Pie y Tobillo</div>
                </div>
                <div class="doctor-info">
                    <h3 class="doctor-name">Dra. Patricia Vega</h3>
                    <div class="doctor-title">Especialista en Patologías del Pie</div>
                    <p class="doctor-bio">Referente en cirugía de pie y tobillo con formación en Estados Unidos. Experta en tratamientos para deformidades, lesiones deportivas, problemas degenerativos y reconstrucción compleja de tobillo y pie.</p>
                    <div class="doctor-details">
                        <div class="detail-item">
                            <div class="detail-icon">📍</div>
                            <div>Providencia, Santiago</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-icon">🏥</div>
                            <div>Clínica MEDS</div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-icon">⏰</div>
                            <div>Disponibilidad: Miércoles a Viernes</div>
                        </div>
                    </div>
                    <div class="doctor-action">
                        <button class="btn-order" onclick="alert('Funcionalidad en desarrollo')">Solicitar orden de examen</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="pagination">
            <a href="#" class="page-link active">1</a>
            <a href="#" class="page-link">2</a>
            <a href="#" class="page-link">3</a>
            <a href="#" class="page-link">→</a>
        </div>
    </div>
    
    <div class="footer">
        <div class="container">
            TraumaMed - Centro Especializado en Traumatología y Ortopedia | Todos los derechos reservados © 2025
        </div>
    </div>
</body>
</html>