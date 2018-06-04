<?php
session_start();
if(!isset($_SESSION["nicknameUsuario"]))
{
    header("Location: ..\public\Login.php?erro=1 ");
}