@extends('adminlte::page')

@section('title', 'Nuevo producto')

@section('css')
  <!--  <link rel="stylesheet" href="/css/admin_custom.css">-->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous" />
  <link rel="stylesheet" href="/css/app.css">
  

  <style>
     .dropzoneDragArea {
      background-color: #fbfdff;
      border: 1px dashed #c0ccda;
      border-radius: 6px;
      padding: 60px;
      text-align: center;
      margin-bottom: 15px;
      cursor: pointer;
  }
  .dropzone{
    box-shadow: 0px 2px 20px 0px #f2f2f2;
    border-radius: 10px;
  }
  </style>


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
    <textarea class="form-control"  placeholder="Descripción" id="descripcion" name="descripcion">{!! htmlspecialchars($producto->descripcion_producto) !!}</textarea>
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
                <img class="img-fluid mb-2" src="{{ asset('images/productos/thumbs/'.$imagen_producto->imagen) }}" >              
            </a>
          <br>
          <a href="{{ route('eliminarImagen',$imagen_producto->id_imagen) }}" id="borrarImagen" class="texto-encima"><i class="fas fa-trash-alt" style="color: white"></i></a>
        </div>
        @endforeach
      </div>
      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalGaleria{{$producto->id_producto}}">Agregar imagenes</button> 
      </div>
</div>
<br>



  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
  <a href="/productos" class="btn btn-secondary" tabindex="5">Cancelar</a>
</form>


<!-- Modal -->
<div class="modal fade" class="modal_galeria" id="modalGaleria{{$producto->id_producto}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('guardarImagenGaleria')}}" id="demoform" method="post" enctype="multipart/form-data" class="dropzone" id="my-great-dropzone">
          @csrf
          <input type="hidden" name="id_producto" name="id_producto" value="{{$producto->id_producto}}">
          <div class="form-group">
            <div id="dropzoneDragArea" class="dz-default dz-message dropzoneDragArea">
              <span>Seleccione o arrastre imagenes.</span>
            </div>
            <div class="dropzone-previews"></div>
          </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" id="uploadfiles" class="btn btn-primary">Guardar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


@stop



@section('js')

<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
<script src="{{ asset('/js/admin.js')}}"></script>


@if ( session()->has('Result'))

<script>
    $(function(){
        toastr.{{ session('Result')['status'] }}('{{session('Result')['content'] }}')
    });

    
</script>
@endif
<script>
/*
Dropzone.options.myGreatDropzone = { // camelized version of the `id`
    paramName: "file", // The name that will be used to transfer the file
    maxFilesize: 2, // MB
    addRemoveLinks: true,
    autoProcessQueue: false,
    acceptedFiles: '.jpeg, .jpg, .png',

    init: function () {
      myGreatDropzone.on("complete", function (file) {
     
        window.location.reload();
      
    });
  }
    
  };*/


  Dropzone.autoDiscover = false;

var myDropzone = new Dropzone(".dropzone", { 
   addRemoveLinks: true,
	 autoProcessQueue: false,
	 uploadMultiple: true,
   parallelUploads: 10
});

$('#uploadfiles').click(function(){
   myDropzone.processQueue();

   myDropzone.on("complete", function (file) {
     
    Swal.fire({
      icon: 'success',
      title: 'Producto guardado con éxito',
      showConfirmButton: false,
      timer: 2000
    }).then(function() {
        window.location.reload(); 
    });
 

   
   
 });
});
  
  
  
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



