@extends('adminlte::page')

@section('title', 'Editar Compra')

@section('css')
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
    Editar Como Comprar
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
<form action="/admin/compra/{{$compra->id_compra}}"   enctype="multipart/form-data" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Descripción</label>
        <textarea class="form-control"  placeholder="Descripción" id="descripcion" name="descripcion">{!! htmlspecialchars($compra->descripcion) !!}</textarea>
      </div>
 
 


               
    
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
  <a href="/admin/compra" class="btn btn-secondary" tabindex="5">Cancelar</a>
</form>

@stop



@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
<script src="{{ asset('/js/admin.js')}}"></script>
<script>


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



