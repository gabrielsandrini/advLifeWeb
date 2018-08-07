<?php
include ("../DAO/classeCrudGenerico.php");
//$var_dump($_POST);
// $ = isset($_POST[""]) ? $_POST[""] : null;

$apelido = isset($_POST["apelido"]) ? $_POST["apelido"] : null;
$dificuldade = isset($_POST["Dificuldade"]) ? $_POST["Dificuldade"] : null;
$obstaculos = isset($_POST["Obstaculos"]) ? $_POST["Obstaculos"] : null;
$distancia = isset($_POST["distancia"]) ? $_POST["distancia"] : null;
$idMata = isset($_POST["idMata"]) ? $_POST["idMata"] : null;

session_start();
$nicknameUsuario = $_SESSION["nicknameUsuario"];

$data = date('y/m/d');

$sql = "insert into tbTrilha(apelido, obstaculos, distancia, idMata, dataGravacao, nicknameUsuario)";
$sql.= " values('$apelido','$obstaculos','$distancia','$idMata','$data','$nicknameUsuario');";

$objCrud = new CrudGenerico;
$resultado = $objCrud->fQuery($sql);

if($resultado){
     header("Location: ../public/Menu.php");
}
