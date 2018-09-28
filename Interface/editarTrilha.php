<?php
include ("../DAO/classeCrudGenerico.php");
//$var_dump($_POST);
// $ = isset($_POST[""]) ? $_POST[""] : null;

$apelido = isset($_POST["apelido"]) ? $_POST["apelido"] : null;
$obstaculos = isset($_POST["Obstaculos"]) ? $_POST["Obstaculos"] : null;
$nicknameTrilha = isset($_POST["nicknameUsuario"]) ? $_POST["nicknameUsuario"] : null;
$idTrilha = isset($_POST["idTrilha"]) ? $_POST["idTrilha"] : null;

session_start();
$nicknameUsuario = $_SESSION["nicknameUsuario"];

if($nicknameTrilha == $nicknameUsuario){
    $sql = "update tbTrilha set apelido= '$apelido', obstaculos= '$obstaculos' where idTrilha = $idTrilha";

    $objCrud = new CrudGenerico;
    $resultado = $objCrud->fQuery($sql);

    if($resultado){
        echo "Trilha atualizada com sucesso";
        header("Location: ../public/Menu.php");
    }
}else{   
    echo "Erro: Me parece que não foi você que gravou essa trilha";
    echo "<a href='../public/Menu.php> Voltar ao menu </a>";
}