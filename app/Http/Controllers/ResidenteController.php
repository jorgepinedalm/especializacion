<?php

namespace App\Http\Controllers;

class ResidenteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('residentes.index');
    }

    function new () {
        return view('residentes.new');
    }
}
