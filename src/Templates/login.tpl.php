<?php
//include 'base.tpl.php';

?>
<div><h3><?php echo $title; ?></h3></div>
<?php if (isset($error)) { include 'error.tpl.php'; } ?>
<form class="form" action="/user/signin" method="post">
  <input type="hidden" name="token"value="<?=\Rentit\Session::get('token')?> ">
    <input type="text" placeholder="Email"name="email">
    <input type="password" placeholder="Passwd" name="passwd">
<button type="submit">Sing in</button>
    <hr>
    <p>Create new<a href="/user/register">account</a></p>
</form>