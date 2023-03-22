<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Models\Materiales;
use Illuminate\Http\Request;

class MaterialesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');//
    }

    public function index()
    {
        $materiales = Materiales::all();
        return view('admin.materiales.index', ['materiales' => $materiales]);
    }

    public function store(Request $request)
    {
        //   dd(Sala::all());
//        Sala:create([
//            'nombre' => $request->cubiculo
//    ]);

        $newMateriales= new Materiales();

        $newMateriales->nombre = $request->nombre;
        $newMateriales->descripcion = $request->descripcion;
        $newMateriales->cantidad = $request->cantidad;
        $newMateriales->save();

        return redirect()->back();
        //  dd($request->cubiculo);
        //dd( $request->all());// en Laravel es una función de ayuda que significa "dump and die" (imprimir y detener)
        // y se utiliza para imprimir información sobre una variable o un conjunto de datos y detener el flujo de ejecución de la aplicación


    }

    public function update(Request $request, $materialId)
    {
        $material = (Materiales::find($materialId));

        $material->nombre = $request->nombre;
        $material->descripcion = $request->descripcion;
        $material->cantidad = $request->cantidad;
        $material->save();

        return redirect()->back();
    }

    public function delete(Request $request, $materialId)
    {
        $material = (Materiales::find($materialId));
        $material->delete();

        return redirect()->back();
    }
}
