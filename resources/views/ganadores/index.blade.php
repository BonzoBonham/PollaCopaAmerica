@extends('layouts.head')

@section('content')
	<div class="container">
		<table class="table  table-sm table-hover" id="Usuarios Ganadores">
			<thead>
				<tr>
					<th>Nombre del usuario</th>
				</tr>
			</thead>
			<tbody>
				@foreach($usuariosGanadores as $usuarios)
				<tr class="table-success">
					<td>{{$usuarios->name}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection