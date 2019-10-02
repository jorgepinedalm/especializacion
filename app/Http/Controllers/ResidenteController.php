<?php

namespace App\Http\Controllers;

use App\Residente;
use App\Tipo_Documento;
use Illuminate\Http\Request;
use Validator;

class ResidenteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $residentes = Residente::where('estado', 1)->get();
        return view('residentes.index')->with(compact('residentes'));
    }

    public function newResidente()
    {
        $tipos_documento = Tipo_Documento::getTiposDocumento();
        return view('residentes.new')->with(['tipos_documento' => $tipos_documento]);
    }

    public function saveResidente(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'tipo_documento_id' => 'required|numeric|exists:tipos_documentos,id',
                'numero_documento'  => 'required|min:4|max:20|unique:residentes',
                'nombre'            => 'required|min:4|max:50',
                'apellido'          => 'required|min:4|max:50',
                'email'             => 'required|email|min:4|max:45|unique:residentes',
            ]
        );

        //si hay errores returna array de errores
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $residente                    = new Residente();
        $residente->tipo_documento_id = $request->tipo_documento_id;
        $residente->numero_documento  = $request->numero_documento;
        $residente->nombre            = $request->nombre;
        $residente->apellido          = $request->apellido;
        $residente->email             = $request->email;
        $residente->user_id           = 2;
        $residente->estado            = true;
        $residente->save();

        return redirect()->route('residente.index')->with('success_message', 'Residente agregado exitosamente!');

    }

    public function editResidente($id)
    {
        $residente       = Residente::find($id);
        $tipos_documento = Tipo_Documento::getTiposDocumento();
        return view('residentes.edit')->with(['tipos_documento' => $tipos_documento, 'residente' => $residente]);
    }

    public function updateResidente(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id'                => 'required|exists:residentes',
                'tipo_documento_id' => 'required|numeric|exists:tipos_documentos,id',
                'numero_documento'  => 'required|min:4|max:20|unique:residentes,numero_documento,' . $request->id,
                'nombre'            => 'required|min:4|max:50',
                'apellido'          => 'required|min:4|max:50',
                'email'             => 'required|email|min:4|max:45|unique:residentes,email,' . $request->id,
            ]
        );

        //si hay errores returna array de errores
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $residente                    = Residente::find($request->id);
        $residente->tipo_documento_id = $request->tipo_documento_id;
        $residente->numero_documento  = $request->numero_documento;
        $residente->nombre            = $request->nombre;
        $residente->apellido          = $request->apellido;
        $residente->email             = $request->email;
        $residente->user_id           = 2;
        $residente->estado            = true;
        $residente->save();

        return redirect()->route('residente.index')->with('success_message', 'Residente modificado exitosamente!');
    }

    public function deleteResidente(Request $request)
    {
        $residente = Residente::find($request->id);

        if (!$residente) {
            return redirect()->route('residente.index')->with('error_message', 'El residente no existe!');
        }

        Residente::destroy($request->id);
        return redirect()->route('residente.index')->with('success_message', 'Residente eliminado exitosamente!');
    }
}
