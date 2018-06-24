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


if($_POST["login-btn"] == "register") {
    
    $check_employee = mysqli_query($conn, "select employee_code from credentials where ".$_POST["employee_code"]."\"");
    
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

$user_password = mysqli_fetch_row(mysqli_query($conn, "select password from credentials where employee_code=\"".$_POST["employee_code"]."\""))[0];

if($_POST["password"] == $user_password) {
    echo "Login successful! <br>";
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
            <a class="navbar-brand" href="#">IRCS HR Database</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <!-- <a class="nav-item nav-link active" id="home" href="#">Home <span class="sr-only">(current)</span></a> -->
                    <a class="nav-item nav-link" id="personal-btn" href="#">Personal Information</a>
                    <a class="nav-item nav-link" id="promotion-btn" href="#">Promotion</a>
                    <a class="nav-item nav-link" id="contract-btn" href="#">Contract</a>
                    <a class="nav-item nav-link" id="officiating-btn" href="#">Officiating Position</a>
                    <a class="nav-item nav-link" id="experience-btn" href="#">Experience</a>
                    <a class="nav-item nav-link" id="salary-btn" href="#">Salary and Allowances</a>
                </div>
            </div>
            <a class="nav-item nav-link float-right" id="login-btn" href="#">Login</a>
        </nav>
        
        <br><br><br>               
        
        <div class="container-fluid" id="officiating-form" style="display: none">
            
            <br><br><br>
            <form class="form-horizontal" action="./export.php" method="post">
                
                <div align="center"><button class="btn btn-primary" type="submit" name="export" value="officiating-export">Export</button></div><br>

                <br><br>

            </form>

        </div>

        
        <div class="container-fluid" id="contract-form" style="display: none">
            
            <br><br><br>
            <form class="form-horizontal" action="./export.php" method="post">
                
                <div align="center"><button class="btn btn-primary" type="submit" name="export" value="contract-export">Export</button></div><br>

                <br><br>

            </form>

        </div>
        
        <div class="container-fluid" id="experience-form" style="display: none">
            
            <br><br><br>
            <form class="form-horizontal" action="./export.php" method="post">
                
                <div align="center"><button class="btn btn-primary" type="submit" name="export" value="experience-export">Export</button></div><br>

                <br><br>

            </form>

        </div>
        
        <div class="container-fluid" id="promotion-form" style="display: none">
            
            <br><br><br>
            <form class="form-horizontal" action="./export.php" method="post">
                
                <div align="center"><button class="btn btn-primary" type="submit" name="export" value="promotion-export">Export</button></div><br>

                <br><br>

            </form>

        </div>
        
        <div class="container-fluid" id="salary-form" style="display: none">
            
            <br><br><br>
            <form class="form-horizontal" action="./export.php" method="post">
                
                <div align="center"><button class="btn btn-primary" type="submit" name="export" value="salary-export">Export</button></div><br>

                <br><br>

            </form>

        </div>
        
        <div class="container-fluid" id="personal-form" style="display: none">
            
            <br><br><br>
            <form class="form-horizontal" action="./export.php" method="post">
                
                <div align="center"><button class="btn btn-primary" type="submit" name="export" value="personal-export">Export</button></div><br>

                <br><br>

            </form>

        </div>
        
        <script type="text/javascript">
            
            $("#home").click(function() {
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
