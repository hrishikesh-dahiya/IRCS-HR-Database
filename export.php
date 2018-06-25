<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "hr-database0.1"; 

$conn = mysqli_connect($servername, $username, $password, $db);

if(isset($_POST["export"])){
		 
    header('Content-Type: text/csv; charset=utf-8');   
    $output = fopen("php://output", "w");  
    $which_table = $_POST["export"];
    switch ($which_table) {
        case 'officiating-export':
            $query = "SELECT * from officiating_position";
            header('Content-Disposition: attachment; filename=officiating_position.csv');
            // fputcsv($output, array('ID', 'First Name', 'Last Name', 'Email', 'Joining Date')); 
            break;
        
        case 'contract-export':
            $query = "SELECT * from contract";
            header('Content-Disposition: attachment; filename=contract.csv');
            // fputcsv($output, array('ID', 'First Name', 'Last Name', 'Email', 'Joining Date')); 
            break;
        
        case 'experience-export':
            $query = "SELECT * from experience";
            header('Content-Disposition: attachment; filename=experience.csv');
            // fputcsv($output, array('ID', 'First Name', 'Last Name', 'Email', 'Joining Date')); 
            break;
        
        case 'promotion-export':
            $query = "SELECT * from promotion";
            header('Content-Disposition: attachment; filename=promotion.csv');
            // fputcsv($output, array('ID', 'First Name', 'Last Name', 'Email', 'Joining Date')); 
            break;
        
        case 'salary-export':
            $query = "SELECT * from salary_allowances";
            header('Content-Disposition: attachment; filename=salary_allowances.csv');
            // fputcsv($output, array('ID', 'First Name', 'Last Name', 'Email', 'Joining Date')); 
            break;
        
        case 'personal-export':
            $query = "SELECT * from personal_information";
            header('Content-Disposition: attachment; filename=personal_info.csv');
            // fputcsv($output, array('ID', 'First Name', 'Last Name', 'Email', 'Joining Date')); 
            break;
        
        default:
            # code...
            break;
    }  
    $result = mysqli_query($conn, $query);  
    while($row = mysqli_fetch_assoc($result))  
    {  
         fputcsv($output, $row);  
    }  
    fclose($output);  
}

?>
