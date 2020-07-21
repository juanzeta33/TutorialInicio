<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\CrearPeliculaRequest;
use App\Models\Peliculas;

class PeliculaController extends Controller
{
    public function Index(){
        return view('crearpelicula');
    }

    public function Store(CrearPeliculaRequest $request){
        
        $saved = Peliculas::create($request->all());
        if($saved){
            return response()->json($saved);
            //return redirect('pelicula')->with('status','se creo correctamnte');
        }
       // return response()->json('No se pudo insertar su registro');
    }

    public function EditPelicula($idPelicula){
        $pelicula = Peliculas::find($idPelicula);

        return view('peliculaedit',array('pelicula' => $pelicula));
    }

    public function UpdatePelicula(Request $request){
        $pelicula = Peliculas::find($request->id);

        if($pelicula){
            $pelicula->titulo = $request->titulo;
            $pelicula->descripcion = $request->descripcion;

            $pelicula->save();

            return redirect('/');
        }
    }

    public function DeletePelicula($idPelicula){
        Peliculas::destroy($idPelicula);
        if(Peliculas::find($idPelicula) == null){
            return response()->json(1);
        }
        return response()->json(0);
    }
}
