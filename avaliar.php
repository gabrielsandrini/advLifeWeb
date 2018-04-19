<!DOCTYPE html>
<html>

<head>
    <title>Avaliar</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css" />
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
            <h4 style="text-align: center">"Nome da trilha"</h4>
            <form>
                <fieldset>
                    Dificuldade:
                    <ul>
                        <li class="listaUl">
                            <input type="radio" name="Dificuldade" value="1" id="d1">
                            <label for="d1">1</label>
                        </li>

                        <li class="listaUl">
                            <input type="radio" name="Dificuldade" value="2" id="d2">
                            <label for="d2">2</label>
                        </li>

                        <li class="listaUl">
                            <input type="radio" name="Dificuldade" value="3" id="d3">
                            <label for="d3">3</label>
                        </li>

                        <li class="listaUl">
                            <input type="radio" name="Dificuldade" value="4" id="d4">
                            <label for="d4">4</label>
                        </li>

                        <li class="listaUl">
                            <input type="radio" name="Dificuldade" value="5" id="d5">
                            <label for="d5">5</label>
                        </li>

                    </ul>

                    <br> <br> <br> Preservação da trilha:
                    <ul>
                        <li class="listaUl">
                            <input type="radio" name="preservacao" value="1" id="p1">
                            <label for="p1">1</label>
                        </li>

                        <li class="listaUl">
                            <input type="radio" name="preservacao" value="2" id="p2">
                            <label for="p2">2</label>
                        </li>

                        <li class="listaUl">
                            <input type="radio" name="preservacao" value="3" id="p3">
                            <label for="p3">3</label>
                        </li>

                        <li class="listaUl">
                            <input type="radio" name="preservacao" value="4" id="p4">
                            <label for="p4">4</label>
                        </li>

                        <li class="listaUl">
                            <input type="radio" name="preservacao" value="5" id="p5">
                            <label for="p5">5</label>
                        </li>

                    </ul>

                    <br> <br> <br> Nível de risco:
                    <ul>
                        <li class="listaUl">
                            <input type="radio" name="risco" value="1" id="r1">
                            <label for="r1">1</label>
                        </li>

                        <li class="listaUl">
                            <input type="radio" name="risco" value="2" id="r2">
                            <label for="r2">2</label>
                        </li>

                        <li class="listaUl">
                            <input type="radio" name="risco" value="3" id="r3">
                            <label for="r3">3</label>
                        </li>

                        <li class="listaUl">
                            <input type="radio" name="risco" value="4" id="r4">
                            <label for="r4">4</label>
                        </li>

                        <li class="listaUl">
                            <input type="radio" name="risco" value="5" id="r5">
                            <label for="r5">5</label>
                        </li>
                    </ul>

                    <br> <br> <br> Comentário: <br>
                    <textarea name="comentario" rows="4" cols="70">
            </textarea>
                    <br>
                    <br>
                    <div style="margin:0px 45%">
                        <input onclick="EnviadaComSucesso(); redirecionar();" type="submit" value="Enviar">
                    </div>
                </fieldset>
            </form>

        </div>
    </div>
</body>

</html>