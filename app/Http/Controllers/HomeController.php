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
    public function index(Request $request){
        
        if($request 
            && $request->input('miLatitud')){
            $miLatitud = $request->input('miLatitud');
            $miLongitud = $request->input('miLongitud');

            $farmaciasTabla1=DB::table('farmacias')
            ->select('*',DB::raw("(acos(sin(radians($miLatitud)) * sin(radians(`farmacias`.`latitud`)) + cos(radians($miLatitud)) *         
                cos(radians(`farmacias`.`latitud`)) * cos(radians($miLongitud) - radians(`farmacias`.`longitud`))) * 6371) as `distanciaKm`")
            )
            ->orderBy('distanciaKm');

            $farmaciasTabla2=DB::table( DB::raw("({$farmaciasTabla1->toSql()}) as f1"))
                    ->selectRaw('*, CAST(`distanciaKm` AS DECIMAL(16,3)) as distanciaKmTwoDec')
                    ->mergeBindings($farmaciasTabla1);

            $farmaciasCercaMio=DB::table( DB::raw("({$farmaciasTabla2->toSql()}) as f2"))
                    ->selectRaw('`id`,`nombre`,`direccion`,`telefono`,`latitud`,`longitud`,`estaPago`,`localidad`,`turno`, 
                IF(`distanciaKmTwoDec` < 1,CONCAT(FLOOR(`distanciaKmTwoDec` * 1000), " Metros"),CONCAT(CAST(`distanciaKmTwoDec` AS DECIMAL(16,2)), " KM")) as distanciaAMostrar,
                `distanciaKmTwoDec`')
                    ->mergeBindings($farmaciasTabla2)
                    ->paginate(100);

            return view('welcome',compact('farmaciasCercaMio'));
        }else{

            $farmaciasCercaMio=DB::table('farmacias')
            ->selectRaw('*, "0" as distanciaAMostrar')
            ->paginate(100);

            return view('welcome',compact('farmaciasCercaMio'));
        }
    }
    
    public function mostrar($id)
    {
        $farm=Farmacia::where('id',$id)->first();
        return view('map',compact('farm'));
    }
    
}
