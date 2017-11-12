<?php include 'db.php';?>
<?php

require('../vendor/autoload.php');

//Query the DB for requests
$strsql = "select * from MAIN_TABLE ORDER BY ID DESC limit 100";
if ($result = $mysqli->query($strsql)) {
   printf("<br>Select returned %d rows.\n", $result->num_rows);
} else {
        //Could be many reasons, but most likely the table isn't created yet. init.php will create the table.
        echo "<b>Can't query the database, did you <a href = init.php>Create the table</a> yet?</b>";
    }

$strsql = "select * from TRANS_TABLE ORDER BY ID DESC limit 100";
if ($result2 = $mysqli->query($strsql)) {
   printf("<br>Select returned %d rows.\n", $result2->num_rows);
} else {
        //Could be many reasons, but most likely the table isn't created yet. init.php will create the table.
        echo "<b>Can't query the database, did you <a href = init.php>Create the table</a> yet?</b>";
    }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cleaned_message = preg_replace('/[^a-zA-Z0-9.\s]/', '', $_POST["SLID"]);

	if(strlen($cleaned_message) > 0){
	    $strsq0 = "INSERT INTO MAIN_TABLE (SLID) VALUES ('" . $cleaned_message . "');";
	    if ($mysqli->query($strsq0)) {
	        echo "Insert success!";
	    } else {
	        echo "Cannot insert into the data table; check whether the table is created, or the database is active. "  . mysqli_error();
	    }
	}

}
?>


<!DOCTYPE html>
<html>

<head>
    <title>XYZ ECommerce</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,minimum-scale=1,user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <div class="">
        <h1>
					Welcome to the <span class="blue">XYZ ECommerce App</span>
				</h1>


            <input type="button" class = "mybutton" onclick="window.location = 'init.php';" class="btn" value="(Re-)Create table"></input></p>
            </br>


    <table id='notes' class='records'><tbody>

        <?php
            echo "<tr>\n";
            while ($property = mysqli_fetch_field($result)) {
                    echo '<th>' .  $property->name . "</th>\n"; //the headings

            }
            echo "</tr>\n";

            mysqli_data_seek ( $result, 0 );
            if($result->num_rows == 0){ //nothing in the table
                        echo '<td>Empty!</td>';
            }

            while ( $row = mysqli_fetch_row ( $result ) ) {
                echo "<tr>\n";
                for($i = 0; $i < mysqli_num_fields ( $result ); $i ++) {
                    echo '<td>' . "$row[$i]" . '</td>';
                }
                echo "</tr>\n";
            }

            $result->close();
            mysqli_close();
        ?>
        <tr>
            <form method = "POST"> <!--FORM: will submit to same page (index.php), and if ($_SERVER["REQUEST_METHOD"] == "POST") will catch it -->
                <td colspan = "2">
                <input type = "text" style = "width:100%" name = "SLID" autofocus onchange="saveChange(this)" onkeydown="onKey(event)"></input>
                </td>
                <td>
                    <button class = "mybutton" type = "submit">New Entry</button></td></tr>
                </td>
            </form>
        </tr>
        </tbody>
    </table>


    <table id='notes' class='records'><tbody>

        <?php
            echo "<tr>\n";
            while ($property = mysqli_fetch_field($result2)) {
                    echo '<th>' .  $property->name . "</th>\n"; //the headings

            }
            echo "</tr>\n";

            mysqli_data_seek ( $result2, 0 );
            if($result->num_rows == 0){ //nothing in the table
                        echo '<td>Empty!</td>';
            }

            while ( $row = mysqli_fetch_row ( $result2 ) ) {
                echo "<tr>\n";
                for($i = 0; $i < mysqli_num_fields ( $result2 ); $i ++) {
                    echo '<td>' . "$row[$i]" . '</td>';
                }
                echo "</tr>\n";
            }

            $result2->close();
            mysqli_close();
        ?>
        <tr>
            <form method = "POST"> <!--FORM: will submit to same page (index.php), and if ($_SERVER["REQUEST_METHOD"] == "POST") will catch it -->
                <td colspan = "2">
                <input type = "text" style = "width:100%" name = "SLID" autofocus onchange="saveChange(this)" onkeydown="onKey(event)"></input>
                </td>
                <td>
                    <button class = "mybutton" type = "submit">New Entry</button></td></tr>
                </td>
            </form>
        </tr>
        </tbody>
    </table>
    </div>
</body>

</html>
