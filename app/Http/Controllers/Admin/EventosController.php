<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Models\Evento;
use App\Models\Models\Sala;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
        $request->validate([
            'salas_id' => 'required',
            'user_id' => 'required',
            'fecha_entrada' => 'required|date',
            'fecha_salida' => 'required|date|after:fecha_entrada'
        ]);



        $newEvento = new Evento();


        $newEvento->user_id = $request-> user_id;
        $sala_id = $newEvento->salas_id = $request-> salas_id;
        $newEvento->fecha_entrada = $request-> fecha_entrada;
        $newEvento->fecha_salida = $request-> fecha_salida;
        $newEvento->email_solicitante = $request-> email_solicitante;

        $validacion = validator($newEvento->toArray(),[
            'salas_id' => 'required|integer',
            'fecha_entrada'=> [
                'required',
                Rule::unique('eventos','fecha_entrada')->where(function ($request) use ($sala_id){
                    return $request->where('salas_id',$sala_id);
                })
            ],
            'fecha_salida' => 'required|date|after:fecha_entrada',
        ]);

        if($validacion->fails()){
            print ('La fecha ya existe para ese id');
        } else{
            $newEvento->save();
        }

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

    public function delete(Request $request,$eventoId)
    {
        $evento = (Evento::find($eventoId));
        $evento->delete();

        return redirect()->back();
    }
}
