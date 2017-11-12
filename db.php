<?php

if(!$_ENV["VCAP_SERVICES"]){ //local dev
    $mysql_server_name = "127.0.0.1:3306";
    $mysql_username = "root";
    $mysql_password = "";
    $mysql_database = "test";
} else {
    $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    echo "shit";
    $server =$url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $db = substr($url["path"], 1);
}
//echo "Debug: " . $mysql_server_name . " " .  $mysql_username . " " .  $mysql_password . "\n";

$mysqli = new mysqli($server, $username, $password, $db);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    die();
}else{
//	echo "Connection working well";
}

?>
