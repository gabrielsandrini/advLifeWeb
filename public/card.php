<div class="card" onclick="redirecionaCard(<?php echo $trilha['idTrilha']; ?>)">
    <div>
    <img class="cardImage" src="../Imagens e coisas de mídia/Trilha.jpeg" alt="imagem da trilha">
    </div>
       <div>
         <h1 class="cardTitle"><?php echo $trilha['apelido']; ?></h1>
         <br><br>
         <h3 class="cardAtribute">Distância: <?php echo $trilha['distancia']; ?></h3>
         <h3 class="cardAtribute">Nickname: <?php echo $trilha['nicknameUsuario']; ?></h3>
         <h3 class="cardAtribute">Data de gravação:  <?php echo $trilha['dataGravacao']; ?></h3>
    </div>
</div>
<br>