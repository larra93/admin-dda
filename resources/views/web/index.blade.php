@extends('web.main')

@section('contenido')  
    

<section id="carruselSection">

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        
        <div class="carousel-item active">
          <img class="d-block w-100 img-fluid" src="{{asset('/images/principal/detalleDeAmor1.jpeg')}}" alt="detalles de amor regalos coquimbo">
        </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    
    </section>
  
    <main id="main">
 
    
        
      @include('web.funciones')
    
      
          <section id="productos" class="portfolio sectionAbout">
            <div class="container">
      
              <div class="section-title">
              
                <h2 class="wow pulse">Productos Destacados</h2>
               
              </div>
              <div class="row portfolio-container wow fadeInRight">
      
              <?php  
              $productosHome= mostrar_productosDestacadosHome();
              $resultadoProductoHome = $productosHome->fetchAll(PDO::FETCH_ASSOC);  
              
              ?>
      
      <div class="container">
          <div class="row">
          <?php foreach ($resultadoProductoHome as $dato){?>
          <div class="col-lg-4 mb-4">
          <div class="card">
          <img src="{{asset('/images/productos/'.$dato['imagen_destacada'])}}"alt="detalles de amor coquimbo producto" class="card-img-top ">
            <div class="card-body">
              <h5 class="card-title"><?php echo $dato['nombre_producto'] ?></h5>
              <p class="card-text"><?php echo '$'. number_format($dato['precio'], 0, ',', '.'); ?> <br><?php echo  $dato['descripcion_corta'] ?></p>
             <a href="" class="btn btn-outline-success btn-sm">Read More</a>
            </div>
           </div>
          </div>
          <?php } ?>
        </div>
      </div>
      
            
             
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
                    <h4 class="title"><a style="color:black;" href="producto.php?categoria=<?php echo $dato['id_categoria'] ?>"><?php echo $dato['nombre_servicio'];?></h4>
                    <p class="description"><?php echo $dato['descripcion_servicio'] ?></p>
                  </div>
              </a>
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
          
          <div class="item col-md-12">
              <img class="imgClientes"  src="{{asset('/images/clientes/'.$dato['imagen'])}}">
              
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
      
      
      
      
          <!-- ======= Contact Me Section ======= -->
          <section id="contacto" class="contact">
            <div class="container contactoFondo">
      
              <div class="section-title">
                
                
              </div>
      
              <div class="row">
                <div class=" wow fadeInLeft col-lg-6" data-wow-delay="0.3s">
                  <img src="{{asset('/images/contacto/contacto2.png')}}" class="img-fluid roundered imgContact" alt="detalle de amor coquimbo contacto">
      
                </div>
      
                <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.6s">
                  <form action="forms/mail.php" method="post" role="form">
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
          </section><!-- End Contact Me Section -->
      
          
      
        </main><!-- End #main -->


        @include('web.footer')

        <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

@endsection



