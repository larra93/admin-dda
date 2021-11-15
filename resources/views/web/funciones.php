<?php 
function conectarServidor(){
 
    $link='mysql:host=localhost;dbname=detallesdeamor';
    $usuario='root';
    $pass='';


try {
   $pdo= new PDO($link,$usuario,$pass);
   $pdo->query("SET NAMES 'utf8'");
   
    return $pdo;
    
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}

}  


//mostrar las categorias
function mostrar_categorias(){
	$consulta = 'SELECT * FROM categoria where active = 1';
    $conexion = conectarServidor();
    $gsent=$conexion->prepare($consulta);
    $gsent->execute();
    return $gsent;
 }

 function mostrar_detalleProducto(){
	$consulta = 'SELECT producto.id_producto, producto.nombre_producto, producto.descripcion_producto,producto.precio,producto.imagen_destacada, categoria.nombre_categoria ,categoria.alias FROM producto , categoria 
    where producto.id_categoria = categoria.id_categoria';
    $conexion = conectarServidor();
    $gsent=$conexion->prepare($consulta);
    $gsent->execute();
    return $gsent;
 }

 function mostrar_productos(){
	$consulta = 'SELECT producto.id_producto, producto.nombre_producto, producto.descripcion_producto,producto.precio,producto.imagen_destacada, categoria.nombre_categoria ,categoria.alias FROM producto , categoria 
    where producto.id_categoria = categoria.id_categoria and producto.active = 1';
    $conexion = conectarServidor();
    $gsent=$conexion->prepare($consulta);
    $gsent->execute();
    return $gsent;
 }

 function mostrar_sliderClientes(){
	$consulta = 'SELECT * from cliente';
    $conexion = conectarServidor();
    $gsent=$conexion->prepare($consulta);
    $gsent->execute();
    return $gsent;
 }

 function mostrar_productosDestacadosHome(){
     
	//$consulta = 'SELECT producto.id_producto, producto.descripcion_corta, producto.precio, producto.nombre_producto as producto,imagen_producto.imagen , imagen_producto.destacado FROM producto, imagen_producto WHERE producto.id_producto = imagen_producto.id_producto and imagen_producto.destacadoHome = 1';
    $consulta='SELECT id_producto, descripcion_corta, precio, nombre_producto,imagen_destacada  FROM producto WHERE producto.destacado = 1 and producto.active = 1';
    $conexion = conectarServidor();
    $gsent=$conexion->prepare($consulta);
    $gsent->execute();
    return $gsent;
 }


 function mostrar_buscar($producto){
	$consulta = 'SELECT id_producto, nombre_producto, descripcion_corta,precio, imagen_destacada FROM producto where descripcion_producto like :producto or nombre_producto like :producto';
    $conexion = conectarServidor();
    $gsent=$conexion->prepare($consulta);
    $gsent->bindParam(':producto',$producto,PDO::PARAM_STR);
    $gsent->execute();
    return $gsent;
 }

//mostrar  categoria por id
function mostrar_producto($id_categoria){
	$consulta = 'SELECT producto.id_producto, producto.nombre_producto, producto.descripcion_producto,producto.precio,producto.imagen_destacada, categoria.nombre_categoria ,categoria.alias FROM producto , categoria where producto.id_categoria = categoria.id_categoria and categoria.id_categoria = :id_categoria';
    $conexion = conectarServidor();
    $gsent=$conexion->prepare($consulta);
    $gsent->bindParam(':id_categoria',$id_categoria,PDO::PARAM_STR);
    $gsent->execute();
    return $gsent;
 }
 
 function mostrar_comprar(){
     
	//$consulta = 'SELECT producto.id_producto, producto.descripcion_corta, producto.precio, producto.nombre_producto as producto,imagen_producto.imagen , imagen_producto.destacado FROM producto, imagen_producto WHERE producto.id_producto = imagen_producto.id_producto and imagen_producto.destacadoHome = 1';
    $consulta='SELECT * FROM compra';
    $conexion = conectarServidor();
    $gsent=$conexion->prepare($consulta);
    $gsent->execute();
    return $gsent;
 }
 
 function mostrar_terminos(){
     
	//$consulta = 'SELECT producto.id_producto, producto.descripcion_corta, producto.precio, producto.nombre_producto as producto,imagen_producto.imagen , imagen_producto.destacado FROM producto, imagen_producto WHERE producto.id_producto = imagen_producto.id_producto and imagen_producto.destacadoHome = 1';
    $consulta='SELECT * FROM terminos';
    $conexion = conectarServidor();
    $gsent=$conexion->prepare($consulta);
    $gsent->execute();
    return $gsent;
 }

 function mostrar_servicios(){
     
	//$consulta = 'SELECT producto.id_producto, producto.descripcion_corta, producto.precio, producto.nombre_producto as producto,imagen_producto.imagen , imagen_producto.destacado FROM producto, imagen_producto WHERE producto.id_producto = imagen_producto.id_producto and imagen_producto.destacadoHome = 1';
    $consulta='SELECT * FROM servicios WHERE active = 1';
    $conexion = conectarServidor();
    $gsent=$conexion->prepare($consulta);
    $gsent->execute();
    return $gsent;
 }


?>