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
$sqlTable="DROP TABLE IF EXISTS TRANS_TABLE";
if ($mysqli->query($sqlTable)) {
    echo "Table2 dropped successfully! <br>";
} else {
	echo "Cannot drop table. "  . mysqli_error();
}
// MAIN_TABLE has 2 main columns - ID, SLID(Social Login ID - FB Google)

echo "Executing CREATE TABLE Query...<br>";
$sqlTable="
CREATE TABLE MAIN_TABLE (
 ID bigint(20) NOT NULL AUTO_INCREMENT,
 FNAME varchar(255) DEFAULT 'def_fname',
 PWRD varchar(255) DEFAULT 'def_pwrd',
 UNAME varchar(255) DEFAULT 'def_uname',
 CELL varchar(10) DEFAULT '0000000000',
 SLID varchar(255) NOT NULL,
 PRIMARY KEY (ID)
) DEFAULT CHARSET=utf8
";
$sqlTable_trans="
CREATE TABLE TRANS_TABLE (
 AMOUNT int(6) NOT NULL,
 TO_SLID varchar(255) NOT NULL,
 FROM_SLID varchar(255) NOT NULL,
 ID bigint(20) NOT NULL AUTO_INCREMENT,
 PRIMARY KEY (ID)
) DEFAULT CHARSET=utf8
";

if ($mysqli->query($sqlTable)) {
    echo "Table created successfully!<br>";
} else {
	echo "ERROR: Cannot create table. "  . mysqli_error();
	die();
}
if ($mysqli->query($sqlTable_trans)) {
    echo "Table2 created successfully!<br>";
} else {
	echo "ERROR: Cannot create table. "  . mysqli_error();
	die();
}


?>
<button class = "mybutton" onclick="window.location = 'index.php';">Back</button>
</html>