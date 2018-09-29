<?php 
 include_once'../DAO/trilhaDao.php';
 include_once'../DAO/AvaliacaoDao.php';
 
 $trilhaDao = new trilhaDao();
 $resultado = $trilhaDao->searchTracks($_GET);
 $trilha = mysqli_fetch_assoc($resultado);
 
 $avaliacaoDao = new AvaliacaoDao();
 $resultado = $avaliacaoDao->retornarCriterios();
 $criterios = [];
for ($i = mysqli_num_rows($resultado); $i > 0; $i--)
{
    $criterios[] = mysqli_fetch_assoc($resultado);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Avaliar</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <style>
        ul, li{
           display: inline;
        }
        .espacamento{
            padding: 2%;
        }
        span{
            font-family: sans-serif;
            font-weight: 520;
        }
    </style>
    <script type="text/javascript">
        function EnviadaComSucesso() {
            alert("Avaliacao enviada com sucesso");
        }

        function redirecionar() {
            window.location = "SelecTril.php";
            alert();
        }
    </script>
</head>

<body>
    <div class="container2" style="height: 825px">
        <header class="pagina">
            <h1 style="font-size: 64px">Avaliar</h1>
        </header>

        <div>
            <h4 style="text-align: center"><?php echo $trilha['apelido']; ?></h4>
            <form method="POST" action="../interface/realizarAvaliacao.php">
                <fieldset>
                    <input type="hidden" name="idTrilha" value="<?php echo $_GET['idTrilha']; ?>">
                    <?php
                        foreach ($criterios as $criterio)
                        {
                            echo '<span>'.$criterio['descricao']." : </span><br> >";

                            for($i =1; $i<=5; $i++)
                            {
                    ?>
                                
                                <ul>
                                    <li class="listaUl">
                                        <input type="radio" name="<?php echo $criterio['idCriterio']; ?>" 
                                               value="<?php echo $i; ?>" id="<?php echo $criterio['idCriterio'].$i; ?>">
                                        <label class="espacamento" for="<?php echo $criterio['idCriterio'].$i; ?>" >
                                             <?php echo $i; ?> 
                                        </label>
                                    </li>
                                </ul>
                    <?php
                            }
                        
                            echo '<br><br><br>';
                        }
                    ?>
                    <br>
                    <div style="margin:0px 45%">
                        <input type="submit" value="Enviar">
                    </div>
                </fieldset>
            </form>

        </div>
    </div>
</body>

</html>