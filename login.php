<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $phno = $_POST['phno'];
    $pass = $_POST['pass'];
    $hashedPass = sha1($pass);
    $host ="localhost";
    $dbusername = "root";
    $dbpass = "";
    $dbname = "reataurantt";

    $conn = new mysqli($host,$dbusername,$dbpass,$dbname);

    if($conn->connect_error){
        die("Connection failed : ".$conn->connect_error);
    }

    $query1 = "SELECT pass FROM admins WHERE phoneno = '$phno'";
    $result1 = $conn->query($query1);
    if($result1!=false){
    if($result1->num_rows==1){
        $row1 = $result1->fetch_assoc();
        $dbuserpass1 = $row1['pass'];
        if($dbuserpass1==$pass){
            $_SESSION['phoneNo1'] = $phno;
            header('location:adminspage.php');
        }
        else{
            echo("Password do not match");
        }
    }
        else if($result1->num_rows==0)
    {    
    $query = "SELECT pass FROM signin WHERE phoneno = '$phno'";
   
    $result = $conn->query($query);
    if($result!=false){
    if($result->num_rows==1){
        $row = $result->fetch_assoc();
        $dbuserpass = $row['pass'];
        $pass1 = sha1($dbuserpass);
        if($hashedPass==$pass1){
            $_SESSION['phoneNo'] = $phno;
            header('location:menu.php');
        }
        else{
            echo("Password do not match");
        }
    }
    else if($result->num_rows==0){
        echo("Seems like you have not registered, please Register");
    }
    }
    
}
    
} 
    $conn->close();

}
?>