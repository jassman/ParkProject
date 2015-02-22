</div>
<button id="mm-menu-toggle" class="mm-menu-toggle">Toggle Menu</button>
  <nav id="mm-menu" class="mm-menu">
    <div class="mm-menu__header">
      <img class="circle responsive-img" src="<?php echo base_url(); ?>files/img/<?php echo $datos_usuario['foto']; ?>">
      <h2 class="mm-menu__title"><?php echo $datos_usuario['nombre']; ?> <?php echo $datos_usuario['apellido']; ?> </h2>
    </div>
    <ul class="mm-menu__items">
      <li class="mm-menu__item">
        <a class="mm-menu__link" href="home">
          <span class="mm-menu__link-text"><i class="mdi-action-account-circle"></i>  Home</span>
        </a>
      </li>
      <li class="mm-menu__item">
        <a class="mm-menu__link" href="profile">
          <span class="mm-menu__link-text"><i class="mdi-action-account-circle"></i>  Profile</span>
        </a>
      </li>
      <li class="mm-menu__item">
        <a class="mm-menu__link" href="mapa">
          <span class="mm-menu__link-text"><i class="mdi-action-room"></i> Encuentra Sitio</span>
        </a>
      </li>
      <li class="mm-menu__item">
        <a class="mm-menu__link" href="foro">
          <span class="mm-menu__link-text"><i class="mdi-action-account-child"></i> Foro</span>
        </a>
      </li>
      <li class="mm-menu__item">
        <a class="mm-menu__link" href="login/logout">
          <span class="mm-menu__link-text"><i class=mdi-action-highlight-remove"></i> Salir</span>
        </a>
      </li>
    </ul>
  </nav><!-- /nav -->


  <!-- PRODUCTION -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript"  src="<?php echo base_url(); ?>assets/js/external/materialize.js"></script> 
  <script type="text/javascript"  src="<?php echo base_url(); ?>assets/js/materialMenu.js"></script> 
  <script type="text/javascript"  src="<?php echo base_url(); ?>assets/js/scripts.js"></script> 
  <script type="text/javascript"  src="<?php echo base_url(); ?>assets/js/main.js"></script> 
  <script type="text/javascript"  src="<?php echo base_url(); ?>assets/js/mapa.js"></script> 
  <script>
    var menu = new Menu;
  </script>
   
  
</body>
</html>
 
