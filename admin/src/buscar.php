<?php session_start();
    /**
    *
    *@license class/autentica.php
    */
	include_once("../class/AutenticaLdap.php");
	
	$autentica = new AutenticaLdap();
	
	$log = $_GET['login'];
	//$pass = $_GET['password'];
	
	$aut = $autentica->buscarUsuario($log,true);
?>
