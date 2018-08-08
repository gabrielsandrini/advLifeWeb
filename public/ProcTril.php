<!DOCTYPE html>
<html>

<head>
    <title>Buscar Trilhas</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="JQuery.js"></script>
    <style>
        .container {
            width: 70%;
            min-height: 40%;
            max-height: 80%;
            margin: 10px auto;
        }

        label {
           display: inline-block;
           width: 30%;
        }
        input
        {
            width: 22%;
        }
        .listaBotoes
        {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: inline;
        }
        li
        {
            padding: 0.3%;
            display: inherit;
        }
        
        .botaoBusca
        {
            background-color: #888888;
            color: #ffffff;
            padding: 1%;
        }
        .botaorandom
        {
            font-size: 20px !important;
        }
        #buscaAvancada
        {
            display: none;
        }
        
        @media only screen and (max-width: 700px) {
            label,input, .container
            {
                width: 100%
            }
        }
    </style>
    <script type="text/javascript" src="JQuery.js"></script>
    <script type="text/javascript">
        function menuBuscaAvancada()
        {
            $("#buscaAvancada").show(800);
            $("#botaoBuscaAvancada").hide();
        }
    </script>

</head>

<body>
    <div class="container">
        <header class="pagina"> Buscar Trilhas</header>
        <fieldset>
            <form id="form" action="paginaPesquisa.php">
                <label for="apelido">Insira o nome da trilha:</label>
                <input type="search" id="apelido" name="apelido" placeholder="Ex: Bosque das Araucárias" size="26"> <br>

                <div id="buscaAvancada">
                        
                    <label for="distMax" min="0">Distancia máxima:</label>
                    <input type="number" id="distMax" name="distMax"> <br>
                    
                    <label for="distMin">Distancia miníma: </label>
                    <input type="number" id="distMin" name="distMin" min="0"> <br>
                    
                    <label for="nickname">Nickname de quem registrou: </label>
                    <input type="text" id="nickname" name="nickname" placeholder="Nickname"> <br>
                </div>
                
                <ul class="listaBotoes">
                    <li><button type="submit" class="botaoBusca">Buscar</button></li>
                    <li><button id="botaoBuscaAvancada" type="button" class="botaoBusca" onclick="menuBuscaAvancada()">
                    Busca avançada </button></li>
                </ul>
            </form>
            <p id="feedback"></p>
        </fieldset>
        <!-- 
        <h2 style="font-family: Papyrus; font-size: 30px;">Resultados e Relacionados</h2>
        <span style="font-family: Papyrus; font-size: 20px;">Aqui ficarão os resultados da busca de trilhas e sugestões relacionadas aos termos buscados</span>
        <br>
        <a href="SelecTril.htlm" class="botaorandom">Exemplo de pagina de trilha</a> -->
        <a href="Menu.php" class="botaorandom" style="float: right">Menu Principal</a>
    </div>
</body>

</html>