<?php
/**
 * Control de acceso al panel de administración de un evento
 *
 * @author damanzano
 * @since 25/02/11
 * @package src
 */
session_start();

if ($_SESSION['sched_conf_id'] == "")
{
  header("Location: ../index.php");
}else{
    unset($_SESSION['sched_conf_id']);
    $_SESSION['evento_activo'] = false;
    header("Location: ../index.php");
}

?>
