<html> 
	<head> 
		<title>Php Echo-Form -- CSC220</title> 
	</head> 
	
	<body> 
	<div>  
		<h2>Echo Form</h2> 

<?php
	//only process POST requests
	
	function get_version_num($dob){
		date_default_timezone_set('America/New_York');

		$dateArray = explode("-", $dob);
		$day;
		$month;
		$year;
		$phone;
		$tday = date("d");
		$tmonth = date("m");
		$tyear = date("Y");
		$monthDiff;
		
		//double check scoring
		if(intval($dateArray[0]) <= $tyear && intval($dateArray[0]) >= ($tyear - 6)){
			//check if the date is valid
			$day = $dateArray[1];
			$month = $dateArray[2];
			$year = $dateArray[0];
			
			$monthDiff = ($tyear - $year) * 12;
			$monthDiff += $tmonth- $month;
		}
		
		//get the right month SWYC
		$version;
		if($monthDiff == null || $monthDiff > 70 || $monthDiff < 2){
			//alert("No SWYC is applicable to your child's age");
		} else if($monthDiff >=2 && $monthDiff <=3){
			$version = 2;
			
		} else if($monthDiff >=4 && $monthDiff <=5){
			$version = 4;
			
		} else if($monthDiff >=6 && $monthDiff <=8){
			$version = 6;
			
		} else if($monthDiff >=9 && $monthDiff <=11){
			$version = 9;  
											
		} else if($monthDiff >=12 && $monthDiff <=14){
			$version = 12;
			   
		} else if($monthDiff >=15 && $monthDiff <=17){
			$version = 15;   
		
		} else if($monthDiff >=18 && $monthDiff <=22){
			$version = 18;   
					
		} else if($monthDiff >=23 && $monthDiff <=28){
			$version = 24;   

		} else if($monthDiff >=29 && $monthDiff <=34){
			$version = 30;
			   
		} else if($monthDiff >=35 && $monthDiff <=46){
			$version = 36;  
			 
		} else if($monthDiff >=47 && $monthDiff <=58){
			$version = 48;  
			 
		} else if($monthDiff >=59 && $monthDiff <=70){
			$version = 60;   
		};
		
		return $version;
	}
	
	function is_login_valid(){
		
	}
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$name = strip_tags(trim($_POST["name"]));
		$name = str_replace(array("\r", "\n"), array(" ", " "), name);
		$dob = strip_tags(trim($_POST["dob"]));
		$phone = strip_tags(trim($_POST["phone"]));
		
		$version = get_version_num($dob);
		$data = json_decode(file_get_contents("SWYC_questions.JSON"));
		$right_month = strval($version) . " month";
		$version_data = $data->{$right_month};
		var_dump($version_data);
		$file = fopen("calculatedSWYC.JSON","w+");
		fwrite($file, json_encode($version_data));
		fclose($file);
/* 		if($monthDiff >=2 && $monthDiff <=70 && strlen($phone) == 10
			&& strlen($name) > 0){
			//alert("get "+$version.toString()+" months SWYC");
			$isValid = true;
		};  	 */	
	}
?>
	</div> 
	</body> 
</html>