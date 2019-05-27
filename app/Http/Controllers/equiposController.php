<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Equipo;
use Illuminate\support\Facades\Input;
use Illuminate\support\Facades\Auth;

class equiposController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario=User::find(Auth::user()->id);
        // equipoUser puede ser null
        $equipoUser = $usuario->equipo;
        
    	$equipos=Equipo::all();
        return view('apuestas', [
            'equipos' => $equipos,
            'equipoUser' =>$equipoUser
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         
         //return view('enviarDatos');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuarioInteresado=User::find(Auth::user()->id);
        $equip=Equipo::find($id);

        $equipoid=User::find(Auth::user()->equipo_id);

        if ($equipoid==null)
            {$usuarioInteresado->equipo_id=$equip->id;}
        
        $usuarioInteresado->save();

        return redirect()->route('home');



    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
