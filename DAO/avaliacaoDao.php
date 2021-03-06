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
    
    public function consultarAvaliacoesRealizadas($idtrilha)
    {
        $sql= "select * 
            from tbavaliacoesrealizadas as avaliacoes
            where avaliacoes.idTrilha = '$idtrilha'
            order by idAvaliacao desc";
        $crudGenerico = new CrudGenerico();
        $resultado = $crudGenerico->fQuery($sql);
        return $resultado;
    }

    public function consultarValoresAvaliacao($idAvaliacao)
    {
        $sql ="select criterios.descricao, valores.nota";
        $sql.=" from tbavaliacaovalores as valores, tbcriteriodeavaliacao as criterios";
        $sql.=" where valores.idAvaliacao = '$idAvaliacao' and valores.idCriterio = criterios.idCriterio";
        $sql.=" order by idAvaliacao desc";
        
        $crudGenerico = new CrudGenerico();
        $resultado = $crudGenerico->fQuery($sql);
        return $resultado;
    }
    
    public function consultarNicknameDoAvaliador($idAvaliacao)
    {
        $sql = "select avaliacoes.nicknameUsuario"; 
        $sql.=" from tbavaliacoesrealizadas as avaliacoes";
        $sql.=" where avaliacoes.idAvaliacao = '$idAvaliacao'";
        
        $crudGenerico = new CrudGenerico();
        $resultado = $crudGenerico->fQuery($sql);
        
        $resultado = mysqli_fetch_assoc($resultado)['nicknameUsuario'];
        return ($resultado)? $resultado: null;
    }
    
    public function deletarAvaliacao($idAvaliacao)
    {
        $sql = "delete from tbavaliacaovalores where idAvaliacao = $idAvaliacao ";
        $crudGenerico = new CrudGenerico();
        $crudGenerico->fQuery($sql);
        $sql = "delete from tbavaliacoesrealizadas where idAvaliacao = $idAvaliacao";
        $resultado = $crudGenerico->fQuery($sql);
        
        return ($resultado) ? true : false;
    }
}
