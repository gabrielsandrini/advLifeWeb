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
        <!--JQuery link:-->
        <script type="text/javascript" src="JQuery.js"></script>
        
        <!--Functions about GPS:-->
        <script type="text/javascript">
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
            var isSecondTimeRecordingOrAfter = false;
            var lastLong, lastLat;
            function recordPosition(position)
            {
                var input = document.getElementById("geolocation");    
                if(!firstTimeRecording){
                    input.value += ",";
                    isSecondTimeRecordingOrAfter = true;
                }
                
                var lat = position.coords.latitude;
                var long = position.coords.longitude;
                
                input.value += lat;
                input.value += " ";
                input.value += long;
                firstTimeRecording = false;
                if(isSecondTimeRecordingOrAfter){
                    calculaDistancia(lastLat, lastLong, lat, long);
                }
                //A distancia deve ser aclculada antes deste ponto no codigo
                //Esta parte a seguir guarda as coordenadas em uma variavél de escopo global
                //para conseguir calcular a distancia entre este ponto e o que será obtido em seguida
                lastLat = lat;
                lastLong = long;
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
        
        <!--Functions about distance:-->
        <script type="text/javascript">
        var distancia=0;
            function haversineDistance(lat1,lon1,lat2,lon2) 
            {
                function toRad(x) 
                {
                  return x * Math.PI / 180;
                }

                var R = 6371; // km

                var x1 = lat2 - lat1;
                var dLat = toRad(x1);
                var x2 = lon2 - lon1;
                var dLon = toRad(x2)
                var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                  Math.cos(toRad(lat1)) * Math.cos(toRad(lat2)) *
                  Math.sin(dLon / 2) * Math.sin(dLon / 2);
                var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
                var d = R * c;
                
                return d;
              }
            
            var distanciaTotal = 0;
            function  calculaDistancia(lastLat, lastLong, lat, long)
            {
                var distanciaEntreDoisPontos =  haversineDistance(lastLat, lastLong, lat, long);
                distanciaTotal += distanciaEntreDoisPontos;
                gravaDistancia(distanciaTotal);
            }

            function gravaDistancia(distanciaTotal)
            {
                $("#distanciaLabel").html( arredondarDistancia(distanciaTotal) + " Km" );
            }
            
            function arredondarDistancia(distanciaTotal)
            {
                return distanciaTotal.toFixed(1);
            }
        </script>
        
        <!--Functions about the timer-->
        <script type="text/javascript">
            var intervalo;
            var s = 1;
            var m = 0;
            var h = 0;

            function resumeCronometro() {
                    intervalo = window.setInterval(function() {
                            if (s == 60) { m++; s = 0; }
                            if (m == 60) { h++; s = 0; m = 0; }
                            if (h < 10) document.getElementById("hora").innerHTML = "0" + h + "h"; else document.getElementById("hora").innerHTML = h + "h";
                            if (s < 10) document.getElementById("segundo").innerHTML = "0" + s + "s"; else document.getElementById("segundo").innerHTML = s + "s";
                            if (m < 10) document.getElementById("minuto").innerHTML = "0" + m + "m"; else document.getElementById("minuto").innerHTML = m + "m";		
                            s++;
                    },1000);
            }

            function pausarCronometro() {
                    window.clearInterval(intervalo);
            }
        </script>
        
        <!--Another mixed functions:-->
        <script type="text/javascript">
            function finish()
            {
                var escolha;
                escolha = window.confirm("Tem certeza que deseja temrinar a gravação ?");
                if (escolha) {
                    $("#distanciaHidden").value = parseFloat( arredondarDistancia(distanciaTotal) );
                    $("#form").submit();
                }
            }

            var pausado = false;
            function alteraEstadoGravacao()
            {
                pausado = !pausado;
                if (pausado) { //Pausa:
                    document.getElementById("pause").innerHTML = "Play";
                    turnOffGetLocation();
                    pausarCronometro();
                    
                } else { //Resume:
                    document.getElementById("pause").innerHTML = "Pause";
                    resumeCronometro();
                    getLocation();
                }
            }
        </script>
        
        <!--Functions to initialize the recording onload-->
        <script type="text/javascript">
            $(document).ready(function() {
                gravaDistancia(0);
                resumeCronometro();
                getLocation();
            });
        </script>
    </head>

    <body>
        <div class="container">
            <header class="pagina"> Registro de Trilhas</header>
            <div class="block">
                <span id="hora">00h</span><span id="minuto">00m</span><span id="segundo">00s</span><br>
            </div>
            <div class="block" id="distanciaLabel" style="font-family: sans-serif;"></div>
            <form id="form" method="post" action="RegistroTrilhaPT2.php">
                <input type="hidden" name="geolocation" id="geolocation" value="">
                <input type="hidden" name="distancia" id="distanciaHidden" value="">
            </form>
            <a href="#" id="pause" class="botaorandom" onclick="alteraEstadoGravacao()" style="border-radius:100%; margin-left: 10%;">Pause</a>
            <a class="botaorandom" onclick="finish()" href="#" style="border-radius:100%; margin-left: 60%;">Finish</a>
        </div>
    </body>

</html>