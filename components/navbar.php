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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style/style.css" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />

    <title> Your To Do List</title>
</head>

<body>
    <!--Nav bar-->
    <div class="box2">
    <nav class="navbar navbar-light bg-light py-2 ">
        <div class="container-fluid">
            <a class="navbar-brand px-5 fs-1 " ><i class="fas fa-calendar-check"></i>  <?php echo $_SESSION['logname'];?> To Do List</a>
            

            <form action = "" method = "POST" class="d-flex px-5">
                <button name = "logout" class="btn btn-outline-primary" type="submit">Log Out</button>
            </form>
        </div>
    </nav>
</div>