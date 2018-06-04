<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <title>Registro de trilha</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
        var cont = true;

        function redireciona() {
            var escolha;
            escolha = window.confirm("Tem certeza que deseja temrinar a gravação ?");
            if (escolha) {
                window.location.href = "RegistroTrilhaPT2.php";
            }
        }

        function alteraTextoPause() {
            if (cont) {
                document.getElementById("pause").innerHTML = "Play";
                cont = false;
            } else {
                document.getElementById("pause").innerHTML = "Pause";
                cont = true;
            }
        }
    </script>
</head>

<body>
    <div class="container">
        <header class="pagina"> Registro de Trilhas</header>
        <p style="text-align: center; font-size: 26px; font-family: Papyrus;">Nome da Trilha</p>
        <div class="block">Tempo em atividade</div>
        <div class="block">Distância percorrida</div>
        <a href="#" id="pause" class="botaorandom" onclick="alteraTextoPause()" style="border-radius:100%; margin-left: 100px;">Pause</a>
        <a class="botaorandom" onclick="redireciona()" href="#" style="border-radius:100%; margin-left: 400px;">Finish</a>
    </div>
</body>

</html>