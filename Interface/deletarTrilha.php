<?php
include_once '../DAO/trilhaDao.php';
$idTrilha = $_GET['idTrilha'];
$trilhaDao = new trilhaDao();
$sucesso = $trilhaDao->deleteTracks($idTrilha);

if($sucesso)
{
    echo "Trilha deletada com sucesso... <br>";
    echo "<a href='../public/Menu.php'><button>Voltar ao menu</button></a>";
}