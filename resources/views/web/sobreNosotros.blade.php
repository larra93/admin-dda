
@extends('web.main')

@section('contenido')  

<section id="about" class="sectionAbout"> 

    <div class="container">
      <div class="section-title">
      <br>
      <br>
      <br>
        
        <h2 class="wow fadeInDown">Sobre Nosotros</h2>
        <div class="row">
          <div class="col-md-6 abouts"> 
              @foreach($sobreNosotros as $about)

              
            <img src="{{asset('/images/about/'.$about->imagen)}}" class="img-fluid imagenAbout img-thumbnail wow fadeInLeft" alt="detalles de amor sobre nosotros">
          </div>
    
          <div class="col-md-6 wow fadeInDown abouts" data-wow-delay="0.3s"> 
          <br>
       
      
          {!!$about->descripcion!!}
            
        @endforeach
          </div>
    
         
    
          
        </div>
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