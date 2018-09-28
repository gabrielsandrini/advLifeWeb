<?php
include_once '../DAO/trilhaDao.php';
$id = $_GET['id'];
$trilhaDao = new trilhaDao();
$trilhaDao->deleteTracks($idTrilha);