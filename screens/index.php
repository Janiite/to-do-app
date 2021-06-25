<?php 
    // includeing nav br
    include 'C:\xampp\htdocs\to-do-app\components\navbar.php';

    // includeing conection to database
    require_once '../components/db.php';
    
    // conectin to tasks table
    $sql = "SELECT id, task FROM tasks";
    $result = $conn->query($sql);
    if (!$result) {
        die('error');
    }
?>

<!--Users task display -->
<div class="box">
        <div class="userTasks ">
            <table class="table ">
                <table class="table table-hover ">
                    <tbody>
                    <?php 
                        //Create loop to show all tasks form table tasks
                        while ($row = $result->fetch_assoc()) {
                            $task = $row['task'];
                            $id = $row['id'];
                    ?>
                            <tr>
                                <td class="col ">
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                                    </div>
                                </td>
                                <td class="col-8 ">
                                    <p class="text-center fs-4"> <?php echo $task;?></p>
                                </td>
                                <td class="col-3 ">
                                    <a class="btn btn-secondary" href="edit.php?id=<?php echo $row['id']?>">Edit</a>
                                    
                                    <a name = "delete" class="btn btn-danger" href="delete.php?id=<?php echo $row['id']?>">Delete </a>
                                </td>
                            </tr> 
                    <?php 
                        }
                    ?> 
                    </tbody>
                </table>
            </table>
        </div>
            <!--Create new task button-->
            <form action = "../screens/create.php" method ="POST"> 
                <button type="submit" name = "add" class="btn btn-primary btn-lg"> + create new</button>
            </form>
</div>
<?php
    // includeing footer
    include 'C:\xampp\htdocs\to-do-app\components\footer.php';
?>