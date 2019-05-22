<div class="card text-white bg-success">
  <div class="card-header">
    <div class="row">
      <div class="col-1 "> POS </div>
      <div class="col-4 d-inline"> TEAM</div>
      <div class="col-1"> W</div>
      <div class="col-1"> L </div>
      <div class="col-1"> T</div>
      <div class="col-1"> PTS </div>
      <div class="col-1"> DIFF </div>
  </div>
    </div>
  <div class="card-body text-primary bg-light">
      <div class="container-fluid">
        @php
          $grupo = array();
          foreach ($equipos as $equipo) {
            $win = 0;
            $gf = 0;
            $gc = 0;
            $data = array();

            foreach ($equipo->partidosFaseGrupos as $partido) {
              $gf += $partido->pivot->goles;
              foreach ($partido->equipos->where('id', '!=', $equipo->id) as $rival){
                $gc += $rival->pivot->goles;
              }
            }
            $dif = $gf - $gc;

            $data['nombre'] = $equipo->nombre;          
            $data['win'] = $equipo->partidosFaseGruposGanados->count();
            $data['lost'] = $equipo->partidosFaseGruposPerdidos->count(); 
            $data['tie'] = $equipo->partidosFaseGruposEmpatados->count();
            $data['bandera'] = $equipo->bandera;
            $data['pts'] = 3*$data['win'] + $data['tie'];
            $data['udif'] = $gf - $gc;
            $data['diff']=( $dif > 0) ?  '+'.$dif : $dif;
            array_push($grupo, $data);
          }
          function sort_data($element1, $element2) { 
            $w1 = $element1['pts']+0.01*$element1['udif']; 
            $w2 = $element2['pts']+0.01*$element1['udif']; 
            return -($w1 - $w2); 
          }  
          usort($grupo, 'sort_data'); 
                      
      @endphp
        @foreach ($grupo as $equipo)
           @component('layouts.partials.row-data', 
           [
            'index' => $loop->iteration,
            'nombre' => $equipo['nombre'],
            'bandera' => $equipo['bandera'],
            'win'  => $equipo['win'],
            'lost'  => $equipo['lost'],
            'tie'  =>  $equipo['tie'],
            'pts' => $equipo['pts'], 
            'diff' => $equipo['diff'],
            ])
           @endcomponent
        @endforeach
        
      </div>
  </div>
</div>