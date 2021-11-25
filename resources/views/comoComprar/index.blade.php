@extends('adminlte::page')

@section('title', 'Cómo Comprar')

@section('css')
   <!-- <link rel="stylesheet" href="/css/admin_custom.css">-->
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css" rel="stylesheet">
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
    Cómo Comprar
  </div>
@stop

@section('content')
<div class="container-fluid">


<div class="table-responsive-sm">
<table id="comprar" class="table mt-4" style="width: 100%">
  <thead class="bg-primary2 text-white">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody> 
      
   
    @foreach ($compra as $como_comprar)
    <?php $desc = substr($como_comprar->descripcion, 0, 300); ?>
    <tr>
        <td>{{$como_comprar->id_compra}}</td>
        <td>{!!$desc.'...'!!}</td>
        <td>
            
          @csrf
          @method('PUT')
          <div class="row">
        <button class="btn btn-round btnEditar"> 
            <a href="{{ url('/admin/compra/'.$como_comprar->id_compra.'/edit')}}"><i class="fa fa-edit"></i></a>
        </button>
     
        
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


    $('#comprar').DataTable({
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




