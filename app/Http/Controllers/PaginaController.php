<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginaController extends Controller
{
    /**
     * Muestra la página de bienvenida estática
     *
     * @return \Illuminate\View\View
     */
    public function bienvenida()
    {
        return view('bienvenida');
    }

    /**
     * Muestra un saludo personalizado con el nombre proporcionado
     *
     * @param string $nombre El nombre del usuario
     * @return \Illuminate\View\View
     */
    public function saludo($nombre)
    {
        // Capitalizamos la primera letra del nombre para mejor presentación
        $nombreFormateado = ucfirst(strtolower($nombre));
        
        return view('saludo', [
            'nombre' => $nombreFormateado
        ]);
    }
}
