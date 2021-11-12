<?php
 include_once('dbFunction.php'); 
class general{
    public function pass_Check($password){
		$passLenght = 5;
		$uppercase = preg_match('@[A-Z]@', $password);
		$lowercase = preg_match('@[a-z]@', $password);
		$number    = preg_match('@[0-9]@', $password);
		$specialChars = preg_match('@[^\w]@', $password);
		
		if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < $passLenght) {
			 return false;
		}else{
			return true;
		}
	}

	public function validating($phonenum){
		$valid_number = filter_var($phonenum, FILTER_SANITIZE_NUMBER_INT);
		$valid_number = str_replace("-", "", $valid_number);
		$valid_number = str_replace("+", "", $valid_number);
		if (strlen($valid_number) < 10 || strlen($valid_number) >= 12) 
		{
		  return false;
		} else 
		{
		 return true;
		}
    }
	public function emptyField($username,$email,$password,$phonenum, $address){
			if(strlen(!$username || !$email || !$password || !$phonenum || !$address) == 0){
				return true;
			}else{
				return false;
			}
	
		}
		function email_validation($email) {
			$val = filter_var($email, FILTER_VALIDATE_EMAIL);
			$val = preg_match('^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^', $email);
			
		}

}

?>