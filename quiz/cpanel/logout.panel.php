<?php 

if(isset($_POST['logout'])){

    session_start();
    session_unset();
    session_destroy();

    header("location:../admiLogin.php");
    exit();


}else{
    header("location:index.panel.php?success=welcome");
    exit();
}