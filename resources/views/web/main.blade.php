<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>detalledeamor.cl Regalos a Domicilio en La Serena y Coquimbo desayunos a domicilio la serena - detalledeamor.cl</title>
  <meta name="robots" content="index,categorias"/>
  <meta name="description" content=" Regalos a domicilio la serena desayunos a domicilio la serena coquimbo Desayunos, sorpresas, flores, decoraciones en La Serena y Coquimbo, Chile." />
  <meta name="description" content="Regalos a domicilio en la serena y coquimbo. 
  lindos detalles de amor." />
  <meta name="keywords" content="Desayunos de regalo,regalos sorpresa,globos con helio,chocolates a domicilio,regalos a domicilio,desayunos a domicilio, dia del padre, dia de la madre,la serena,coquimbo,enamorados,flores a domicilio,canastas de regalo,san valentin,cuarta región,detalle de amor,detalles de amor">

  <!-- Favicons -->
  <link href="{{asset('/images/icono.jpg')}}" rel="icon">
 

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Satisfy" rel="stylesheet">

  <!-- Vendor CSS Files -->
 


  <link href="{{asset('vendor2/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor2/icofont/icofont.min.css')}}" rel="stylesheet">
  <link href="{{asset('vendor2/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('/vendor2/owl.carousel/assets/owl.carousel.css')}}" rel="stylesheet">
 

  
  

  <!-- Template Main CSS File -->
  <link href="{{asset('/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('/css/animate.css')}}" rel="stylesheet">
    @yield('css')
    </head>

    <body>
    
  

    @yield('contenido')
    @include('web.navBar')
    <a href="https://api.whatsapp.com/send?phone=56983147461" class="float">
      <i class="bx bxl-whatsapp my-float"></i>
      </a>


   
    

  


      @yield('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="{{ asset('/vendor2/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('vendor2/jquery.easing/jquery.easing.min.js')}}"></script>
    <script src="{{ asset('/vendor2/waypoints/jquery.waypoints.min.js')}}"></script>
    <script src="{{ asset('/vendor2/counterup/counterup.min.js')}}"></script>
    <script src="{{ asset('/vendor2/owl.carousel/owl.carousel.js')}}"></script>
   
    
    
  
    <!-- Template Main JS File -->
    <script src="{{ asset('/js/main.js')}}"></script> 
    <script src="{{ asset('/js/script.js')}}"></script>
    <script src="{{ asset('/js/wow.min.js')}}"></script>
  
    
    <script>
      new WOW().init();
      </script>
      <script type="text/javascript">
    $(document).ready(function(e)
    {
        $('.carousel-indicators li:nth-child(1)').addClass('active');
        $('.carousel-item:nth-child(1)').addClass('active');
        
  
        
    });
  </script>
  

    

    

    @yield('scripts')
    
  </body>
</html>