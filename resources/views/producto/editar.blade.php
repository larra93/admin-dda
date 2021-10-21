@extends('adminlte::page')

@section('title', 'Nuevo producto')

@section('css')
  <!--  <link rel="stylesheet" href="/css/admin_custom.css">-->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <link rel="stylesheet" href="/css/app.css">
  
@stop

@section('content_header')
    
    <div class="alert alert-default-info" role="alert">
        <h1>Editar Producto</h1>
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
<form action="/productos/{{$producto->id_producto}}"   enctype="multipart/form-data" method="POST">
    @csrf
    @method('PUT')
    @csrf
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input  name="nombre" type="text" value="{{$producto->nombre_producto}}" class="form-control" tabindex="1">    
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Descripción</label>
    <textarea class="form-control"  placeholder="Descripción" id="descripcion" name="descripcion">{{$producto->descripcion_producto}}</textarea>
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Precio</label>
    <input type="number" class="form-control" value="{{$producto->precio}}" name="precio">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlSelect1">Categoría</label>
    <select class="form-control" name="categoria" id="categoria">

        @foreach($categorias as $category)
        @if( $producto->id_categoria == $category->id_categoria)
        <option  value="{{$producto->id_categoria}} "  selected>{{$producto->nombre_categoria}}  </option>
        @else
                    
        <option value="{{$category->id_categoria}}">{{$category->nombre_categoria}}</option>
        @endif           
        @endforeach
    </select>  
    </div>
  <div class="mb-3">
    <label for="" class="form-label">Imagen Destacada</label>
    <input type="file" id="imagen" name="imagen"><br>
    <img id="imagenAnterior" src="{{ asset('images/productos/thumbs/'.$producto->imagen_destacada) }}" width=100 >
    <div  class ="d-flex flex-row justify-content-center alig-items-center" id="imagenPreview"></div>
    
  </div>

  <div class="mb-3">
    <input type="file" name="imagenes[]" id="image" multiple >
  </div>

  <div class="container-fluid">
    <div class ="card card-primary card-outline">
      <div class="card-header">
      <div class="card-title">
      Galería de imagenes  
      </div>  
      </div> 
      <div class="card-body">
    <div class="row">

        @foreach ($productoImagen as $imagen_producto)
        <div class="col-sm-3">
            <a href="{{ asset('images/productos/'.$imagen_producto->imagen) }}" class="fancybox" rel="ligthbox">
                <img class="zoom img-fluid " src="{{ asset('images/productos/thumbs/'.$imagen_producto->imagen) }}" >              
            </a>
          <br>
          <a href="" class="texto-encima"><i class="fas fa-trash-alt" style="color: white"></i></a>
        </div>
        @endforeach
      </div>
      </div>
</div>
<br>




  

 


  <a href="/productos" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>


@stop



@section('js')

<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
<script src="{{ asset('/js/admin.js')}}"></script>
<script>
$(document).ready(function() {

    $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });
    
    $(".zoom").hover(function(){
		
		$(this).addClass('transition');
	}, function(){
        
		$(this).removeClass('transition');
	});


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



