<?php

namespace App\Http\Controllers;

use App\Models\Tree;
use Illuminate\Http\Request;

class TreesController extends Controller
{
    public function index(){
        $trees = Tree::all();
        // dd($trees);
        return view('trees.index');
    }
}
