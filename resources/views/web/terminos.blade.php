
@extends('web.main')

@section('contenido')  

<section id="services" class="services">
	<div class="container">

  <div class="wrap">
		<div class="section-title">
     
      <h2 class="wow pulse">Terminos y Condiciones</h2>
      
      
        <h3 class="wow pulse">¿Cuáles son las formas de encargo y pago?</h3>
        <br>
       

       @foreach ($terminos as $termino)
       <p class="pDetalle wow fadeInDown">
        
        {!!$termino->descripcion!!}
      </p> 
       @endforeach  
    </div>
  </div>
    </div>
    </section>
	
        
	

    
    


@include('web.footer')

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

@endsection



