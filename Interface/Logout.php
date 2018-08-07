<?php
session_start();
//unset($_SESSION["nicknameUsuario"]);
session_destroy();
header("Location: ..\public\Login.php");