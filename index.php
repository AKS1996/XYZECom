<?php include 'db.php';?>
<?php
//Query the DB for requests
$strsql = "select * from MAIN_TABLE ORDER BY ID DESC limit 100";
if ($result = $mysqli->query($strsql)) {
   printf("<br>Select returned %d rows.\n", $result->num_rows);
} else {
        //Could be many reasons, but most likely the table isn't created yet. init.php will create the table.
        echo "<b>Can't query the database, did you <a href = init.php>Create the table</a> yet?</b>";
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
        <img class="newappIcon" src="images/newapp-icon.png" />
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
                <input type = "text" style = "width:100%" name = "request" autofocus onchange="saveChange(this)" onkeydown="onKey(event)"></input>
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
