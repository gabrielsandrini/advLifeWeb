<?php

    include("..\DAO\UsuarioDao.php");
    
    $login = isset( $_POST['login'] ) ? $_POST['login'] : null;
    $senha = isset( $_POST['senha'] ) ? $_POST['senha'] : null;
    
     $resultado = ($login != null && $login != "" && $senha != null && $senha != "")?
             UsuarioDao::validarLogin($login, $senha) : false;
     
    if($resultado)
    {
      session_start();
      $_SESSION["nicknameUsuario"] = $login;
      header('Location: ..\public\Menu.php');   	  	
    }
    else 
    {
        header('Location: ..\public\Login.php?erro=wrongData');
    }