<!DOCTYPE html>
<html>

<head>
    <title>Registrar Trilhas</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="container2" style="height: 850px;">
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
                    alert("avaliacao Enviada com sucesso");
                }
            </script>

        </header>

        <div>

            <form id="form">
                <fieldset>
                    <br>
                    <p id="feedback"></p>
                    Nome da Trilha: <input type="text" name="Nome da trilha" value="">
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
                    <textarea name="Obstáculos" rows="4" cols="70">
               </textarea>

                    <br> <br> Tipo de locomoção:
                    <ul class="listDecoration">
                        <li>
                            <input type="checkbox" id="carro" name="carro">
                            <label for="carro">Carro</label>
                        </li>

                        <li>
                            <input type="checkbox" id="carro4x4" name="carro4x4">
                            <label for="carro4x4"> Carro 4x4 </label>
                        </li>

                        <li>
                            <input type="checkbox" id="carro especial" name="carro especial">
                            <label for="carro especial">Carro especial</label>
                        </li>

                        <li>
                            <input type="checkbox" id="moto" name="moto">
                            <label for="moto">Moto</label>
                        </li>

                        <li>
                            <input type="checkbox" id="moto de trilha" name="moto de trilha">
                            <label for="moto de trilha">Moto de trilha</label>
                        </li>

                        <li>
                            <input type="checkbox" name="a pe" id="a pé">
                            <label for="a pé">a pé</label>
                        </li>

                        <li>
                            <input type="checkbox" name="bicicleta" id="bicicleta">
                            <label for="bicicleta">Bicicleta</label>
                        </li>

                    </ul>

                    <br> Tipo de mata:
                    <select>
                    <option value=" ">-----</option>
                    <option value="Taiga">Taiga</option>
                    <option value="Tundra">Tundra</option>
                    <option value="equatorial">Equatorial</option>
                    <option value="Arida">Árida</option>
                    <option value="Outra">Outra</option>
                </select>

                    <br> <br> <br> <br>
                    <div style="margin:0px 45%">
                        <a id="button" class="botaoTitul" style="font-size: 20px; background-color: grey;">Enviar</a>
                    </div>
                </fieldset>
            </form>

        </div>
    </div>
</body>

</html>