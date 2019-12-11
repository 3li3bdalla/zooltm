<?php
	
	
	namespace ZootTM;
	
	
	use Symfony\Component\HttpClient\CurlHttpClient;
	use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
	
	class Token extends OAuth
	{
		
		use  ApiResource;
		
		/**
		 * @param string $token
		 *
		 * @return string
		 */
		public function getActiveToken($token = "")
		{
			if ($this->validate($token))
				return $token;
			
			$data = $this->login($_ENV['ZootTM_EMAIL'],$_ENV['ZootTM_PASSWORD']);
			
			return $data['token'];
		}
		
		/**
		 * @param $token
		 *
		 * @return bool
		 * @throws TransportExceptionInterface
		 */
		public function validate($token)
		{
			
			$client = new CurlHttpClient();
			$response = $client->request('GET',$this->getApiUrl($this->VALIDATE_TOKEN_URL),[
				'query' => ['token' => $token],
			]);
			
			
			
			if ($response->getStatusCode() == 200)
				return true;
			
			
			return false;
			
		}
		
	}