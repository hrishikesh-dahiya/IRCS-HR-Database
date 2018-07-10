<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "hr-database0.1"; 

$conn = mysqli_connect($servername, $username, $password, $db);

if(!$conn) {
    die("Connection failed: ".mysqli_connect_error());
} else {
    // echo "Connection successful!<br>";
}

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

function redirect($url) {
    header("Location: ".$url);
    exit();
}

if($_POST["employee_code"] == NULL){
    redirect("./");
}

if($_POST["login-btn"] == "register") {

    if($_POST["employee_code"] == NULL || $_POST["password"] == NULL){
        echo "Cannot register user, empty fields<br>";
        return;
    }
    
    $check_employee = mysqli_query($conn, "select employee_code from credentials where employee_code=".$_POST["employee_code"]."\"");
    
    if($check_employee){
        echo "The user exists. Please login <br>";
        return;
    }
    
    $insert_query = "insert into credentials values (\"".$_POST["employee_code"]."\",\"".$_POST["password"]."\")";
    
    if(mysqli_query($conn, $insert_query)) {
        echo "Employee registered succussfully <br>";
        
    } else {
        echo "Couldn't be registered <br>";
    }
    return;
}

$check_employee = mysqli_fetch_row(mysqli_query($conn, "select employee_code from credentials where employee_code=\"".$_POST["employee_code"]."\""));

if(!$check_employee) {
    redirect("./");
}

$user_password = mysqli_fetch_row(mysqli_query($conn, "select password from credentials where employee_code=\"".$_POST["employee_code"]."\""))[0];

if($_POST["password"] == $user_password) {
    // echo "Login successful! <br>";
} else {
    echo "Incorrect credentials <br>";
    return;
}

mysqli_close($conn);

?>


