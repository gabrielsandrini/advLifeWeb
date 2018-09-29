<?php
    $valores = $avaliacaoDao->consultarValoresAvaliacao($avaliacao['idAvaliacao']); 
?>
<div class="card">
       <div>
          <?php
          if($_SESSION["nicknameUsuario"] == $avaliacao['nicknameUsuario']){
             echo "<a href='#' onclick='deletarAvaliacao(".$avaliacao['idAvaliacao'].")'>";
             echo "<img src=\"../Imagens e coisas de mídia/delete.png\" alt=\"deletar\" style=\"float:right;\"/>"; 
             echo "</a>";
          }
           ?>
        <article id="article1">
            <h2 class="cardTitle"><?php echo $avaliacao['nicknameUsuario']; ?></h2>
            <h3 class="cardTitle">Data de realização: <?php echo $avaliacao['dataRealizacao']; ?></h3>
            <br><br>
            <?php echo (isset($avaliacao['comentario'])) ? "<p class='cardAtribute'>Comentário:"
            .$avaliacao['comentario']." </p>" : null; ?>
        </article>
           
         <article id="article2">
            <table>
               <tr>
                   <?php
                       foreach ($valores as $valor)
                       {
                           echo "<th>".$valor['descricao']."</th>";
                       }
                   ?>

               </tr>
               <tr>
                   <?php
                       foreach ($valores as $valor)
                       {
                           echo "<td>".$valor['nota']."</td>";
                       }
                   ?>

               </tr>
            </table>
         </article>
    </div>
</div>
<br>