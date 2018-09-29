<?php
include_once "ProtegerPaginas.php";
include_once'../DAO/AvaliacaoDao.php';

$idAvaliacao = isset($_GET['idAvaliacao']) ? ($_GET['idAvaliacao']) : null; 

$avaliacaoDao = new AvaliacaoDao();
$nicknameAvaliador = $avaliacaoDao->consultarNicknameDoAvaliador($idAvaliacao);

if($_SESSION["nicknameUsuario"] != $nicknameAvaliador){
    var_dump($nicknameAvaliador);
    die("Parece que não foi você que gravou essa avaliacao...");
}

$resultado = $avaliacaoDao->deletarAvaliacao($idAvaliacao);

if($resultado){
    echo "Avaliação deletada com sucesso... <br>";
    echo "<a href='../public/mostraAvaliacao.php?idTrilha=".$_GET['idTrilha']."'><button>Voltar</button><a>";
}