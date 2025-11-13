<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Laravel App')</title>
    
    <!-- Fuentes modernas de Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-color: #6366f1;
            --primary-dark: #4f46e5;
            --primary-light: #818cf8;
            --secondary-color: #ec4899;
            --background: #0f172a;
            --surface: #1e293b;
            --surface-light: #334155;
            --text-primary: #f8fafc;
            --text-secondary: #cbd5e1;
            --text-muted: #94a3b8;
            --accent: #f59e0b;
            --success: #10b981;
            --border-radius: 20px;
            --box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            color: var(--text-primary);
            line-height: 1.6;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* Patrón de fondo decorativo */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 20% 50%, rgba(99, 102, 241, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(236, 72, 153, 0.1) 0%, transparent 50%),
                radial-gradient(circle at 40% 20%, rgba(245, 158, 11, 0.08) 0%, transparent 50%);
            pointer-events: none;
            z-index: 0;
        }

        /* Navbar moderna */
        .navbar {
            background: rgba(30, 41, 59, 0.8);
            backdrop-filter: blur(20px);
            padding: 1.2rem 2rem;
            position: sticky;
            top: 0;
            z-index: 1000;
            border-bottom: 1px solid rgba(148, 163, 184, 0.1);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .navbar-container {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-family: 'Poppins', sans-serif;
            font-size: 1.8rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: var(--transition);
        }

        .logo:hover {
            transform: translateY(-2px);
            filter: brightness(1.2);
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            list-style: none;
            align-items: center;
        }

        .nav-link {
            color: var(--text-secondary);
            text-decoration: none;
            font-weight: 500;
            padding: 0.5rem 1.2rem;
            border-radius: 10px;
            transition: var(--transition);
            position: relative;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            transform: translateX(-50%);
            transition: var(--transition);
        }

        .nav-link:hover {
            color: var(--text-primary);
            background: rgba(99, 102, 241, 0.1);
        }

        .nav-link:hover::before {
            width: 80%;
        }

        .nav-link.active {
            color: var(--text-primary);
            background: rgba(99, 102, 241, 0.15);
        }

        /* Contenedor principal */
        .main-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 3rem 2rem;
            position: relative;
            z-index: 1;
        }

        /* Cards y contenido */
        .content-wrapper {
            min-height: calc(100vh - 200px);
        }

        /* Footer moderno */
        .footer {
            background: rgba(30, 41, 59, 0.5);
            backdrop-filter: blur(10px);
            padding: 2rem;
            margin-top: 4rem;
            text-align: center;
            border-top: 1px solid rgba(148, 163, 184, 0.1);
        }

        .footer-content {
            max-width: 1400px;
            margin: 0 auto;
            color: var(--text-muted);
            font-size: 0.95rem;
        }

        .footer-content a {
            color: var(--primary-light);
            text-decoration: none;
            transition: var(--transition);
        }

        .footer-content a:hover {
            color: var(--primary-color);
            text-decoration: underline;
        }

        /* Animaciones */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        .animate-fade-in {
            animation: fadeInUp 0.6s ease-out forwards;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .navbar {
                padding: 1rem;
            }

            .nav-links {
                gap: 1rem;
                flex-wrap: wrap;
            }

            .logo {
                font-size: 1.4rem;
            }

            .main-container {
                padding: 2rem 1rem;
            }

            .nav-link {
                padding: 0.4rem 0.8rem;
                font-size: 0.9rem;
            }
        }

        /* Utilidades */
        .gradient-text {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .btn {
            display: inline-block;
            padding: 0.8rem 2rem;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
            border: none;
            cursor: pointer;
            font-size: 1rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: white;
            box-shadow: 0 4px 20px rgba(99, 102, 241, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(99, 102, 241, 0.4);
        }

        .btn-secondary {
            background: linear-gradient(135deg, var(--secondary-color), #be185d);
            color: white;
            box-shadow: 0 4px 20px rgba(236, 72, 153, 0.3);
        }

        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(236, 72, 153, 0.4);
        }
    </style>

    @yield('styles')
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navbar-container">
            <a href="{{ url('/') }}" class="logo">
                <span>🚀</span> Laravel App
            </a>
            <ul class="nav-links">
                <li><a href="{{ url('/') }}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">Inicio</a></li>
                <li><a href="{{ route('bienvenida') }}" class="nav-link {{ Request::is('bienvenida') ? 'active' : '' }}">Bienvenida</a></li>
                <li><a href="{{ route('saludo', ['nombre' => 'Usuario']) }}" class="nav-link {{ Request::is('saludo/*') ? 'active' : '' }}">Saludo</a></li>
            </ul>
        </div>
    </nav>

    <!-- Contenido principal -->
    <main class="main-container">
        <div class="content-wrapper animate-fade-in">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <p>Creado con ❤️ usando <a href="https://laravel.com" target="_blank">Laravel</a></p>
            <p style="margin-top: 0.5rem; font-size: 0.85rem;">© {{ date('Y') }} - Todos los derechos reservados</p>
        </div>
    </footer>

    @yield('scripts')
</body>
</html>
