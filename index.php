<?php
	use Server\Server;
	
	require_once 'autoload.php';
	
	
	Server::getInstance()->registerService("oAuthService", "AuthService");
	
	if(!isset($_GET['wsdl'])){
		Server::getInstance()->runServer();
	} else {
		Server::getInstance()->wsdl();
	}