<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">    
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>IRCS HR Database</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <script src="jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
	</head>
    
	<body>

        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <a class="navbar-brand" href="#" id="home-btn"><img src="./images/ircs-logo.jpg" height="40" width="40"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" id="personal-btn" href="#">Personal Information</a>
                    <a class="nav-item nav-link" id="promotion-btn" href="#">Promotion</a>
                    <a class="nav-item nav-link" id="contract-btn" href="#">Contract</a>
                    <a class="nav-item nav-link" id="officiating-btn" href="#">Officiating Position</a>
                    <a class="nav-item nav-link" id="experience-btn" href="#">Experience</a>
                    <a class="nav-item nav-link" id="salary-btn" href="#">Salary and Allowances</a>
                </div>
            </div>
            <a class="nav-item nav-link float-right" id="logout-btn" href="./index.html">Logout</a>
        </nav>
        
        <br><br><br> 

        <div class="container-fluid" id="home">
            <h1>Welcome to IRCS HR Database</h1><br><br>
            <h4>You are logged in!</h4>
            <img src="./images/rcrs.png">
        </div>

        
        <div class="container-fluid" id="contract-form" style="display: none">
            
            <h2>Contract</h2><hr>
            <br><br>


            <form class="form-horizontal" action="./submit.php" method="post">
                <div class="form-group row">

                    <label class="control-label col-sm-2">Employee Code</label>
                    <div class="col-sm-4">    
                        <input class="form-control" type="text" placeholder="" name="employee_code"><br>
                    </div>

                    <label class="control-label col-sm-2">Start Date</label>
                    <div class="col-sm-4 col">
                        <input class="form-control" type="date" placeholder="DD-MM-YYYY" name="start_date"><br>
                    </div>
                    
                    <label class="control-label col-sm-2">End Date</label>
                    <div class="col-sm-4 col">
                        <input class="form-control" type="date" placeholder="DD-MM-YYYY" name="end_date"><br>
                    </div>
                    
                    <label class="control-label col-sm-2">Due for renewal</label>
                    <div class="col-sm-4 col">
                        <input class="form-control" type="date" placeholder="DD-MM-YYYY" name="renewal"><br>
                    </div>

                </div>
                
                <div align="center">
                    <button class="btn btn-primary" type="submit" name="submit" value="contract-fill">Submit</button>
                    <button class="btn btn-primary" type="submit" name="submit" value="contract-del">Delete</button>
                </div><br>

                <br><br>

            </form>

            <form action="./import.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label col-sm-3">Click below to upload (.csv)</label>
                    <input type="file" class="form-control-file" id="contract-upload" name="upload-file">
                    <button class="btn btn-primary" type="submit" name="upload-file-btn" value="contract-upload">Upload File</button>
                </div>
            </form>

            <a href="./templates/contract.xlsx" download>Download Excel Template</a>

            <form class="form-horizontal" action="./export.php" method="post">
                
                <div class="float-right"><button class="btn btn-primary" type="submit" name="export" value="contract-export">Export</button></div><br>

                <br><br>

            </form>

        </div>


        <div class="container-fluid" id="officiating-form" style="display: none">
            
            <h2>Officiating Position</h2><hr>
            <br><br>
            <form class="form-horizontal" action="./submit.php" method="post">
                <div class="form-group row">

                    <label class="control-label col-sm-2">Employee Code</label>
                    <div class="col-sm-10">    
                        <input class="form-control" type="text" placeholder="" name="employee_code"><br>
                    </div>
                    
                    <label class="control-label col-sm-2">Officiating Position</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="officiating_pos"><br>
                    </div>

                    <label class="control-label col-sm-2">Start Date</label>
                    <div class="col-sm-4 col">
                        <input class="form-control" type="date" placeholder="DD-MM-YYYY" name="start_date"><br>
                    </div>
                    
                    <label class="control-label col-sm-2">End Date</label>
                    <div class="col-sm-4 col">
                        <input class="form-control" type="date" placeholder="DD-MM-YYYY" name="end_date"><br>
                    </div>

                </div>
                
                <div align="center">
                    <button class="btn btn-primary" type="submit" name="submit" value="officiating-fill">Submit</button>
                    <button class="btn btn-primary" type="submit" name="submit" value="officiating-del">Delete</button>
                </div><br>

            </form>

            <br><br>

            <form action="./import.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label col-sm-3">Click below to upload (.csv)</label>
                    <input type="file" class="form-control-file" id="officiating-upload" name="upload-file">
                    <button class="btn btn-primary" type="submit" name="upload-file-btn" value="officiating-upload">Upload File</button>
                </div>
            </form>

            <a href="./templates/officiating_position.xlsx" download>Download Excel Template</a>

            <form class="form-horizontal" action="./export.php" method="post">
                
                <div class="float-right"><button class="btn btn-primary" type="submit" name="export" value="officiating-export">Export</button></div><br>

                <br><br>

            </form>

        </div>
        

        <div class="container-fluid" id="experience-form" style="display: none">
            
            <h2>Experience</h2><hr>
            <br><br>
            <form class="form-horizontal" action="./submit.php" method="post">
                <div class="form-group row">

                    <label class="control-label col-sm-2">Employee Code</label>
                    <div class="col-sm-4">    
                        <input class="form-control" type="text" placeholder="" name="employee_code"><br>
                    </div>

                    <label class="control-label col-sm-2">Outside IRCS</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="outside_ircs"><br>
                    </div>

                    <label class="control-label col-sm-2">With IRCS</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="with_ircs"><br>
                    </div>

                </div>
                
                <div align="center">
                    <button class="btn btn-primary" type="submit" name="submit" value="experience-fill">Submit</button>
                    <button class="btn btn-primary" type="submit" name="submit" value="experience-del">Delete</button>
                </div><br>

            </form>

            <form action="./import.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label col-sm-3">Click below to upload (.csv)</label>
                    <input type="file" class="form-control-file" id="contract-upload" name="upload-file">
                    <button class="btn btn-primary" type="submit" name="upload-file-btn" value="experience-upload">Upload File</button>
                </div>
            </form>

            <a href="./templates/experience.xlsx" download>Download Excel Template</a>

            <form class="form-horizontal" action="./export.php" method="post">
                
                <div class="float-right"><button class="btn btn-primary" type="submit" name="export" value="experience-export">Export</button></div><br>

                <br><br>

            </form>

        </div>

        
        <div class="container-fluid" id="promotion-form" style="display: none">
            
            <h2>Promotion</h2><hr>
            <br><br>
            <form class="form-horizontal" action="./submit.php" method="post">
                <div class="form-group row">

                    <label class="control-label col-sm-2">Employee Code</label>
                    <div class="col-sm-10">    
                        <input class="form-control" type="text" placeholder="" name="employee_code"><br>
                    </div>

                    <div class="col-sm-6">
                        <label class="control-label col-sm-4">Type of Promotion</label>

                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="type-promotion" value="Internal"> Internal
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="type-promotion" value="Lateral"> Lateral
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="type-promotion" value="External"> External    
                            </label>
                        </div>
                    </div> 
                    
                    <label class="control-label col-sm-2">Date of Promotion</label>
                    <div class="col-sm-4 col">
                        <input class="form-control" type="date" placeholder="DD-MM-YYYY" name="promotion-date"><br>
                    </div>
                    
                    <label class="control-label col-sm-2">Details of Promotion</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="details-promotion"><br>
                    </div>

                </div>
                
                <div align="center">
                    <button class="btn btn-primary" type="submit" name="submit" value="promotion-fill">Submit</button>
                    <button class="btn btn-primary" type="submit" name="submit" value="promotion-del">Delete</button>
                </div><br>

            </form>

            <form action="./import.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label col-sm-3">Click below to upload (.csv)</label>
                    <input type="file" class="form-control-file" id="promotion-upload" name="upload-file">
                    <button class="btn btn-primary" type="submit" name="upload-file-btn" value="promotion-upload">Upload File</button>
                </div>
            </form>

            <a href="./templates/promotion.xlsx" download>Download Excel Template</a>

            <form class="form-horizontal" action="./export.php" method="post">
                
                <div class="float-right"><button class="btn btn-primary" type="submit" name="export" value="promotion-export">Export</button></div><br>

                <br><br>

            </form>

        </div>

        
        <div class="container-fluid" id="salary-form" style="display: none">
        
            <h2>Salary and Allowances</h2><hr>
            <br><br>
            <form class="form-horizontal" action="./submit.php" method="post">
                <div class="form-group row">

                    <label class="control-label col-sm-2">Employee Code</label>
                    <div class="col-sm-4">    
                        <input class="form-control" type="text" placeholder="" name="employee_code"><br>
                    </div>

                    <label class="control-label col-sm-2">Band</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="band"><br>
                    </div>

                    <label class="control-label col-sm-2">Level</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="level"><br>
                    </div>
                    
                    <label class="control-label col-sm-2">Band Pay</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="band_pay"><br>
                    </div>
                    
                    <label class="control-label col-sm-2">Grade Pay</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="grade_pay"><br>
                    </div>
                    
                    <label class="control-label col-sm-2">NPA</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="npa"><br>
                    </div>
                    
                    <label class="control-label col-sm-2">SCA</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="sca"><br>
                    </div>
                    
                    <label class="control-label col-sm-2">TDA Arrear</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="tda_arr"><br>
                    </div>
                    
                    <label class="control-label col-sm-2">DA</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="da"><br>
                    </div>
                    
                    <label class="control-label col-sm-2">Transport</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="transport"><br>
                    </div>
                    
                    <label class="control-label col-sm-2">TDA</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="tda"><br>
                    </div>
                    
                    <label class="control-label col-sm-2">HRA</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="hra"><br>
                    </div>
                    
                    <label class="control-label col-sm-2">CCA</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="cca"><br>
                    </div>
                    
                    <label class="control-label col-sm-2">Wash</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="wash"><br>
                    </div>
                    
                    <label class="control-label col-sm-2">HCA</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="hca"><br>
                    </div>
                    
                    <label class="control-label col-sm-2">EWA</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="ewa"><br>
                    </div>
                    
                    <label class="control-label col-sm-2">Others</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="others"><br>
                    </div>
                    
                    <label class="control-label col-sm-2">DA Arrear</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="da_arr"><br>
                    </div>
                    
                    <label class="control-label col-sm-2">Ex-Gratia</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="ex_gratia"><br>
                    </div>
                    
                    <label class="control-label col-sm-2">Gross Salary</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="gross"><br>
                    </div>
                    
                    <label class="control-label col-sm-2">PF</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="pf"><br>
                    </div>
                    
                    <label class="control-label col-sm-2">Future Gratuity</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="fg"><br>
                    </div>
                    
                    <label class="control-label col-sm-2">Monthly CTO</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="monthly_cto"><br>
                    </div>
                    
                    <label class="control-label col-sm-2">Monthly CTO With Future Gratuity</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="monthly_cto_fg"><br>
                    </div>
                    
                    <label class="control-label col-sm-2">Annual CTO</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="annual_cto"><br>
                    </div>
                    
                    <label class="control-label col-sm-2">Annual CTO With Future Gratuity</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="annual_cto_fg"><br>
                    </div>

                </div>
                
                <div align="center">
                    <button class="btn btn-primary" type="submit" name="submit" value="salary-fill">Submit</button>
                    <button class="btn btn-primary" type="submit" name="submit" value="salary-del">Delete</button>
                </div><br>

            </form>

            <form action="./import.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label col-sm-3">Click below to upload (.csv)</label>
                    <input type="file" class="form-control-file" id="salary-upload" name="upload-file">
                    <button class="btn btn-primary" type="submit" name="upload-file-btn" value="salary-upload">Upload File</button>
                </div>
            </form>

            <a href="./templates/salary_allowances.xlsx" download>Download Excel Template</a>

            <form class="form-horizontal" action="./export.php" method="post">
                
                <div class="float-right"><button class="btn btn-primary" type="submit" name="export" value="salary-export">Export</button></div><br>

                <br><br>

            </form>

        </div>

        
        <div class="container-fluid" id="personal-form" style="display: none">
            
            <h2>Personal Info</h2><hr>
            <br><br>
            <form class="form-horizontal" action="./submit.php" method="post">
                <div class="form-group row">

                    <label class="control-label col-sm-2">Employee Code</label>
                    <div class="col-sm-4">    
                        <input class="form-control" type="text" placeholder="" name="employee_code"><br>
                    </div>

                    <label class="control-label col-sm-2">Title</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="title"><br>
                    </div>

                    <label class="control-label col-sm-2">Name</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="name"><br>
                    </div>
                    
                    <label class="control-label col-sm-2">Sex</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="sex"><br>
                    </div>

                    <label class="control-label col-sm-2">Date Of Birth</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="date" name="dob"><br>
                    </div>
                    
                    <div class="col-sm-6">
                        <label class="control-label col-sm-4">Staff Classificatiom</label>

                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="type-promotion" value="Permanent"> Permanent
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="type-promotion" value="Contract"> Contract
                            </label>
                        </div>
                    </div> 

                    <label class="control-label col-sm-2">Designation</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="designation"><br>
                    </div>

                    <label class="control-label col-sm-2">Reporting Manager</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="reporting_manager"><br>
                    </div>
                    
                    <label class="control-label col-sm-2">Department</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="department"><br>
                    </div>

                    <label class="control-label col-sm-2">Location</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="location"><br>
                    </div>

                    <label class="control-label col-sm-2">Date Of Joining</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="date" name="date_of_joining"><br>
                    </div>

                    <label class="control-label col-sm-2">Date Of Retirement</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="date" name="date_of_retirement"><br>
                    </div>
                    
                    <label class="control-label col-sm-2">Diversity Status</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="diversity_status"><br>
                    </div>

                    <label class="control-label col-sm-2">Educational Qualification</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="educational_qualification"><br>
                    </div>
                    
                    <label class="control-label col-sm-2">Education Details</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="education_details"><br>
                    </div>

                    <label class="control-label col-sm-2">Professional Qualification</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="professional_qualification"><br>
                    </div>

                    <label class="control-label col-sm-2">Present Address</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="present_address"><br>
                    </div>

                    <label class="control-label col-sm-2">Permanent Address</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="permanent_address"><br>
                    </div>
                    
                    <label class="control-label col-sm-2">City</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="city"><br>
                    </div>

                    <label class="control-label col-sm-2">State</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="state"><br>
                    </div>

                    <label class="control-label col-sm-2">Phone</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="phone"><br>
                    </div>
                    
                    <label class="control-label col-sm-2">Emergency No.</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="emergency_no"><br>
                    </div>

                    <label class="control-label col-sm-2">Email</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="email" name="email"><br>
                    </div>

                    <div class="col-sm-6">
                        <label class="control-label col-sm-4">Marital Status</label>

                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="type-promotion" value="Married"> Married
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="type-promotion" value="Unmarried"> Unmarried
                            </label>
                        </div>
                    </div> 
                    
                    <label class="control-label col-sm-2">Father/Husband Name</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="father_husband_name"><br>
                    </div>

                    <div class="col-sm-6">

                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="type-promotion" value="Father"> Father
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="type-promotion" value="Husband"> Husband
                            </label>
                        </div>
                    </div> 

                    <label class="control-label col-sm-2">Nominee Name</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="nominee_name"><br>
                    </div>
                    
                    <label class="control-label col-sm-2">Relationship</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="relationship"><br>
                    </div>

                    <label class="control-label col-sm-2">Bank Name</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="bank_name"><br>
                    </div>

                    <label class="control-label col-sm-2">IFSC Code</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="ifsc_code"><br>
                    </div>
                    
                    <label class="control-label col-sm-2">Account No.</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="acc_no"><br>
                    </div>
                    
                    <label class="control-label col-sm-2">Aadhar No.</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="aadhar_no"><br>
                    </div>

                    <label class="control-label col-sm-2">PAN No.</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="pan_no"><br>
                    </div>

                    <label class="control-label col-sm-2">Passport No.</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="passport_no"><br>
                    </div>
                    
                    <label class="control-label col-sm-2">PF No.</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="pf_no"><br>
                    </div>

                    <label class="control-label col-sm-2">UAN No.</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="uan_no"><br>
                    </div>

                    <label class="control-label col-sm-2">Last Working Day</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="date" name="last_working_day"><br>
                    </div>
                    
                    <div class="col-sm-6">
                        <label class="control-label col-sm-4">Status</label>

                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="type-promotion" value="Active"> Active
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="type-promotion" value="Inactive"> Inactive
                            </label>
                        </div>
                    </div> 

                </div>
                
                <div align="center">
                    <button class="btn btn-primary" type="submit" name="submit" value="personal-fill">Submit</button>
                    <button class="btn btn-primary" type="submit" name="submit" value="personal-del">Delete</button>
                </div><br>

            </form>

            <form action="./import.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="control-label col-sm-3">Click below to upload (.csv)</label>
                    <input type="file" class="form-control-file" id="personal-upload" name="upload-file">
                    <button class="btn btn-primary" type="submit" name="upload-file-btn" value="personal-upload">Upload File</button>
                </div>
            </form>

            <a href="./templates/personal_info.xlsx" download>Download Excel Template</a>

            <form class="form-horizontal" action="./export.php" method="post">
                
                <div class="float-right"><button class="btn btn-primary" type="submit" name="export" value="personal-export">Export</button></div><br>

                <br><br>

            </form>

        </div>
        
        
        <script type="text/javascript">
            
            $("#home-btn").click(function() {
                $("#home").show();
                $("#personal-form").hide();
                $("#promotion-form").hide();
                $("#salary-form").hide();
                $("#officiating-form").hide();
                $("#contract-form").hide();
                $("#experience-form").hide();
                $("#login-form").hide();
            });
            
            $("#personal-btn").click(function() {
                $("#home").hide();
                $("#personal-form").show();
                $("#promotion-form").hide();
                $("#salary-form").hide();
                $("#officiating-form").hide();
                $("#contract-form").hide();
                $("#experience-form").hide();
                $("#login-form").hide();
            });
            
            $("#promotion-btn").click(function() {
                $("#home").hide();
                $("#personal-form").hide();
                $("#promotion-form").show();
                $("#salary-form").hide();
                $("#officiating-form").hide();
                $("#contract-form").hide();
                $("#experience-form").hide();
                $("#login-form").hide();
            });
            
            $("#salary-btn").click(function() {
                $("#home").hide();
                $("#personal-form").hide();
                $("#promotion-form").hide();
                $("#salary-form").show();
                $("#officiating-form").hide();
                $("#contract-form").hide();
                $("#experience-form").hide();
                $("#login-form").hide();
            });
            
            $("#officiating-btn").click(function() {
                $("#home").hide();
                $("#personal-form").hide();
                $("#promotion-form").hide();
                $("#salary-form").hide();
                $("#officiating-form").show();
                $("#contract-form").hide();
                $("#experience-form").hide();
                $("#login-form").hide();
            });
            
            $("#contract-btn").click(function() {
                $("#home").hide();
                $("#personal-form").hide();
                $("#promotion-form").hide();
                $("#salary-form").hide();
                $("#officiating-form").hide();
                $("#contract-form").show();
                $("#experience-form").hide();
                $("#login-form").hide();
            });
            
            $("#experience-btn").click(function() {
                $("#home").hide();
                $("#personal-form").hide();
                $("#promotion-form").hide();
                $("#salary-form").hide();
                $("#officiating-form").hide();
                $("#contract-form").hide();
                $("#experience-form").show();
                $("#login-form").hide();
            });
            
            $("#login-btn").click(function() {
                $("#home").hide();
                $("#personal-form").hide();
                $("#promotion-form").hide();
                $("#salary-form").hide();
                $("#officiating-form").hide();
                $("#contract-form").hide();
                $("#experience-form").hide();
                $("#login-form").show();
            });

        </script>
	</body>
</html>
