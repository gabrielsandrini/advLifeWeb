<?php 
include_once'../DAO/trilhaDao.php';
$id = $_GET['id'];
$array = [ 'id' => $id];
$trilhaDao = new trilhaDao();
$resultado = $trilhaDao->searchTracks($array);
$trilha = mysqli_fetch_assoc($resultado);
$title = isset($trilha['apelido']) ? $trilha['apelido'] : "Adv Life";
?>
<!DOCTYPE html>

<html>

<head>
    <title> <?php echo $title;?> </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="container2">
        <header class="pagina"> <?php echo $trilha['apelido'];?> </header>
        <img src="../Imagens e coisas de mídia/Trilha.jpeg" alt="Trilha" style="width: 70%; height: 70%; margin-left: 120px">
        <br> Distância: Xkm<br> 
        Tempo de duração: Xh Xmin<br> 
        Usuário responsável: nickname<br> 
        Data de gravação: DD/MM/AAAA<br>
        <a href="Menu.php" class="botaorandom">Retornar</a>
        <a href="avaliar.php" class="botaorandom">Avaliar</a>
        <a href="mostraAvaliacao.php" class="botaorandom">Avaliações</a>
        <a href="Realizar.php" class="botaorandom">Realizar Trilha!</a>
    </div>
</body>

</html>