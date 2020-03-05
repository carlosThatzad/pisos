<!--<html>
<form class="form-signin"  action="/products/save" method="post">
    <img class="mb-4" src="img/640px-React-icon.svg.png" alt="" width="72" height="72">
    <label for="inputEmail" class="sr-only"> Nombre</label>
    <input id="inputEmail" class="form-control" placeholder=" name" required="" autofocus=""  type="text"name="name">
    <label for="inputPhone" class="sr-only">Name</label><br>
    <h1 class="h3 mb-3 font-weight-normal">Creacion Producto</h1>

    <input id="inputEmail" class="form-control" placeholder=" lastname" required="" autofocus=""  type="text"name="description">
    <label for="inputPhone" class="sr-only">description</label><br>

    <input id="inputEmail" class="form-control" placeholder=" phone" required="" autofocus=""  type="number"name="price">
    <label for="inputPhone" class="sr-only">price</label><br>

    <input id="inputPassword" class="form-control" placeholder=" passwd2" required="" autofocus=""  type="text"name="status">
    <label for="inputPassword" class="sr-only">status</label>
    <br>
    <input id="inputEmail" class="form-control" placeholder=" email" required="" autofocus=""  type="text"name="ubicacion">
    <label for="inputEmail" class="sr-only">ubicacion</label>
    <br>    <label for="inputEmail" class="sr-only">contact</label><br>
    <input id="inputEmail" class="form-control" placeholder=" email" required="" autofocus=""  type="text"name="contact">

    <label for="inputEmail" class="sr-only">meters</label><br>
    <input id="inputPassword" class="form-control" placeholder="passwd" required=""  type="number" name="meters">
    <div class="checkbox mb-3">
<input type="hidden" value="<?php echo $id ;?>" name="id">
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Actualiza</button>
    <p class="mt-5 mb-3 text-muted">© 2017-2019</p>
</form>
</html>-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Form</title>

    <!-- ligação ao documento css. não aplicável no codepen.
    <link rel="stylesheet" type="text/css" href="contact-form.css">
  -->

</head>


<body>

<!-- formulário de contacto utilizando html e css -->

<div class="contact_form">

    <div class="formulario">
        <h1>Edicion Producto</h1>


        <form action="/products/save" method="post">


            <p>
                <label for="nome" class="colocar_nome">Titulo
                    <span class="obrigatorio">*</span>
                </label>
                <input type="text" name="name" id="nome" required="obrigatorio" placeholder="Titulo oferta">
            </p>

            <p>
                <label for="email" class="colocar_email">Descripcion
                    <span class="obrigatorio">*</span>
                </label>
                <input type="text"name="description" id="email" required="obrigatorio" >
            </p>

            <p>
                <label for="telefone" class="colocar_telefone">Precio
                </label>
                <input  type="number"name="price" id="telefone" >
            </p>

            <p>
                <label for="website" class="colocar_website">Estado de la oferta
                </label>
                <input  type="text"name="status" id="website" >
            </p>

            <p>
                <label for="assunto" class="colocar_asunto">Ubicacion
                    <span class="obrigatorio">*</span>
                </label>
                <input type="text"name="ubicacion" id="assunto" required="obrigatorio" >
            </p>
            <p>
                <label for="assunto" class="colocar_asunto">Forma de contacto
                    <span class="obrigatorio">*</span>
                </label>
                <input type="text"name="contact" id="assunto" required="obrigatorio" >
            </p>
            <p>
                <label for="assunto" class="colocar_asunto">Metros
                    <span class="obrigatorio">*</span>
                </label>
                <input type="number" name="meters" id="assunto" required="obrigatorio">
            </p>
            <button type="submit" name="enviar_formulario" id="enviar"><p>Actualizar</p></button>
            <div class="checkbox mb-3">
                <input type="hidden" value="<?php echo $id ;?>" name="id">
            </div>


        </form>
    </div>
</div>

</body>
</html>


<style>


    /* importação da fonte do google fonts */
    @import url(https://fonts.googleapis.com/css?family=Noto+Sans);


    body{
        height: 100%;
        font-family: 'Noto Sans', sans-serif;
        background-color: #1f253d;
    }


    .contact_form{
        width: 450px;
        height: auto;
        margin: 80px auto;
        border-radius: 10px;
        text-align: left;
        padding-top: 30px;
        padding-bottom: 20px;
        background-color: #fbfbfb;
        padding-left: 30px;
    }


    input{
        background-color: #fbfbfb;
        width: 408px;
        height: 40px;
        border-radius: 5px;
        border-style: solid;
        border-width: 1px;
        border-color: #ec576b;
        margin-top: 10px;
        padding-left: 10px;
        margin-bottom: 20px;
    }


    textarea{
        background-color: #fbfbfb;
        width: 405px;
        height: 150px;
        border-radius: 5px;
        border-style: solid;
        border-width: 1px;
        border-color: #ec576b;
        margin-top: 10px;
        padding-left: 10px;
        margin-bottom: 20px;
        padding-top: 15px;
    }


    label{
        display: block;
        float: center;
    }


    button{
        height: 45px;
        padding-left: 5px;
        padding-right: 5px;
        margin-bottom: 20px;
        margin-top: 10px;
        text-transform: uppercase;
        background-color: #ec576b;
        border-color: #ec576b;
        border-style: solid;
        border-radius: 10px;
        width: 420px;
        cursor: pointer;
    }


    button p{
        color: #fff;
    }


    span{
        color: #ec576b;
    }


    .aviso{
        font-size: 13px;
        color: #0e0e0e;
    }


    h1{
        font-size: 35px;
        text-align: center;
        padding-bottom: 20px;
        color: #ec576b;
    }


    h3{
        font-size: 14px;
        padding-bottom: 30px;
        color: #0e0e0e;
    }


    p{
        font-size: 14px;
        color: #0e0e0e;
    }


    ::-webkit-input-placeholder {
        color: #a8a8a8;
    }





    .formulario input:focus{
        outline:0;
        border: 1px solid #97d848;
    }


    .formulario textarea:focus{
        outline:0;
        border: 1px solid #97d848;
    }



</style>