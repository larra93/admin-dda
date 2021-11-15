@extends('adminlte::page')

@section('title', 'Servicios')

@section('css')
   <!-- <link rel="stylesheet" href="/css/admin_custom.css">-->
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="{{ asset('/css/toastr.css') }}" rel="stylesheet">
   
@stop

@section('content_header')
<div class="alert alert-default-info" role="alert">
  Servicios
 </div>
@stop

@section('content')
<div class="container-fluid">


<div class="table-responsive-sm">
<table id="servicios" class="table mt-4" style="width: 100%">
  <thead class="bg-primary text-white">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripción</th>
      <th scope="col">Imagen</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>    
    @foreach ($servicios as $servicio)
    <?php $desc = substr($servicio->descripcion_servicio, 0, 50); ?>
    <tr>
        <td>{{$servicio->id_servicio}}</td>
        <td>{{$servicio->nombre_servicio}}</td>
        <td>{!!$desc.'...' !!}</td>
     
        <td><img src="{{ asset('images/servicios/thumbs/'.$servicio->imagen) }}" width=100 > </td>
        <td>

          @csrf
            @method('PUT')
          <div class="row">
          <button class="btn btn-round btnEditar"> 
              <a href="servicios/create"><i class="fa fa-plus"></i></a>
          </button>
          <button class="btn btn-round btnEditar"> 
              <a href="{{ url('admin/servicios/'.$servicio->id_servicio.'/edit')}}"><i class="fa fa-edit"></i></a>
          </button>
       
          <form action="{{ route ('servicios.destroy',$servicio->id_servicio)}}" class="form-eliminar" method="POST">
            @csrf
            @method('DELETE')
            
              <button type="submit" class="btn btn-round" style="background-color:transparent;"><i class="fa fa-trash"></i></button>
          </div>
          </form> 
        </td>        
    </tr>
    @endforeach
  </tbody>
</table>

</div>
</div>












@stop



@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/js/toastr.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
@if ( session()->has('Result'))

<script>
    $(function(){
        toastr.{{ session('Result')['status'] }}('{{session('Result')['content'] }}')
    });

    
</script>
@endif


<script>
    $(document).ready(function() {

      $('.form-eliminar').submit(function(e){
      e.preventDefault();
      Swal.fire({
      title: '¿Estás seguro?',
      text: "Este servicio se eliminara definitivamente",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, eliminar!',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.isConfirmed) {
      this.submit();
      }
    })
})

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

    $('#servicios').DataTable({
      "lengthMenu": [[5, 10, 50, -1 ], [5, 10, 50, "Todos"]],
      "language": {
            "lengthMenu": "Mostrar _MENU_ registros ",
            "zeroRecords": "Nada encontrado",
            "info": "Mostrando la página _PAGE_ of _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(Filtrado de _MAX_ registros totales)",
            "search": "Buscar",
            'paginate':{
              'next':'Siguiente',
              'previous':'Anterior'
            }
        }
    });
} );


ClassicEditor
        .create( document.querySelector( '#descripcion' ) )
        .catch( error => {
           
        } );
</script>
@stop




