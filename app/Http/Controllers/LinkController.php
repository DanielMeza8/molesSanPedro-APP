<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\Producto;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function index(){
        $productos = Producto::all();
        $link = Link::with('producto')->get();
        $links = Link::all();
        return view('links.index', compact('links', 'productos', 'link'));
    }

    public function store(Request $request) {
        $request->validate([
            'nombre' => 'required|string|max:80',
            'url' => 'required|url|max:500',
        ]);

        $link = new Link();
        $link->nombre = $request->nombre;
        $link->url = $request->url;
        $link->producto_id = $request->producto;

        $link->save();

        return to_route('links.index')->with('alertifySuccess', 'producto guardado con exito');
    }

    public function update(Request $request, $id) {
        try {
            $request->validate([
                'nombre' => 'required|string|max:80',
                'url' => 'required|url',
                'producto' => 'required|exists:productos,id',
            ]
            );
    
            $link = Link::findOrFail($id);
            $link->nombre = $request->nombre;
            $link->url = $request->url;
            $link->producto_id = $request->producto;
    
            $link->save();
    
            return to_route('links.index')->with('alertifySuccess', 'producto ACTUALIZADO con exito');
        } catch (\Throwable $th) {
            return to_route('link.index').with('alertifyError','Error al actualizar');
        }

    }

    public function destroy($id){
        $link = Link::find($id);

        $link->delete(); 

        return to_route('links.index')->with('alertifyConfirm', 'producto eliminado correctamente');

    }
}
