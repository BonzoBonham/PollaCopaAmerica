@extends('layouts.app')

@section('content')
<div class="modal d-flex">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">GANADORES <i class="fas fa-trophy"></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row mt-0 pt-0">
           <div class="col-12 d-flex justify-content-center">
               <img  class="w-75"src="{{ asset('images/win/winners.svg') }}" class="img-fluid" alt="Responsive image">
           </div>
          </div>
          @for ($i = 0; $i <100 ; $i++)
          <div class="row d-flex justify-content-center">
            <div class="col-3"><p class="h4 text-center"> John Doe </p></div>
            <div class="col-3"><p class="h4 text-center"> Bran Stark</p></div>
            <div class="col-3"><p class="h4 text-center"> John snow</p></div>
            <div class="col-3"><p class="h4 text-center"> John snow</p></div>
          </div>
          @endfor
        </div>
      </div>
      <div class="modal-footer">
        <div class="container">
          <div class="row">
            <div class="col-6">
                <h2>Felicitaciones !!!</h2>
            </div>
            <div class="col-3">
              <button type="button" class="btn btn-secondary">next time</button>
            </div>
            <div class="col-3">
                <button type="button" class="btn btn-success">get paid</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
