<?php
    
    session_start();
    
    include 'conecta-cad.php';
    
    header('Content-Type: text/html; charset=utf-8');
    //Meta Charset no Arquivo (UFT-8)
   // nome/email/endereço/numero/cep/complemento/telefone/sexo/celular
    //Cria vari?el com valores inseridos no POST  
    $nome = $_POST["nome"];
    $cep = $_POST["cep"];
    $estado = $_POST["estado"];
    $cidade = $_POST["cidade"];
    $bairro = $_POST["bairro"];
    $logradouro = $_POST["logradouro"];
    $numero = $_POST["numero"];
    $complemento = $_POST["complemento"];
    $senha = $_POST["senha"];
    $email = $_POST["email"]; 
    





    mysqli_select_db($conecta, "tcc") or  print(mysqli_error());
    
    $query = mysqli_query($conecta,"SELECT * FROM `tb_cliente` WHERE email='$email'");
    $rownum = mysqli_num_rows($query);  

    if ($rownum  > 0){
        echo "
        <script type='text/javascript'>
        alert('Email já cadastrado. Insira outro.');
        location.href='../login.php';
        </script> "; 
          } else {
    
    $sql = "INSERT INTO `tb_cliente` (`nome`, `cep`, `estado`,`cidade`,`bairro`,`logradouro`,`numero`,`complemento`, `email`,`senha`)
             VALUES ('$nome', '$cep','$estado','$cidade','$bairro','$logradouro','$numero','$complemento', '$email', '$senha' )";  

    mysqli_query($conecta, $sql); 
             
    //echo $sql;
    header("location:../login.php");


   }
    mysqli_close($conecta); 

?>