<!-- ======= Header ======= -->
<header id="header" class="fixed-top  d-flex  align-items-center">
  
    <a href="index.php" class="navbar-brand">
             <img src="{{asset('/images/logo2.png')}}" class="logo1 d-xl-none" alt="logo detalle de amor" width="100">
           </a>
    <nav class="nav-menu d-none d-lg-block">
         
         <ul>
           
           <li class="active"><a href="index.php">Home</a></li>
           <li><a href="/sobreNosotros">Sobre Nosotros</a></li>
           <li><a href="/#servicios">Servicios</a></li>
           <li><a href="/#clientes">Clientes</a></li>
           <li><a href="/productos">Productos</a></li>
           <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Informacion
           </a>
           <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
             <a class="dropdown-item linkDropwn" href="/comoComprar">Como comprar</a>
             <a class="dropdown-item linkDropwn" href="/terminos">Terminos y condiciones</a>
             <a class="dropdown-item linkDropwn" href="/prensa">Prensa</a>
           </div>
         </li>
       <li><a href="/#contacto">Contacto</a></li>
       
       <form action="producto.php" method="post" class="form-inline">
       <input class="form-control inputBuscar" type="search" name="producto" placeholder="Buscar Producto.." aria-label="Search">
     </form>
         </ul>
         
         
       </nav>
       
       
     </header><!-- End Header -->