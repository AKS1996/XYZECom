<?php include 'db.php';?>
<?php
//Checks check whether there's the guy in DB

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   // $ID = $_POST["SLID"];
//    echo $ID;
	$data = json_decode(file_get_contents('php://input'), true);
    $ID = $data["SLID"];
    $q = "SELECT * FROM TRANS_TABLE WHERE FROM_SLID='".$ID."';";
    $q1 = "SELECT * FROM TRANS_TABLE WHERE TO_SLID='".$ID."';";
    $res = $mysqli->query($q);
    $res1 = $mysqli->query($q1);
    
    $data = array();

    
    if ($res->num_rows > 0) {
    	$a=array();
	    while($row = $res->fetch_assoc()) {
	    	$myObj->TO = $row["TO_SLID"];
			$myObj->AMOUNT= $row["AMOUNT"];
			array_push($a,$myObj);
			}
			$data['SENTMONEY'] = $a;
	} else {
    	echo NULL;
	}
	if ($res1->num_rows > 0) {
    	$a=array();
	    while($row = $res1->fetch_assoc()) {
	    	$myObj->FROM = $row["FROM_SLID"];
			$myObj->AMOUNT= $row["AMOUNT"];
			array_push($a,$myObj);
			}
			$data['RECEIVEDMONEY'] = $a;
			
	   
	} else {
    	echo NULL;
	}
	$myJSON = json_encode($data);
	        echo $myJSON;
}
?>