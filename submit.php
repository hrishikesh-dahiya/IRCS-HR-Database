<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "hr-database0.1"; 

$conn = mysqli_connect($servername, $username, $password, $db);

if(!$conn) {
    die("Connection failed: ".mysqli_connect_error());
} else {
    echo "Connection successful!<br>";
}

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

//if($_POST["employee_code"] == NULL || $_POST["officiating_pos"] == NULL){
//    alert("Necessary fields are empty. Return and Re-submit");
//    return;
//}

$which_table = $_POST["submit"];

switch($which_table) {
    case "officiating-fill":
        $insert_query = "insert into officiating_position values(\"".$_POST["employee_code"]."\",\"".$_POST["officiating_pos"]."\",\"".date("Y-m-d", strtotime($_POST["start_date"]))."\",\"".date("Y-m-d", strtotime($_POST["end_date"]))."\")";
        break;
    case "experience-fill":
        if($_POST["total"] == NULL){
            $_POST["total"] = (int)$_POST["with_ircs"] + (int)$_POST["outside_ircs"];
        }
        $insert_query = "insert into experience values (\"".$_POST["employee_code"]."\",\"".$_POST["with_ircs"]."\",\"".$_POST["outside_ircs"]."\",\"".$_POST["total"]."\")";
        break;
    default:
        echo "Did not work <br>";
        break;
}


if(mysqli_query($conn, $insert_query)) {
    echo "Query executed<br>"; 
} else {
    echo "Query unsuccessful<br>";
}

mysqli_close($conn);

?>

<html>
    <head>
        <title></title>
    </head>
    
    <body>
        <a href="./index.html">Return to submit page</a>
    </body>
</html>
 