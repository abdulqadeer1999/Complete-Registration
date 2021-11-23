<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location:login.php");
  exit;
}



// if(!isset( $_SESSION['loggedin']) || $_SESSION['user_type']=='admin'){
//   header('location:admin.php');
//   exit;
//  }
if(isset($_SESSION['user_type']))
{
  if($_SESSION['user_type'] != 'user')
  {
    header('Location: admin.php');
  }
}
else
{
  header('Location: home.php');
}

//  include 'partials/_nav.php'


?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Welcome- <?php echo $_SESSION['email']?></title>
  </head>
  <body>
  

    <?php
    //  include 'partials/_nav.php'
      ?>

      
  <?php

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
 
  $loggedin = true;
}else {
  $loggedin = false;
}

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/login">Login System</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/login/home.php">Home <span class="sr-only">(current)</span></a>
      </li>';
    
      if(!$loggedin){
     
     echo   '<li class="nav-item">
        <a class="nav-link" href="/login/login.php">Login</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="/login/signup.php">Sign Up</a>
      </li>';
      }
      if($loggedin) {
     echo '<li class="nav-item">
        <a class="nav-link" href="/login/logout.php">Log Out</a>
      </li>';
      }
    ?>
      
   </ul>

  
    <form class="form-inline my-2 my-lg-0">
 
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Welcome <?php echo $_SESSION["email"]?></button>
    </form>
  
    
  </div>
</nav>



<h1 style="margin-top:20px;text-align:center; color:blue;">Welcome <?php echo $_SESSION['email']?>This is Home Page</h1>





        <div class="container">
         <div class="row">
        <div class="col-md-3">
        <div class="card" >
          <img class="card-img-top" src="./images/cake.jpg" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Add To Cart</a>
          </div>
        </div>
        </div>
        <div class="col-md-3">
        <div class="card" >
          <img class="card-img-top" src="./images/cake.jpg" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Add To Cart</a>
          </div>
        </div>
        </div>
        <div class="col-md-3">
        <div class="card" >
          <img class="card-img-top" src="./images/cake.jpg" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Add To Cart</a>
          </div>
        </div>
        </div>
        <div class="col-md-3">
        <div class="card" >
          <img class="card-img-top" src="./images/cake.jpg" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Add To Cart</a>
          </div>
        </div>
        </div>
          </div>
        </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>