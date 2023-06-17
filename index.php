<?php
include 'model.php';

$obj = new Model();

if(isset($_POST['submit'])){
   $obj->insertRecord($_POST);
}

if(isset($_POST['update'])){
    $obj->updateRecord($_POST);
 }
if(isset($GET['deleted'])){
    $delid = $_GET['deleted'];
    $obj->deleteRecord($delid);
}


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" >

    <title>Crud oeration</title>
  </head>
  <body>
    <div class="container my-5">
        <?php
        if(isset($_GET['msg']) AND $_GET['msg']=='ins'){
            echo '<div class="alert alert-primary" role="alert">
            Record inserted Successfully..
          </div>';
        }
        if(isset($_GET['msg']) AND $_GET['msg']=='ups'){
            echo '<div class="alert alert-primary" role="alert">
            Record updated Successfully..
          </div>';
        }
        if(isset($_GET['msg']) AND $_GET['msg']=='del'){
            echo '<div class="alert alert-primary" role="alert">
            Record Deleted Successfully..
          </div>';
        }
        ?>
        <?php
        if(isset($_GET['editid'])){
    $editid = $_GET['editid'];
    $myrecord = $obj->displayRecordByID($editid);
    ?>
    <form action="index.php" method="POST">
        <div class="form-group">
           <label>Name</label>
           <input type="text" class="form-control"  placeholder="Enter Name" name="name" value="<?php echo $myrecord=null;?>">
        </div>
        <div class="form-group">
           <label>Email</label>
           <input type="text" class="form-control"  placeholder="Enter Email" name="email" value="<?php echo $myrecord=null;?>">
        </div>
        <div class="form-group">
           <label>Password</label>
           
           <input type="text" class="form-control"  placeholder="Enter Password" name="password" value="<?php echo $myrecord=null;?>">
        </div>
        <input type = "hidden" name="hid" value="<?php echo $myrecord['id'];?>">
        <button type="submit" name="update" class="btn btn-primary">Submit</button>
    </form>

    <?php
    }else{
    ?>
    <form action="index.php" method="POST">
        <div class="form-group">
           <label>Name</label>
           <input type="text" class="form-control"  placeholder="Enter Name" name="name">
        </div>
        <div class="form-group">
           <label>Email</label>
           <input type="text" class="form-control"  placeholder="Enter Email" name="email">
        </div>
        <div class="form-group">
           <label>Password</label>
           <input type="text" class="form-control"  placeholder="Enter Password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php }    ?>

    
    <h4 class="text-center text-danger">Display Record</h4>
    <table class="table table-bordered">
        <tr class="bg-primary text-center">
            <th>S.No1</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Action</th>
        </tr>
        <?php
        $data = $obj->displayRecord();
        $sno=1;
        foreach($data as $value){
            ?>
            <tr class="text-center">
                <td><?php echo $sno++;?></td>
                <td><?php echo $value['name'];?></td>
                <td><?php echo $value['email'];?></td>
                <td><?php echo $value['password'];?></td>
                <td>
                    <a href="index.php?editid=<?php echo $value['id']; ?>" class="btn btn-info">Edit</a>
                    <a href="index.php?deleteid=<?php echo $value['id']; ?>" class="btn btn-danger">Delete</a>
                </td>

            </tr>

            <?php
        }
        ?>
                
    </table>
    </div>

    </body>
</html>

        

    
  
  


    


    
  