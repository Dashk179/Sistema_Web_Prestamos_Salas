<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Models\Evento;
use App\Models\Models\Sala;
use App\Models\User;
use Illuminate\Http\Request;

class EventosController extends Controller
{
    public function  __construct()
    {
        $this->middleware('auth');//
    }

    public function index()
    {
        $salas = Sala::all();
        $users = User::all();
        $eventos  = Evento::all();
        return view('admin.eventos.index',[
            'eventos'=> $eventos,
            'salas' => $salas,
            'users' => $users
        ]);
    }
    public function store(Request $request)
    {
        $newEvento = new Evento();

        $newEvento->user_id = $request-> user_id;
        $newEvento->salas_id = $request-> salas_id;
        $newEvento->fecha_entrada = $request-> fecha_entrada;
        $newEvento->fecha_salida = $request-> fecha_salida;
        $newEvento->email_solicitante = $request-> email_solicitante;
        $newEvento->save();

        return redirect()->back();
    }
//
    public function update(Request $request,$eventoId)
    {
        $evento = (Evento::find($eventoId));

        $evento->fecha_entrada = $request-> fecha_entrada;
        $evento->fecha_salida = $request-> fecha_salida;
        $evento->save();

        return redirect()->back();
    }
//
//    public function delete(Request $request,$salaId)
//    {
//        $sala = (Sala::find($salaId));
//        $sala->delete();
//
//        return redirect()->back();
//    }
}
