<?php
    //recupera dados do login
    session_start();
    //conecta
    include ('conecta.php');
    
    $usuario = $_POST['usuario'];   
    $senha = $_POST['senha'];
    $verifica_OK = 0;

    //verifica login
    $sql_verifica = "SELECT * FROM tb_funcionario
                      WHERE email = '$usuario' 
                        AND senha = '$senha' ";
    
    
    $result=mysqli_query($conecta,$sql_verifica);
    
    //caso o login esteja correto será iniciada as variaveis de sessão 
    while($consulta=mysqli_fetch_array($result))
    {
        //Existe este usuario
        $verifica_OK = 1;
        //Redirecionamento -> OK.php
        header('location:../index.php');
        session_start();
        $_SESSION['nome'] = $consulta['nome'];
        $_SESSION['cargo'] = $consulta['cargo'];
    }
    
    if ($verifica_OK == 0){ 
        
        header('location:../login.php');
    }
    
?>