<?php
    include("..\Interface\ProtegerPaginas.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Trilhas</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
        function redirecionaIndex() {
            var escolha;
            escolha = window.confirm("Tem certeza que deseja sair ?");
            if (escolha) {
                window.location.href = "../Interface/Logout.php";
            }
        }
    </script>

</head>

<body>
    <div class="titulinho">
        Trilhas
    <div>
            <a href="ProcTril.php" class="botaomenu">Buscar Trilha</a><br>
            <a href="RegTril.php" class="botaomenu">Gravar Trilha</a><br>
            <a href="TrilUsu.php" class="botaomenu">Trilhas que você gravou</a><br>
            <a href="TrilReal.php" class="botaomenu">Trilhas Utilizadas</a><br>
            <a onclick="redirecionaIndex()" href="#" class="botaomenu">Logout</a>
        </div>
    </div>
</body>

</html>