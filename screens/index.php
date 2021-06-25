<?php 
    include 'C:\xampp\htdocs\to-do-app\components\navbar.php';
    require_once '../components/db.php';
    session_start();

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
                        if(isset($_POST['edit'])){
                            $_SESSION['id'] = $id;
                        } ?>

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
                        <a class="btn btn-secondary" href="edit.php?id=<?php echo $row['id']?>">Edit
                      </a>
                      <a class="btn btn-danger" href="edit.php?id=<?php echo $row['id']?>">Delete
                      </a>

                         </form>
                            </td>
                        </tr> 
                   <?php }


                    ?> 
                        

                    </tbody>
                </table>
            </table>
        </div>
        <form action = "../screens/create.php" method ="POST"> 
        <button type="submit" name = "add" class="btn btn-primary btn-lg"> + create new</button>
        </form>
    
</div>

<?php 

    

    include 'C:\xampp\htdocs\to-do-app\components\footer.php';
?>