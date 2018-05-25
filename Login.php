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
                    cont = 0;
                    $("#form input").each(function(){
                    if($(this).val() == "" || $(this).val() == " ")
                    {
                     $(this).css({"border" : "1px solid #F00", "padding": "2px"});
                     cont++;
                    }
                    });
                    if(cont==0)
                    {
                        submitLogin();
                    }
                });
            });
            
            function submitLogin()
            {
                document.forms[0].submit();
            }
        </script>
       
    </head>
    <body>
            
        <div class="container">
            <header class="pagina"> Adventurer's Life</header>
            <form name='login' class="jogapromeio" id = "form" method="post" action="ValidarLogin.php">
                <fieldset>
                    Insira seu nome de usuário ou e-mail:
                    <input type="text" name="nickmail"/>
                    <br><br>
                    Insira sua senha:
                    <input type="password" name="senhalog"/>
                    <br><br>
                    <p id = 'feedback' style="color: red; font-style: bold;"></p>
                    <a href="#" class="button" id="login"> Login </a>
                    <a href="RecSen.php" class="button"> Esqueci minha senha </a>
                </fieldset>
            </form>
            <a href="index.php" class='botaorandom' style="float: right; margin: 3px;">Início</a>
        </div>
    </body>
</html>
