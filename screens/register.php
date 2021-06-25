<?php 
  require_once '../components/db.php';

  $allert = "";
  
     
  if(isset($_POST['submit'])) {
    if($_POST['password']=== $_POST['comfpass']){
       $email = $_POST['email'];
       $password = $_POST['password'];
       $hash = password_hash($password, PASSWORD_DEFAULT);
      $sql = "INSERT INTO user( email, password) VALUES ('$email', '$hash')";
      $result = $conn->query($sql);
     
          if (!$result) {
            die('error');
          } 
          header("Location: ../screens/index.php");
    } else {
       $allert = '
       <div class="alert alert-danger" role="alert">
       Passwords do not match!
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
      <?php echo $allert ?>
      <form action = "" method = "POST" class="container mt-5">
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

        <button name = "submit"  type="submit" class="btn btn-primary mt-5">Submit</button>
      </form>
    </div>
  </div>

</body>

</html>