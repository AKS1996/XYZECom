<?php include 'db.php';?>
<?php
// update existing entry using SLID

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$FNAME = $_POST["FNAME"];
	$PWRD = $_POST["PWRD"];
	$UNAME = $_POST["UNAME"];
	$CELL = $_POST["CELL"];
	$SLID = $_POST["SLID"];
	
	$q = "UPDATE `MAIN_TABLE` SET ";
	$q = $q."`FNAME`='".$FNAME."', ";
	$q = $q."`PWRD`='".$PWRD."', ";
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