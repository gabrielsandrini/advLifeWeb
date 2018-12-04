<?php
class Trilha
{
    private $apelido,$obstaculos,$distancia,$idMata,$data,$nicknameUsuario, $rota;
    
    function __construct($apelido, $obstaculos, $distancia, $idMata, $data, $nicknameUsuario, $rota)
    {
        $this->apelido = $apelido;
        $this->obstaculos = $obstaculos;
        $this->distancia = $distancia;
        $this->idMata = $idMata;
        $this->data = $data;
        $this->nicknameUsuario = $nicknameUsuario;
        $this->rota = $rota;
    }

    
    function getApelido()
    {
        return $this->apelido;
    }

    function getObstaculos()
    {
        return $this->obstaculos;
    }

    function getDistancia()
    {
        return $this->distancia;
    }

    function getIdMata()
    {
        return $this->idMata;
    }

    function getData()
    {
        return $this->data;
    }

    function getNicknameUsuario()
    {
        return $this->nicknameUsuario;
    }
    
    function getRota()
    {
        return $this->rota;
    }
    
    function setRota($rota)
    {
        $this->rota = $rota;
    }
    
    function setApelido($apelido)
    {
        $this->apelido = $apelido;
    }

    function setObstaculos($obstaculos)
    {
        $this->obstaculos = $obstaculos;
    }

    function setDistancia($distancia)
    {
        $this->distancia = $distancia;
    }

    function setIdMata($idMata)
    {
        $this->idMata = $idMata;
    }

    function setData($data)
    {
        $this->data = $data;
    }

    function setNicknameUsuario($nicknameUsuario)
    {
        $this->nicknameUsuario = $nicknameUsuario;
    }


}
