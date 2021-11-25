
@extends('web.main')

@section('contenido')  

    
<!--<div class="loader"></div>-->

<section id="services" class="services">
	<div class="container">

 

  
		<div class="mt-5">
     
      <h2><?php echo $producto->nombre_producto;?></h2>
      
    </div>
		
    <div class="row">
      <div class="col-md-4">
        <div class="product">
          
            <img src="{{asset('/images/productos/'.$producto->imagen_destacada)}}" class="img-fluid" id="imageBox" alt="">
          
          <div class="cajaPrecio">
            <h4 style="text-align: center; font-size: 30px;"><?php echo '$'. number_format($producto->precio, 0, ',', '.');?></h4>
            </div> 
          
        
     
    
        

      
      </div>
    </div>
          
      <div class="col-md-8">
        <p class="descripcion_producto" style="text-align: justify"><?php echo $producto->descripcion_producto;?> </p>
      </div>

      @if ($imagenes > 1)
      <div  class="owl-carousel testimonials-carousel mt-3">
        @foreach($productoImagen as $imagenProducto)
                 <img src="{{asset('/images/productos/'.$imagenProducto->imagen)}}" alt="desayunos a domicilio coquimbo la serena">
                 @endforeach
               </div>
      @else
      @foreach($productoImagen as $imagenProducto)
      <div class="container text-center"><br>
      <img src="{{asset('/images/productos/'.$imagenProducto->imagen)}}" width="300" class="img-fluid" alt="desayunos a domicilio coquimbo la serena">
     @endforeach
      </div>
      @endif

      
    </div>
  </div>
  
  <!--
    <div class="row">
  
    
      <div class="product">
        <div class="col-md-4">
          <img src="{{asset('/images/productos/'.$producto->imagen_destacada)}}" class="img-fluid" id="imageBox" alt="">
        
        <div class="cajaPrecio">
          <h4 style="text-align: center; font-size: 30px;"><?php echo '$'. number_format($producto->precio, 0, ',', '.');?></h4>
          </div> 
        
      </div>
      
    
      <div class="product-small-img">
        <img src="{{asset('/images/productos/'.$producto->imagen_destacada)}}" id="imageBox" onclick="galery(this)" alt="">
        
        @foreach($productoImagen as $imagenProducto)
        <img src="{{asset('/images/productos/'.$imagenProducto->imagen)}}" onclick="galery(this)" alt="desayunos a domicilio coquimbo la serena">
        @endforeach
      </div>
    </div>
  
  
  </div>
     

      <div class="row">
              <div class="col-sm-12 d-flex justify-content-center">
                  <p style="text-align: justify"><?php echo $producto->descripcion_producto;?> </p>
          </div>
      </div>

    -->
  
  
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
@section('js')
    <script>

      function galery(smallImg) {
        var fullImg = document.getElementById("imageBox");
        fullImg.src=smallImg.src;
      }
    </script>
    
@endsection




@endsection