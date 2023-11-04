<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class ContactoController extends Controller
{
    //Funciones para agregar y guardar contacto
    public function agregarNuevoContacto($codigoEntrada){
        return view('agregarcontacto', compact('codigoEntrada'));
    }

    public function store(Request $resquest){
        $contacto= new Contacto();
        $contacto->codigoEntrada= $resquest->input('codigo');
        $contacto->nombre= $resquest->input('nombre');
        $contacto->apellido= $resquest->input('apellido');
        $contacto->telefono= $resquest->input('telefono');
        $contacto->save();
        return redirect()->route('directorio.ver', $resquest->codigo);
    }

    //Eliminar contacto
    public function eliminar($id){
        $contacto= Contacto::find($id);
        return view('eliminarContacto', compact('contacto'));
    }

    public function destroy($id){
        $contacto= Contacto::find($id);
        $contacto->delete();
        return redirect()->route('directorio.ver', $contacto->codigoEntrada);
    }
}
