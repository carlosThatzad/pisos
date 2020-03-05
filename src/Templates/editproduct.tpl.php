<?php


foreach ($products as $product){?>

<div>
    <h1><?php echo $product->name  ?></h1>
    <h5><?php echo $product->description  ?></h5>
    <p><?php echo $product->price  ?></p>
    <p><?php echo $product->status  ?></p>
    <p><?php echo $product->ubicacion  ?></p>
    <p><?php echo $product->meters  ?></p>
    <p><?php echo $product->contact  ?></p>
   <form  action="/products/edited" method="post">
       <input type="hidden" name="id" value="<?php echo $product->id ;?>">
       <button  type="submit" >EDITA</button>
   </form>
    <form  action="/products/delete_publication" method="post">
        <input type="hidden" name="id" value="<?php echo $product->id ;?>">
        <button  type="submit" >REMOVE</button>
    </form>
</div>

    <?php }?>