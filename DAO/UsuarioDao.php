<?php

/**
 * Description of UsuarioDao
 *
 * @author gabriel_sandrini
 */

include ("classeCrudGenerico.php");
class UsuarioDao {
    
    /**
    * Essa função valida um login
     * Parametros: $login e $senha
     * Retorno: Retorna true caso o login foi realizado com sucesso e false caso contrário
     */
    public static function validarLogin($login, $senha)
    {  
        $objCrud = new CrudGenerico();
        //$senha = md5($senha);
        $sql = "select * from tbusuario where nicknameUsuario = '$login' and senha = '$senha' ;";
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
    
    public static function realizarCadastro($nickname, $senha, $nome, $email)
    {
        $objCrud = new CrudGenerico();
        $senha = md5($senha);

        $tabela = 'tbusuario';
        $campos = ['nicknameUsuario', 'senha', 'nome' ,'email'];
        $dados = [$nickname, $senha, $nome, $email];
        
        $teveSucesso = $objCrud->fInsertPArcial($tabela, $campos, $dados);
        return $teveSucesso;
    }
    
}
