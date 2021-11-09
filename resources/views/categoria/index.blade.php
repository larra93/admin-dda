@extends('adminlte::page')

@section('title', 'Categorías')

@section('css')
   <!-- <link rel="stylesheet" href="/css/admin_custom.css">-->
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="{{ asset('/css/toastr.css') }}" rel="stylesheet">
   
@stop

@section('content_header')
<div class="alert alert-default-info" role="alert">
    Categorías
  </div>
@stop

@section('content')
<div class="container-fluid">


<div class="table-responsive-sm">
<table id="categorias" class="table mt-4" style="width: 100%">
  <thead class="bg-primary text-white">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>    
    @foreach ($categorias as $categoria)
    <tr>
        <td>{{$categoria->id_categoria}}</td>
        <td>{{$categoria->nombre_categoria}}</td>
        <td>
            
          @csrf
          @method('PUT')
          <div class="row">
        <button class="btn btn-round btnEditar"> 
            <a href="categorias/create"><i class="fa fa-plus"></i></a>
        </button>
        <button class="btn btn-round btnEditar"> 
            <a href="{{ url('categorias/'.$categoria->id_categoria.'/edit')}}"><i class="fa fa-edit"></i></a>
        </button>
     
        <form action="{{ route ('categorias.destroy',$categoria->id_categoria)}}" class="form-eliminar" method="POST">
          @csrf
          @method('DELETE')
          <div class="row">
            <button type="submit" class="btn btn-lg" style="background-color:transparent;"><i class="fa fa-trash"></i></button>
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
      text: "Esta categoría se eliminara definitivamente",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, eliminar',
      cancelButtonText: 'Cancelar'
    }).then((result) => {
      if (result.isConfirmed) {
      this.submit();
      }
    })
})

 

    $('#categorias').DataTable({
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



</script>
@stop




