<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use ProtoneMedia\Splade\Facades\Splade;

class PostController extends Controller
{

    public function index(){

        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                Collection::wrap($value)->each(function ($value) use ($query) {
                    $query
                        ->orWhere('id', 'LIKE', "%{$value}%")
                        ->orWhere('titulo', 'LIKE', "%{$value}%");
                });
            });
        });

        $posts = QueryBuilder::for(Post::class)
        ->defaultSort('titulo')
        ->allowedSorts(['id', 'titulo', 'estado'])
        ->allowedFilters(['titulo','id',$globalSearch])
        ->paginate()
        ->withQueryString();


        return view('post.index', [
            'posts' => SpladeTable::for($posts)
                ->withGlobalSearch()
                ->defaultSort('titulo')
                ->column('titulo', sortable:true,searchable:true)
                ->column('estado', sortable:true)
                ->column('id', sortable:true,searchable:true)
                ->column('action')
                // ->rowLink(function(Post $post){ return route('post.show',$post); })
                ->selectFilter('estado',[
                    '1' => 'Activo',
                    '0' => 'Inactivo'
                ]),
        ]);
    }

    public function show(Post $post){
        return view('post.show',['post' => $post]);
    }

    public function edit(Post $post){

        $things = [
            'Cosa 1',
            'Cosa 2',
            'Cosa 3',
            'Cosa 4',
            'Cosa 5',
        ];

        $roles = [
            'Administrador',
            'Guest',
            'Content Creator',
            'Manager',
            'Demo'
        ];

        return view('post.edit',
            [
                'post' => $post,
                'things' => $things,
                'roles' => $roles,
            ]);
    }
    
    public function update(Request $request,  Post $post){
        // dd($request->all());
        $data = $request->validate([
            'titulo' => ['required', 'string'],
            'contenido' => ['required'],
            'agree_terms' => ['required','boolean'],
            'dat_of_birth' => ['required'],
            'roles' => ['required','array', 'min:2'],
            'roless' => ['required','array', 'min:2'],
        ]);

        $post->update($data);

        Splade::toast('Post updated successfully')->autoDismiss(5);

        return redirect()->route('post.index');
    }
    
    // public function store(){

    // }
}
