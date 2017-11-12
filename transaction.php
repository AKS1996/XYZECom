<?php include 'db.php';?>
<?php
//to get past transactions using SLID

// TODO Get him the transactions using SLID
	
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$data = json_decode(file_get_contents('php://input'), true);
    $TO_SLID = $data["TO_SLID"];
    $FROM_SLID = $data["FROM_SLID"];
    $AMOUNT = $data["AMOUNT"];
	$q = "INSERT INTO `TRANS_TABLE` (`TO_SLID`,`FROM_SLID`,`AMOUNT`) VALUES";
	$q = $q." ('".$TO_SLID."','".$FROM_SLID."','".$AMOUNT."')";
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