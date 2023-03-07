<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Models\Evento;
use App\Models\Models\Sala;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class EventosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');//
    }

    public function index()
    {
        $salas = Sala::all();
        $users = \Auth::user()::all();
        $eventos = Evento::all();
        return view('admin.eventos.index', [
            'eventos' => $eventos,
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
            'fecha_salida' => 'required|date|after:fecha_entrada',
            'email_solicitante' => 'required'
        ]);


        $newEvento = new Evento();
        if($request -> has('imgSala')){

        }


        $newEvento->user_id = $request->user_id;
        $sala_id = $newEvento->salas_id = $request->salas_id;
        $fecha_inicio = $newEvento->fecha_entrada = $request->fecha_entrada;
        $fecha_fin = $newEvento->fecha_salida = $request->fecha_salida;
        $newEvento->email_solicitante = $request->email_solicitante;



        //Registrar si una sala esta disponible dentro del rango de las fechas
        $validacionRangoFechas = DB::table('eventos')
            ->where('salas_id', $sala_id)
            ->where(function ($request) use ($fecha_inicio, $fecha_fin) {
                $request->whereBetween('fecha_entrada', [$fecha_inicio, $fecha_fin])
                    ->orWhereBetween('fecha_salida', [$fecha_inicio, $fecha_fin]);
            })->get();
        if ($validacionRangoFechas->isEmpty()) {
            $newEvento->save();
            return redirect()->back();
        } else {

            return redirect()->back();
        }
    }

//
    public function update(Request $request, $eventoId)
    {
        $evento = (Evento::find($eventoId));

        $evento->fecha_entrada = $request->fecha_entrada;
        $evento->fecha_salida = $request->fecha_salida;
        $evento->save();

        return redirect()->back();
    }

    public function delete(Request $request, $eventoId)
    {
        $evento = (Evento::find($eventoId));
        $evento->delete();

        return redirect()->back();
    }
}
