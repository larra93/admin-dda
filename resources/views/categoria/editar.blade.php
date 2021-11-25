@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('content_header')
<div class="alert alert-default-danger" role="alert">
    Editar Categoría
  </div>
@stop

@section('content')

@if($message = Session::get('ErrorInsert'))

<div class="col-12 alert alert-danger alert-dismissable fade show" role="alert">
  <h5>Errores:</h5>
<ul>
  @foreach($errors->all() as $error)
<li>{{ $error }}</li>

@endforeach
</ul>  
</div>

@endif
<form action="/admin/categorias/{{$categoria->id_categoria}}"   enctype="multipart/form-data" method="POST">
    @csrf
    @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="codigo" name="nombre" type="text" value="{{$categoria->nombre_categoria}}" class="form-control" tabindex="1">    
  </div>
 
 

  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
  <a href="/admin/categorias" class="btn btn-secondary" tabindex="5">Cancelar</a>
</form>

@stop



@section('js')
 
@stop



