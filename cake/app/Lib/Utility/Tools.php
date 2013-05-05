<?php

class Tools {
	
	public static function randomString($length, $forceAlphaNum = false) {
		if (!is_int($length))
			return false;
		
		$key = '';
		$keys = array_merge(range('a','z'), range(0,9), range('A','Z'));
		
		for ($i = 0; $i < $length; $i++) {
			shuffle($keys);
			$key .= $keys[array_rand($keys)];
		}
		
		if ($forceAlphaNum) {
			// Force it to have both alphabetic and numeric
			if (ctype_digit($key) || ctype_alpha($key))
				$key = self::randomString($length, true);
		}
		
		return $key;
	}
	
}
?>