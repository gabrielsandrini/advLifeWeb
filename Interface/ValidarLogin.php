<?php

	include("..\DAO\classeConexao.php");
	include("..\DAO\classeCrudGenerico.php");

	$objCrud = new CrudGenerico();
    
    $login = isset( $_POST['login'] ) ? $_POST['login'] : null;
    $senha = isset( $_POST['senha'] ) ? $_POST['senha'] : null;
    
    $sql = "select * from tbusuario where nicknameUsuario = '$login' and senha = '$senha' ;";
    $consulta = $objCrud->fQuery($sql);
    $resultado = mysqli_fetch_assoc($consulta);

    if(empty($resultado))
    {
        header('Location: ..\public\Login.php?erro=0 ');	
    }
    else 
    {
        session_start();
        $_SESSION["nicknameUsuario"] = $login;
        header('Location: ..\public\Menu.php');   	
    }