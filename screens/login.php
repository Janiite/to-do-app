<?php 
    require_once '../components/db.php';
    
    $allert = "";

    if (isset($_POST['login'])) {
        session_start();
        $logemail = $_POST['logemail'];
        $logpassword = $_POST['logpassword'];

        $lsql = "SELECT * FROM user WHERE email = '$logemail'";
        $result = $conn->query($lsql);
            if (!$result) {
                die('error');
            }

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $_SESSION['logname']= $row['name'];
            $_SESSION['logemail'] = $row['email'];
            $user_id = $_SESSION['userid']= $row['user_id'];
            if (password_verify($logpassword, $row['password'])) {
                
               header("Location: ../screens/index.php");
            }else {
                $allert = '
            <div class="alert alert-danger" role="alert">
            Wrong password!
             </div>
            ' ;
            }

        }else {
            $allert = '
            <div class="alert alert-danger" role="alert">
            User not found!
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
  <title>Login</title>
</head>

<body>
  <div class="box">
    <h1>Welcome</h1>
    <div class="regForm">
      <h3>Please Login</h3>
      
      <form action = "" method = "POST" class="container mt-5">
        <div class="mb-3 "><?php echo $allert ?>
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input name = "logemail" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" />
        </div>
        <div class="mb-3">
          <label  for="exampleInputPassword1" class="form-label">Password</label>
          <input name = "logpassword"type="password" class="form-control" id="exampleInputPassword1" />
        </div>
       

        
        <div class = "mt-5">
        <button name = "login"  type="submit" class="btn btn-primary  ">Login</button>
        <a  class= "mt-5 mx-3" href="register.php">Register</a>
        </div>
      </form>
    </div>
  </div>

</body>

</html>