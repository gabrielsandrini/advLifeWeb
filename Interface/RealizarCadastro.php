<?php

include("..\DAO\classeConexao.php");
include("..\DAO\classeCrudGenerico.php");


// $ = isset($_POST[""]) ? $_POST[""] : null;

$nome = isset($_POST["nome"]) ? $_POST["nome"] : null;