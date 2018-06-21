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


<html>

    <head>
    
        <title></title>
    
    </head>
    
    <body>
    
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Variable</th>
              <th scope="col">Value</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <td>Thornton</td>
              <td>@fat</td>
            </tr>
            <tr>
              <td>the Bird</td>
              <td>@twitter</td>
            </tr>
            <tr>
              <td>the Bird</td>
              <td>@twitter</td>
            </tr>
          </tbody>
        </table>
        
    </body>
</html>