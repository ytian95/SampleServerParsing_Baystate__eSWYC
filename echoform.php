<html> 
	<head> 
		<title>Php Echo-Form -- CSC220</title> 
	</head> 
	
	<body> 
	<div>  
		<h2>Echo Form</h2> 
		<?php  
			print "<P>Your form parameters read as follows:<P><ul>"; 
			foreach ( $_REQUEST as $key=>$value ) { 
				print "<li><b>$key</b> : $value</li>"; 
			} 
			print "</ul>";   
		?>  
	</div> 
	</body> 
</html> 