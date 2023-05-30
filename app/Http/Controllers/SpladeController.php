<?php

namespace App\Http\Controllers;

use App\Models\Post;
use ProtoneMedia\Splade\Facades\SEO;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\Facades\Splade;

class SpladeController extends Controller
{

    public function index(){
        SEO::title('Laravel Splade Examples')
            ->description('Become the Splade expert!')
            ->keywords('laravel, splade, course, practicando Splade');

        Toast::title('Entorno de pruebas!')
            ->message('Bienvenido esta seccion es para seguir probando caracteristicas de Splade, como este mensajes de Toast, para continuar cierre este mensaje, Gracias')
            ->success()
            ->center()
            ->backdrop()
            ->autoDismiss(1)
            ;
        
        Splade::share('variable_compartida','DATA COMPARTIDA DIRECTA DESDE EL CONTROLADOR');

        $some_posts = Post::latest()->limit(3)->get();

        return view('practicando', [
            'posts' => Splade::onLazy(fn()=>$some_posts)
        ]);
    }

    
}
