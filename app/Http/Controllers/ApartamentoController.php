<?php

namespace App\Http\Controllers;

use App\Apartamento;
use Illuminate\Http\Request;
use Validator;

class ApartamentoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $apartamentos = Apartamento::where('estado', 1)->get();
        return view('apartamentos.index')->with(compact('apartamentos'));
    }

    public function newApartamento()
    {
        return view('apartamentos.new');
    }

    public function saveApartamento(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'numero' => 'required|numeric|min:0',
                'floor' => 'required|numeric|min:1',
                'area' => 'required|numeric|min:0',
                'torre' => 'required|numeric|min:0',
            ]
        );

        //si hay errores returna array de errores
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $apartamento = new Apartamento();
        $apartamento->numero = $request->numero;
        $apartamento->floor  = $request->floor;
        $apartamento->area = $request->area;
        $apartamento->torre = $request->torre;
        $apartamento->estado = true;
        $apartamento->save();

        return redirect()->route('apartamentos.index')->with('success_message', 'Apartamento agregado exitosamente!');

    }

    public function editApartamento($id)
    {
        $apartamento       = Apartamento::find($id);
        //return $apartamento;
        return view('apartamentos.edit')->with(['apartamento'=>$apartamento]);
    }

    public function updateApartamento(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'id' => 'required|exists:apartamentos',
                'numero' => 'required|numeric|min:0',
                'floor' => 'required|numeric|min:1',
                'area' => 'required|numeric|min:0',
                'torre' => 'required|numeric|min:0',
            ]
        );

        //si hay errores returna array de errores
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $apartamento = Apartamento::find($request->id);
        $apartamento->numero = $request->numero;
        $apartamento->floor  = $request->floor;
        $apartamento->area = $request->area;
        $apartamento->torre = $request->torre;
        $apartamento->estado = true;
        $apartamento->save();

        return redirect()->route('apartamentos.index')->with('success_message', 'Apartamento modificado exitosamente!');
    }

    public function deleteApartamento(Request $request)
    {
        $apartamento = Apartamento::find($request->id);

        if (!$apartamento) {
            return redirect()->route('apartamentos.index')->with('error_message', 'El apartamento no existe!');
        }

        Apartamento::destroy($request->id);
        return redirect()->route('apartamentos.index')->with('success_message', 'Apartamento eliminado exitosamente!');
    }

    public function asignarResidente(Request $request)
    {
        $apartamento_residente = new Apartamento_Residente();
        $apartamento_residente->apartamento_id = $request->apartamento_id;
        $apartamento_residente->residente_id = $request->residente_id;
        $apartamento_residente->save();
        return redirect()->route('apartamentos.index')->with('success_message', 'Residente asignado exitosamente!');
    }
}
