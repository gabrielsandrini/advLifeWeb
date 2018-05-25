<?php

include "parametroAcessoBD.php";

class Conexao extends mysqli
{
    public function __construct(){
        try
        {
            parent::__construct (BD_host,BD_usuario,BD_senha,BD_schema);
            if (mysqli_connect_errno() != 0){
                throw new Exception (mysqli_connect_errno() . " - " . mysqli_connect_error());
            }
        }
        catch (Exception $db_error)
        {
            $mensagem = $db_error->getMessage();
            $arquivo = $db_error->getFile();
            $data = date ("Y-m-d H:i:s");
            $ip_visitante = $_SERVER['REMOTE_ADDR'];
            
            if (!file_exists (LOGS_PATH)){
                mkdir (LOGS_PATH);
            }
            
            $log = $data . " | " . $mensagem . " | " . $arquivo . " | " . $ip_visitante . "\r\n\r\n";
            error_log ($log, 3, LOGS_PATH . "db_errors.log");
            echo "Erro ao conectar ao banco de dados MySQL.";
            exit;
        }
    }
   
    public function __destruct()
    {
        if (mysqli_connect_errno() == 0){
            $this->close();
        }
    }
    
    function executaSQL($BD_query){
        $ajuste = $this->query("SET NAMES 'utf8'");
        $ajuste = $this->query("SET character_set_connection=utf8");
        $ajuste = $this->query("SET character_set_client=utf8");
        $ajuste = $this->query("SET character_set_results=utf8");
        $this->BD_query = $BD_query;
        $resultado = $this->query($this->BD_query);
        return $resultado;
    }  
    
}