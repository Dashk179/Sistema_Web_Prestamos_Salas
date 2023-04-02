<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        $salas = Sala::all();
        return view('admin.salas.index', ['salas' => $salas]);
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

}
