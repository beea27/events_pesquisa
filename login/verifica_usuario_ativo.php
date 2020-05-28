<?php
    session_start();
    if ( isset($_SESSION['nome']) )
    {
        header('location:produtos.php');
    
    } //else {
        //header('location:login.php');
    //}
?>