@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <h3>FASE DE ElIMINATORIA</h3>
          <hr class="my-4">
          @yield('layouts.partials.group-table', compact($equipos))

        </div>
    </div>
</div>
@endsection
