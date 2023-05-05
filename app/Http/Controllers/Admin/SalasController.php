<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Models\Materiales;
use App\Models\Models\Sala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SalasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');//
    }

    public function index()
    {
        $materiales = Materiales::all();
        $salas = Sala::with(['materiales', 'materialesSalas'])->get();
        return view('admin.salas.index', [
            'salas' => $salas,
            'materiales' => $materiales,
        ]);

    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'imgSala' => 'required'
        ]);

        $newSala = new Sala();

        if ($request->hasFile('imgSala')) {
            $file = $request->file('imgSala');
            $url = "images/salas/";
            $nombreArchivo = $file->getClientOriginalName();
            $subirImagen = $request->file('imgSala')->move($url, $nombreArchivo);
            $newSala->imgSala = $url . $nombreArchivo;
        }
        $newSala->nombre = $request->nombre;
        $newSala->descripcion = $request->descripcion;
        $newSala->save();

        $materiales = $request->input('materiales');
        $cantidades = $request->input('cantidad');

        $materialSala = array();

        foreach ($materiales as $material) {
            $cantidad = $cantidades[$material] ?? 0;
            $materialSala[$material] = ['cantidad' => $cantidad];
        }

        $newSala->materiales()->sync($materialSala);
        return redirect()->back();


    }

    public function update(Request $request, $salaId)
    {
        $sala = Sala::find($salaId);


        if ($request->hasFile('imgSala')) {
            if (file_exists(public_path($sala->imgSala))) {
                unlink(public_path($sala->imgSala));
            }
            $file = $request->file('imgSala');
            $url = "images/salas/";
            $nombreArchivo = $file->getClientOriginalName();
            $subirImagen = $request->file('imgSala')->move($url, $nombreArchivo);
            $sala->imgSala = $url . $nombreArchivo;
        }
        $sala->nombre = $request->nombre;
        $sala->descripcion = $request->descripcion;
        $sala->save();
        $materiales = $request->input('materiales');
        $cantidades = $request->input('cantidad');

        $materialSala = array();

        foreach ($materiales as $material) {
            $cantidad = $cantidades[$material] ?? 0;
            $materialSala[$material] = ['cantidad' => $cantidad];
        }

        $sala->materiales()->sync($materialSala);
        return redirect()->back();
    }

    public function delete(Request $request, $salaId)
    {
        $sala = Sala::find($salaId);

        if (file_exists(public_path($sala->imgSala))) {
            unlink(public_path($sala->imgSala));
        }

        $sala -> delete();


        return redirect()->back();
    }

    public function getMaterialesPorSala(Request $request)
    {
        $sala_id = $request->input('sala_id');
        $sala = Sala::findOrFail($sala_id);
        $materiales = $sala->materiales;
        $materiales_data = [];

        foreach ($materiales as $material) {
            $cantidad = $material->pivot->cantidad ?? 0;
            $materiales_data[] = [
                'id' => $material->id,
                'nombre' => $material->nombre,
                'cantidad' => $material->cantidad,
            ];
        }

        return response()->json(['materiales' => $materiales_data]);
    }

}
