<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Models\Cubiculo;
use Illuminate\Http\Request;

class CubiculosController extends Controller
{
    public function  __construct()
    {
        $this->middleware('auth');//
    }

    public function index()
    {
        $cubiculos  = Cubiculo::all();
        return view('admin.cubiculos.index',['cubiculos'=> $cubiculos]);
    }
    public function store(Request $request)
    {
     //   dd(Cubiculo::all());
//        Cubiculo:create([
//            'nombre' => $request->cubiculo
//    ]);

        $newCubiculo = new Cubiculo();

        $newCubiculo->nombre = $request-> nombre;
        $newCubiculo->descripcion = $request-> descripcion;
        $newCubiculo->save();

       return redirect()->back();
      //  dd($request->cubiculo);
       //dd( $request->all());// en Laravel es una función de ayuda que significa "dump and die" (imprimir y detener)
        // y se utiliza para imprimir información sobre una variable o un conjunto de datos y detener el flujo de ejecución de la aplicación


}

    public function update(Request $request,$cubiculoId)
    {
        $cubiculo = (Cubiculo::find($cubiculoId));

        $cubiculo->nombre = $request-> nombre;
       $cubiculo->descripcion = $request-> descripcion;
        $cubiculo->save();

        return redirect()->back();
    }

    public function delete(Request $request,$cubiculoId)
    {
        $cubiculo = (Cubiculo::find($cubiculoId));
        $cubiculo->delete();

        return redirect()->back();
    }

}
