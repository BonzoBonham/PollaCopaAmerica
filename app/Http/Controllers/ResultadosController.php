<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipo;
use App\Partido;

class ResultadosController extends Controller
{
    public function grupos($grupo){
    	$equipos = Equipo::grupo($grupo)->get();
        // $equipo =  Equipo::grupo('A')->first();
        // $win = $equipo->partidosFaseGrupos;
    	return view('resultados.grupos', ['equipos' => $equipos]);
        // return $win;
    }

	public function eliminatoria(){
    	$partidos = Partido::eliminatoria()->get();
    	return view('resultados.eliminatoria', compact($partidos));
    }

    public function partidos(){
    	$partidos = Partido::all()->slice(0,18);
        // return $partidos;//para probar 
    	return view('resultados.partidos', ['partidos'=>$partidos  ]);
    }  
}



