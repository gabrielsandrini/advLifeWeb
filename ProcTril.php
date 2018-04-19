<!DOCTYPE html>
<html>

<head>
    <title>Buscar Trilhas</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="JQuery.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("input").blur(function() {
                if ($(this).val() == "") {
                    $(this).css({
                        "border-color": "red",
                        "padding": "2px"
                    });
                    $('#feedback').php("Campo obrigatório");

                }
            });
            $("#buscar").click(function() {
                var cont = 0;
                $("#form input").each(function() {
                    if ($(this).val() == "") {
                        $(this).css({
                            "border": "1px solid #F00",
                            "padding": "2px"
                        });
                        cont++;
                        $('#feedback').php("Campo obrigatório");
                    }
                });
                if (cont == 0) {
                    $('#form').submit();
                    $('#feedback').hide(400);
                }
            });
        })
    </script>

</head>

<body>
    <div class="container">
        <header class="pagina"> Buscar Trilhas</header>
        <fieldset>
            <form id="form">
                Insira o nome da trilha: <input type="search" name="nome" placeholder="Ex: Bosque das Araucárias" size="25"> <br>
                <p id="feedback"></p>
            </form>
            <a href="#" id="buscar" class="botaorandom">Buscar</a>
        </fieldset>
        <h2 style="font-family: Papyrus; font-size: 30px;">Resultados e Relacionados</h2>
        <span style="font-family: Papyrus; font-size: 20px;">Aqui ficarão os resultados da busca de trilhas e sugestões relacionadas aos termos buscados</span>
        <br>
        <a href="SelecTril.htlm" class="botaorandom">Exemplo de pagina de trilha</a>
        <a href="Menu.php" class="botaorandom">Menu Principal</a>
    </div>
</body>

</html>