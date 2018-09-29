<?php
include_once("../Interface/ProtegerPaginas.php");
?>
<!DOCTYPE html>

<html>

<head>
    <title>Avaliações</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css" />

</head>

<body>
    <div class="container2">
        <header style="margin: 0px 30%">
            <h1 id="tituloAvaliacao">Avaliações</h1>
            <h3>"nome da trilha"</h3>
            <div class="clearboth"></div>
        </header>

        <section class="avaliacao">
            <aside class="avaliacao">
                <div>
                    <img src="Imagens e coisas de mídia/filler.gif" alt="Foto do usuario" class="fotoUsuario">
                </div>

                <div class="nomeUsuario">
                    "nome do usuario"
                </div>

            </aside>

            <div class="bordaAvaliacao">

                <strong>"Comentário sobre a experiência na trilha"</strong>
            </div>
        </section>

        <footer style="padding-top: 390px;">
            <a href="Menu.php" class="botaorandom">Retornar</a>
        </footer>
    </div>


</body>

</html>