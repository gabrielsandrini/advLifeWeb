<?php
include_once("../Interface/ProtegerPaginas.php");
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

    <head>
        <title>Registro de trilha</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="style.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="JQuery.js"></script>
        <script type="text/javascript">
            
            function finish()
            {
                var escolha;
                escolha = window.confirm("Tem certeza que deseja temrinar a gravação ?");
                if (escolha) {
                    $("#form").submit();
                }
            }

            var pausado = false;
            function alteraEstadoGravacao()
            {
                pausado = !pausado;
                if (pausado) {
                    document.getElementById("pause").innerHTML = "Play";
                    turnOffGetLocation();
                } else {
                    document.getElementById("pause").innerHTML = "Pause";
                    getLocation();
                }
            }

            function showError(error)
            {
                switch (error.code)
                {
                case error.PERMISSION_DENIED:
                        alert("Usuário rejeitou a solicitação de Geolocalização.");
                break;
                case error.POSITION_UNAVAILABLE:
                        alert("Localização indisponível.");
                break;
                case error.TIMEOUT:
                        alert("A requisição expirou.");
                break;
                case error.UNKNOWN_ERROR:
                        alert("Algum erro desconhecido aconteceu.");
                break;
                }
           }
           
            var posicaoAnterior = 0;
            var firstLoop = true;
            function comparePosition(position)
            {
                if(firstLoop)
                {
                    firstLoop = false;
                    this.recordPosition(position);
                    posicaoAnterior = position;
                } 

                //Vê se o ponto obtido é igual ao anterior
                if(posicaoAnterior.coords.latitude !== position.coords.latitude ||
                            posicaoAnterior.coords.longitude !== position.coords.longitude){

                       this.recordPosition(position);
                       posicaoAnterior = position;
                }
            }
            
            var firstTimeRecording = true;
            function recordPosition(position)
            {
                var input = document.getElementById("geolocation");    
                if(!firstTimeRecording){
                    input.value += ",";
                }
                input.value += position.coords.latitude;
                input.value += " ";
                input.value += position.coords.longitude;
            }
           
           var id = null;
            function getLocation()
            {
                if (navigator.geolocation)
                {
                id = navigator.geolocation.watchPosition(comparePosition, showError);
                } else {
                alert("Seu browser não suporta Geolocalização");
                }
            }
            
            function turnOffGetLocation()
            {
                navigator.geolocation.clearWatch(id);
            }
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                getLocation();
            });
        </script>
    </head>

    <body>
        <div class="container">
            <header class="pagina"> Registro de Trilhas</header>
            <p style="text-align: center; font-size: 26px; font-family: Papyrus;">Nome da Trilha</p>
            <div class="block">Tempo em atividade</div>
            <div class="block">Distância percorrida</div>
            <form id="form" method="post" action="RegistroTrilhaPT2.php">
                <input type="hidden" name="geolocation" id="geolocation" value="">
            </form>
            <a href="#" id="pause" class="botaorandom" onclick="alteraEstadoGravacao()" style="border-radius:100%; margin-left: 100px;">Pause</a>
            <a class="botaorandom" onclick="finish()" href="#" style="border-radius:100%; margin-left: 400px;">Finish</a>
        </div>
    </body>

</html>