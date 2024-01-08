<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .form-container {
      display: grid;
      place-items: center;
      min-height: 100vh;
}
        form{
            width:40%;
            border:2px solid black;
            padding:2%;
        }
        h4{
          background-color:black;
          color:white;
          display:block;
          padding:1%;
          text-align:center;
        }
        button{
          background-color:grey;
          color:white;
        }
        button:hover{
          color:black;
        }
    </style>
    </head>

<body>
<h4>Book a Table</h4>
    <p><?php
        session_start();
        $phno = $_SESSION['phoneNo'];
        $con = mysqli_connect('localhost','root','','reataurantt');
        if(mysqli_connect_errno()){
          echo("SQL error");
      }
      else{
              $query = "SELECT * FROM bookings WHERE phoneno =$phno" ;

              $result = mysqli_query($con,$query);
              if($result!=false){
                if(mysqli_num_rows($result)!=0){
                while($row = mysqli_fetch_assoc($result)){
                if($row['confirmation']=='1'){
                  echo("Your seats are confirmed!!");
                }
              }
            }
            }
          }
            ?>
            </p>        
    <div class="form-container">
    <form id="form1">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" placeholder="Name" name="name">
    </div>
    <div class="form-group col-md-6">
      <label for="phno">Phone No</label>
      <input type="text" class="form-control" id="phno" placeholder="PhoneNo" name="phno">
    </div>
  </div>
  <div class="form-group">
    <label for="nums">Number of seats</label>
    <input type="number" class="form-control" id="nums" step="1" name="nums">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Date</label>
    <input type="date" class="form-control" id="date" placeholder="9/10/2003" name="date">
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="t1">Time</label>
      <input type="time" class="form-control" id="t1" name="t1">
    </div>
</div>
  <button type="submit" class="btn" onclick='book()'>Book</button>
</form>
    </div>
</body>
<script>
    function book(){

        var form_ref = document.getElementById('form1');
        var data = new FormData(form_ref);

        fetch("book.php",{
            method:"POST",
            body:data,
        }).then(res=>res.text())
        .then(txt=>alert(txt))
    }
</script>
</html>