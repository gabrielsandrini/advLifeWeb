<?php
/*
 *      funcoes_upload.php
 *      
 *      Copyright 2017 Andre Leme
 *      
 *      Este arquivo contém funções relacionadas ao processo de upload
 *      das imagens associadas ao enunciado da questão.
 *      Existe tratamento de código para o nome do arquivo e a associa-
 *      ção do arquivo com o ID da questão.
  *      
 */

/* *********************************************************************
 *  Monta a string de data corrente para exibição no cabeçalho
 * *********************************************************************
*/
function enviarArquivo($nomeArquivo, $idquestao){
    $diretorio_destino = "arquivo/";
    $arquivo_destino = $diretorio_destino . basename($_FILES["arquivoImagem"]["name"]);
    $uploadOk = 1;
    $tipoArquivoImagem = pathinfo($arquivo_destino,PATHINFO_EXTENSION);
    $nomeArquivoGravacao = $diretorio_destino.'Q'.$idquestao.'.'.$tipoArquivoImagem;
    
    // Verifica se o arquivo selecionado é uma imagem
    if(isset($_POST["botaoArquivo"])) {
        $check = getimagesize($_FILES["arquivoImagem"]["tmp_name"]);
        if($check !== false) {
            //echo "Arquivo é uma imagem - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            //echo "Arquivo não é uma imagem.";
            $uploadOk = 0;
            return 1;
        }
    }
    // Verifica se já existe um arquivo com este nome no diretório destino
    if (file_exists($arquivo_destino)) {
        //echo "Já existe um arquivo com este nome.";
        $uploadOk = 0;
        return 2;
    }
    // Verifica o tamanho do arquivo (limitado a 1Mb (+/-)
    if ($_FILES["arquivoImagem"]["size"] > 1000000) {
        //echo "O arquivo é muito grande.";
        $uploadOk = 0;
        return 3;
    }
    // Allow certain file formats
    if($tipoArquivoImagem != "jpg" && 
       $tipoArquivoImagem != "png" && 
       $tipoArquivoImagem != "jpeg" && 
       $tipoArquivoImagem != "gif") {
        //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
        return 4;
    }
    // Check if $uploadOk is set to 0 by an error
    //if ($uploadOk == 0) {
    //    echo "Arquivo não enviado.";
    // if everything is ok, try to upload file
    //} else {
        if (move_uploaded_file($_FILES["arquivoImagem"]["tmp_name"], $nomeArquivoGravacao)) {
            //echo "O arquivo ". basename( $_FILES["arquivoImagem"]["name"]). " foi enviado.";
            return 5;
        } else {
            //echo "Houve um erro no envio do arquivo.";
            return 6;
        }
    //
}

