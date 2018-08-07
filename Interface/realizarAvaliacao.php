<?php
include ("../DAO/classeCrudGenerico.php");
include ("../DAO/classeCaniveteSuico.php");

$idTrilha = isset($_POST["idTrilha"]) ? $_POST["idTrilha"] : null;
$dificuldade = isset($_POST["Dificuldade"]) ? $_POST["Dificuldade"] : null;
$preservacao = isset($_POST["preservacao"]) ? $_POST["preservacao"] : null;
$risco = isset($_POST["risco"]) ? $_POST["risco"] : null;

session_start();
$nicknameUsuario = $_SESSION["nicknameUsuario"];

$data = date('Y/m/d');

$sql = "insert into tbAvaliacoesRealizadas (idTrilha, nicknameUsuario, dataRealizacao)"; 
$sql.= " values('$idTrilha','$nicknameUsuario','$data');";

$objCrud = new CrudGenerico;
$resultado = $objCrud->fQuery($sql);

if($resultado){
    $canivete = new CaniveteSuico();
    $idAvaliacao = $canivete->ultimaChave('tbAvaliacoesRealizadas');
    
    $sql2 = "insert into tbAvaliacaovalores (idAvaliacao, idCriterio, nota) ";
    $idCriterio = 1;
    $sql2 .= "values('$idAvaliacao','$idCriterio','$dificuldade')";
    $objCrud->fQuery($sql2);
    
    $sql2 = "insert into tbAvaliacaovalores (idAvaliacao, idCriterio, nota) ";
    $idCriterio = 2;
    $sql2 .= "values('$idAvaliacao','$idCriterio','$preservacao')";
    $objCrud->fQuery($sql2);
    
    $sql2 = "insert into tbAvaliacaovalores (idAvaliacao, idCriterio, nota) ";
    $idCriterio = 4;
    $sql2 .= "values('$idAvaliacao','$idCriterio','$risco')";
    $objCrud->fQuery($sql2);
    
}

