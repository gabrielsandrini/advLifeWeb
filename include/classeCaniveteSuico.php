<?php
require_once "classeConexao.php";

class Canivetesuico {
   /*
    * O método traz informações das colunas de uma tabela
    * Se o parâmetro $selecao receber 0 retorna os tipos de dados das colunas da tabela
    * Se o parâmetro $selecao receber 1 retorna os nomes das colunas da tabela
    * Se o parâmetro $selecao receber 2 retorna os nomes das chaves da tabela
    */ 
    public function colunaTabela($tabela,$selecao){
        $this->conexao = new Conexao();
        $q = "SHOW COLUMNS FROM ".$tabela;
        $sql =  $this->conexao->executaSQL($q);
        
        $lista = [];
        $lista[] = $sql->num_rows;
        $i=0;
        while ($f = $sql->fetch_object()){
            switch($selecao){
		case 0:
                    if (strpos($f->Type,'int') !== false){
                        $lista[$i] = 0;
                    }else{
                        $lista[$i] = 1;
                    }
                    break;
                case 1:
                    $lista[$i] = $f->Field;
                    break;
                case 2:
                    if ($f->Key == "PRI"){
                        $lista[$i] = $f->Field;
                    }
                    break;
            }
            $i++;
        }   
        return $lista;   
    }
    
    public function obterDataCorrente(){
        $dia = date('d');
	$mes = date('m');
	$ano = date('Y');

        $dayofweek = date('N', strtotime(date('ymd')));
        $monthofyear = date('n', strtotime(date('ymd')));
    
        switch ($dayofweek)
        {
              case 1 : $diasemana = 'Segunda-feira';  break;
              case 2 : $diasemana = 'Terça-feira';  break;
              case 3 : $diasemana = 'Quarta-feira';  break;
              case 4 : $diasemana = 'Quinta-feira';  break;
              case 5 : $diasemana = 'Sexta-feira';  break;
              case 6 : $diasemana = 'Sábado';  break;
              case 7 : $diasemana = 'Domingo';  break;
         }

         switch ($monthofyear)
         {
              case 1 : $mescorrente = 'Janeiro';  break;
              case 2 : $mescorrente = 'Fevereiro';  break;
              case 3 : $mescorrente = 'Março';  break;
              case 4 : $mescorrente = 'Abril';  break;
              case 5 : $mescorrente = 'Maio';  break;
              case 6 : $mescorrente = 'Junho';  break;
              case 7 : $mescorrente = 'Julho';  break;
              case 8 : $mescorrente = 'Agosto';  break;
              case 9 : $mescorrente = 'Setembro';  break;
              case 10 : $mescorrente = 'Outubro';  break;
              case 11 : $mescorrente = 'Novembro';  break;
              case 12 : $mescorrente = 'Dezembro';  break;
        }

        //$data_display = Acentuacao($diasemana).', '.$dia.' de '.Acentuacao($mescorrente).' de '.$ano;
        $data_display = $diasemana.', '.$dia.' de '.$mescorrente.' de '.$ano;
        return $data_display;
    }

    // *************************************************************************************
    // Método genérico para montagem de combos
    // Deve passar o nome da tabela como parâmetro
    // *************************************************************************************
    public function montarCombo($nometabela){
        $this->conexao = new Conexao();

        $sql = '';
        $sql .= 'SELECT * FROM '.$nometabela.' ORDER BY 2;';
        $resultado =  $this->conexao->executaSQL($sql);

        include("tratamento_erro_sql.php");

        $tag = '<select name="cb'.$nometabela.'">';
        $tag .= '<option value="nulo">Selecione um item</option>';
        while ($linha = mysqli_fetch_array($resultado)){
            $tag .= '<option value="'.$linha[0].'">'.$linha[1].'</option>';
        }
        $tag .= '</select>';

        return $tag;
    }

    // *************************************************************************************
    // Método genérico para descobrir qual o mioar valor de chave existente
    // Só funciona para tabelas com uma única PK
    // *************************************************************************************
    public function ultimaChave($nometabela){
        $this->conexao = new Conexao();
        $colunas = $this->colunaTabela($nometabela,1);
        $sql = '';
        $sql .= 'SELECT MAX('.$colunas[0].') FROM '.$nometabela.' ;';
        $resultado =  $this->conexao->executaSQL($sql);

        include("tratamento_erro_sql.php");
        $valor = 0;
        while ($linha = mysqli_fetch_array($resultado)){
            $valor = $linha[0];
        }

        if ($valor == 0){
            return(0);
        }else{
            return $valor;
        }
    }
    
}
