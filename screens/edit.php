<?php 
session_start();
// session check
if (!isset($_SESSION['userid'])){
    header("Location:login.php");
}

// conecting to database
require_once "../components/db.php";

// Geting id to uptade task
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $esql = "SELECT * FROM  tasks  WHERE id = $id";
    $result = $conn->query($esql);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $task = $row['task'];

      }
}

// updating task in tasks table
if(isset($_POST['update'])) {
    
    $task = $_POST['task'];
    $usql = "UPDATE tasks set task = '$task' WHERE id=$id";
    $result = $conn->query($usql);
        if (!$result) {
            die('error');
        } 
    header("Location:index.php");
}


?> 

<!--Edite  view-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />

    <title>Edit tasks</title>
</head>

<body>
    <div class="box">
        <h1>Edit task</h1>
        <div class="newTask">

            <form action = "" method = "POST" class="container mt-5">
                <div class="form-floating mb-3">
                    <input  name = "task" type="text" class="form-control" id="floatingInput" placeholder="task" value = "<?php echo $task; ?>">
                    <label for="floatingInput">Task</label>
                </div>

                <button type="submit" name = "update" class="btn btn-primary mt-5">Update</button>
            </form>
        </div>
    </div>


</body>
</html>