<?php
session_start();
include_once'../DAO/trilhaDao.php';
$array = $_GET;
$trilhaDao = new trilhaDao();
$resultado = $trilhaDao->searchTracks($array);
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
            function redirecionaCard(id)
            {
                var id;
                window.location.href="SelecTril.php?id="+id;
            }
            
            function redirecionaEditar(id)
            {
                
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