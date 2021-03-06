<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\User;

use Illuminate\Http\Request;

class UsuariosGanadoresController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $usuariosGanadores = User::where('ganador','=',1)->orderBy('name', 'asc')->get();
        //dd ($usuariosGanadores);
        return view('ganadores.index')->with('usuariosGanadores',$usuariosGanadores);
    }
}
