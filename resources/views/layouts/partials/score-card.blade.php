<div class="card bg-secondary mb-3" style="max-width: 25rem;">
	@php
		$elements = 0
	@endphp
	@foreach ($partido->equipos as $equipo)
		<div class="card-header">
				<div class="container">
					<div class="row">
						<div class="col-8">
							<div class="container">
								<div class="row">
									<div class="col-4">
										<img src="{{ asset($equipo->bandera) }}" class="m-0 d-flex align-self-start  mw-100" alt="">
									</div>
									<div class="col-8">
										{{$equipo->nombre}}
									</div>
								</div>
							</div>
						</div>
						<div class="col-4">
							{{$equipo->pivot->goles}}
						</div>
					</div>
				</div>
			</div>
			@php
				$elements = $elements +1;
			@endphp
	@endforeach
	@while($elements < 2 )
			<div class="card-header">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="container">
								<div class="row">
									<div class="col-12">
										PENDIENTE
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@php
				$elements = $elements +1;
			@endphp
	@endwhile

		
	

</div>