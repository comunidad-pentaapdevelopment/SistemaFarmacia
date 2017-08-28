<?php

namespace SistemaFarmacia\Http\Controllers;

use SistemaFarmacia\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;

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
   
        $farmacias=Farmacia::all();

        return view('welcome',compact('farmacias'));
    }
}