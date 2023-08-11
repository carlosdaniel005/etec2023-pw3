<?php

session_start(); //atraves dela pode se guardar conteudo de uma pagína pra guardar pra usar na outra

include('conexao.php');

$email = $_POST['email'];
$senha = $_POST['senha'];

$consulta = "SELECT * FROM `usuario` WHERE email='{$email}' and senha = md5('{$senha}')";

$result = mysqli_query($conexao,$consulta);

$valido = mysqli_num_rows($result);

if($valido == 1){
    $_SESSION['email'] = $email;
    header("Location:bemvindo.php"); //ELE TEM A FUNCIONALIDADE DE ABRIR OUTRA PAGINA O "HEADER"
    exit();
} else{
    header("Location:index.php");
    exit();
}
?>