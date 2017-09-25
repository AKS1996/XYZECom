<?php include 'db.php';?>
<?php
//Checks check whether there's the guy in DB

<table>
    foreach ($_POST as $key => $value) {
        echo "<tr>";
        echo "<td>";
        echo $key;
        echo "</td>";
        echo "<td>";
        echo $value;
        echo "</td>";
        echo "</tr>";
    }
</table>
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ID = $_POST["SLID"];
//    echo $ID;
    
    $q = "SELECT * FROM MAIN_TABLE WHERE SLID='".$ID."';";
    
    $res = $mysqli->query($q);
    
    if ($res->num_rows > 0) {
	    while($row = $res->fetch_assoc()) {
	    	$myObj->UNAME = $row["UNAME"];
			$myObj->CELL = $row["CELL"];
			$myJSON = json_encode($myObj);
	        echo $myJSON;
	    }
	} else {
    	echo NULL;
	}
}
?>