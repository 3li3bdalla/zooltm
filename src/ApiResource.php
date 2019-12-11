<?php
	
	
	namespace ZootTM;
	
	
	trait ApiResource
	{
		protected $BASE_URL = 'https://api.zooltm.com/';
		
		protected $GENERATE_TOKEN_URL = 'token';
		
		protected $VALIDATE_TOKEN_URL = 'api/Account/UserInfo';
		
		public function getApiUrl($route)
		{
			return $this->BASE_URL.$route;
		}
		
	}