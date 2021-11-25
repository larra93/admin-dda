@extends('adminlte::page')

@section('title', 'Nuevo producto')

@section('css')
  <!--  <link rel="stylesheet" href="/css/admin_custom.css">-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous" />
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
  Nuevo Producto
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
  <form action="/admin/productos" name="demoform" id="demoform" method="POST" class="dropzone" enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
    <input type="hidden" class="userid" name="userid" id="userid" value="">
    <label for="" class="form-label">Nombre</label>
    <input  name="nombre" type="text" class="form-control" tabindex="1" required>    
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Descripción</label>
    <textarea class="form-control"  placeholder="Descripción" id="descripcion" name="descripcion" required></textarea>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Precio</label>
    <input type="number" class="form-control" name="precio" required>
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
    <input type="file" id="imagen" name="imagen" required>
  </div>

  <div class="form-group">
    <div id="dropzoneDragArea" class="dz-default dz-message dropzoneDragArea">
      <span>Seleccione o arrastre imagenes.</span>
    </div>
    <div class="dropzone-previews"></div>
  </div>





 

  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
  <a href="/admin/productos" class="btn btn-secondary" tabindex="5">Cancelar</a>


</form>

  

@stop



@section('js')
<script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('/js/admin.js')}}"></script>
<script>

Dropzone.autoDiscover = false;
// Dropzone.options.demoform = false;	
let token = $('meta[name="csrf-token"]').attr('content');
$(function() {
var myDropzone = new Dropzone("div#dropzoneDragArea", { 
	paramName: "imagenes",
	url: "{{ url('guardarImagen') }}",
	previewsContainer: 'div.dropzone-previews',
	addRemoveLinks: true,
	autoProcessQueue: false,
	uploadMultiple: true,
  parallelUploads: 10,
  maxFiles: 10,
	params: {
        _token: token
    },
	 // The setting up of the dropzone
	init: function() {
	    var myDropzone = this;
    
	    //form submission code goes here
	    $("form[name='demoform']").submit(function(event) {
	    	//Make sure that the form isn't actully being sent.
	    	event.preventDefault();
	    	URL = $("#demoform").attr('action');
	    	//formData = $('#demoform').serialize();
        let formData = new FormData($('#demoform')[0]);
       
	    	$.ajax({
	    		type: 'POST',
	    		url: URL,
	    		data: formData,
          contentType: false,
          processData: false,
	    		success: function(result){
	    			if(result.status == "success"){
	    				// fetch the useid 
	    				var userid = result.user_id;
                Swal.fire({
                icon: 'success',
                title: 'Producto guardado con éxito',
                showConfirmButton: false,
                timer: 2000
              }).then(function() {
              +window.location.reload(); 
    });
						$("#userid").val(userid); // inseting userid into hidden input field
	    				//process the queue
	    				myDropzone.processQueue();
	    			}else{
	    				console.log("error");
	    			}
	    		}
	    	});
	    });
	    //Gets triggered when we submit the image.
	    this.on('sending', function(file, xhr, formData){
	    //fetch the user id from hidden input field and send that userid with our image
	      let userid = document.getElementById('userid').value;
		   formData.append('userid', userid);
		});
		
	    this.on("success", function (file, response) {
       
        //reset the form
        $('#demoform')[0].reset();
            //reset dropzone
            $('.dropzone-previews').empty();
        });


        this.on("queuecomplete", function () {
          
        });
		
        // Listen to the sendingmultiple event. In this case, it's the sendingmultiple event instead
	    // of the sending event because uploadMultiple is set to true.
	    this.on("sendingmultiple", function() {
	      // Gets triggered when the form is actually being sent.
	      // Hide the success button or the complete form.
	    });
		
	    this.on("successmultiple", function(files, response) {
	      // Gets triggered when the files have successfully been sent.
	      // Redirect user or notify of success.
	    });
		
	    this.on("errormultiple", function(files, response) {
	      // Gets triggered when there was an error sending the files.
	      // Maybe show form again, and notify user of error
	    });
	}
	});
});



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



