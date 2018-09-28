<?php
include_once '../DAO/trilhaDao.php';
$idTrilha = $_GET['idTrilha'];
$trilhaDao = new trilhaDao();
$sucesso = $trilhaDao->deleteTracks($idTrilha);

if($sucesso)
{
    echo "Trilha Deletada ...";
}