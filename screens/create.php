<?php
// include conection to database
require_once "../components/db.php";

//Save tasks when create is clicked 
if (isset($_POST['create'])) {
    $task = $_POST['task'];
    $status = "false";
    //$user_id = $_POST['user_id'];

    $sql = "INSERT INTO tasks (task, status) VALUES ('$task', '$status')";
    $result = $conn->query($sql);
    if (!$result) {
        die('error');
    }
   
   header("Location: ../screens/index.php");
}
?>

<!--Create  view-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style\style.css" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />

    <title>Create tasks</title>
</head>

<body>
    <div class="box">
        <h1>Add new task</h1>
        <div class="newTask">

            <form action = "" method = "POST" class="container mt-5">
                <div class="form-floating mb-3">
                    <input type="text"  name = "task" class="form-control" id="floatingInput" placeholder="new task">
                    <label for="floatingInput">New task</label>
                </div>

                <button type="submit"  name = "create" class="btn btn-primary mt-5">Create</button>
            </form>
        </div>
    </div>


</body>

</html>