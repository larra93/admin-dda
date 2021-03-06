@extends('adminlte::page')

@section('title', 'Dashboard')



@section('css')
    <link href="{{ asset('/css/toastr.css') }}" rel="stylesheet">
    <style>
      .sidebar-dark-primary{
        background: #AD5E99 !important;
      }
      .nav-link.active {
        background-color: #7BC4C4 !important;
      }
 </style>
   
@stop

@section('content_header')
<div class="alert alert-default-danger" role="alert">
  Nuevo Servicio
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
<form action="/admin/servicios"  enctype="multipart/form-data" method="POST">
    @csrf
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="codigo" name="nombre" type="text" class="form-control" tabindex="1">    
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Descripción</label>
    <textarea name="descripcion" id="descripcion"></textarea>
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
    <label for="" class="form-label">Imagen</label>
    <input type="file" id="imagen" name="imagen" >
  </div>
 

  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
  <a href="/admin/servicios" class="btn btn-secondary" tabindex="5">Cancelar</a>
</form>

<div  class ="mb-3 mt-3 d-flex flex-row justify-content-center alig-items-center" id="imagenPreview"></div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
 
<script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
<script>
$(document).ready(function() {
function filePreview(input){
  if(input.files && input.files[0]){
    var reader = new FileReader();
    reader.onload = function(e){
      $('#imagenPreview').html("<img width=600 class='img-fluid' src='"+e.target.result+"' />");
    }
    reader.readAsDataURL(input.files[0]);
  }
}

$('#imagen').change(function(){
  filePreview(this);
})

});

ClassicEditor
        .create( document.querySelector( '#descripcion' ), {
            toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
            heading: {
                options: [
                    { model: 'paragraph', title: 'Párrafo', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Encabezado 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Encabezado 2', class: 'ck-heading_heading2' },
                    { model: 'heading3', view: 'h3', title: 'Encabezado 3', class: 'ck-heading_heading3' },
                    { model: 'heading4', view: 'h4', title: 'Encabezado 4', class: 'ck-heading_heading4' },
                    { model: 'heading5', view: 'h5', title: 'Encabezado 5', class: 'ck-heading_heading5' },
                    { model: 'heading6', view: 'h6', title: 'Encabezado 6', class: 'ck-heading_heading3' }
                ]
            }
        } )
        .catch( error => {
            console.log( error );
        } );
</script>
@stop



