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
        $query = "insert into officiating_position values(\"".$_POST["employee_code"]."\",\"".$_POST["officiating_pos"]."\",\"".date("Y-m-d", strtotime($_POST["start_date"]))."\",\"".date("Y-m-d", strtotime($_POST["end_date"]))."\")";
        break;

    case "experience-fill":
        $query = "insert into experience values (\"".$_POST["employee_code"]."\",\"".$_POST["with_ircs"]."\",\"".$_POST["outside_ircs"]."\")";
        break;

    case "contract-fill":
        $query = "insert into contract values (\"".$_POST["employee_code"]."\",\"".date("Y-m-d", strtotime($_POST["start_date"]))."\",\"".date("Y-m-d", strtotime($_POST["end_date"]))."\",\"".date("Y-m-d", strtotime($_POST["renewal"]))."\")";
        break;
    
    case "promotion-fill":
        $query = "insert into promotion values (\"".$_POST["employee_code"]."\",\"".$_POST["type-promotion"]."\",\"".date("Y-m-d", strtotime($_POST["promotion-date"]))."\",\"".$_POST["details-promotion"]."\")";
        break;

    case "salary-fill":
        $query = "insert into salary_allowances values (\"".$_POST["employee_code"]."\",\"".$_POST["band"]."\",\"".$_POST["level"]."\",\"".$_POST["band_pay"]."\",\"".$_POST["grade_pay"]."\",\"".$_POST["npa"]."\",\"".$_POST["sca"]."\",\"".$_POST["tda_arr"]."\",\"".$_POST["da"]."\",\"".$_POST["transport"]."\",\"".$_POST["tda"]."\",\"".$_POST["hra"]."\",\"".$_POST["cca"]."\",\"".$_POST["wash"]."\",\"".$_POST["hca"]."\",\"".$_POST["ewa"]."\",\"".$_POST["others"]."\",\"".$_POST["da_arr"]."\",\"".$_POST["ex_gratia"]."\",\"".$_POST["gross"]."\",\"".$_POST["pf"]."\",\"".$_POST["fg"]."\",\"".$_POST["monthly_cto"]."\",\"".$_POST["monthly_cto_fg"]."\",\"".$_POST["annual_cto"]."\",\"".$_POST["annual_cto_fg"]."\")";
        break;

    case "personal-fill":
        $query = "insert into personal_information values (\"".$_POST["employee_code"]."\",\"".$_POST["title"]."\",\"".$_POST["name"]."\",\"".$_POST["sex"]."\",\"".date("Y-m-d", strtotime($_POST["dob"]))."\",\"".$_POST["staff_classification"]."\",\"".$_POST["designation"]."\",\"".$_POST["reporting_manager"]."\",\"".$_POST["department"]."\",\"".$_POST["location"]."\",\"".date("Y-m-d", strtotime($_POST["date_of_joining"]))."\",\"".date("Y-m-d", strtotime($_POST["date_of_retirement"]))."\",\"".$_POST["diversity_status"]."\",\"".$_POST["educational_qualification"]."\",\"".$_POST["education_details"]."\",\"".$_POST["professional_qualification"]."\",\"".$_POST["present_address"]."\",\"".$_POST["permanent_address"]."\",\"".$_POST["city"]."\",\"".$_POST["state"]."\",\"".$_POST["phone"]."\",\"".$_POST["emergency_no"]."\",\"".$_POST["email"]."\",\"".$_POST["marital_status"]."\",\"".$_POST["father_husband_name"]."\",\"".$_POST["father_husband"]."\",\"".$_POST["nominee_name"]."\",\"".$_POST["relationship"]."\",\"".$_POST["bank_name"]."\",\"".$_POST["ifsc_code"]."\",\"".$_POST["acc_no"]."\",\"".$_POST["aadhar_no"]."\",\"".$_POST["pan_no"]."\",\"".$_POST["passport_no"]."\",\"".$_POST["pf_no"]."\",\"".$_POST["uan_no"]."\",\"".date("Y-m-d", strtotime($_POST["last_working_day"]))."\",\"".$_POST["status"]."\")";
        break;

    case "officiating-del":
        $query = "delete from officiating_position where employee_code = ".$_POST["employee_code"];
        break;
        
    case "contract-del":
        $query = "delete from contract where employee_code = ".$_POST["employee_code"];
        break;
        
    case "personal-del":
        $query = "delete from personal_information where employee_code = ".$_POST["employee_code"];
        break;
        
    case "salary-del":
        $query = "delete from salary_allowances where employee_code = ".$_POST["employee_code"];
        break;
        
    case "experience-del":
        $query = "delete from experience where employee_code = ".$_POST["employee_code"];
        break;
        
    case "promotion-del":
        $query = "delete from promotion where employee_code = ".$_POST["employee_code"];
        break;

    default:
        echo "Did not work <br>";
        break;
}


if(mysqli_query($conn, $query)) {
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
 