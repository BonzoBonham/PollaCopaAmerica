<div class="row">
  <div class="col-1">
    <h3>
      <small class="text-muted">
        {{$index}}
      </small>
    </h3>
  </div>
  <div class="col-4 d-inline">
    <div class="container p-0">
      <div class="row p-0">
        <div class="col-3">
            <img src="{{ asset($bandera) }}" class="m-0 d-flex align-self-start  mw-100" alt="">
        </div>
        <div class="col-8">
          {{$nombre}}
        </div>
      </div>
    </div>
  </div>
  <div class="col-1"> {{$win}} </div>
  <div class="col-1"> {{$lost}} </div>
  <div class="col-1"> {{$tie}}</div>
  <div class="col-1"> {{$pts}} </div>
  <div class="col-1"> {{$diff}} </div>
</div>
<hr class="my-4">