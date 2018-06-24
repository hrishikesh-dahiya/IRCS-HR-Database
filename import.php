
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

$tmp_name = $_FILES["upload-file"]["tmp_name"];

$name = basename($_FILES["upload-file"]["name"]);

move_uploaded_file($tmp_name, "./tmp/".$name);

$target_dir = "./tmp/";

$target_file = $target_dir.basename($_FILES["upload-file"]["name"]);

$which_table = $_POST["upload-file-btn"];

switch($which_table) {
    case "officiating-upload":
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
        break;

    case "contract-upload":
        if (($handle = fopen($target_file, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $insert_query = "insert into contract values (\"".$data[0]."\",\"".date("Y-m-d", strtotime($data[1]))."\",\"".date("Y-m-d", strtotime($data[2]))."\",\"".date("Y-m-d", strtotime($data[3]))."\")";

                if(mysqli_query($conn, $insert_query)) {
                    echo "Query executed<br>"; 
                } else {
                    echo "Query unsuccessful<br>";
                }
            }
            fclose($handle);
        }
        break;

    case "experience-upload":
        if (($handle = fopen($target_file, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if($data[3] == NULL){
                    $data[3] = (int)$data[1] + (int)$data[2];
                }
                $insert_query = "insert into experience values (\"".$data[0]."\",\"".$data[1]."\",\"".$data[2]."\",\"".$data[3]."\")";
                
                if(mysqli_query($conn, $insert_query)) {
                    echo "Query executed<br>"; 
                } else {
                    echo "Query unsuccessful<br>";
                }
            }
            fclose($handle);
        }
        break;

    case "promotion-upload":
        if (($handle = fopen($target_file, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $insert_query = "insert into promotion values (\"".$data[0]."\",\"".$data[1]."\",\"".date("Y-m-d", strtotime($data[2]))."\",\"".$data[3]."\")";
        
                if(mysqli_query($conn, $insert_query)) {
                    echo "Query executed<br>"; 
                } else {
                    echo "Query unsuccessful<br>";
                }
            }
            fclose($handle);
        }
        break;

    case "salary-upload":
        if (($handle = fopen($target_file, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $insert_query = "insert into salary_allowances values (\"".$data[0]."\",\"".$data[1]."\",\"".$data[2]."\",\"".$data[3]."\",\"".$data[4]."\",\"".$data[5]."\",\"".$data[6]."\",\"".$data[7]."\",\"".$data[8]."\",\"".$data[9]."\",\"".$data[10]."\",\"".$data[11]."\",\"".$data[12]."\",\"".$data[13]."\",\"".$data[14]."\",\"".$data[15]."\",\"".$data[16]."\",\"".$data[17]."\",\"".$data[18]."\",\"".$data[19]."\",\"".$data[20]."\",\"".$data[21]."\",\"".$data[22]."\",\"".$data[23]."\",\"".$data[24]."\",\"".$data[25]."\")";
        
                if(mysqli_query($conn, $insert_query)) {
                    echo "Query executed<br>"; 
                } else {
                    echo "Query unsuccessful<br>";
                }
            }
            fclose($handle);
        }
        break;

    case "personal-upload":
        if (($handle = fopen($target_file, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $insert_query = "insert into personal_information values (\"".$data[0]."\",\"".$data[1]."\",\"".$data[2]."\",\"".$data[3]."\",\"".date("Y-m-d", strtotime($data[4]))."\",\"".$data[5]."\",\"".$data[6]."\",\"".$data[7]."\",\"".$data[8]."\",\"".$data[9]."\",\"".$data[10]."\",\"".date("Y-m-d", strtotime($data[11]))."\",\"".$data[12]."\",\"".$data[13]."\",\"".$data[14]."\",\"".$data[15]."\",\"".$data[16]."\",\"".$data[17]."\",\"".$data[18]."\",\"".$data[19]."\",\"".$data[20]."\",\"".$data[21]."\",\"".$data[22]."\",\"".$data[23]."\",\"".$data[24]."\",\"".$data[25]."\",\"".$data[26]."\",\"".$data[27]."\",\"".$data[28]."\",\"".$data[29]."\",\"".$data[30]."\",\"".$data[31]."\",\"".$data[32]."\",\"".$data[33]."\",\"".$data[34]."\",\"".$data[35]."\",\"".date("Y-m-d", strtotime($data[36]))."\",\"".$data[37]."\")";
        
                if(mysqli_query($conn, $insert_query)) {
                    echo "Query executed<br>"; 
                } else {
                    echo "Query unsuccessful<br>";
                }
            }
            fclose($handle);
        }
        break;
        
    default:
        echo "Did not work<br>";
        break;    
}

unlink($target_file);

mysqli_close($conn);

?>
