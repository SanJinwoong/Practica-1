@extends('layouts.app')

@section('title', 'Saludo Personalizado - Laravel App')

@section('styles')
<style>
    .saludo-section {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 4rem 2rem;
        min-height: 70vh;
    }

    .saludo-container {
        background: rgba(30, 41, 59, 0.6);
        backdrop-filter: blur(20px);
        border-radius: 30px;
        padding: 4rem 3rem;
        max-width: 900px;
        width: 100%;
        border: 1px solid rgba(148, 163, 184, 0.15);
        box-shadow: 0 25px 80px rgba(0, 0, 0, 0.3);
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .saludo-container::after {
        content: '';
        position: absolute;
        top: -100px;
        right: -100px;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(236, 72, 153, 0.2) 0%, transparent 70%);
        border-radius: 50%;
        animation: float 6s ease-in-out infinite;
    }

    .saludo-container::before {
        content: '';
        position: absolute;
        bottom: -100px;
        left: -100px;
        width: 300px;
        height: 300px;
        background: radial-gradient(circle, rgba(99, 102, 241, 0.2) 0%, transparent 70%);
        border-radius: 50%;
        animation: float 8s ease-in-out infinite reverse;
    }

    .avatar-container {
        margin-bottom: 2rem;
        position: relative;
        z-index: 1;
    }

    .avatar {
        width: 150px;
        height: 150px;
        background: linear-gradient(135deg, #6366f1, #ec4899);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 4rem;
        margin: 0 auto;
        box-shadow: 0 10px 40px rgba(99, 102, 241, 0.4);
        animation: pulse 3s ease-in-out infinite;
        border: 5px solid rgba(248, 250, 252, 0.1);
    }

    .saludo-title {
        font-family: 'Poppins', sans-serif;
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 1rem;
        color: var(--text-primary);
        position: relative;
        z-index: 1;
    }

    .nombre-highlight {
        background: linear-gradient(135deg, #6366f1, #ec4899, #f59e0b);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        display: inline-block;
        animation: shimmer 3s ease-in-out infinite;
    }

    @keyframes shimmer {
        0%, 100% {
            filter: brightness(1);
        }
        50% {
            filter: brightness(1.3);
        }
    }

    .saludo-message {
        font-size: 1.3rem;
        color: var(--text-secondary);
        margin-bottom: 2rem;
        line-height: 1.8;
        position: relative;
        z-index: 1;
    }

    .info-box {
        background: rgba(51, 65, 85, 0.5);
        border-radius: 20px;
        padding: 2rem;
        margin: 2rem 0;
        border: 1px solid rgba(99, 102, 241, 0.2);
        position: relative;
        z-index: 1;
    }

    .info-box-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--primary-light);
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .info-box-content {
        color: var(--text-muted);
        font-size: 1rem;
        line-height: 1.7;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin: 2rem 0;
        position: relative;
        z-index: 1;
    }

    .stat-card {
        background: rgba(99, 102, 241, 0.1);
        padding: 1.5rem;
        border-radius: 15px;
        border: 1px solid rgba(99, 102, 241, 0.2);
        transition: all 0.3s ease;
    }

    .stat-card:hover {
        background: rgba(99, 102, 241, 0.15);
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(99, 102, 241, 0.2);
    }

    .stat-icon {
        font-size: 2rem;
        margin-bottom: 0.5rem;
    }

    .stat-value {
        font-size: 1.8rem;
        font-weight: 700;
        color: var(--primary-light);
        margin-bottom: 0.3rem;
    }

    .stat-label {
        font-size: 0.9rem;
        color: var(--text-muted);
    }

    .action-buttons {
        display: flex;
        gap: 1.5rem;
        justify-content: center;
        margin-top: 3rem;
        flex-wrap: wrap;
        position: relative;
        z-index: 1;
    }

    .input-group {
        background: rgba(51, 65, 85, 0.5);
        padding: 2rem;
        border-radius: 20px;
        margin-top: 2rem;
        border: 1px solid rgba(148, 163, 184, 0.1);
        position: relative;
        z-index: 1;
    }

    .input-group label {
        display: block;
        color: var(--text-secondary);
        font-weight: 600;
        margin-bottom: 1rem;
        font-size: 1.1rem;
    }

    .input-wrapper {
        display: flex;
        gap: 1rem;
        align-items: center;
    }

    .input-field {
        flex: 1;
        padding: 1rem 1.5rem;
        background: rgba(15, 23, 42, 0.5);
        border: 2px solid rgba(99, 102, 241, 0.3);
        border-radius: 12px;
        color: var(--text-primary);
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .input-field:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
    }

    .input-field::placeholder {
        color: var(--text-muted);
    }

    @media (max-width: 768px) {
        .saludo-container {
            padding: 3rem 2rem;
        }

        .saludo-title {
            font-size: 2.5rem;
        }

        .saludo-message {
            font-size: 1.1rem;
        }

        .avatar {
            width: 120px;
            height: 120px;
            font-size: 3rem;
        }

        .stats-grid {
            grid-template-columns: 1fr;
        }

        .action-buttons {
            flex-direction: column;
            width: 100%;
        }

        .btn {
            width: 100%;
        }

        .input-wrapper {
            flex-direction: column;
        }

        .input-field {
            width: 100%;
        }
    }
</style>
@endsection

@section('content')
<div class="saludo-section">
    <div class="saludo-container">
        <div class="avatar-container">
            <div class="avatar">👤</div>
        </div>

        <h1 class="saludo-title">
            ¡Hola, <span class="nombre-highlight">{{ $nombre }}</span>!
        </h1>

        <p class="saludo-message">
            Es un placer tenerte aquí. Esta es una demostración de cómo Laravel
            maneja rutas dinámicas con parámetros personalizados.
        </p>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">📍</div>
                <div class="stat-value">{{ strlen($nombre) }}</div>
                <div class="stat-label">Caracteres en tu nombre</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">🌟</div>
                <div class="stat-value">{{ date('H:i') }}</div>
                <div class="stat-label">Hora de tu visita</div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">📅</div>
                <div class="stat-value">{{ date('d/m/Y') }}</div>
                <div class="stat-label">Fecha de hoy</div>
            </div>
        </div>

        <div class="info-box">
            <div class="info-box-title">
                💡 ¿Sabías que...?
            </div>
            <div class="info-box-content">
                Esta ruta utiliza un parámetro dinámico que captura tu nombre desde la URL.
                Puedes cambiar el nombre en la URL para ver diferentes saludos personalizados.
                <br><br>
                <strong>Formato de la URL:</strong> <code style="color: var(--primary-light); background: rgba(99, 102, 241, 0.1); padding: 0.3rem 0.6rem; border-radius: 6px;">/saludo/{{ $nombre }}</code>
            </div>
        </div>

        <div class="input-group">
            <label for="nombreInput">¿Quieres probar con otro nombre?</label>
            <div class="input-wrapper">
                <input 
                    type="text" 
                    id="nombreInput" 
                    class="input-field" 
                    placeholder="Escribe un nombre aquí..."
                    value="{{ $nombre }}"
                >
                <button onclick="cambiarNombre()" class="btn btn-primary">
                    Cambiar Nombre
                </button>
            </div>
        </div>

        <div class="action-buttons">
            <a href="{{ route('bienvenida') }}" class="btn btn-secondary">
                Ir a Bienvenida
            </a>
            <a href="{{ url('/') }}" class="btn btn-primary">
                Volver al Inicio
            </a>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function cambiarNombre() {
        const input = document.getElementById('nombreInput');
        const nombre = input.value.trim();
        
        if (nombre) {
            // Animación de salida
            const container = document.querySelector('.saludo-container');
            container.style.opacity = '0';
            container.style.transform = 'scale(0.95)';
            
            setTimeout(() => {
                window.location.href = `/saludo/${encodeURIComponent(nombre)}`;
            }, 300);
        } else {
            alert('Por favor, escribe un nombre válido.');
            input.focus();
        }
    }

    // Permitir presionar Enter para cambiar el nombre
    document.getElementById('nombreInput').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            cambiarNombre();
        }
    });

    // Animación de entrada
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.querySelector('.saludo-container');
        container.style.transition = 'all 0.3s ease-out';
        
        const cards = document.querySelectorAll('.stat-card');
        cards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            
            setTimeout(() => {
                card.style.transition = 'all 0.5s ease-out';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, 200 + (index * 100));
        });
    });
</script>
@endsection
