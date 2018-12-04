<?php
include_once 'FactoryConnection.php';
include_once 'classeCrudGenerico.php';
include_once 'avaliacaoDao.php';
include_once '../pojo/Trilha.php';
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
        $sql .= " order by idTrilha desc";
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

        while ($linha = mysqli_fetch_assoc($resultado)) {
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
        $sql .= " FROM tbtrilha, tbusuariorealizatrilha ";
        $sql .= " WHERE tbusuariorealizatrilha.nicknameUsuario = '$nicknameUsuario' ";
        $sql .= " AND tbusuariorealizatrilha.idTrilha = tbtrilha.idTrilha";
        $resultado = $crudGenerico->fQuery($sql);
        return $resultado;
    }

    public function inserirTrilhas(Trilha $trilha)
    {
        $factoryConnection = new FactoryConnection();
        $conexao = $factoryConnection->getConnection();
        
        $sql = "insert into tbTrilha(apelido, obstaculos, distancia, idMata, dataGravacao, nicknameUsuario)";
        $sql .= " values(?,?,?,?,?,?)";
        
        $apelido = $trilha->getApelido();
        $obstaculos = $trilha->getObstaculos();
        $distancia = $trilha->getDistancia();
        $idMata = $trilha->getIdMata();
        $dataGravacao = $trilha->getData();
        $nicknameUsuario = $trilha->getNicknameUsuario();
        try{
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(1,$apelido);
            $stmt->bindParam(2, $obstaculos);
            $stmt->bindParam(3, $distancia);
            $stmt->bindParam(4, $idMata);
            $stmt->bindParam(5, $dataGravacao);
            $stmt->bindParam(6, $nicknameUsuario);
            $stmt->execute();
            $this->insereRota($conexao->lastInsertId(), $trilha->getRota());
            return true;
        } catch (PDOException $e){
            echo "Erro: " . $e->getMessage();
             echo "Insere Trilha";
        }
        
    }

    public function insereRota($idTrilha, $rota)
    {
       if($rota){
            $factoryConnection = new FactoryConnection();
            $conexao = $factoryConnection->getConnection();
            
            $rota="LINESTRING($rota)";
            
            $sql = "INSERT INTO tbrota VALUES (?, ST_GeomFromText(?))";
            
            try{
                $conexao->beginTransaction();
                $stmt = $conexao->prepare($sql);
                $stmt->bindParam(1, $idTrilha);
                $stmt->bindParam(2, $rota);
                $stmt->execute();
                $conexao->commit();
            } catch (PDOException $e) {
                $conexao->rollback();
                echo "Erro: " . $e->getMessage();
                echo "Insere rota";
                var_dump($rota);
                var_dump($sql);
            }
        }
    }
}
