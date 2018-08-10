<?php
     include_once'../DAO/trilhaDao.php';
     $array = $_GET;
     $trilhaDao = new trilhaDao();
     $trilhas = $trilhaDao->searchTracks($array);
     
     var_dump($trilhas);
?>
<!--
<!DOCTYPE html>
<html>

<head>
    <title>Suas Trilhas</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="container">
        <a href="SelecTril.php">
            <div class="detail">
                <div class="stat1"> Mapa da Trilha e nome </div>
                <div class="stat2"> Distância:<br> X Km </div>
                <div class="stat2"> Tempo:<br> Xh Xmin</div>
                <div class="stat2"> Data da gravação: DD/MM/AAAA</div>
            </div>
        </a>

        <a href="Menu.php" class="botaorandom">Retornar</a>
    </div>

</body>

</html>

-->