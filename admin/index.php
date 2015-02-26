<?php
/**
 * Script encargado del redireccionamiento al formulario de ingreso usando HTTPS
 * @package admin
 * @author Alejandro Orozco Calero
 */
if ($_SERVER['SERVER_NAME'] != "http://" . $_SERVER['SERVER_NAME'])
{
  $port = $_SERVER["SERVER_PORT"];
  $ssl_port = "443"; //Change 443 to whatever port you use for https (443 is the default and will work in most cases)
  if ($port != $ssl_port)
  {
    $host = $_SERVER["HTTP_HOST"];
    $uri = $_SERVER["REQUEST_URI"];
    header("Location: https://$host$uri");
  }
}
include_once('gui/login.php');
?>