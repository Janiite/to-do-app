<?php 
    include 'C:\xampp\htdocs\to-do-app\components\navbar.php';
    require_once '../components/db.php';

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
                    while ($row = $result->fetch_assoc()) {
                        $task = $row['task'];
                        $id = $row['id'];
                        echo '<tr>
                        <td class="col ">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                            </div>
                        </td>
                        <td class="col-8 ">
                            <p class="text-center fs-4">' . $task . '</p>
                        </td>
                        <td class="col-3 ">
                            <form action = "../screens/edit.php" method = "POST">
                            <button type="submit" name = "edit" class="btn btn-warning">Edit</button>
                            <button type="button" class="btn btn-danger">Delete</button>
                         </form>
                            </td>
                    </tr>';
    }


                    ?> 
                        <tr>
                            <td class="col ">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                                </div>
                            </td>
                            <td class="col-8 ">
                                <p class="text-center fs-4">Task texst</p>
                            </td>
                            <td class="col-3 ">
                                <button type="button" class="btn btn-warning">Edit</button>
                                <button type="button" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </table>
        </div>
       
        <button type="submit" name = "add" class="btn btn-danger">create new</button>
    <?php 
        if(isset($_GET['add'])) {
                echo "Strādā";
                header("Location:../screens/create.php");
            } else {
                echo "error";
            }
    
    
    ?> 
</div>

<?php 

    

    include 'C:\xampp\htdocs\to-do-app\components\footer.php';
?>