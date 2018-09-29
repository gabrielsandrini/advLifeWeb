<?php
    include_once'../DAO/trilhaDao.php';
    include_once("../Interface/ProtegerPaginas.php");
    $id = $_GET['id'];
    $array = [ 'id' => $id];
    $trilhaDao = new trilhaDao();
    $resultado = $trilhaDao->searchTracks($array);
    $trilha = mysqli_fetch_assoc($resultado);
?>
<!DOCTYPE html>
<html>
    
<head>
    <title>Editar Trilhas</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="container" style="height: 850px;">
        <header class="pagina">
            <h1 style="font-size: 64px">Trilhas</h1>
            <script type="text/javascript" src="JQuery.js"></script>
            <script type="text/javascript">
                $(document).ready(function() {
                    $("input").blur(function() {
                        if ($(this).val() == "") {
                            $(this).css({
                                "border-color": "red",
                                "padding": "2px"
                            });
                            $('.container2').css({
                                "height": "900px"
                            });
                            $('#feedback').php("Campo obrigatório");

                        }
                    });
                    $("#button").click(function() {
                        var cont = 0;
                        $("#form input").each(function() {
                            if ($(this).val() == "") {
                                $(this).css({
                                    "border": "1px solid #F00",
                                    "padding": "2px"
                                });
                                cont++;
                                $('.container2').css({
                                    "height": "900px"
                                });
                                $('#feedback').php("Campo obrigatório");
                            }
                        });
                        if (cont == 0) {
                            $('#feedback').hide(400);
                            window.location.href = "TrilUsu.php";
                        }
                    });
                })
            </script>


            <script type="text/javascript">
                function EnviadaComSucesso() {
                    alert("Trilha registrada com sucesso");
                }
            </script>

        </header>

        <div>

            <form id="form" method="POST" action="..\Interface\editarTrilha.php">
                <fieldset>
                    <br>
                    <p id="feedback"></p>
                    Nome da Trilha: <input type="text" name="apelido" value="<?php echo $trilha['apelido']; ?>">
                    <br> Obstáculos: <br>
                    <textarea name="Obstaculos" value="<?php echo $trilha['obstaculos']; ?>" rows="4" cols="70">
               </textarea>
                    <input name="nicknameUsuario" type="hidden" value="<?php echo $trilha['nicknameUsuario']; ?>">
                    <input name="idTrilha" type="hidden" value="<?php echo $id ?>">
                     <br>
               <div style="margin:0px 45%">
                        <input type="submit" value="Enviar" style="font-size: 20px; background-color: grey;">
                    </div>
                </fieldset>
            </form>

        </div>
    </div>
</body>

</html>