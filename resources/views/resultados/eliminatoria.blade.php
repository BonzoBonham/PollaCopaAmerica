@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<h3>FASE DE ElIMINATORIA</h3>
			<hr class="my-4">
			<div class="container">
				<div class="row">
				<div class="col-4 d-flex flex-column justify-content-around">
					@foreach ($cuartos as $cuarto)
						@component('layouts.partials.score-card',['partido' => $cuarto])
						@endcomponent
					@endforeach
				</div>
				<div class="col-4 d-flex flex-column justify-content-around">
					@foreach ($semis as $semi)
						@component('layouts.partials.score-card', ['partido' =>$semi])
						@endcomponent
					@endforeach
				</div>
				<div class="col-4 d-flex flex-column justify-content-end">
					<div class="container px-0">
						<div class="col px-0">
							<div class="row-6 px-0 pt-3 pb-4">
								<h3>Final</h3>
								@foreach ($final as $fin)
									@component('layouts.partials.score-card', ['partido' => $fin])
									@endcomponent
								@endforeach
							</div>
							<div class="row-6 px-0 pt-3">
								<h5>3er Puesto</h5>
								@foreach ($tercero as $ter)
									@component('layouts.partials.score-card',['partido' => $ter])
									@endcomponent
								@endforeach
							</div>	
						</div>
					</div>
				</div>
				</div>
			</div>	
		</div>
	</div>
</div>
@endsection
