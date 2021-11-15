@extends('adminlte::page')

@section('title', 'Editar Términos')

@section('css')
    <link rel="stylesheet" href="/css/app.css">
    
@stop

@section('content_header')
<div class="alert alert-default-info" role="alert">
    Editar Términos
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
<form action="/admin/terminos/{{$terminos->id_terminos}}"   enctype="multipart/form-data" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="" class="form-label">Descripción</label>
        <textarea class="form-control"  placeholder="Descripción" id="descripcion" name="descripcion">{!! htmlspecialchars($terminos->descripcion) !!}</textarea>
      </div>
 
 


               
    
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
  <a href="/admin/terminos" class="btn btn-secondary" tabindex="5">Cancelar</a>
</form>

@stop



@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
<script src="{{ asset('/js/admin.js')}}"></script>
<script>


ClassicEditor
    .create( document.querySelector( '#descripcion' ) )
    .catch( error => {
        console.error( error );
    } );

</script>
 
@stop



