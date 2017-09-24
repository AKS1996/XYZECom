<?php include 'db.php';?>
<!DOCTYPE html>
<html>
<head>
    <title>XYZECommerce Application</title>
    <link rel="stylesheet" href="style.css" />
</head>

<?php

$sqlTable="DROP TABLE IF EXISTS MAIN_TABLE";
if ($mysqli->query($sqlTable)) {
    echo "Table dropped successfully! <br>";
} else {
	echo "Cannot drop table. "  . mysqli_error();
}
// MAIN_TABLE has 2 main columns - ID, SLID(Social Login ID - FB Google)

echo "Executing CREATE TABLE Query...<br>";
$sqlTable="
CREATE TABLE MAIN_TABLE (
 ID bigint(20) NOT NULL AUTO_INCREMENT,
 FNAME varchar(255) DEFAULT NULL,
 PWRD varchar(255) DEFAULT NULL,
 UNAME varchar(255) DEFAULT NULL,
 CELL int(10) DEFAULT NULL,
 SLID varchar(255) NOT NULL,
 PRIMARY KEY (ID)
) DEFAULT CHARSET=utf8
";

if ($mysqli->query($sqlTable)) {
    echo "Table created successfully!<br>";
	if ($mysqli->query("DROP PROCEDURE IF EXISTS findSLID")){
		if(!$mysqli->query("CREATE PROCEDURE findSLID(OUT slid varchar(255)) BEGIN SELECT * FROM test.MAIN_TABLE WHERE SLID = @slid; END;")) {
			echo "Stored procedure creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
		} else{
			echo 'created procedure too';	
		}
	}
} else {
	echo "ERROR: Cannot create table. "  . mysqli_error();
	die();
}


?>
<button class = "mybutton" onclick="window.location = 'index.php';">Back</button>
</html>