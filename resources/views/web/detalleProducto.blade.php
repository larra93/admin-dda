
@extends('web.main')

@section('contenido')  

    
<!--<div class="loader"></div>-->

<section id="services" class="services">
	<div class="container">

 

  <div class="wrap">
		<div class="section-title">
     
      
      
    </div>
		<div class="store-wrapper">

    <div class="row">
    
    
  

    
    <div class="col-md-4 wow fadeInLeft">
    <img src="{{asset('/images/productos/'.$producto->imagen_destacada)}}" class="img-fluid" alt="">
    <br>
 
    <div class="cajaPrecio">
    <h4 style="text-align: center; font-size: 30px;"><?php echo '$'. number_format($producto->precio, 0, ',', '.');?></h4>
    </div>  
  </div>

  
  
    <div class="col-md-6">
      <h2><?php echo $producto->nombre_producto;?></h2>

      
      <p class="pDetalle wow fadeIn">
      <?php echo $producto->descripcion_producto;?> 
      
      </p>
      </div>
    </div>
		
	</div>
  </div>


  <br>
  
  </div>
 
  <div class="container-fluid">
    
      @if($imagenes > 1)
      <div  class="owl-carousel testimonials-carousel">
  @foreach($productoImagen as $imagenProducto)
  
    
      <div class="item col-md-12">
          <img class="imgDetalle "  src="{{asset('/images/productos/'.$imagenProducto->imagen)}}" alt="desayunos a domicilio coquimbo la serena">
          
      </div>
     @endforeach
     
      </div>
      @else
      @foreach($productoImagen as $imagenProducto)

      <div class="text-center">
       
        <img class="rounded"  width="300" height="400"  src="{{asset('/images/productos/'.$imagenProducto->imagen)}}" alt="desayunos a domicilio coquimbo la serena">
      </div>
      @endforeach
      @endif
    </div>
  
    

  
  


</section>

@include('web.footer')

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

@endsection



@section('scripts')
<script src="{{ asset('/vendor2/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('vendor2/jquery.easing/jquery.easing.min.js')}}"></script>
<script src="{{ asset('/vendor2/waypoints/jquery.waypoints.min.js')}}"></script>
<script src="{{ asset('/vendor2/counterup/counterup.min.js')}}"></script>
<script src="{{ asset('/vendor2/owl.carousel/owl.carousel.js')}}"></script>
<script type="text/javascript">


$(window).on('load', function() { 
$(".loader").fadeOut("slow");
 
});
</script>




@endsection