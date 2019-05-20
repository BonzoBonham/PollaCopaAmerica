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
           @component('layouts.partials.row-data', 
           [
            'index' => $loop->iteration,
            'nombre' => $equipo->nombre,
            'bandera' => $equipo->bandera,
            'win'  => '2',
            'lost'  => '1',
            'tie'  =>  '1',
            'pts' => '3', 
            'diff' => '+4', 
            ])
           @endcomponent
        @endforeach
        
      </div>
  </div>
</div>