
@extends('web.main')

@section('contenido')  

<section id="services" class="services">
	<div class="container">

  <div class="wrap">
		<div class="section-title">
     
      <h2 class="wow pulse">¿Cómo Comprar?</h2>
      
      
        <h3 class="wow pulse">¿Cuáles son las formas de encargo y pago?</h3>
        <br>
       

       @foreach ($compra as $como_comprar)
       <p class="pDetalle wow fadeInLeft">
        
        {!!$como_comprar->descripcion!!}
      </p> 
       @endforeach  
    </div>
  </div>
  </div>
    </section>
		<br>
    <br>
    <br>
    <br>
    <br><br>
    
    


@include('web.footer')

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

@endsection



