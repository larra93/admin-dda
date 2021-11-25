
@extends('web.main')

@section('contenido')  
@include('web.funciones')
    
<!-- Revisar lo de los llamados js 
    <div class="loader"></div>-->

<section id="services" class="services">
	<div class="container">
  <div class="wrap">
		<div class="section-title">
     
      <h2 class="wow fadeInDown">Productos</h2>
      
    </div>
		<div class="store-wrapper wow fadeInLeft">
			<div class="category_list">
        
        <?php 
        $categorias= mostrar_categorias();
        $arr = $categorias->fetchAll(PDO::FETCH_ASSOC);
				 foreach ($arr as $dato){?>
					<a href="#" class="category_item" category= <?php echo $dato['alias'];?>><?php echo $dato['nombre_categoria'];?></a>
				<?php } ?>
					
				<a href="#" class="category_item" category="all">Todo</a>
				
			</div>
			<section class="products-list">
      <?php
      $productos= mostrar_productos();
      $resultadoProducto = $productos->fetchAll(PDO::FETCH_ASSOC);    
			foreach ($resultadoProducto as $datoProducto) { ?>
       
				<div class="product-item" category=<?php echo $datoProducto['alias'];?>>
					<a href="{{ route('detalleProducto',$datoProducto['id_producto']) }}"><img class="img-fluid" src="{{asset('/images/productos/'.$datoProducto['imagen_destacada'])}}" >
                        <a href="{{ route('detalleProducto',$datoProducto['id_producto']) }}"> <?php echo $datoProducto['nombre_producto'] ?> </a>

      
				</div>

			<?php } ?>
				



			</section>
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