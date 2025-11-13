@extends('layouts.app')

@section('title', 'Bienvenida - Laravel App')

@section('styles')
<style>
    .hero-section {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 4rem 2rem;
        min-height: 70vh;
    }

    .welcome-card {
        background: rgba(30, 41, 59, 0.6);
        backdrop-filter: blur(20px);
        border-radius: 30px;
        padding: 4rem 3rem;
        max-width: 800px;
        border: 1px solid rgba(148, 163, 184, 0.15);
        box-shadow: 0 25px 80px rgba(0, 0, 0, 0.3);
        position: relative;
        overflow: hidden;
    }

    .welcome-card::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(99, 102, 241, 0.1) 0%, transparent 70%);
        animation: rotate 20s linear infinite;
    }

    @keyframes rotate {
        from {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(360deg);
        }
    }

    .welcome-icon {
        font-size: 5rem;
        margin-bottom: 1.5rem;
        animation: float 3s ease-in-out infinite;
        position: relative;
        z-index: 1;
    }

    .welcome-title {
        font-family: 'Poppins', sans-serif;
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 1rem;
        background: linear-gradient(135deg, #6366f1, #ec4899, #f59e0b);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        line-height: 1.2;
        position: relative;
        z-index: 1;
    }

    .welcome-subtitle {
        font-size: 1.3rem;
        color: var(--text-secondary);
        margin-bottom: 2.5rem;
        font-weight: 400;
        position: relative;
        z-index: 1;
    }

    .welcome-description {
        font-size: 1.1rem;
        color: var(--text-muted);
        line-height: 1.8;
        margin-bottom: 3rem;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
        position: relative;
        z-index: 1;
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
        margin-top: 3rem;
        position: relative;
        z-index: 1;
    }

    .feature-card {
        background: rgba(51, 65, 85, 0.4);
        padding: 2rem;
        border-radius: 20px;
        border: 1px solid rgba(148, 163, 184, 0.1);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        text-align: center;
    }

    .feature-card:hover {
        background: rgba(51, 65, 85, 0.6);
        transform: translateY(-5px);
        border-color: rgba(99, 102, 241, 0.3);
        box-shadow: 0 10px 40px rgba(99, 102, 241, 0.2);
    }

    .feature-icon {
        font-size: 2.5rem;
        margin-bottom: 1rem;
        display: block;
    }

    .feature-title {
        font-size: 1.2rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: var(--text-primary);
    }

    .feature-description {
        font-size: 0.95rem;
        color: var(--text-muted);
        line-height: 1.6;
    }

    .cta-buttons {
        display: flex;
        gap: 1.5rem;
        justify-content: center;
        flex-wrap: wrap;
        margin-top: 2rem;
        position: relative;
        z-index: 1;
    }

    .pulse {
        animation: pulse 2s ease-in-out infinite;
    }

    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.05);
        }
    }

    @media (max-width: 768px) {
        .welcome-card {
            padding: 3rem 2rem;
        }

        .welcome-title {
            font-size: 2.5rem;
        }

        .welcome-subtitle {
            font-size: 1.1rem;
        }

        .welcome-description {
            font-size: 1rem;
        }

        .features-grid {
            grid-template-columns: 1fr;
        }

        .cta-buttons {
            flex-direction: column;
            width: 100%;
        }

        .btn {
            width: 100%;
        }
    }
</style>
@endsection

@section('content')
<div class="hero-section">
    <div class="welcome-card">
        <div class="welcome-icon">👋</div>
        
        <h1 class="welcome-title">
            ¡Bienvenido a Laravel!
        </h1>
        
        <p class="welcome-subtitle">
            Tu viaje en el desarrollo web moderno comienza aquí
        </p>
        
        <p class="welcome-description">
            Esta es una aplicación construida con Laravel, el framework PHP más elegante y expresivo.
            Explora las diferentes funcionalidades y descubre el poder de las rutas dinámicas.
        </p>

        <div class="cta-buttons">
            <a href="{{ route('saludo', ['nombre' => 'Visitante']) }}" class="btn btn-primary pulse">
                Prueba el Saludo Personalizado
            </a>
            <a href="{{ url('/') }}" class="btn btn-secondary">
                Volver al Inicio
            </a>
        </div>

        <div class="features-grid">
            <div class="feature-card">
                <span class="feature-icon">🎨</span>
                <h3 class="feature-title">Diseño Moderno</h3>
                <p class="feature-description">
                    Interfaz elegante y responsiva que se adapta a cualquier dispositivo
                </p>
            </div>

            <div class="feature-card">
                <span class="feature-icon">⚡</span>
                <h3 class="feature-title">Alto Rendimiento</h3>
                <p class="feature-description">
                    Optimizado para velocidad y eficiencia en cada interacción
                </p>
            </div>

            <div class="feature-card">
                <span class="feature-icon">🔐</span>
                <h3 class="feature-title">Seguro y Confiable</h3>
                <p class="feature-description">
                    Construido con las mejores prácticas de seguridad de Laravel
                </p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Animación adicional para los elementos
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.feature-card');
        
        cards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            
            setTimeout(() => {
                card.style.transition = 'all 0.6s ease-out';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, 100 * (index + 1));
        });
    });
</script>
@endsection
