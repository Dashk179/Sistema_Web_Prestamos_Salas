<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Models\Sala;
use Illuminate\Http\Request;

class SalasController extends Controller
{
    public function  __construct()
    {
        $this->middleware('auth');//
    }

    public function index()
    {
        $salas  = Sala::all();
        return view('admin.salas.index',['salas'=> $salas]);
    }
    public function store(Request $request)
    {
     //   dd(Sala::all());
//        Sala:create([
//            'nombre' => $request->cubiculo
//    ]);

        $newSala = new Sala();

        $newSala->nombre = $request-> nombre;
        $newSala->descripcion = $request-> descripcion;
        $newSala->save();

       return redirect()->back();
      //  dd($request->cubiculo);
       //dd( $request->all());// en Laravel es una función de ayuda que significa "dump and die" (imprimir y detener)
        // y se utiliza para imprimir información sobre una variable o un conjunto de datos y detener el flujo de ejecución de la aplicación


}

    public function update(Request $request,$salaId)
    {
        $sala = (Sala::find($salaId));

        $sala->nombre = $request-> nombre;
       $sala->descripcion = $request-> descripcion;
        $sala->save();

        return redirect()->back();
    }

    public function delete(Request $request,$salaId)
    {
        $sala = (Sala::find($salaId));
        $sala->delete();

        return redirect()->back();
    }

}
