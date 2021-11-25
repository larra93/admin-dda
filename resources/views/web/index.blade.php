@extends('web.main')

@section('contenido')  

@section('css')
  <!--  <link rel="stylesheet" href="/css/admin_custom.css">-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous" />
  
  <style>



 .item {
	color: #747d89;
	min-height: 325px;
    text-align: center;
	overflow: hidden;
}
.thumb-wrapper {
	padding: 25px 15px;
	background: #fff;
	border-radius: 6px;
	text-align: center;
	position: relative;
	box-shadow: 0 2px 3px rgba(0,0,0,0.2);
}
 .item .img-box {
	height: 120px;
	margin-bottom: 20px;
	width: 100%;
	position: relative;
}
 .item img {	
	max-width: 100%;
	max-height: 100%;
	display: inline-block;
	position: absolute;
	bottom: 0;
	margin: 0 auto;
	left: 0;
	right: 0;
}
 .item h4 {
	font-size: 18px;
}
 .item h4,  .item p,  .item ul {
	margin-bottom: 15px;
}
 
.btn-ver {
  font-family: "Raleway", sans-serif;
  font-weight: 500;
  font-size: 16px;
  letter-spacing: 1px;
  display: inline-block;
  padding: 8px 30px 10px 30px;
  border-radius: 4px;
  transition: 0.5s;
  color: #fff;
  background: #C74375;
  
}

  .btn-ver:hover {
  background: #7BC4C4;
  color: white;
  box-shadow: 0 8px 28px rgba(32, 107, 251, 0.45);
}

 .item-price {
	font-size: 13px;
	padding: 2px 0;
}
 .item-price strike {
	opacity: 0.7;
	margin-right: 5px;
}



.carousel .wish-icon .fa-heart {
	color: #ff6161;
}



  </style>
  
@stop
    

@section('contenido')  



<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
        <h1 class="col-xs-12 text-md-left text-center">Detalles De Amor</h1>
        <h2 class="col-xs-12 text-md-left text-center">Conoce las increibles sorpresas que tenemos preparadas para ti</h2>
        <div class="col-xs-12 text-md-left text-center">
          <a href="/productos" class="btn-get-started scrollto">Ver Catálogo</a>
        </div>
        <div class="social-links col-xs-12 text-md-left text-center">
          <a href="https://twitter.com/detalledeamor25/" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="https://www.facebook.com/detallitosdeamor25/" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="https://www.instagram.com/detalledeamor25/" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="https://api.whatsapp.com/send?phone=56983147461"  class="whatsapp"><i class="bx bxl-whatsapp"></i></a>
          
        </div>
        
      </div>
      <div class="col-lg-6 order-1 order-lg-2 hero-img">
        <img src="{{asset('/images/principal/detalleDeAmor1.jpeg')}}" class="img-fluid animated" alt="">
      </div>
    </div>
  </div>

