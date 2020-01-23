<html>
<head>
<link rel="stylesheet" href="../public/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">

    <!-- Tema opcional -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap-theme.min.css">

    <!-- Versión compilada y comprimida del JavaScript de Bootstrap -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-dark bg-dark" >
    <ul>
        <li><a  class="active" href="inicio"><?= $menu ;?></a></li>
        <li><a href="home"><?= $menu1 ;?></a></li>
        <li><a href="user"><?= $menu2 ;?></a><ul>

    </ul>
</nav>
<table>

  <?php
echo $user;


  foreach ($products as $product){?>

      <div class="col-md-4">
          <div class="card mb-4 shadow-sm">
            <div class="bd-placeholder-img card-img-top">  <img src="<?php echo $product['imagen']?>"> </div>


              <div class="card-body">
                  <p class="card-text"><p><b>id:</b> <?php echo $product['id']?></p>

                  <p><b>metros:</b> <?php echo $product['metros']?></p>

                  <p><b>ubicacion:</b> <?php echo $product['ubicacion']?></p>

                  <p><b>precio: </b><?php echo $product['precio']?></p>
                  <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-outline-secondary">Comprar</button>
                          <button type="button" class="btn btn-sm btn-outline-secondary">Contacta</button>
                      </div>
                      <small class="text-muted">9 mins</small>
                  </div>
              </div>
          </div>
      </div>
    <?php } ?>


</body>
</html>