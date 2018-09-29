<?php
include_once 'classeCrudGenerico.php';
include_once 'classeCaniveteSuico.php';

class AvaliacaoDao
{
    /**
     *$array = [idCriterio => nota] 
     *      */
    public function inserirAvaliacao($array)
    {
        session_start();
        $nicknameUsuario = $_SESSION['nicknameUsuario'];
        $crudGenerico = new CrudGenerico();
        $date = date("Y/m/d");
        
        $sql = "INSERT INTO `adventureslife`.`tbavaliacoesrealizadas` (`idTrilha`, `nicknameUsuario`, `dataRealizacao`)
            VALUES ('".$array['idTrilha']."', '$nicknameUsuario', '$date')";
        $resultado = $crudGenerico->fQuery($sql);
        
        if(!$resultado){ die("Erro..."); }
        
        $caniveteSuico = new Canivetesuico();
        $arrayPegarChave=[
          'nomeTabela' => 'tbavaliacoesrealizadas',
          'nomeCampo' => 'idAvaliacao'
        ];
        $idAvaliacao = $caniveteSuico->maiorValorDoCampo($arrayPegarChave);
        
        unset($array['idTrilha']);
        foreach ($array as $key => $value)
        {
            $sql = "INSERT INTO `adventureslife`.`tbavaliacaovalores` (`idAvaliacao`, `idCriterio`, `nota`)";
            $sql .= " VALUES('$idAvaliacao','$key', '$value')";
            $resultado = $crudGenerico->fQuery($sql);
            
            if(!$resultado){ die("Erro..."); }
        }
        return true;
    }
    
    public function retornarCriterios()
    {
      $sql = "select * from tbcriteriodeavaliacao";
      $crudGenerico = new CrudGenerico();
      $resultado = $crudGenerico->fQuery($sql);
      return $resultado;
    }
}
