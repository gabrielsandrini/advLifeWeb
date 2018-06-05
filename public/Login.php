<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style.css" rel="stylesheet" type="text/css"/>

        <script type="text/javascript" src="JQuery.js"></script> 

        <script type="text/javascript">
            $(document).ready(function(){

                $("input").blur(function(){
                    if($(this).val() == "" || $(this).val() == " ")
                    {
                        $(this).css({"border" : "1px solid #F00", "padding": "2px"});
                    }
                });
                $("#login").click(function(){
                    
                    var preenchido = true;
                    $("#form input").each(function(){
                    if($(this).val() == "" || $(this).val() == " ")
                    {
                     $(this).css({"border" : "1px solid #F00", "padding": "2px"});
                     preenchido = false;
                     $("#feedback").show();
                     $("#feedback").html("Preencha todos os campos");
                    }
                    });
                    if(preenchido)
                    {
                        $("#feedback").hide();
                        $("#form").submit();
                    }
                });
                
            <?php
            if(isset($_GET["erro"]) )
            {
                $erro = $_GET["erro"];
                switch ($erro)
                {
                    case 'noLogin':
                        echo '$("#feedback").html("Realize o login para continuar");';
                        break;
                    
                    case 'wrongData':
                        echo '$("#feedback").html("Login ou senha incorretos");';
                        break;
                }
                echo '$("#feedback").show();';
            }
            ?>
            });
            
  
        </script>
       
    </head>
    <body>
            
        <div class="container">
            <header class="pagina"> Adventurer's Life</header>
            <form name='login' class="jogapromeio" id = "form" method="post" action="..\Interface\ValidarLogin.php">
                <fieldset>
                    <p id ='feedback'> </p>
                    Insira seu Nickname ou seu e-mail:
                    <input type="text" name="login"/>
                    <br><br>
                    Insira sua senha:
                    <input type="password" name="senha"/>
                    <br><br>
                    <a href="#" class="button" id="login"> Login </a>
                    <a href="RecSen.php" class="button"> Esqueci minha senha </a>
                </fieldset>
            </form>
            <a href="index.php" class='botaorandom' style="float: right; margin: 3px;">Início</a>
        </div>
    </body>
</html>
