<?php

class Validation{
	/* USED AS A FLAG CHANGES TO TRUE IF ONE OR MORE ERRORS IS FOUND */
	private $error = false;

	/* CHECK FORMAT IS BASCALLY A SWITCH STATEMENT THAT TAKES A VALUE AND THE NAME OF THE FUNCTION THAT NEEDS TO BE CALLED FOR THE REGULAR EXPRESSION */
	public function checkFormat($value, $regex)
	{
		switch($regex){
			case "name": return $this->name($value); break;
            case "address": return $this->address($value); break;
            case "city": return $this->city($value); break;
			case "phone": return $this->phone($value); break;
            case "email": return $this->email($value); break;
            case "dob": return $this->dob($value); break;
            case "pwd": return $this->pwd($value); break;
			
			
		}
	}

    /*You will need to evaluate certain patterns on the fields as shown.

Name – alpha characters (upper and lower case), hyphens, apostrophes, spaces only
(cannot be blank).

Address – start with a number, then alpha characters, spaces, hyphens, and periods
(cannot be blank).

City – Must be alpha characters only.

Phone – Must be in the format 999.999.9999, where 9 is a digit of 0 to 9 (cannot be
blank).

Email address – Valid email address (cannot be blank).

DOB – mm/dd/yyyy should format to a proper date (cannot be blank).

Password – will take letters, numbers and special characters.
 */
		
	/* THE REST OF THE FUNCTIONS ARE THE INDIVIDUAL REGULAR EXPRESSION FUNCTIONS*/
	private function name($value){
		$match = preg_match('/^[a-z-\' ]{1,50}$/i', $value);
		return $this->setError($match);
	}

    private function address($value){
		$match = preg_match('/^\d{3}.[a-z-\' ]{1,50}/i', $value);
		return $this->setError($match);
	}

    private function city ($value){
		$match = preg_match('/^[a-z-\' ]{1,50}$/i', $value);
		return $this->setError($match);
	}

	private function phone($value){
		$match = preg_match('/\d{3}\.\d{3}.\d{4}/', $value);
		return $this->setError($match);
	}

    private function email($value){
		$match = preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i', $value);
		return $this->setError($match);
	}

    private function dob($value){
		$match = preg_match('/\d{1}\/\d{2}.\d{4}/', $value);
		return $this->setError($match);
	}

    private function pwd($value){
		$match = preg_match('/^[a-z-\' ]{1,50}$/i', $value);
		return $this->setError($match);
	}

    

	
	private function setError($match){
		if(!$match){
			$this->error = true;
			return "error";
		}
		else {
			return "";
		}
	}


	/* THE SET MATCH FUNCTION ADDS THE KEY VALUE PAR OF THE STATUS TO THE ASSOCIATIVE ARRAY */
	public function checkErrors(){
		return $this->error;
	}
	
}