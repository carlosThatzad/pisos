<?php

if(Rentit\Session::get('logged')){
    $user=Rentit\Session::get('user');
    $productos=\Rentit\Models\Publication::all();

    if(($user->rol==2)){
        include 'dashboardadmin.tpl.php';

    }else{
        include 'dashboardcli.tpl.php';
    }
}
else{
    header('location:/');
}