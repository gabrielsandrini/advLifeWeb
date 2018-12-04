<?php
include_once '../pojo/Trilha.php';
include_once ("../DAO/classeCrudGenerico.php");
include_once '../DAO/trilhaDao.php';
//$var_dump($_POST);
// $ = isset($_POST[""]) ? $_POST[""] : null;

$apelido = isset($_POST["apelido"]) ? $_POST["apelido"] : null;
$dificuldade = isset($_POST["Dificuldade"]) ? $_POST["Dificuldade"] : null;
$obstaculos = isset($_POST["Obstaculos"]) ? $_POST["Obstaculos"] : null;
$distancia = isset($_POST["distancia"]) ? $_POST["distancia"] : null;
$idMata = isset($_POST["idMata"]) ? $_POST["idMata"] : null;
$data = date('y/m/d');
$rota = isset($_POST["rota"]) ? $_POST["rota"] : null;

session_start();
$nicknameUsuario = $_SESSION["nicknameUsuario"];

$trilha = new Trilha($apelido, $obstaculos, $distancia, $idMata, $data, $nicknameUsuario, $rota);
$trilhaDao = new trilhaDao();
$resultado = $trilhaDao->inserirTrilhas($trilha);

if($resultado){
     header("Location: ../public/Menu.php");
}
