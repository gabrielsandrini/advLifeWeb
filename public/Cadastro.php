<!DOCTYPE html>
<html>
    <head>
        <title>Crie sua conta</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style.css" rel="stylesheet" type="text/css"/>
        
        <script type="text/javascript" src="JQuery.js"></script>
        <script type="text/javascript">
            
            $(document).ready(function(){
               
                 $("input").blur(function(){
                     if($(this).val() == "")
                    {
                        $(this).css({"border-color" : "red", "padding": "2px"});
                        $("#feedback").show();
                        $("#feedback").html("Preencha todos os campos");
                    }
                });
                
                 $("#BotaoCadastrar").click(function(){
                    //Se o cont for 0 no final da função, significa que não ocorreu nenhum erro.
                    //Caso contrario, ele será incrementado em uma unidade
                    $("#feedback").hide();
                    var cont = 0;
                   
                   //Ve se os campos estão vazios:
                    $("#form input").each(function(){
                    if($(this).val() == "")
                    {
                     $(this).css({"border" : "1px solid #F00", "padding": "2px"});
                     cont++;
                     $("#feedback").show();
                     $("#feedback").html("Preencha todos os campos");
                    }
                    });
                    
                    //Confere se as senhas digitadas são iguais
                    if( $("#senha").val() != $("#confsenha").val() ) {
                        $("#senha").css({"border-color" : "red", "padding": "2px"});
                        $("#confsenha").css({"border-color" : "red", "padding": "2px"});
                        $("#feedback").html("As senhas digitadas não são iguais");
                        cont++;
                        alert("senha");
                     }
                    
                    //Confere se os termos de uso foram aceitos
                    if( $("#termos").is(":checked") === false) {
                        cont++;
                        $("#feedback").show();
                        $("#feedback").html("Para proseguir, aceite os termos de uso");
                        alert("termos");
                    }
                    if(cont == 0)
                    {
                        $('#form').submit();
                    }
                });
            })
        </script>
    </head>
    <body>
        <div class="container" style="height: 800px">
            <header class="pagina"> Adventurer's Life</header>
            <article class="artigo1"><h3> Termos de uso e responsabilidade:</h3><br> Não foram escritos ainda
            então vamos apenas preencher o espaço para ficar bonito.</article>
            <article class="artigo2">
               <form name="cadastro" id="form" method="post" action="..\Interface\RealizarCadastro.php">
            <fieldset>
                <p id='feedback'></p>
            Digite seu nome:
            <br>
            <input type="text" name="nome"/>
            <br><br>
            Insira um nome de usuário para login:
            <br>
            <input type="text" name="nick"/>
            <br><br>
            Insira sua data de nascimento:
            <br>
            <input type="text" name="nasc"/>
            <br>
            Insira sua senha:
            <br>
            <input type="password" name="senha" id="senha"/>
            <br><br>
            Confirme sua senha:
            <br>
            <input type="password" name="confsenha" id="confsenha" />
            <br><br>
            Insira seu e-mail:
            <br>
            <input type="text" name="email"/>
            <br>
            Li e aceito os termos de uso:
            <input type="checkbox" name="termos" id="termos"/>
            <br>
            <input class="button" type="reset" value="Limpar" class="button">
            <a href="#" class="button" id="BotaoCadastrar">Confirmar Cadastro</a>
            <br>
            </fieldset>
        </form>
            </article>
            <div class="clearboth"></div>
            <footer><a href="index.php" class="botaorandom">Início</a></footer>
        </div>
    </body>
</html>
