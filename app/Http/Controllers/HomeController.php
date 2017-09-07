<?php

namespace SistemaFarmacia\Http\Controllers;

use SistemaFarmacia\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;
use app\Helpers;

use SistemaFarmacia\Farmacia;

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

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $farmacias=Farmacia::paginate(10);

        /*for ($i=0; $i < $farmacias.length() ; $i++) { 
             $distancia = distance($position.lat, $position.lon, $farmacias[i].lat, $farmacias[i].lon);
            $farmacias[i].distancia = distancia;
        } */


        return view('welcome',compact('farmacias'));
    }
    
    public function mostrar($id)
    {
        $farm=Farmacia::where('id',$id)->first();
        return view('map',compact('farm'));
    }
    
}
