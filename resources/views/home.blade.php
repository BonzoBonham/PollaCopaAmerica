@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <h3>Football</h3>
          <li class="nav-item">
                        <a class="nav-link" href="{{ route('equipos.index')}}">¡Apostar!</a>
                      </li>
          <hr class="my-4">
          @include('layouts.partials.group-table')
        </div>
    </div>
</div>
@endsection
