<?php

namespace App\Http\Controllers;

use App\Models\Models\Sala;
use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $salas = Sala::all();


        foreach ($salas as $sala) {
            $eventos = $sala->eventos()->orderBy('fecha_entrada', 'asc')->get();
            $sala->eventos = $eventos;
        }

        return view('index',['salas' => $salas]);//Aqui pasamos las  salas a la vista
    }
    public function salas($salaId)
    {
        $salas = Sala::find($salaId);
        return view('salas',['salas' => $salas]);
    }


}
