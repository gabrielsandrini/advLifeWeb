<?php
unset($_SESSION);
session_destroy();
header("Location: ..\public\Login.php");