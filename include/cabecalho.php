<?php
echo '    <tr> <!-- Cabecalho da pagina -->'.chr(10);
echo '      <td width="20%" rowspan="2"><img src="imagem/logobra_transparente.png"></td>'.chr(10);
echo '      <td width="60%" align="center"><span style="font-family: Arial Black; font-size: 18pt;">SISTEMA DE APOIO AO SIMULADO ENADE</span></td>'.chr(10);
echo '      <td width="20%" align="right" valign="top">Leme&nbsp;&reg;<br><span style="font-size:6pt;">'.$idpagina.'</span></td>'.chr(10);
echo '    </tr>'.chr(10);
//if ($idpagina == 'SIE000'){
    $cortexto = 'black';
    //if ($_SESSION["flagcornomeempresa"] == 1){
    //    $cortexto = 'red';
    //}
    echo '    <tr height="5px">'.chr(10);
    echo '      <td align="center" valign="center"><span style="font-family: Arial Black; color:'.$cortexto.'; font-size: 14pt;">'.$_SESSION["nomeempresa"].'</span></td>'.chr(10);
    echo '      <td align="right" valign="bottom">'.chr(10);
    echo '        <span style="background-color: white; font-size:9pt;">'.chr(10);
    echo $_SESSION["datacorrente"];
    echo '        </span><br>'.chr(10);
    echo '        <b>Usu&aacute;rio:&nbsp;</b>'.$_SESSION["nomeusuario"].'&nbsp;<span style="color:lightblue; font-weight:bolder;">|</span>&nbsp;&nbsp;'.chr(10);
    echo '        <a href="detona_sessao.php"><b>Sair&nbsp;</b></a>&nbsp;&nbsp;<span style="color:lightblue; font-weight:bolder;">|</span>&nbsp;&nbsp;'.chr(10);
    //echo '        <span style="cursor: pointer" onclick="JavaScript:window.close();"><b>Sair</b></span>&nbsp;&nbsp;<span style="color:lightblue; font-weight:bolder;">|</span>&nbsp;&nbsp;'.chr(10);
    echo '        <a href="help/help_'.$idpagina.'.html" target="_blank"><img src="imagem/icone_help.png" border="0"></a>&nbsp;&nbsp;'.chr(10);
    echo '      </td>'.chr(10);
    echo '    </tr>'.chr(10);
//}
?>