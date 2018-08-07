<?php

    include("..\DAO\UsuarioDao.php");
    
    $login = isset( $_POST['login'] ) ? $_POST['login'] : null;
    $senha = isset( $_POST['senha'] ) ? $_POST['senha'] : null;
    
     if ($login != null && $login != "" && $senha != null && $senha != "") {
            $resultado = UsuarioDao::validarLogin($login, $senha);
     }
     else
     {
         echo "Campos vazios";
     }
     
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