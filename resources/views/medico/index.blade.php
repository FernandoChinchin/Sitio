@extends('layouts.app-master')

@section('content')
<p>
    <p>
<div class="pull-right mb-2">
<a class="btn btn-success" id="crear" name="crear">Crear Medico</a>
</div>
</div>
</div>
<meta name="csrf-token" content="{{ csrf_token() }}" />
@csrf
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table id="customers" class="table table-bordered table-condensed table-striped">
           
<thead>       
<tr>
<th>Cedula</th>
<th>Nombres</th>
<th>Apellidos</th>
<th>celular</th>
<th>Email</th>
<th width="280px">Action</th>
</tr>
</thead>
<tbody>
@foreach ($personas as $persona)
<tr>
<td>{{ $persona->cedula }}</td>
<td>{{ $persona->nombres }}</td>
<td>{{ $persona->apellidos }}</td>
<td>{{ $persona->celular }}</td>
<td>{{ $persona->mail }}</td>
<td>

<button id="editCompany" data-toggle="modal"  data-toggle="modal" data-id='{{ $persona->id }}' data-target="#modal-id"  class="btn btn-primary btn-sm">Editar</button>

<button id="eliminar" data-toggle="modal"  data-toggle="modal" data-id='{{ $persona->id }}' data-target="#modal-id"  class="btn btn-primary btn-sm">Eliminar</button>

</td>
</tr>
</tbody>



@endforeach
@include('medico.modal')
</table>

</body>
</html>
@endsection


@section('scripts')
@push('ajax_crud')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script src="{{('/assets/js/medico.js')}}"></script>
@section('scripts')