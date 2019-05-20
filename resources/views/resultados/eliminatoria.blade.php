@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<h3>FASE DE ElIMINATORIA</h3>
			<hr class="my-4">
			<div class="container">
				<div class="row">
				<div class="col-4">
					@for ($i = 0; $i < 4; $i++)
						@component('layouts.partials.score-card')
						@endcomponent
					@endfor
				</div>
				<div class="col-4">
					@for ($i = 0; $i < 2 ; $i++)
						@component('layouts.partials.score-card')
						@endcomponent
					@endfor
				</div>
				<div class="col-4">
					@for ($i = 0; $i < 2; $i++)
						@component('layouts.partials.score-card')
						@endcomponent
					@endfor
				</div>
				</div>
			</div>	
		</div>
	</div>
</div>
@endsection
