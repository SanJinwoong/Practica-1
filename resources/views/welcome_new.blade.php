@extends('layouts.app')

@section('title', 'Inicio - Laravel App')

@section('styles')
<style>
    .hero-home {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 2rem;
        min-height: 75vh;
    }

    .hero-content {
        max-width: 1100px;
        width: 100%;
    }

    .main-title {
        font-family: 'Poppins', sans-serif;
        font-size: 4.5rem;
        font-weight: 900;
        margin-bottom: 1.5rem;
        line-height: 1.1;
        background: linear-gradient(135deg, #6366f1, #ec4899, #f59e0b, #10b981);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        animation: gradientShift 8s ease infinite;
        background-size: 300% 300%;
    }

    @keyframes gradientShift {
        0%, 100% {
            background-position: 0% 50%;
        }
        50% {
            background-position: 100% 50%;
        }
    }

    .subtitle {
        font-size: 1.5rem;
        color: var(--text-secondary);
        margin-bottom: 3rem;
        font-weight: 400;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }

    .cards-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 2rem;
        margin-top: 4rem;
    }

    .route-card {
        background: rgba(30, 41, 59, 0.6);
        backdrop-filter: blur(20px);
        border-radius: 25px;
        padding: 3rem 2.5rem;
        border: 1px solid rgba(148, 163, 184, 0.15);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        text-decoration: none;
        display: block;
    }

    .route-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(99, 102, 241, 0.1), rgba(236, 72, 153, 0.1));
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .route-card:hover {
        transform: translateY(-10px) scale(1.02);
        border-color: rgba(99, 102, 241, 0.4);
        box-shadow: 0 20px 60px rgba(99, 102, 241, 0.3);
    }

    .route-card:hover::before {
        opacity: 1;
    }

    .card-icon {
        font-size: 4rem;
        margin-bottom: 1.5rem;
        display: block;
        position: relative;
        z-index: 1;
        transition: transform 0.4s ease;
    }

    .route-card:hover .card-icon {
        transform: scale(1.2) rotate(5deg);
    }

    .card-title {
        font-family: 'Poppins', sans-serif;
        font-size: 2rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 1rem;
        position: relative;
        z-index: 1;
    }

    .card-description {
        font-size: 1.1rem;
        color: var(--text-muted);
        line-height: 1.7;
        margin-bottom: 1.5rem;
        position: relative;
        z-index: 1;
    }

    .card-badge {
        display: inline-block;
        padding: 0.5rem 1.2rem;
        background: rgba(99, 102, 241, 0.15);
        border: 1px solid rgba(99, 102, 241, 0.3);
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        color: var(--primary-light);
        position: relative;
        z-index: 1;
        transition: all 0.3s ease;
    }

    .route-card:hover .card-badge {
        background: rgba(99, 102, 241, 0.25);
        border-color: rgba(99, 102, 241, 0.5);
    }

    .tech-stack {
        margin-top: 5rem;
        text-align: center;
    }

    .tech-title {
        font-size: 1.3rem;
        color: var(--text-secondary);
        margin-bottom: 2rem;
        font-weight: 600;
    }

    .tech-icons {
        display: flex;
        gap: 3rem;
        justify-content: center;
        flex-wrap: wrap;
    }

    .tech-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.8rem;
        transition: transform 0.3s ease;
    }

    .tech-item:hover {
        transform: translateY(-5px);
    }

    .tech-icon {
        font-size: 3rem;
        filter: grayscale(100%);
        transition: filter 0.3s ease;
    }

    .tech-item:hover .tech-icon {
        filter: grayscale(0%);
    }

    .tech-name {
        font-size: 0.9rem;
        color: var(--text-muted);
        font-weight: 500;
    }

    @media (max-width: 768px) {
        .main-title {
            font-size: 2.8rem;
        }

        .subtitle {
            font-size: 1.2rem;
        }

        .cards-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }

        .route-card {
            padding: 2.5rem 2rem;
        }

        .card-title {
            font-size: 1.6rem;
        }

        .tech-icons {
            gap: 2rem;
        }
    }
</style>
@endsection

@section('content')
<div class="hero-home">
    <div class="hero-content">
        <h1 class="main-title">
            Construye Aplicaciones Increíbles con Laravel
        </h1>
        
        <p class="subtitle">
            Descubre el poder del framework PHP más elegante. Explora rutas dinámicas, 
            controladores robustos y vistas hermosas.
        </p>

        <div class="cards-grid">
            <a href="{{ route('bienvenida') }}" class="route-card">
                <span class="card-icon"></span>
                <h2 class="card-title">Página de Bienvenida</h2>
                <p class="card-description">
                    Una hermosa página estática que te da la bienvenida al mundo de Laravel. 
                    Diseño moderno y animaciones suaves.
                </p>
                <span class="card-badge">Ruta Estática</span>
            </a>

            <a href="{{ route('saludo', ['nombre' => 'Usuario']) }}" class="route-card">
                <span class="card-icon"></span>
                <h2 class="card-title">Saludo Personalizado</h2>
                <p class="card-description">
                    Experimenta con rutas dinámicas. Cambia el nombre en la URL y 
                    observa cómo Laravel captura y procesa los parámetros.
                </p>
                <span class="card-badge">Ruta Dinámica</span>
            </a>
        </div>

        <div class="tech-stack">
            <h3 class="tech-title">Tecnologías Utilizadas</h3>
            <div class="tech-icons">
                <div class="tech-item">
                    <span class="tech-icon"></span>
                    <span class="tech-name">PHP</span>
                </div>
                <div class="tech-item">
                    <span class="tech-icon"></span>
                    <span class="tech-name">Laravel</span>
                </div>
                <div class="tech-item">
                    <span class="tech-icon"></span>
                    <span class="tech-name">Blade</span>
                </div>
                <div class="tech-item">
                    <span class="tech-icon"></span>
                    <span class="tech-name">CSS3</span>
                </div>
                <div class="tech-item">
                    <span class="tech-icon"></span>
                    <span class="tech-name">JavaScript</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.route-card');
        
        cards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(40px)';
            
            setTimeout(() => {
                card.style.transition = 'all 0.8s cubic-bezier(0.4, 0, 0.2, 1)';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, 200 * (index + 1));
        });

        const techItems = document.querySelectorAll('.tech-item');
        
        const observerOptions = {
            threshold: 0.5
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    setTimeout(() => {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }, index * 100);
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        techItems.forEach(item => {
            item.style.opacity = '0';
            item.style.transform = 'translateY(20px)';
            item.style.transition = 'all 0.6s ease-out';
            observer.observe(item);
        });
    });
</script>
@endsection
