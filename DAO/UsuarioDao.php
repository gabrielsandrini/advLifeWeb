<?php

/**
 * Description of UsuarioDao
 *
 * @author gabriel_sandrini
 */

include ("classeCrudGenerico.php");
class UsuarioDao {
    
    public function __construct() 
    {
        $objCrud = new CrudGenerico();
    }
    
    /**
    * Essa função valida um login
     * Parametros: $login e $senha
     * Retorno: Retorna true caso o login foi realizado com sucesso e false caso contrário
     */
    public static function validarLogin($login, $senha)
    {  
        $senha = MD5($senha);
        $sql = "select * from tbusuario where nicknameUsuario = '$login' and senha = '$this->$senha' ;";
        $consulta = $objCrud->fQuery($sql);
        $resultado = mysqli_fetch_assoc($consulta);

        if(empty($resultado))
        {
            return false;	
        }
        else 
        {
            return true;   	
        }
    }
    
}
