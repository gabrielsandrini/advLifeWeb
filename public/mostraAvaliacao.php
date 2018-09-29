<?php
include_once("../Interface/ProtegerPaginas.php");
include_once'../DAO/AvaliacaoDao.php';
include_once'../DAO/trilhaDao.php';
$idTrilha = isset($_GET['idTrilha']) ? ($_GET['idTrilha']) : null; 

$trilhaDao = new trilhaDao();
$resultado = $trilhaDao->searchTracks($_GET);
$apelido = ($resultado)? mysqli_fetch_assoc($resultado)['apelido'] : null;

$avaliacaoDao = new AvaliacaoDao();
$resultado = $avaliacaoDao->consultarAvaliacoesRealizadas($idTrilha);

$avaliacoes = [];
for ($i = mysqli_num_rows($resultado); $i > 0; $i--)
{
    $avaliacoes[] = mysqli_fetch_assoc($resultado);
}
?> 

<!DOCTYPE html>
<html>

    <head>
        <title>Adv Life</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="cardAvaliacao.css">
        <script type="text/javascript">
            function deletarAvaliacao(id)
            {
                var confirmacao = confirm("Voce deseja realmente deletar esta avaliacao ?");
                if(confirmacao){
                    window.location.href="../Interface/deletarAvaliacao.php?idAvaliacao="+id;
                    alert(id);
                }else{
                    alert("Ufa!!! Foi por pouco");
                }
            }
        </script>
    </head>

    <body>
        <div class="container">
         <h1 class="tituloTelaDeBusca"><?php echo $apelido?></h1>
            <?php 
               foreach($avaliacoes as $avaliacao)
               {
                   include 'cardAvaliacao.php';
               }
            ?>
            <a href="Menu.php" class="botaorandom">Retornar</a>
        </div>
    </body>
</html> 