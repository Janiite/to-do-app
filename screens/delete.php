<?php 
// conectien to database
    require_once "../components/db.php";
// deleting task from table 
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $dsql = "DELETE FROM tasks WHERE id = $id";
        $result = $conn->query($dsql);
        if (!$result) {
            die('error');
        }
            header("Location: ../screens/index.php");
        }
        
   