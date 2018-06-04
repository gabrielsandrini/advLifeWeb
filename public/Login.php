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
            <form name='login' class="jogapromeio" id = "form" method="post" action="..\Interface\ValidarLogin.php">
                <fieldset>
                    Insira seu nome de usuário ou e-mail:
                    <input type="text" name="login"/>
                    <br><br>
                    Insira sua senha:
                    <input type="password" name="senha"/>
                    <br><br>
                    <p id = 'feedback' style="color: red; font-style: bold;"></p>
                    <a href="#" class="button" id="login"> Login </a>
                    <a href="RecSen.php" class="button"> Esqueci minha senha </a>
                </fieldset>
            </form>
            <a href="index.php" class='botaorandom' style="float: right; margin: 3px;">Início</a>
        </div>
        <?php
            if(isset($_GET["erro"]) )
            {
                $erro = $_GET["erro"];
                switch ($error) {
                    case 0:
                     echo "<script type=\"text/javascript\"> alert(\"Dados inválidos\"); </script>";                    
                    break;
                    
                    case 1:
                     echo "<script type=\"text/javascript\"> alert(\"Problemas com o login\"); </script>";                    
                    break;
                }
            }
        ?>
    </body>
</html>
