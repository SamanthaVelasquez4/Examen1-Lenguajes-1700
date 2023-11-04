<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use App\Models\Directorio;
use Illuminate\Http\Request;

class DirectorioController extends Controller
{
    //
    public function index(){
        $directorios= Directorio::all();
        return view('directorio', compact('directorios'));
    }

    //Funciones para ver y guardar un directorio
    public function crear(){
        return view('crearEntrada');
    }

    public function store(Request $request){
        $directorio= new Directorio();
        $directorio->codigoEntrada= $request->input('codigo');
        $directorio->nombre= $request->input('nombre');
        $directorio->apellido= $request->input('apellido');
        $directorio->correo= $request->input('correo');
        $directorio->telefono= $request->input('telefono');
        $directorio->save();

        return redirect()->route('directorio.inicio');
    }

    //Funciones para buscar por correo
    public function buscar(){
        return view('buscar');
    }

    public function find(Request $request){
        $directorio= Directorio::where('correo', $request->correo)->first();
        if($directorio){
            return redirect()->route('directorio.ver', $directorio->codigoEntrada);
        }
        return redirect()->route('directorio.inicio');
        
    }

    //Ver lista de contactos de un directorio
    public function ver($codigo){
        $directorio= Directorio::find($codigo);
        $contactos= Contacto::where('codigoEntrada', $codigo)->get();
        return view('vercontactos', compact('directorio', 'contactos'));
    }

    //eliminar un directorio
    public function eliminar($codigo){
        $directorio= Directorio::find($codigo);
        return view('eliminar', compact('directorio'));
    }

    public function destroy($codigo){
        //eliminar contactos
        $contactos= Contacto::where('codigoEntrada', $codigo)->get();
        foreach($contactos as $contacto){
            $contacto->delete();
        }
        
        //eliminar directorio
        $directorio= Directorio::find($codigo);
        $directorio->delete();
        return redirect()->route('directorio.inicio');
    }

}
