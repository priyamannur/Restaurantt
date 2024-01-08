<?php
    session_start();
    
    ?>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <style>
            body{
                display: flex;
                justify-content: left;    
                align-items: center;
                background: url('images/imgresto.jpg') no-repeat;
                background-size: cover;
                height: 100vh;
            }
            .submit-btn{
                margin-top: 4%;
                text-align: center;
            }
            .form-page:hover{
                border: 2px solid lightgreen;
            }
            .form-page{
                background-color: transparent;
                width: 400px;
                padding: 30px 40px;
                border-radius: 15px;
                margin-right: auto;
            }
            .form-page h1{
                text-align: center;
                font-weight: bolder;
                color:white;
            }
            .register pre{
                margin-top: 2%;
                font-size:15px;
                color:white;
            }
            .register a{
                text-decoration: none;
                font-weight: bold;
                
            }
            .form-label{
                font-size: 18px;
                color:white;
            }
        </style>
    </head>
    <body>
        <div class="container">
        <?php
    if(isset($_SESSION['success'])){?>
    <div style="color:lightgreen;"><?php
       echo $_SESSION['success'];
    ?>
    </div>
        <?php
            unset($_SESSION['success']);
        }
        ?>
        <div class="row justify-content-center">
        <form action="login.php" method="post" class="form-page" onsubmit="return validate()">
            <h1>Login</h1>
        <div class ="usn">
        <label class="form-label">Enter Phone Number</label>
        <input class="form-control" type="text" placeholder="phoneno" id="phoneno" name="phno"></input>
        </div>
        <div class ="password">
            <label class="form-label">Password</label>
            <input class="form-control" type="password" placeholder="Enter Password" id="pass" name="pass">
        </div>
        <div class="register">
            <pre style="size: 20px;">Dont have an account? <a href="register.html">Register</a> </pre>
        </div>
        <div class="submit-btn">
            <button type="submit" class="btn btn-dark" value="login" >Login</button>
        </div>
    </div>
    </div>
    </form>
    </div>
    <script>
        function validate(){
            var user_id = document.getElementById('phoneno');
            var pass = document.getElementById('pass');
            if(user_id.value==""){
                user_id.focus();
                user_id.select();
                alert("Enter your Phone no");
                return false;
            }
            if(pass.value==""){
                pass.focus();
                pass.select();
                alert("Enter your Password");
                return false;
            }
            return true;
        }
    </script>
    </body>
</html>
