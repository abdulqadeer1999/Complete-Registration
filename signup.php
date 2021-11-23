<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){


// if(isset($_POST['submit']))



include './_dbconnect.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];

// $exists= false;

//check email already exist
$existsSql = "SELECT * FROM `users` WHERE email = '$email'";
$result= mysqli_query($conn,$existsSql );

$numExistRows = mysqli_num_rows($result);

if($numExistRows > 0){
  $showError = " User Email Already Exist";

}else {
  // $exists = false;


    if(($password == $cpassword)) {

      $hash = password_hash($password ,PASSWORD_DEFAULT);
    // echo $hash;

    // $sql = "INSERT INTO `users` (`username`, `email` ,`password` ,`dt`) 
    // VALUES ('$username', '$email', '$hash', current_timestamp())";

    $sql = "INSERT INTO users (username, email, user_type, password) 
                 VALUES('$username', '$email', 'user', '$hash')";

                //  echo $sql;


    $result = mysqli_query($conn,$sql); 

    if($result) {
        $showAlert =true; 
    }

   }else {
    $showError = "Passwords do not match";
   } 
}

}
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Sign Up</title>
  </head>

  <body>
  

    <?php include 'partials/_nav.php' ?>

    <!-- <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your account has been created you can login.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div> -->

<?php


if($showAlert) {
   echo  '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your account has been created you can login.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';

}

if($showError) {
    echo  '<div class="alert alert-danger alert-dismissible fade show" role="alert">
   <strong>Error!</strong> '. $showError.'
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
   </button>
 </div>';
 
 }

?>
    <div class="container my-5">
        <h2>Sign Up Here</h2>

        <form action="/login/signup.php" method="post">
  <div class="form-group col-md-6 mt-5">

  <label for="name">User Name </label>
    <input type="text" class="form-control" id="username" name="username"  placeholder="Enter Name"  required>
    
    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email"  required="required" >
  
  </div>
  <div class="form-group col-md-6">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password"  name="password" placeholder="Password" required="required">
    <label for="password"> Confirm Password</label>
    <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" required="required">
  </div>
 
  <button type="submit" class="btn btn-primary col-md-6">Sign Up</button>
</form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>