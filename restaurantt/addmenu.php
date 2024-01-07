<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .form-container {
      display: grid;
      place-items: center;
      height: 90vh;
     
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
        a{
          padding-left:20px;
        }
        h5{
          text-align:center;
          text-decoration: underline;
        }
    </style>
    </head>

<body>
<h4>Adda Food to menu</h4>
    <div class="form-container">
    <form id="form1">
    <h5>Food Item</h5>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="foodname">Food Name</label>
      <input type="text" class="form-control" id="foodname" placeholder="Food Name" name="foodname">
    </div>
    <div class="form-group col-md-6">
      <label for="foodId">Food Id</label>
      <input type="text" class="form-control" id="foodId" placeholder="Food Id" name="foodId">
    </div>
  </div>
  <div class="form-group">
    <label for="img">Image src</label>
    <input type="text" class="form-control" id="img"  name="img">
  </div>
  <div class="form-group">
    <label for="price">Price</label>
    <input type="number" class="form-control" id="price" placeholder="eg. 300" name="price" step='any'>
  </div>
  <button type="submit" class="btn btn-dark" onclick='add()'>Add food Item</button>
  <a href="adminspage.php">Go to Menu</a>
</form>
</div>
</body>
<script>
    function add(){

        var form_ref = document.getElementById('form1');
        var data = new FormData(form_ref);

        fetch("add.php",{
            method:"POST",
            body:data,
        }).then(res=>res.text())
        .then(text=>alert(text))
        
    }
</script>
</html>