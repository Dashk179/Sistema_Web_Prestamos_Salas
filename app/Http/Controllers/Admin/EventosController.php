<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\EventoRegistrado;
use App\Models\Models\ContenidoCorreo;
use App\Models\Models\Evento;
use App\Models\Models\Evento_material_tablas;
use App\Models\Models\Materiales;
use App\Models\Models\Sala;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Mail;


class EventosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');//
    }

    public function index()
    {
        $encabezado = DB::table('contenido_correos')->where('id', 1)->value('encabezado');
        $piedepagina = DB::table('contenido_correos')->where('id', 1)->value('piedepagina');
        $materiales = Materiales::all();
        $salas = Sala::with('materiales','materialesSalas')->get();
        $eventos = Evento::with('materiales','users','materialesEvento')->get();
        return view('admin.eventos.index', [
            'eventos' => $eventos,
            'salas' => $salas,
            'materiales' => $materiales,
            'encabezado' => $encabezado,
            'piedepagina' => $piedepagina
        ]);
    }


    public function store(Request $request)
    {

        $request->validate([
            'salas_id' => 'required',
            'user_id' => 'required',
            'fecha_entrada' => 'required|date|before:fecha_salida',
            'email_solicitante' => 'required'
        ]);


        $newEvento = new Evento();

        if ($request->hasFile('imgSala')) {
            $file = $request->file('imgSala');
            $url = "images/salas/";
            $nombreArchivo = time() . '-' . $file->getClientOriginalName();
            $subirImagen = $request->file('imgSala')->move($url, $nombreArchivo);
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

        if ($validacionRangoFechas->count() > 0) {
            session()->flash('warning', 'Las fechas que elegiste para el evento en la sala en uso prueba con otras fechas.');
            return redirect()->back();
        } else {

            $newEvento->save();

            $materiales = $request->input('materiales');
            $cantidades = $request->input('cantidad');

            $materialSala = [];

            foreach ($materiales as $key => $material) {
                $cantidad = $cantidades[$key];
                $materialSala[$material] = ['cantidad' => $cantidad];
            }

            $newEvento->materiales()->sync($materialSala);



           


            //Una vez guardada la visita y registrada se envia un correo al usuario solicitante de la visita confirmando que su visita se registro con exito
            $evento = $newEvento;
            $correo = new EventoRegistrado($evento);
            Mail::to($email_solicitante)->send($correo);
           session()->flash('success', 'El evento se ha registrado con exito hemos enviado la información al  correo electrónico del docente solicitante.');

       return redirect()->back();

        }
    }

//    public function materiales($eventoId){
//        $evento_material = Evento_material_tablas::find($eventoId);
//        $materiales = $evento_material->materiales;
//        return view('admin.eventos.index', [
//
//            'materiales' => $materiales
//        ]);
//    }
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

    public function getMaterialesPorSala(Request $request)
    {
        $sala_id = $request->input('sala_id');
        $materiales_data = DB::table('material_salas')
            ->join('materiales', 'materiales.id', '=', 'material_salas.materiales_id')
            ->where('material_salas.salas_id', $sala_id)
            ->select('materiales.id', 'materiales.nombre', 'material_salas.cantidad')
            ->get();

        return response()->json(['materiales' => $materiales_data]);
    }




}
