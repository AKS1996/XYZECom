<?php include 'db.php';?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") { //if new request is being made
    $cleaned_request = preg_replace('/[^a-zA-Z0-9.\s]/', '', $_POST["SLID"]); //remove invalid chars from input
	
	//to check whether there's the guy in DB
    if (!$mysqli->query("CALL findSLID('". $cleaned_request . "');")){
		echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
	}else{
		echo $res;
	}
else{
		echo 'not found';
		//echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
	}
?>