<div class="card bg-secondary mb-3" style="max-width: 25rem;">
	@if (empty($partido->equipos))
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
		@endforeach
	@else
		@for ($i = 0; $i < 2 ; $i++)
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
		@endfor
	@endif

		
	

</div>