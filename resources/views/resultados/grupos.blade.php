@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <h3>GRUPO {{$equipos->first()->grupo}}</h3>
          <hr class="my-4">
          @component('layouts.partials.group-table', ['equipos' => $equipos])
          @endcomponent
        </div>
    </div>
</div>
@php
	$grupo = $equipos->first()->grupo;
	 $pag = array();
	switch ($grupo) {
    case 'A':
       $pag = array('C', 'B');
        break;
    case 'B':
         $pag = array('A', 'C');
        break;
    case 'C':
         $pag = array('B', 'A');
        break;
    }
@endphp
	

<div class="container">
	<div class="align-self-end">
		<ul class="pagination pagination-lg ">
			<li class="page-item">
				<a class="page-link" href="{{ url('grupos/'.$pag[0])}}">&laquo;</a>
			</li>
			<li class="page-item">
				<a class="page-link" href="{{url('grupos/'.$pag[1])}}">&raquo;</a>
			</li>
		</ul>
	</div>
</div>
@endsection

