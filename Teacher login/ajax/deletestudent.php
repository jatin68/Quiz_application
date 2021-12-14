<<?php
include('connection.php');
if(isset($_POST['token']) && password_verify("deletestudent",$_POST['token']))
{
    $id=test_input($_POST['id']);

   
        $query=$db->prepare("Delete from addstudent where sid=?");
        $data=array($id);
        $execute=$query->execute($data);
        if($execute)
        {
            echo 0;
        }
        else
        {
            echo"something went wrong";
        }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>
