<?php

include("..\DAO\UsuarioDao.php");


// $ = isset($_POST[""]) ? $_POST[""] : null;
//var_dump($_POST);
$nome = isset($_POST["nome"]) ? $_POST["nome"] : null;
$nickname = isset($_POST["nick"]) ? $_POST["nick"] : null;
$senha = isset($_POST["senha"]) ? $_POST["senha"] : null;
$email = isset($_POST["email"]) ? $_POST["email"] : null;
$termosDeUso = isset($_POST["termos"]) ? $_POST["termos"] : null;

if($nome != null && $nome != "" && $nickname != null && $nickname != "" && $senha != null
        && $senha != "" && $email != null && $email != "" && $termosDeUso == true)
{
    $sucesso = UsuarioDao::realizarCadastro($nickname, $senha, $nome, $email);
    if($sucesso)
    {
      session_start();
      $_SESSION["nicknameUsuario"] = $nickname;
     header('Location: ..\public\Menu.php');   
    }
    else{
       header("Location: ../public/Cadastro.php?erro=erroCadastro");
    }
}
else
{
    header("Location: ../public/Cadastro.php?erro=camposVazios");
}