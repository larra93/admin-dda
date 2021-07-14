@extends('adminlte::page')

@section('title', 'Nuevo producto')

@section('css')
  <!--  <link rel="stylesheet" href="/css/admin_custom.css">-->
  
  
@stop

@section('content_header')
    <h1>Nuevo Producto</h1>
@stop

@section('content')
<h2>Crear Producto</h2>
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
<form action="/productos"   enctype="multipart/form-data" method="POST">
    @csrf
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input  name="nombre" type="text" class="form-control" tabindex="1">    
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Descripción</label>
    <textarea class="form-control"  placeholder="Descripción" id="descripcion" name="descripcion"></textarea>
  </div>
  <div class="mb-3">
    <label for="exampleFormControlSelect1">Categoría</label>
    <select class="form-control" name="categoria" id="categoria">

    @foreach($categorias as $category)
                
                <option value="{{$category->id_categoria}}">{{$category->nombre_categoria}}</option>
                
                @endforeach
    </select>  
    </div>
  <div class="mb-3">
    <label for="" class="form-label">Imagen Destacada</label>
    <input type="file" id="imagen" name="imagen" >
  </div>

  <div class="mb-3">
    <input type="file" name="imagenes[]" id="image" multiple >
  </div>


  <div  class ="mb-3 mt-3 d-flex flex-row justify-content-center alig-items-center" id="imagenPreview"></div>

 


  <a href="/productos" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>


@stop



@section('js')

<script src="{{ asset('/js/admin.js')}}"></script>
<script>
$(document).ready(function() {
function filePreview(input){
  if(input.files && input.files[0]){
    var reader = new FileReader();
    reader.onload = function(e){
      $('#imagenPreview').html("<img width=100 class='img-fluid' src='"+e.target.result+"' />");
    }
    reader.readAsDataURL(input.files[0]);
  }
}

$('#imagen').change(function(){
  filePreview(this);
})



});



</script>


@stop



