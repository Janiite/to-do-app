<?php 
  require_once '../components/db.php';

  $allert = "";
  
  
  if(isset($_POST['submit'])) { // Subbmit button is pressed
      $name = $_POST['name'];
      $email = $_POST['email'];
      $password = $_POST['password'];

    if(!empty($email) || !empty($password) ){   // Chech if the fields is not empty

      if (filter_var($email, FILTER_VALIDATE_EMAIL)) {    // e-mail check
        $csql = "SELECT * FROM user WHERE email = '$email'";
        $result = $conn->query($csql);
            if (!$result) {
                die('error');
            }
        if(mysqli_num_rows($result) == 0){  // chech if user already exist

           

      if($_POST['password']=== $_POST['comfpass']){  // Check if passwords match 
       
        $hash = password_hash($password, PASSWORD_DEFAULT);   // Password hash
        $sql = "INSERT INTO user( name, email, password) VALUES ('$name','$email', '$hash')";  // Inserting user data in ussr table
        $result = $conn->query($sql);
     
          if (!$result) {
            die('error');
          } 
          header("Location: ../screens/login.php");
        } else {
          $allert = '
          <div class="alert alert-danger" role="alert">
          Passwords do not match!
           </div>
          ' ;
        }
     } else {
      $allert = '
      <div class="alert alert-danger" role="alert">
      Email already exists! Try logging in
       </div>
      ' ;
     }   
    }else {
      $allert = '
      <div class="alert alert-danger" role="alert">
      Please use valid email address
       </div>
      ' ;
    }
    } else {
      $allert = '
       <div class="alert alert-danger" role="alert">
       Fill in all fields!
       </div>
       ' ;
      }

  }
?> 


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../style\style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
  <title>Registration</title>
</head>

<body>
  <div class="box">
    <h1>Welcome</h1>
    <div class="regForm">
      <h3>Please register</h3>
      
      <form action = "" method = "POST" class="container mt-5">
      <div class="mb-3">
        <?php echo $allert ?>
          <label  for="exampleInputPassword1" class="form-label">Name</label>
          <input name = "name"type="text" class="form-control" />
        </div>
      <div class="mb-3 ">
          
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input name = "email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" />
        </div>
        <div class="mb-3">
          <label  for="exampleInputPassword1" class="form-label">Password</label>
          <input name = "password"type="password" class="form-control" id="exampleInputPassword1" />
        </div>
        <div class="mb-3 ">
          <label for="exampleInputPassword1" class="form-label"> Confirm Password</label>
          <input name = "comfpass" type="password" class="form-control" id="exampleInputPassword1" />
        </div>

        
        <div class = "mt-5">
        <button name = "submit"  type="submit" class="btn btn-primary  ">Register</button>
        <a  class= "mt-5 mx-3" href="login.php">Login</a>
        </div>
      </form>
    </div>
  </div>

  <?php
    // includeing footer
    include 'C:\xampp\htdocs\to-do-app\components\footer.php';
?>