<?php

namespace App\Http\Controllers;

use App\Imports\UsuariosImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Picqer\Barcode\BarcodeGeneratorPNG;
use Normalizer;

class ExcelController extends Controller
{
    public function importar(Request $request){

        // $contador = 0;
        $request->validate([
            'archivo'=>'required|mimes:xls,xlsx'
        ]);

        $import = new UsuariosImport();

        Excel::import($import, $request->file('archivo'));

        $datos = collect($import->data);
        //filtran datos solo si tienes informacion
        // $codigos = $datos->slice(1)
        //     ->filter(function($fila){
        //         $fila2 = trim($fila[2] ?? '');
        //         $fila5 = trim($fila[5] ?? '');
        //         $fila6 = trim($fila[6] ?? '');
        //         $fila9 = trim($fila[9] ?? '');

        //         return $fila2 !== '' || $fila5 !== '' || $fila6 !== '' || $fila9 !== '';
        //     })->values()->map(function($fila, $index) {

        //     // $contador = 0;
            
        //     $fila2 = $fila[2] ?? '';
        //     if ($fila2 === "UPC" ) {
        //         $fila2 = '';
        //     }
        //     if ($fila2 === "0750131929004") {
        //         $fila2 = "750131929004";
        //     }


        //     $fila5 = $fila[5] ?? '';
        //     $cadena5 = is_string($fila5) ? $this->limpiar($fila5) : '';
        //     if ($cadena5 === "centrodedistribucion") {
        //         $cadena5 = '';
        //     }
        //     if ($cadena5 === "4188" || $cadena5 === "4640" || $cadena5 === "4924" || $cadena5 === "7468" || $cadena5 === "7487" || $cadena5 === "7490" || $cadena5 === "7493") {
        //         $cadena5 = "7492";
        //     }
            
        //     $fila6 = $fila[6] ?? '';
        //     $cadena6 = is_string($fila6) ? $this->limpiar($fila6) : '';
        //     if ($cadena6 === "numerooc") {
        //         $cadena6 = '';
        //     }

        //     $fila9 = $fila[9] ?? '';
        //     // $cadena9 = is_string($fila9) ? $this->limpiarBasico($fila9) : '';
            

        //     // $id = $contador+1;
        //     return [
        //         'fila1' => $fila2,
        //         'fila5' =>  $cadena5,
        //         'oc' => $cadena6,
        //         'cajas' => $fila9,
        //         'contador' => $index + 1,
        //     ];
        // });
        $contadorGlobal = 1; // contador fuera del flatMap

$codigos = $datos->slice(1)
    ->filter(function($fila){
        $fila2 = trim($fila[2] ?? '');
        $fila5 = trim($fila[5] ?? '');
        $fila6 = trim($fila[6] ?? '');
        $fila9 = trim($fila[9] ?? '');

        return $fila2 !== '' || $fila5 !== '' || $fila6 !== '' || $fila9 !== '';
    })
    ->flatMap(function($fila, $index) use (&$contadorGlobal) {
        $fila2 = $fila[2] ?? '';
        if ($fila2 === "UPC") {
            $fila2 = '';
        }
        if ($fila2 === "0750131929004") {
            $fila2 = "750131929004";
        }

        $fila5 = $fila[5] ?? '';
        $cadena5 = is_string($fila5) ? $this->limpiar($fila5) : '';
        if ($cadena5 === "centrodedistribucion") {
            $cadena5 = '';
        }
        if (in_array($cadena5, ["4188", "4640", "4924", "7468", "7487", "7490", "7493"])) {
            $cadena5 = "7492";
        }

        $fila6 = $fila[6] ?? '';
        $cadena6 = is_string($fila6) ? $this->limpiar($fila6) : '';
        if ($cadena6 === "numerooc") {
            $cadena6 = '';
        }

        $fila9 = $fila[9] ?? 1;
        $cantidad = is_numeric($fila9) ? intval($fila9) : 1;

        return collect(range(1, $cantidad))->map(function ($i) use ($fila2, $cadena5, $cadena6, $fila9, &$contadorGlobal) {
            return [
                'fila1' => $fila2,
                'fila5' => $cadena5,
                'oc' => $cadena6,
                'cajas' => $fila9,
                'contador' => $contadorGlobal++,
            ];
        });
    });



        return view('importar', compact('datos', 'codigos'));
    }

    
    public function limpiar($cadena) {
        // Normalizar acentos (NFD = descomponer caracteres acentuados)
        $cadena = Normalizer::normalize($cadena, Normalizer::FORM_D);
        $cadena = preg_replace('/\p{Mn}/u', '', $cadena); // Eliminar marcas de acento
        
        $cadena = strtolower($cadena);
        $cadena = str_replace('/', '', $cadena);
        // Convertir a minúsculas
    
        // Eliminar espacios y apóstrofos comunes
        $cadena = preg_replace("/[\s'’`´]+/", '', $cadena);
    
        return $cadena;
    }

    public function limpiarBasico($cadena) {
    // Reemplazar el carácter "/" por nada
    $cadena = str_replace('/', '', $cadena);
    $cadena = strtolower($cadena);
    // Eliminar todos los espacios (incluye espacios, tabulaciones, etc.)
    $cadena = preg_replace('/\s+/', '', $cadena);

    return $cadena;
}

}
