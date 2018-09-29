<?php
include ("../DAO/AvaliacaoDao.php");
$avaliacaoDao = new AvaliacaoDao();
$array = $_POST;
$resultado = $avaliacaoDao->inserirAvaliacao($array);
if($resultado){ 
    echo "Avaliacao cadastrada com sucesso.. <br><br>";
    echo "<a href='../public/SelecTril.php?idTrilha=".$_POST['idTrilha']."'><button>Voltar</button></a>";
}