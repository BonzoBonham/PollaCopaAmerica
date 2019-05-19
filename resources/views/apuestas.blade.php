@extends('layouts.app')

@section('content')
<div class="container">
      <div class="container">
           <table id="equipos">
               <thead>
                   <tr>
                       <th>ID</th>
                       <th>Nombre</th>
                       <th>&nbsp;</th>
                   </tr>
               </thead>

                   <tbody>
                      @foreach($equipos as $equipo)
                       
                          <tr>
                             <td>{{$equipo->id}}</td> 
                             <td>{{$equipo->nombre}}</td>
                             <td><a href="{{ route('equipos.edit',$equipo->id )}}" class="btn btn-danger">Aceptar</a></td>
                          </tr>
                     
                      @endforeach
                   </tbody>

           </table>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

        <script>
          $(document).ready(function(){
            $('#equipos').DataTable();
          });
        </script>
</div>
@endsection
