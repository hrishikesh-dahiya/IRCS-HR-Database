
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


$tmp_name = $_FILES["officiating-upload"]["tmp_name"];

$name = basename($_FILES["officiating-upload"]["name"]);

move_uploaded_file($tmp_name, "./tmp/".$name);

$target_dir = "./tmp/";

$target_file = $target_dir.basename($_FILES["officiating-upload"]["name"]);


if (($handle = fopen($target_file, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $insert_query = "insert into officiating_position values(\"".$data[0]."\",\"".$data[1]."\",\"".date("Y-m-d", strtotime($data[2]))."\",\"".date("Y-m-d", strtotime($data[3]))."\")";

        if(mysqli_query($conn, $insert_query)) {
            echo "Query executed<br>"; 
        } else {
            echo "Query unsuccessful<br>";
        }
    }
    fclose($handle);
}

unlink($target_file);

mysqli_close($conn);

?>
