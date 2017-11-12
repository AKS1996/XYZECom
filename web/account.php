<?php include 'db.php';?>
<?php
// update existing entry using SLID

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$data = json_decode(file_get_contents('php://input'), true);
	$UNAME = $data["UNAME"];
	$CELL = $data["CELL"];
	$SLID = $data["SLID"];
	
	$q = "UPDATE `MAIN_TABLE` SET ";
	$q = $q."`UNAME`='".$UNAME."', ";
	$q = $q."`CELL`='".$CELL."' ";
	$q = $q."WHERE `SLID`='".$SLID."'";
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