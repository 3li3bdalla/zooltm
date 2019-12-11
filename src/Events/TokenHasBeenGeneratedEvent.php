<?php
	
	
	namespace ZootTM\Events;
	
	
	class TokenHasBeenGeneratedEvent
	{
		/**
		 * @param $token
		 */
		public function __invoke($token)
		{
			// TODO: Implement __invoke() method.
			dd($token);
		}
	}