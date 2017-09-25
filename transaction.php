<?php include 'db.php';?>
<?php
//to get past transactions using SLID

// TODO Get him the transactions using SLID
	
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$SLID = $_POST["SLID"];
	
	
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
}
?>