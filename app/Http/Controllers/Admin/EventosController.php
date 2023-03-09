<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\EventoRegistrado;
use App\Models\Models\Evento;
use App\Models\Models\Sala;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Mail;


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
            'fecha_entrada' => 'required|date|before:fecha_salida',
            'fecha_salida' => 'required|date|after:fecha_entrada',
            'email_solicitante' => 'required'
        ]);


        $newEvento = new Evento();

        if($request -> hasFile('imgSala')){
                $file = $request -> file('imgSala');
                $url  = "images/salas/";
                $nombreArchivo = time()  . '-' . $file->getClientOriginalName();
                $subirImagen = $request->file('imgSala') -> move($url,$nombreArchivo);
               $newEvento->imgSala = $url . $nombreArchivo;
        }


        $newEvento->user_id = $request->user_id;
        $sala_id = $newEvento->salas_id = $request->salas_id;
        $fecha_inicio = $newEvento->fecha_entrada = $request->fecha_entrada;
        $fecha_fin = $newEvento->fecha_salida = $request->fecha_salida;
       $email_solicitante = $newEvento->email_solicitante = $request->email_solicitante;




        //Registrar si una sala esta disponible dentro del rango de las fechas
        $validacionRangoFechas = DB::table('eventos')
            ->where('salas_id', $sala_id)
            ->where(function ($query) use ($fecha_inicio, $fecha_fin) {
                $query->whereBetween('fecha_entrada', [$fecha_inicio, $fecha_fin])
                    ->orWhereBetween('fecha_salida', [$fecha_inicio, $fecha_fin])
                    ->orWhere(function ($query) use ($fecha_inicio, $fecha_fin) {
                        $query->where('fecha_entrada', '<=', $fecha_inicio)
                            ->where('fecha_salida', '>=', $fecha_fin);
                    });
            })
            ->get();

        if ($validacionRangoFechas->count()>0) {
            return response()->json([
                'error' => 'Ya hay eventos programados para esa sala registrados en las fechas proporcionadas'
            ],400);
//            $newEvento->save();
//
//            $evento = $newEvento;
//            //Una vez guardada la visita y registrada se envia un correo al usuario solicitante de la visita confirmando que su visita se registro con exito
//            $correo =  new EventoRegistrado($evento);
//            Mail::to($email_solicitante)->send($correo);
//            return redirect()->back();
        } else {
            return response()->json([
                'message' => 'Eventos agregados correctamente.'
            ], 200);
           // return redirect()->back();
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
