<?php
    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        
        $phno = $_POST['user_phno'];


        $host = "localhost";
        $dbuname = "root";
        $dbpass = "";
        $dbname = "reataurantt";
        $con =  mysqli_connect($host,$dbuname,$dbpass, $dbname);

        if(!$con){
            die("Connection failed : ".$con_connect_error);
        }

        $query = "SELECT * FROM signin WHERE phoneno = '$phno'";

        $result = mysqli_query($con,$query); 
        
        if($result!=false){
        if(mysqli_num_rows($result)==1){
            echo("USN already exists");
            return;
        }
        else{
            $userName = $_POST['user_name'];
            $add = $_POST['user_add'];
            $email = $_POST['user_mail'];
            $pass = $_POST['user_pass'];
            $query1 = "INSERT INTO signin VALUES('$userName','$phno','$email','$add','$pass')";
            if(mysqli_query($con, $query1)){
                $_SESSION['success'] = 'Registered Successfully!!';
                header('location:loginPage.php');
              } else {
                echo "Error: " . $query1 . "<br>" . mysqli_error($con);
              }
              
              mysqli_close($con);

        }

    }
}
    //To remember
    //While in query the strings in vaiable must be used with ''
    //INSERTING returns a boolean value
    //Rememn=ber Syntax properly
    //Give db name while connecting, servername(localhost), username, pass and dbname to connect to db
    //chcek for ; missings
    
?>

