<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Directorio;
use App\Models\contacto;

class DirectorioController extends Controller
{
    //
    public function index(){
        $directorios = Directorio::all();
        return view('directorio', compact('directorios'));
    }

    public function create(){
        return view('crearEntrada');
    }

    public function store(Request $request){
        $directorio= new Directorio();
        $directorio->codigoEntrada = $request->input("codigo");
        $directorio->nombre = $request->input("nombre");
        $directorio->apellido = $request->input("apellido");
        $directorio->correo = $request->input("correo");
        $directorio->telefono = $request->input("telefono");
        
        $directorio->save();
    
        return redirect()->route('directorio.init'); 
        
    }


    public function delete($id){
        $directorio = Directorio::find($id);
        return view('eliminar',compact('directorio'));
    }
    public function destroy($id){
        $contactos=contacto::where('condigoEntrada',$id);

        foreach($contactos as $contacto){
            $contacto->delete;

        }

        $directorio = Directorio::find($id);
        $directorio->delete;
        return redirect()->route('directorio.init'); 

    }

}
