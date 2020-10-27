<?php 

// include('./connection.php');

if (isset($_POST['submit'])) {
  
  if ($_POST['type'] == 'add') {
    
    $name = $_POST['name'];
    $cognitive = $_POST['cognitive'];

    $sql = "INSERT INTO taxonomy (`name`,`cognitive`) VALUES('$name','$cognitive')";
    $query = MYSQLI_QUERY($connect,$sql);

    if($query){
      $result = notification('success','Add');;
    }
  } elseif ($_POST['type'] == 'edit') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $cognitive = $_POST['cognitive'];
    $sql = "UPDATE taxonomy SET `name` = '$name', `cognitive`='$cognitive' WHERE id= '$id' ";
    $query = MYSQLI_QUERY($connect,$sql);

    if($query){
      $result = notification('success','Edit');
    }
  } else {
    $id = $_POST['id'];
    $sql = "DELETE FROM taxonomy WHERE id= '$id' ";
    $query = MYSQLI_QUERY($connect,$sql);

    if($query){
      $result = notification('success','Delete');
    }
  }
}

function notification($type,$message)
{
  if ($type = 'success') {
    return '<div class="alert alert-success alert-dismissible" role="alert" id="flash-msg">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Success!</strong> '.$message.' the data.
            </div>';
  } else {
    return '<div class="alert alert-danger alert-dismissible" role="alert" id="flash-msg">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Error!</strong> '.$message.' the data.
            </div>';
  }
}



?>