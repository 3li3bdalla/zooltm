<?php
	
	
	namespace ZootTM;
	
	
	use Symfony\Component\ErrorHandler\Debug;
	use Symfony\Component\Dotenv\Dotenv;
	
	class Application
	{
		
		public function __construct()
		{
			
			$dotenv = new Dotenv();
			$dotenv->loadEnv(__DIR__.'/../.env');
			if ($_ENV['APP_DEBUG']){
				Debug::enable();
//				dd($_ENV);
			}
			
			
			
		}
	}