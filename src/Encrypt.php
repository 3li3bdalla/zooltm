<?php
	
	
	namespace ZootTM;
	
	
	use phpseclib\Crypt\RSA;
	
	class Encrypt
	{
		
		private $public_key;
		private $uuid;
		private $ipin;
		
		/**
		 * Encrypt constructor.
		 *
		 * @param $ipin
		 * @param $public_key
		 * @param $uuid
		 */
		public function __construct($ipin,$public_key,$uuid)
		{
			
			$this->ipin = $ipin;
			$this->public_key = $public_key;
			$this->uuid = $uuid;
		}
		
		/**
		 * @return string
		 */
		public function getEncryptedIpin()
		{
			
			$rsa = new RSA();
			$rsa->loadKey($this->getPublicKey());
			$ciphertext = $rsa->encrypt($this->getUuid().$this->getIpin());

//			dd($this->getUuid().$this->getIpin());
			return base64_encode($ciphertext);
			
		}
//
//		public function decrypt($TEXT)
//		{
//
//			$rsa = new RSA();
//
//			$rsa->loadKey($_ENV['PRIVATE_KEY_TEST']);
//			$ciphertext = $rsa->decrypt($TEXT);
//
//			return $ciphertext;
//
//		}
		
		/**
		 * @return mixed
		 */
		public function getPublicKey()
		{
			return $this->public_key;
		}
		
		/**
		 * @param mixed $public_key
		 */
		public function setPublicKey($public_key)
		{
			$this->public_key = $public_key;
		}
		
		/**
		 * @return mixed
		 */
		public function getUuid()
		{
			return $this->uuid;
		}
		
		/**
		 * @param mixed $uuuid
		 */
		public function setUuid($uuid)
		{
			$this->uuid = $uuid;
		}
		
		/**
		 * @return mixed
		 */
		public function getIpin()
		{
			return $this->ipin;
		}
		
		/**
		 * @param mixed $ipin
		 */
		public function setIpin($ipin)
		{
			$this->ipin = $ipin;
		}
		
	}