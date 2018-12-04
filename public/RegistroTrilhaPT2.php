<?php
include_once("../Interface/ProtegerPaginas.php");
$geolocation = $_POST["geolocation"];
$distancia = $_POST["distancia"];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Registrar Trilhas</title>
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

            <form id="form" method="POST" action="..\Interface\CadastrarTrilha.php">
                <fieldset>
                    <br>
                    <p id="feedback"></p>
                    Nome da Trilha: <input type="text" name="apelido">
                    <br> <br> Dificuldade:
                    <ul>
                        <li class="listaUl">
                            <input type="radio" id="Dificuldade1" name="Dificuldade" value="1">
                            <label for="Dificuldade1">1</label>
                        </li>

                        <li class="listaUl">
                            <input type="radio" name="Dificuldade" id="Dificuldade2" value="2">
                            <label for="Dificuldade2">2</label>
                        </li>

                        <li class="listaUl">
                            <input type="radio" name="Dificuldade" id="Dificuldade3" value="3">
                            <label for="Dificuldade3">3</label>
                        </li>

                        <li class="listaUl">
                            <input type="radio" name="Dificuldade" id="Dificuldade4" value="4">
                            <label for="Dificuldade4">4</label>
                        </li>

                        <li class="listaUl">
                            <input type="radio" name="Dificuldade" id="Dificuldade5" value="5">
                            <label for="Dificuldade5">5</label>
                        </li>

                    </ul>
                    <br> Obstáculos: <br>
                    <textarea name="Obstaculos" rows="4" cols="70">
               </textarea>
                    <input name="distancia" type="hidden" value="<?php echo $distancia ?>" >
                    <br>                    
                    <br> Tipo de mata: 
                    <select name="idMata">
                    <option value="1">Amazonica</option>
                    <option value="2">Caatinga</option>
                    <option value="3">Cerrado</option>
                    <option value="4">Mata Atlantica</option>
                    <option value="5">Pampa</option>
                    <option value="6">Pantanal</option>
                </select> 

                    <br> <br> <br> <br>
                    <div style="margin:0px 45%">
                        <input type="submit" value="Enviar" id="button" style="font-size: 20px; background-color: grey;">
                    </div>
                </fieldset>
                
                <input type="hidden" name="rota" id="rota" value="<?php echo $geolocation?>">
            </form>

        </div>
    </div>
</body>

</html>