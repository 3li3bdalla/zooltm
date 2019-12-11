<?php
	
	
	namespace ZootTM;
	
	
	use Symfony\Component\HttpClient\CurlHttpClient;
	use ZootTM\Events\TokenHasBeenGeneratedEvent;
	
	class OAuth
	{
		
		use ApiResource;
		private $token = "";
		private $token_init_date = "";
		private $token_expire_date = "";
		
		/**
		 * @return string
		 */
		public function getTokenInitDate()
		{
			return $this->token_init_date;
		}
		
		/**
		 * @return string
		 */
		public function getTokenExpireDate()
		{
			return $this->token_expire_date;
		}
		
		/**
		 * @param $email
		 * @param $password
		 */
		public function login($email,$password)
		{
			
			
			$client = new CurlHttpClient();
			$response = $client->request('POST',$this->getApiUrl($this->GENERATE_TOKEN_URL),[
				'body' => ['email' => $email,'password' => $password],
			]);
			
			
			if ($this->isLogged($response)){
				return $this->sendLoginResponse($response);
			}
			
			return $this->sendFailResponse($response);
		}
		
		/**
		 * @param $response
		 *
		 * @return bool
		 */
		public function isLogged($response)
		{
			return $response->getStatusCode() == 200;
		}
		
		/**
		 * @param $response
		 */
		public function sendLoginResponse($response)
		{
			$contentType = $response->getHeaders()['content-type'][0];
			if ($contentType == 'application/json'){
				$content = json_decode($response->getContent(),true);
				$this->token = $content['token'];
				
			}
			// push new event when new token is generated
			new TokenHasBeenGeneratedEvent($this->getToken());
			return $response->getContent();
			
		}
		
		/**
		 * @return string
		 */
		public function getToken()
		{
			return $this->token;
		}
		
		/**
		 * @param $response
		 */
		public function sendFailResponse($response)
		{
			
			var_dump($response->getContent());
			return true;
//			dd($response->getContent());
//			throw \Exeption($response->getContent());
		}
		
	}