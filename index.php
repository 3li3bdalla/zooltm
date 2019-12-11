<?php
	require_once 'vendor/autoload.php';
	
	use ZootTM\Application;
	use ZootTM\Encrypt;
	use ZootTM\OAuth;
	use ZootTM\Token;
	
	new Application();
	
	// login with
	//	$oauth = new \ZootTM\Token();
	//	$oauth->login('ali@gmail.com','password');
	//
	
	
	//
	//	$token = new Token();
	//	/// validate the current token if not expire
	//	// try to generate new token if it expired
	//	$token->getActiveToken('current_token');
	
	
	// you can override TokenHasBeenGeneratedEvent class within ZoomTM\Events Namespace
	// this will provide you with token when ever it generated from the api
	
	
	
	
	// use can use encrypt class to encrypt data
	$encrypt = new Encrypt("0000",$_ENV['PUBLIC_KEY_TEST'],"550e8400-e29b-41d4-a716-446655440000");
	var_dump($encrypt->getEncryptedIpin());