</section><!-- End Hero -->


    
  
    <main id="main">
 
    
        
      @include('web.funciones')
    
      
          <section id="productos" class="portfolio sectionAbout">
            <div class="container">
      
              <div class="section-title">
              
                <h2 class="wow pulse">Productos Destacados</h2>
               
              </div>
      
              <?php  
              $productosHome= mostrar_productosDestacadosHome();
              $resultadoProductoHome = $productosHome->fetchAll(PDO::FETCH_ASSOC);  
              
              ?>
      


      <div class="row">
        <?php foreach ($resultadoProductoHome as $dato){?>
        <div class="col-sm-3">
          <div class="thumb-wrapper mt-2 wow fadeInRight">
            <span class="wish-icon"><i class="fa fa-heart-o"></i></span>
            <div class="img-box">
              <img src="{{asset('/images/productos/'.$dato['imagen_destacada'])}}" class="img-fluid" alt="">									
            </div>
            <div class="thumb-content">
              <h4><?php echo $dato['nombre_producto'] ?></h4>									
              
              <p class="item-price"> <b><?php echo '$'. number_format($dato['precio'], 0, ',', '.'); ?></b></p>
              <a href="{{ route('detalleProducto', ['id'=> $dato['id_producto']]) }}" class="btn-ver ">Ver producto</a>
            </div>						
            
          </div>
          
        </div>
        <?php } ?>
      </div>
      
      
           
          </section>  
      
      
          <!-- ======= My Services Section ======= -->
          <section id="servicios" class="services">
            <div class="container">
      
              <div class="section-title">
                
                <h2 class="wow fadeInDown">Nuestros servicios</h2>
                <p>Ofrecemos distintos servicios</p>
              </div>
      
              <div class="row">
              <?php  
              $servicios= mostrar_servicios();
              $resultadoServicios = $servicios->fetchAll(PDO::FETCH_ASSOC);  
              
              ?>
      
              <?php foreach ($resultadoServicios as $dato){?>
              
              <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
              
                  <div class="icon-box wow fadeInDown" data-wow-delay="0.4s">
                  <div class="icon"><img src="{{asset('/images/servicios/'.$dato['imagen'])}}"></div>
                    <h4 class="title"><?php echo $dato['nombre_servicio'];?></h4>
                    <p><?php echo $dato['descripcion_servicio'] ?></p>
                  </div>
             
                </div>
              <?php }?>
              </div>
      
            </div>
          </section><!-- End My Services Section -->
      
          
      
      
           
          <section id="clientes" class="portfolio">
            <div class="container">
      
              <div class="section-title">
                
                <h2 class="wow pulse">Clientes</h2>
                
              </div>
          <div class="owl-carousel testimonials-carousel">
      
          <?php 
          
          $clientes= mostrar_sliderClientes();
          $resultadoCliente = $clientes->fetchAll(PDO::FETCH_ASSOC);
      
          foreach ($resultadoCliente as $dato){?>
          
          <div class="col-md-12">
              <img class="img-fluid"  src="{{asset('/images/clientes/'.$dato['imagen'])}}">
              
          </div>
          <?php } ?>
          </div>
      
        </div>
          </section>  
      
      
      
       <!-- ======= Testimonials Section ======= -->
       <section id="testimonials" class="testimonials">
        <div class="container">
      
          <div class="owl-carousel testimonials-carousel">
      
            <div class="testimonial-item">
              
              <h3>Karina Alejandra Araya Codoceo</h3>
              
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Excelente servicio!!!!  Mi hija fascinada
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
      
            <div class="testimonial-item">
              
              <h3>Alejita Celis</h3>
         
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Excelentes detalles para cualquier ocasión ….
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
      
            <div class="testimonial-item">
              
              <h3>Fresia Molina Correa</h3>
         
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Puntualidad y calidad de trabajo
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
      
            <div class="testimonial-item">
              
              <h3>Francesca Bravo Illanes</h3>
         
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Muy buena atención, hay variedad de precios y productos acorde al bolsillo, todo personalizado muy responsables y puntuales en el horarios de entrega, lindos productos… 100% recomendados, excelentes servicio….
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
      
            <div class="testimonial-item">
              
              <h3>Montano Javi</h3>
         
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Súper recomendados yo vivo en Santiago y mi papa en la serena y pidieron hacer que llegara un bonito detalle de mi parte. 
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
      
            <div class="testimonial-item">
              
              <h3>Cecy Díaz</h3>
         
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Excelente servicio, muy responsables con la entrega.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
      
            <div class="testimonial-item">
              
              <h3>Ximena Lopez Riquelme</h3>
         
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Un muy buen servicio y toda la dedicación, delicadeza que pone en armar el regalo, se agradece…. Porque en los detalles se ve el amor por su trabajo. Muchas gracias.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
      
            <div class="testimonial-item">
              
              <h3>Andrea Makarena Pinto Perez</h3>
         
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Excelente regalo para cualquier instancia. Soy de Santiago y confié en Detallitos de amor a ojos cerrados y en mis vacaciones en Coquimbo nos sorprendieron  totalmente. Muy confiables y amables 100% recomendados.
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
      
            <div class="testimonial-item">
              
              <h3>Pricilla Garcia Correa</h3>
         
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                Muchas gracias por todo, gracias por acercarme en cierta forma a mi hija desde Tierra Amarilla recomiendo a Detallitos De Amor, excelente servicio, muy amables y responsables, éxito en todo y que sea un gran año para ustedes
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
            </div>
      
          </div>
      
        </div>
      </section><!-- End Testimonials Section -->
      
      
      
      
          <!-- ======= Contact Me Section ======= 
          <section id="contacto" class="contact">
            <div class="container contactoFondo">
      
              <div class="section-title">
                
                
              </div>
      
              <div class="row">
                <div class=" wow fadeInLeft col-lg-6" data-wow-delay="0.3s">
                  <img src="{{asset('/images/contacto/contacto2.png')}}" class="img-fluid roundered imgContact" alt="detalle de amor coquimbo contacto">
      
                </div>
      
                <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.6s">
                  <form action="mail.php" method="post" role="form">
                    <div class="form-row">
                      <div class="col-md-6 form-group nombreForm">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Nombre" required="required" data-msg="Por favor ingrese su nombre" />
                        
                      </div>
                      <div class="col-md-6 form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required="required" />
                        
                      </div>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" name="subject" id="subject" placeholder="Asunto" required="required" />
                      
                    </div>
                    <div class="form-group">
                      <textarea class="form-control" name="message" rows="6" required="required" placeholder="Mensaje"></textarea>
                      
                    </div>
                    
                    <div class="text-center"><button type="submit">Enviar mensaje</button></div>
                  </form>
                </div>
      
              </div>
      
            </div>
          
          </section>
        -->
          
          
      
        </main><!-- End #main -->


        @include('web.footer')

        <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

@endsection



