<html>
<head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Jekyll v3.8.6">


        <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/sign-in/">

        <!-- Bootstrap core CSS -->
        <link href="/docs/4.4/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <!-- Favicons -->
        <link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
        <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
        <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
        <link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
        <link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
        <link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
        <meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
        <meta name="theme-color" content="#563d7c">


        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
        </style>
        <!-- Custom styles for this template -->
        <link href="signin.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../public/css/style.css">
    <link rel="stylesheet" href="../public/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">

    <!-- Tema opcional -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap-theme.min.css">

    <!-- Versión compilada y comprimida del JavaScript de Bootstrap -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
</head>

<body class="text-center">
<?php
foreach ($users as $user)
    echo $user;

?>


<div><h3><?php echo $title; ?></h3></div>
<?php if (isset($error)) { include 'error.tpl.php'; } ?>
<form class="form-signin"  action="/user/signin" method="post">
    <input type="hidden" name="token"value="<?=Rentit\Session::get('token')?> ">

    <img class="mb-4" src="img/640px-React-icon.svg.png" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <label for="inputEmail" class="sr-only"> Usuario</label>
    <input id="inputEmail" class="form-control" placeholder=" user" required="" autofocus=""  type="text" name="email">
    <label for="inputPassword" class="sr-only">Password</label>
    <input id="inputPassword" class="form-control" placeholder="Password" required="" type="password" name="passwd">
    <div class="checkbox mb-3">
        <label>
            <input value="remember-me" type="checkbox"> Remember me
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <a class="w3-btn w3-green " href="register">Registrate Ahora</a>
    <p class="mt-5 mb-3 text-muted">© 2017-2019</p>
</form>
<footer>
    <div class="w3-container "><!--w3-black-->
        <h4>CARLOSBLOG 2019</h4>
    </div>
</footer>
</body>
</html>