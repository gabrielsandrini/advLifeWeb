<?php
include_once 'classeCrudGenerico.php';
class trilhaDao
{

    private function makeSqlForSearch($array)
    {
        //$id = isset($array['id']) ? $array['id'] : null;
        $apelido = isset($array['apelido']) ? $array['apelido'] : null;
        $distMax = isset($array['distMax']) ? $array['distMax'] : null;
        $distMin = isset($array['distMin']) ? $array['distMin'] : null;
        $nickname = isset($array['nickname']) ? $array['nickname'] : null;
        $sql = "select * from tbtrilha where 1 = 1";
        
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
}
