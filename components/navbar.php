<?php session_start();

if (!isset($_SESSION['userid'])){
    header("Location:login.php");
}
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: ../screens/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="../style/style.css" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />

    <title> Your To Do List</title>
</head>

<body>
    <!--Nav bar-->
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand px-5"><?php echo $_SESSION['logname'];?> To Do List</a>
            

            <form action = "" method = "POST" class="d-flex px-5">
                <button name = "logout" class="btn btn-outline-success" type="submit">Log Out</button>
            </form>
        </div>
    </nav>