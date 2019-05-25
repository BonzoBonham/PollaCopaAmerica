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
        $usuariosGanadores = User::where('ganador','=',1)->get();
        dd ($usuariosGanadores);
    }
}
