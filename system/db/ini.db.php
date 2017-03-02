<?php
	defined('SYSTEM') OR exit('Direct Link dilarang'); 
	
	$db_auth = array(
						u 	=> 'root',
						p 	=> 'toor'
		);

	try {

		$db = new PDO("mysql:host=localhost;dbname=tokbuk",$db_auth['u'],$db_auth['p']);		

	} catch (Exception $e) {
		
	}
