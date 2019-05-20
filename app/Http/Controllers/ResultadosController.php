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
    	$cuartos = Partido::eliminatoria()->fase(2)->get();
        $semis = Partido::eliminatoria()->fase(3)->get();
        $tercero = Partido::eliminatoria()->fase(4)->get();
        $final = Partido::eliminatoria()->fase(5)->get();
    	return view('resultados.eliminatoria', 
            [
                'cuartos'=> $cuartos,
                'semis' => $semis,
                'tercero' => $tercero,
                'final'  => $final,
            ]
        );
       
    }

    public function partidos(){
    	$partidos = Partido::all()->slice(0,18);
        // return $partidos;//para probar 
    	return view('resultados.partidos', ['partidos'=> $partidos ]);
    }  
}



