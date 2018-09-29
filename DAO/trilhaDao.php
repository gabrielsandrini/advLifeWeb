<?php
include_once 'classeCrudGenerico.php';
include_once 'avaliacaoDao.php';
class trilhaDao
{

    private function makeSqlForSearch($array)
    {
        $idTrilha = isset($array['idTrilha']) ? $array['idTrilha'] : null;
        $apelido = isset($array['apelido']) ? $array['apelido'] : null;
        $distMax = isset($array['distMax']) ? $array['distMax'] : null;
        $distMin = isset($array['distMin']) ? $array['distMin'] : null;
        $nickname = isset($array['nickname']) ? $array['nickname'] : null;
        $sql = "select * from tbtrilha where 1 = 1";
        
        if ($idTrilha)
        {
            $sql .= " and idTrilha = $idTrilha";
        }
        if ($apelido)
        {
            $sql .= " and apelido like '%$apelido%'";
        }
        if ($distMax)
        {
            $sql .= " and distancia <= '$distMax'";
        }
        if ($distMin)
        {
            $sql .= " and distancia >= '$distMin'";
        }
        if ($nickname)
        {
            $sql .= " and nicknameUsuario like '%$nickname%'";
        }
        
        return $sql;
    }
    public function searchTracks($array)
    {
        $sql = $this->makeSqlForSearch($array);
        $crudGenerico = new CrudGenerico();
        $resultado = $crudGenerico->fQuery($sql);
        return $resultado;
    }
    public function deleteTracks($idTrilha)
    {
        $crudGenerico = new CrudGenerico();
        $avaliacaoDao = new AvaliacaoDao();
        $sql = "select idAvaliacao from tbavaliacoesrealizadas where idTrilha = $idTrilha";
        $resultado = $crudGenerico->fQuery($sql);
        
        while($linha = mysqli_fetch_assoc($resultado))
        {
            $idAvaliacao = $linha['idAvaliacao'];
            $avaliacaoDao->deletarAvaliacao($idAvaliacao);
        }
        
        $sql = "delete from tbtrilha where idTrilha = $idTrilha";
        $resultado = $crudGenerico->fQuery($sql);
        
        return ($resultado) ? true : false;
    }
    
    public function searchHistorical($nicknameUsuario)
    {
        $crudGenerico = new CrudGenerico();
        $sql = "SELECT tbtrilha.*, tbusuariorealizatrilha.dataRealizacao";
        $sql.= " FROM tbtrilha, tbusuariorealizatrilha ";
        $sql.= " WHERE tbusuariorealizatrilha.nicknameUsuario = '$nicknameUsuario' ";
        $sql.= " AND tbusuariorealizatrilha.idTrilha = tbtrilha.idTrilha";
        $resultado = $crudGenerico->fQuery($sql);
        return $resultado;
    }
}
