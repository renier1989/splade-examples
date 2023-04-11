<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use ProtoneMedia\Splade\SpladeTable;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

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

    // public function edit(){
        
    // }
    
    // public function update(){

    // }
    
    // public function store(){

    // }
}
