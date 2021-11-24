<?php


$login= false;
$showError = false;



if($_SERVER["REQUEST_METHOD"] == "POST"){

// if(isset($_POST['submit']))

include './_dbconnect.php';


$email = $_POST['email'];
$password = $_POST['password'];
// $user_type =['user_type'];


// $exists= false;

    // $sql = "Select * from users where email='$email'  AND password='$password'";

    $sql = "Select * from users where email='$email'";

    $result = mysqli_query($conn,$sql); 
    $num  = mysqli_num_rows($result);
    

    if($num == 1) {

     
      while($row=mysqli_fetch_assoc($result)) {

        if($row['user_type'] == 'admin') {

          
          session_start();
          $_SESSION['loggedin'] = true;
          $_SESSION['email'] = $email;
          $_SESSION['user_type'] = $row['user_type'];
          header('location:admin.php');
         

        }else {

          session_start();
          $_SESSION['loggedin'] = true;
          $_SESSION['email'] = $email;
          $_SESSION['user_type'] = $row['user_type'];
          header('location:home.php');
        }

        if(password_verify($password, $row['password'])) {
          $login = true;

     //In password hashing
        // session_start();
            // $_SESSION['loggedin'] = true;
            // $_SESSION['email'] = $email;
          header("location:home.php");
            exit;
        }
        else{
          $showError = "Invalid Credentials";
      } 
        
      }
      
     // Before password Hashing 
      // session_start();
      // $_SESSION['loggedin'] = true;
      // $_SESSION['email'] = $email;
      // header("location:home.php");
      // exit;
     
       
    } else{
      $showError = "Invalid Credentials";
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

    <title>Login</title>
  </head>
  <body>
  

<?php  include 'partials/_nav.php' ?>
<?php
  

  


  if($login) {
     echo  '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Your are logged in.
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
        <h2>Sign In Here</h2>

        <form action="/login/login.php" method="POST">
  <div class="form-group col-md-6 mt-5">

    <label for="email">Email address</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required >
   
  </div>
  <div class="form-group col-md-6">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password"  name="password" placeholder="Password" required>
    
  </div>
 
  <button type="submit" class="btn btn-primary col-md-6">Login</button>
</form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>