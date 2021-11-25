

@extends('web.main')

@section('contenido')  
@include('web.funciones')
    
<section id="productos" class="portfolio sectionAbout">
  <div class="container">

    <div class="section-title">
    
      <h2 class="wow pulse">Productos</h2>
     
    </div>
    <div class="row portfolio-container  wow fadeInRight">


 
    @if($resultados >= 1)
    
    
      @foreach($producto as $dato)
    
      <div class="col-md-4">
        <a href="{{ route('detalleProducto',$dato->id_producto) }}">
        <div class="portfolio-imag"><img src="{{ asset('images/productos/thumbs/'.$dato->imagen_destacada) }}" class="img-fluid"  alt="detalles de amor coquimbo producto"></div>
        <div class="portfolio-info">
            <h4>{{$dato->nombre_producto}}</h4>
            <p>{{'$'. number_format($dato->precio, 0, ',', '.')}}</p>
        </div>
    
        </a>
        </div>
        @endforeach
    
    @else

    <div class="container detalleProducto">
      <h4>No se encontraron resultados</h4>
      </div>
    
 
  
    

      @endif
    
    </div>
  </div>
  
  
</section>  

    @include('web.footer')

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

@endsection



@section('scripts')

<script type="text/javascript">


$(window).on('load', function() { 
    $(".loader").fadeOut("slow");
     
});
</script>




@endsection

