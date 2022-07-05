@extends('layouts.app-master')

@section('content')
<p>
    <p>
<div class="pull-right mb-2">
<a class="btn btn-success" id="crear" name="crear">Crear Especialidad</a>
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
<th>Especialidad</th>
<th>Descripcion</th>
<th>Estado</th>

<th width="280px">Acciones</th>
</tr>
</thead>
<tbody>
@foreach ($especialidades as $espe)
<tr>
<td>{{ $espe->especialidad }}</td>
<td>{{ $espe->descripcion }}</td>
<td>{{ $espe->estado }}</td>
<td>

<button id="editCompany" data-toggle="modal"  data-toggle="modal" data-id='{{ $espe->id }}' data-target="#modal-id"  class="btn btn-primary btn-sm">Editar</button>

<button id="eliminar" data-toggle="modal"  data-toggle="modal" data-id='{{ $espe->id }}' data-target="#modal-id"  class="btn btn-primary btn-sm">Eliminar</button>

</td>
</tr>
</tbody>



@endforeach
@include('especialidad.modal')
</table>

</body>
</html>
@endsection


@section('scripts')
@push('ajax_crud')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script src="{{('/assets/js/especialidad.js')}}"></script>
@section('scripts')