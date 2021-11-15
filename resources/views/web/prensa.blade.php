
@extends('web.main')

@section('contenido')  

<section id="services" class="services">
	<div class="container">

  <div class="wrap">
		<div class="section-title">
     
      <h2 class="wow pulse">Prensa</h2>
        <div class="container">
          
          <p class=" wow fadeInDown">
            <a class="colorPrensa" href="https://www.revistasarah.cl/articulo/encuentra-el-regalo-perfecto-para-este-dia-de-los-enamorados5e3c9034d9a76">ELEGIDOS PRODUCTOS DESTACADOS REVISTA SARAH 2020</a>
            <br>
            <br>
            <a class="colorPrensa" href="https://www.facebook.com/MiRadioLs/videos/554622355191687/?vh=e">ENTREVISTA MI RADIO 2020</a>
            <br>
            <br>
            <a class="colorPrensa" href="https://www.facebook.com/MiRadioLs/videos/2022473451201952/?vh=e">ENTREVISTA MI RADIO 2019</a>
        </p>
        <br>
            <div class="row">
              <div class="col-md-6"> 
                <img src="{{asset('/images/prensa/prensa1.jpg')}}" class="img-fluid img-thumbnail wow fadeInLeft" alt="detalles de amor about">
              </div>
  
              <div class="col-md-6 wow fadeInDown" data-wow-delay="0.3s"> 
              
                <br>
                <div class="col-lg-12 col-md-12">
                  <div class="portfolio-img"><img src="{{asset('/images/prensa/prensa2.jpg')}}" class="img-fluid" alt="detalles de amor coquimbo"></div>
                  
                </div>
                <div class="col-lg-12 col-md-12">
                  <div class="portfolio-img"><img src="{{asset('/images/prensa/prens3.jpg')}}" class="img-fluid" alt="detalles de amor coquimbo"></div>
                  
                </div>
                <div class="col-lg-12 col-md-12">
                  <div class="portfolio-img"><img src="{{asset('/images/prensa/prensa4.jpg')}}" class="img-fluid" alt="detalles de amor coquimbo"></div>
                  
                </div>
              </div>
  
             
  
              
            </div>
          </div>
  
        </div>
  </div>
    </div>
      </section>
	
        
	

    
    


@include('web.footer')

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

@endsection



