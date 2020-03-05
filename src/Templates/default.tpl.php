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
        <li><a  class="active" href="<?= $data['menu'] ;?>">Inicio</a></li>
        <li><a href="home" href="<?= $data['menu2'] ;?>">Home</a></li>
        <li><a href="dashboard" href="<?= $data['menu4'] ;?>">Panel</a>

        <li><a href="user" href="<?= $data['menu3'] ;?>">User</a><ul>
          <ul>

            </ul>
</nav>
<table>
    <div id='section'>
        <?php echo \Rentit\Controllers\ProductsController::show_all_publications(); ?>
    </div>





</body>
</html>