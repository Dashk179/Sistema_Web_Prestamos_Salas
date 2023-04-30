<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Models\ContenidoCorreo;
use Illuminate\Http\Request;

class ContenidoCorreoController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {

        $contenido = ContenidoCorreo::all();
        return view('admin.correoContenido.index', [
            'contenido' => $contenido,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'encabezado' => 'required',
            'piedepagina' => 'required',
        ]);

        $newcontenido = new ContenidoCorreo();

        if ($request->hasFile('encabezado')) {
            $file = $request->file('encabezado');
            $url = "images/correo/";
            $nombreArchivo = $file->getClientOriginalName();
            $subirImagen = $request->file('encabezado')->move($url, $nombreArchivo);
            $newcontenido->encabezado = $url . $nombreArchivo;
        }

        if ($request->hasFile('piedepagina')) {
            $file = $request->file('piedepagina');
            $url = "images/correo/";
            $nombreArchivo = $file->getClientOriginalName();
            $subirImagen = $request->file('piedepagina')->move($url, $nombreArchivo);
            $newcontenido->piedepagina = $url . $nombreArchivo;
        }

        $newcontenido->save();


        return redirect()->back();
}
    public function update(Request $request, $contenidoId)
    {
        $contenido = ContenidoCorreo::find($contenidoId);


        if ($request->hasFile('encabezado')) {
            if (file_exists(public_path($contenido->encabezado))) {
                unlink(public_path($contenido->encabezado));
            }
            $file = $request->file('encabezado');
            $url = "images/correo/";
            $nombreArchivo = $file->getClientOriginalName();
            $subirImagen = $request->file('encabezado')->move($url, $nombreArchivo);
            $contenido->encabezado = $url . $nombreArchivo;
        }

        if ($request->hasFile('piedepagina')) {
            if (file_exists(public_path($contenido->piedepagina))) {
                unlink(public_path($contenido->piedepagina));
            }
            $file = $request->file('piedepagina');
            $url = "images/correo/";
            $nombreArchivo = $file->getClientOriginalName();
            $subirImagen = $request->file('piedepagina')->move($url, $nombreArchivo);
            $contenido->piedepagina = $url . $nombreArchivo;
        }
        $contenido->save();
        return redirect()->back();
    }

}
