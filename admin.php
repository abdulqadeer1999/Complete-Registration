<?php
session_start();

// if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
//   header("location:login.php");
//   exit;
// }

// if(isset( $_SESSION['loggedin']) || $_SESSION['user_type']=='admin'){
//     header('location:home.php');
//     exit;
//    }

if(isset($_SESSION['user_type']))
{
  if($_SESSION['user_type'] != 'admin')
  {
    header('Location: home.php');
  }
}
else
{
  header('Location: admin.php');
}

 include 'partials/_nav.php'

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h1>Welcome Admin <?php echo $_SESSION['email']?></h1>
</body>
</html>