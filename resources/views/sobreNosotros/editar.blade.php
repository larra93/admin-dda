@extends('adminlte::page')

@section('title', 'Dashboard')

@section('css')
    
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="/css/app.css">
    
@stop

@section('content_header')
<div class="alert alert-default-info" role="alert">
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
    .create( document.querySelector( '#descripcion' ) )
    .catch( error => {
        console.error( error );
    } );

</script>
 
@stop



