<?php

include("classeConexao.php");
class CrudGenerico {
   
    /*
     * Este método executa INSERT para quaisquer tabela
     * Deve ser fornecido um vetor com todos os dados da tabela ($dados)
     * E indicar qual o nome da table ($tabela)
     */
    public function fInsert($dados, $tabela){
        $canivete = new Canivetesuico();
        $tipo = $canivete->colunaTabela($tabela,0);
        $numerocolunas = count($tipo);
        $sql = "INSERT INTO ".$tabela." VALUES(";
        for($i=0;$i<$numerocolunas;$i++){
            $formata = $dados[$i];
            if ($tipo[$i] == 1){
                $formata = chr(39).$dados[$i].chr(39);
            }
            if ($i == $numerocolunas-1){
                $sql.=$formata;
            }else{
                $sql.=$formata.",";
            }
        }
        $sql.=");";
        //echo $sql; exit;
        $this->conexao = new Conexao();
        $this->conexao->executaSQL($sql);
    }
    
    /*
     * Este método executa INSERT para quaisquer tabela
     * Parametros:
     * Deve se indicar qual o nome da table ($tabela)
     * Deve se indicar os campos a serem preenchidos($campos)
     * Deve ser fornecido um vetor com todos os dados da tabela ($dados)
     */
    public function fInsertPArcial($tabela, $campos, $dados){
        $sql = "INSERT INTO ".$tabela." ( ";
        //Insere o nome dos campos
        for ($i = 0; $i < count($campos); $i++)
        {
           if($i == 0)
           {
              $sql.= $campos[$i].', ';
           }
           elseif($i == count($campos)-1)
           {
               $sql.= $campos[$i];
           }
           else
           {
               $sql.= $campos[$i].", ";
           }
        }
        $sql.=  ")";
        
        $sql .= " VALUES( ";
        for ($i = 0; $i < count($dados); $i++) //Insere o valor dos dados
        {
           if($i == 0)
           {
              $sql.= chr(39).$dados[$i].chr(39).', ';
           }
           elseif($i == count($dados)-1)
           {
               $sql.= chr(39).$dados[$i].chr(39);
           }
           else
           {
               $sql.= chr(39).$dados[$i].chr(39).", ";
           }
        }
        $sql.=");";
//        echo $sql; exit;
        $this->conexao = new Conexao();
        return $this->conexao->executaSQL($sql);
    }

     /*
     * Este método executa DELETE para quaisquer tabela
     * Deve ser fornecido um vetor com os dados de chave para a exclusão ($chave)
     * E indicar qual o nome da table ($tabela)
     * O algoritmo busca os nomes das chaves automaticamente.
     */
    public function fDelete($chave, $tabela){
        $canivete = new Canivetesuico();
        $tipo = $canivete->colunaTabela($tabela,0);
        $nomechave = $canivete->colunaTabela($tabela,2);
        $numerocolunas = count($nomechave);
        $sql = "DELETE FROM ".$tabela." WHERE ";
        for($i=0;$i<$numerocolunas;$i++){
            if ($i == $numerocolunas-1){
                $sql.=$nomechave[$i]." = ".$chave[$i].";";
            }else{
                $sql.=$nomechave[$i]." = ".$chave[$i]." AND ";
            }
        }
        echo $sql;
        //$this->conexao = new Conexao();
        //$this->conexao->executaSQL($sql);
        //$this->conexao->close();
    }
    
     /*
     * Este método executa UPDATE para quaisquer tabela
     * Deve ser fornecido um vetor com os dados de chave para a alteração ($chave)
     * Outro vetor com os dados da tabela (todos, mesmo os que não serão alterados) - ($dados)  
     * E indicar qual o nome da table ($tabela)
     * O algoritmo busca os nomes das chaves automaticamente.
     */
    public function fUpdate($chave, $dados, $tabela){
        $canivete = new Canivetesuico();
        $tipo = $canivete->colunaTabela($tabela,0);
        $nomecoluna = $canivete->colunaTabela($tabela,1);
        $nomechave = $canivete->colunaTabela($tabela,2);
        $numerocolunas = count($tipo);
        $numerochaves = count($nomechave);
        $sql = "UPDATE ".$tabela." SET ";
        //for para o SET $numerochaves
        for($i=$numerochaves;$i<$numerocolunas;$i++){
            $formata = $dados[$i];
            if ($tipo[$i] == 1){
                $formata = chr(39).$dados[$i].chr(39);
            }
            
            if ($i == $numerocolunas-1){
                $sql.=$nomecoluna[$i]." = ".$formata;
            }else{
                $sql.=$nomecoluna[$i]." = ".$formata.",";
            }
        }
        //for para o WHERE
        $sql.=" WHERE ";
        for($i=0;$i<$numerochaves;$i++){
            if ($i == $numerochaves-1){
                $sql.=$nomechave[$i]." = ".$chave[$i].";";
            }else{
                $sql.=$nomechave[$i]." = ".$chave[$i]." AND ";
            }
        } 
        echo $sql;      
        //$this->conexao = new Conexao();
        //$this->conexao->executaSQL($sql);
    }

     /*
     * Este método executa SELECT para quaisquer tabela
     * Deve ser fornecido um vetor com os dados de chave para a pesquisa ($chave)
      * ATENÇÃO: Caso seja select sem WHERE passar a palavra "vazio" em um único elemento do vetor $chave 
     * E indicar qual o nome da table ($tabela)
     * O algoritmo busca os nomes das chaves automaticamente.
     */    
    public function fSelect($chave, $tabela){
        $canivete = new Canivetesuico();
        $tipo = $canivete->colunaTabela($tabela,0);
        $nomechave = $canivete->colunaTabela($tabela,2);
        $numerochaves = count($nomechave);
        $sql = "SELECT * FROM ".$tabela." ";
        if ($chave[0] != "vazio"){
            $sql.=" WHERE ";
            for($i=0;$i<$numerochaves;$i++){
                $formata = $chave[$i];
                if ($tipo[$i] == 1){
                    $formata = chr(39).$chave[$i].chr(39);
                }
                if ($i == $numerochaves-1){
                    $sql.=$nomechave[$i]." = ".$formata.";";
                }else{
                    $sql.=$nomechave[$i]." = ".$formata." AND ";
                }
            }
        }

        $this->conexao = new Conexao();
        $lista = $this->conexao->executaSQL($sql);
        return $lista;
    }

     /*
     * Este método executa uma query qualquer
     */    
    public function fQuery($q){
        $this->conexao = new Conexao();
        $lista = $this->conexao->executaSQL($q);
        if(empty($lista))
        {
            echo mysqli_error($this->conexao);
        }
        return $lista;
    }
}
