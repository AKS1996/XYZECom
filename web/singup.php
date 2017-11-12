<?php include 'db.php';?>
<?php
//to create new entry
	
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$data = json_decode(file_get_contents('php://input'), true);
    $SLID = $data["SLID"];
    $FNAME = $data["FNAME"];
	$PWRD = $data["PWRD"];
	$UNAME = $data["UNAME"];
	$CELL = $data["CELL"];
	$q = "INSERT INTO `MAIN_TABLE` (`FNAME`,`UNAME`,`SLID`,`CELL`,`PWRD`) VALUES";
	$q = $q." ('".$FNAME."','".$UNAME."','".$SLID."','".$CELL."','".$PWRD."')";
	$q = $q.";";

//	echo $q;	
	$res = $mysqli->query($q);

	if (!$res){
		echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
	}else{
    	echo 'sucess';
    }
    
    
    
    $q = "INSERT INTO `TRANS_TABLE` (`AMOUNT`,`TO_SLID`,`FROM_SLID`) VALUES";
	$q = $q." ('','".$UNAME."','".$SLID."','".$CELL."','".$PWRD."')";
	$q = $q.";";

//	echo $q;	
	$res = $mysqli->query($q);

	if (!$res){
		echo "CALL failed: (" . $mysqli->errno . ") " . $mysqli->error;
	}else{
    	echo 'sucess';
    }
}
?>