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
        @foreach ($equipos as $equipo)
          @php
            $win = 0;
            $gf = 0;
            $gc = 0;
           

            foreach ($equipo->partidosFaseGrupos as $partido) {
              $gf += $partido->pivot->goles;
              foreach ($partido->equipos->where('id', '!=', $equipo->id) as $rival){
                $gc += $rival->pivot->goles;
              }
            }
             $dif = $gf - $gc;
          
            $win = $equipo->partidosFaseGruposGanados->count();
            $lost = $equipo->partidosFaseGruposPerdidos->count(); 
            $tie = $equipo->partidosFaseGruposEmpatados->count();
            $pts = 3*$win + $tie;
            $diff =( $dif > 0) ?  '+'.$dif : $dif;


       
          @endphp

           @component('layouts.partials.row-data', 
           [
            'index' => $loop->iteration,
            'nombre' => $equipo->nombre,
            'bandera' => $equipo->bandera,
            'win'  => $win,
            'lost'  => $lost,
            'tie'  =>  $tie,
            'pts' => $pts, 
            'diff' => $diff, 
            ])
           @endcomponent
        @endforeach
        
      </div>
  </div>
</div>