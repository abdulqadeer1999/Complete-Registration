<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Registered Forms</title>
  </head>
  <body>
  

  <div class="container">
      

      <div class="table-responsive">
      <table class="table table-bordered table-striped">

       <thead>
<!-- 
      <th>ID</th>
      <th>User Name</th>  -->
      <th>Profile Picture</th>


      </thead>

      <tbody>

      <?php



// $conn = mysqli_connect('localhost','root');




$server= "localhost";
$username = "root";
$password = "";
$database = "users";

$conn = mysqli_connect($server,$username,$password,$database);

// if(!$conn) {
//     die("connection to this database failed due to" .$mysqli_connect_error());
// }
//   mysqli_select_db($conn,'upload');

  if(isset($_POST['submit'])) {
    
      $files = $_FILES['file'];
    //   print_r($username);
    //   print_r($files);

      $filename = $files['name'];
      $fileerror =  $files['error'];
      $filetemp = $files['tmp_name'];


      $fileextension = explode('.',$filename);
      $filecheck = strtolower(end($fileextension));

      $fileextensionstored = array('png','jpg','jpeg');

      if(in_array($filecheck,$fileextensionstored))  {
          
       $destinationfile = 'upload/'.$filename;
       move_uploaded_file($filetemp,$destinationfile);

      $sql =  "INSERT INTO users->id(image)
        VALUES ('$destinationfile')";

        $query = mysqli_query($conn,$sql);

        $displayquery = "select * from  users";
        $querydisplay= mysqli_query($conn,$displayquery);

        // delete query

        // $sql = "DELETE FROM uploadimage WHERE id='" . $_GET["id"] . "'";
        // $querydisplay= mysqli_query($conn,$displayquery);
      






        
        // $row = mysqli_num_rows($querydisplay);

        $i=0;
while($result = mysqli_fetch_array($querydisplay)) {
        // while ($result = mysqli_fetch_array($querydisplay)){

        ?>

             <tr>

             <td> <img src= "<?php echo $result ['image']; ?>" height="100px" width="150px"> </td>
            

          </tr>


         <?php

     $i++;

       }

    }else {
        echo "Invalid Image Format";
    }
  }

    ?>

   </tbody>
        </table> 
      </div>
  </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>