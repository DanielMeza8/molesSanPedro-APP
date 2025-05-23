<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index(){
        $items = Categoria::all();
        return view('categorias.index', compact('items'));
    }

    public function store(Request $request){
        $item = new Categoria();
        $item->nombre = $request->nombre;
        $item->save();
        return to_route('categorias');
    }
}
