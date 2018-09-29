<?php
include_once("../Interface/ProtegerPaginas.php");
include_once'../DAO/trilhaDao.php';
$array = $_GET;
$trilhaDao = new trilhaDao();
$resultado = !isset($_GET['historical']) ? $trilhaDao->searchTracks($array) : 
    $trilhaDao->searchHistorical($_SESSION['nicknameUsuario']);
$trilhas = [];
$title = isset($_GET['title']) ? $_GET['title'] : "Adv Life";

for ($i = mysqli_num_rows($resultado); $i > 0; $i--)
{
    $trilhas[] = mysqli_fetch_assoc($resultado);
}

?> 

<!DOCTYPE html>
<html>

    <head>
        <title><?php echo "$title"; ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="card.css">
        <script type="text/javascript">
            var foiClicadoEmDeletar = false;
            function redirecionaCard(id)
            {
                if(foiClicadoEmDeletar){
                    foiClicadoEmDeletar = false;
                } else{
                    window.location.href="SelecTril.php?idTrilha="+id;                    
                }
            }
            
            function deletarTrilha(id)
            {
                foiClicadoEmDeletar = true;
                var confirmacao = confirm("Voce deseja realmente deletar esta trilha ?");
                if(confirmacao){
                    window.location.href="../Interface/deletarTrilha.php?idTrilha="+id;
                }else{
                    alert("Ufa!!! Foi por pouco");
                }
            }
        </script>
    </head>

    <body>
        <div class="container">
         <h1 class="tituloTelaDeBusca"><?php echo "$title"; ?></h1>
            <?php 
               foreach($trilhas as $trilha)
               {
                   include 'card.php';
               }
            ?>
            <a href="Menu.php" class="botaorandom">Retornar</a>
        </div>
    </body>
</html> 