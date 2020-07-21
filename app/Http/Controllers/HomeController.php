<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peliculas;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function GetPeliculas(){
        $peliculas = DB::table('peliculas')
                    ->orderBy('rating','desc')
                    ->get();

        $result = array();
        foreach ($peliculas as $indice => $pelicula) {
            foreach ($pelicula as $key => $val) {
                $result[$indice][$key] = $val;

                if($key == 'id'){
                    $result[$indice]['accion'] = '<a href="pelicula/edit/'.$val.'" class="btn btn-warning">EDITAR</a>';
                }
            }
        }

        $forDtt['data'] = $result;

        return response()->json($forDtt);
    }
}
