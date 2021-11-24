<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  header("location:login.php");
  exit;
}

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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    
<h1>Welcome Admin <?php echo $_SESSION['email']?></h1>

<br>


<div class="container">
  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#form">
   Add Products
  </button>  
</div>

<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <h5 class="modal-title" id="exampleModalLabel">Add Products</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form  action="admin.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label for="text">Product Name</label>
            <input type="text" class="form-control" id="text" name="productname">
           
          </div>
          <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="number" name="price">
          </div>
          <div class="form-group">
            <label for="category">Category</label>
            <input type="text" class="form-control" id="number" name="category">
          </div>
          <div class="form-group">
            <label for="password1">Product Picture</label>
            
          <input type="file" class="form-control-file" id="file" name="file">
          </div>
        </div>
        <div class="modal-footer border-top-0 d-flex justify-content-center">
          <input type="submit" name="submit" value="submit" class="btn btn-success">
        </div>
      </form>
    </div>
  </div>
</div>



<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "multi_login";


$conn= mysqli_connect($server,$username,$password,$database);

if(!$conn) {
//     echo "Successfully Connected";
// }else {
    die("Error". mysqli_connect_error());
}


if(isset($_POST['submit'])) {


    $productname= $_POST['productname'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    $files = $_FILES['file'];


   
    $filename = $files['name'];
      $fileerror =  $files['error'];
      $filetemp = $files['tmp_name'];

   $fileextension = explode('.',$filename);
   $filecheck = strtolower(end($fileextension));

   $fileextensionstored = array('png','jpg','jpeg');

   if(in_array($filecheck,$fileextensionstored))  {
       
    $destinationfile = 'upload/'.$filename;
    move_uploaded_file($filetemp,$destinationfile);

    $sql= "INSERT INTO  admin(productname, price,category, image)
     VALUES ('$productname','$price','$category','$destinationfile')";
     

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      
      }

    //    echo $sql;

    // fetching data from database
       
    $displayquery = "select * from  admin";
    $querydisplay= mysqli_query($conn,$displayquery);
    mysqli_close($conn);

  
  }

  ?>
     


  <div class="container">
    <div class="row mt-5">

    <?php
    
$i=0;
while($result = mysqli_fetch_array($querydisplay)) {


?>
      <div class="col-md-3 col-12 mb-5">
        

  <div class="card" >
  
    <img class='card-img-top' src="<?php echo $result ['image']; ?>" height="130px" width="150px"> 
    <div class="card-body">
    <h5 class="card-title">Product ID:<?php echo $result ['id']; ?></h5>
      <h5 class="card-title"> Product Name:<?php echo $result ['productname']; ?></h5>
      <p class="card-text">Price:<?php echo $result ['price']; ?>:RS </p>
      <a href="#" class="btn btn-primary">Category:<?php echo $result ['category']; ?></a>
    </div>
  </div>
  </div>
  

  
 

<?php

$i++;

}


}

else {
  echo "Invalid Image Format";
  };

 

?>

</body>
</html>
