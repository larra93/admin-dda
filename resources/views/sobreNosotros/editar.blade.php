@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')
    
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="/css/app.css">
    
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
    Editar Sobre Nosotros
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
<form action="/admin/sobreNosotros/{{$sobre->id}}"   enctype="multipart/form-data" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Descripción</label>
        <textarea class="form-control"  placeholder="Descripción" id="descripcion" name="descripcion">{!! htmlspecialchars($sobre->descripcion) !!}</textarea>
      </div>
 
 

<div class="mb-3">
    <label for="" class="form-label">Imagen</label>
    <input type="file" id="imagen" name="imagen"><br>
    <div  class ="d-flex flex-row justify-content-center alig-items-center" id="imagenPreview"></div>
    
  </div>
    <img id="imagenAnterior" class="img-fluid mx-auto" width="200" src="{{ asset('images/about/thumbs/'.$sobre->imagen) }}" >              
    
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
  <a href="/sobreNosotros" class="btn btn-secondary" tabindex="5">Cancelar</a>
</form>

@stop



@section('js')
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
<script src="{{ asset('/js/admin.js')}}"></script>
<script>

$(document).ready(function() {



function filePreview(input){
if(input.files && input.files[0]){
var reader = new FileReader();
reader.onload = function(e){
    document.getElementById('imagenAnterior').style.visibility='hidden';
  $('#imagenPreview').html("<img width=300 class='img-fluid' src='"+e.target.result+"' />");
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



