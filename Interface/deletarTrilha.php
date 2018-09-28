<?php
include_once '../DAO/trilhaDao.php';
$idTrilha = $_GET['id'];
$trilhaDao = new trilhaDao();
$sucesso = $trilhaDao->deleteTracks($idTrilha);

if($sucesso)
{
    echo "Trilha Deletada ...";
    sleep(5);
    header("Location: ../public/Menu.php");
}