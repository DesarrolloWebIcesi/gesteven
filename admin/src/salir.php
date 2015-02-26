<?php

/**
 * Cierra la sesión y elimnina el contenido de variables de sesion
 * @package src
 * @author aorozco - Alejandro Orozco
 * @since 2011-02-28
 */
session_start();

if ($_SESSION['user_id'] == "")
{
  $_SESSION['user_id'];
  header("Location: ../index.php");
}
unset($_SESSION['user_id']);
unset($_SESSION['ultimoAcceso']);
unset($_SESSION['usuarios_cambio']);
session_destroy();
header("Location: ../index.php");
?>