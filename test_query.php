<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "dummy1"; 

$conn = mysqli_connect($servername, $username, $password, $db);

if(!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}

echo "Connection successful!\n";

//mysqli_query($conn, "use hr-database0.1");
// use "" quotes to enter to varchar

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

if($_POST["employee_code"] == NULL){
    alert("Fields are empty!");
    return;
}

if(mysqli_query($conn, "insert into officiating_position values(\"".$_POST["employee_code"]."\",\"".$_POST["officiating_pos"]."\",\"".date("Y-m-d",     strtotime($_POST["start_date"]))."\",".$_POST["end_date"].")")){
echo "query executed<br>";
} else {
echo "query unsuccessful";
}

//$result = mysqli_query($conn, "select * from table1");

//while($row = mysqli_fetch_array($result)){
//echo nl2br($row['one'] . "\n");
//}

mysqli_close($conn);

?>


<html>
    <head>
        <title></title>
    </head>
    
    <body>
        <a href="./test_input.html">Return to page</a>
    </body>
</html>