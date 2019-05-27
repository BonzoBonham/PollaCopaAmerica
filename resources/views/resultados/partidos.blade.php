@extends('layouts.head')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <h3>PARTIDOS</h3>
      <hr class="my-4">
      <div class="card text-white bg-dark">
        <div class="card-header">
          <div class="row">
            <div class="col-1"></div>
            <div class="col-2">FECHA & HORA</div>
            <div class="col-4">PARTIDO</div>
            <div class="col-5">
              <div class="container">
                <div class="row">
                  <div class="col-6">45 MIN</div>
                  <div class="col-6">90 MIN</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body text-primary bg-light">
          <div class="container-fluid">

            @foreach ($partidos as $partido)
            <div class="row">
              <div class="col-1"> <span style="font-size: 2em;"><i class="fas fa-futbol"></i></span></div>
              <div class="col-2">JULY 24, 11:30</div>
              @php
                $eq1 = $partido->equipos->slice(0, 1)->first();
                $eq2 = $partido->equipos->slice(1, 1)->first();
                $eq1_nombre = strtoupper($eq1->nombre);
                $eq2_nombre = strtoupper($eq2->nombre);
                $eq1_goles = $eq1->pivot->goles;
                $eq2_goles = $eq2->pivot->goles;
              @endphp
              <div class="col-4">{{ $eq1_nombre}} VS.  {{ $eq2_nombre}}</div>
              <div class="col-5">
                <div class="container">
                  <div class="row">
                    <div class="col-6 "> {{$eq1_goles}}:{{$eq2_goles}}</div>
                    <div class="col-6 ">{{ $eq1_goles}}:{{ $eq2_goles}}</div>
                  </div>
                </div>
              </div>
            </div>
            <hr class="my-4">
            @php
              $eq1 = '';
              $eq2 = '';
            @endphp
            @endforeach

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

