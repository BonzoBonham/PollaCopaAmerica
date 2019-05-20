
<div class="card bg-secondary mb-3" style="max-width: 25rem;">
	@if ($partido->equipos()->toArray() != null)
		@foreach ($partido->equipos()->toArray() as $equipo)

			<div class="card-header">
				<div class="container">
					<div class="row">
						<div class="col-8">
							<div class="container">
								<div class="row">
									<div class="col-4">
										
									</div>
									<div class="col-8">
										
									</div>
								</div>
							</div>
						</div>
						<div class="col-4">
							0
						</div>
					</div>
				</div>
			</div>
		@endforeach
	@else
	<div class="card-header">
		<div class="container">
			<div class="row">unknown</div>
		</div>
	</div>
	<div class="card-header">
		<div class="container">
			<div class="row">unknown</div>
		</div>
	</div>

	@endif
</div>