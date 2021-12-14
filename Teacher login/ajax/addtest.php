<?php
include('connection.php');
session_start();
if(isset($_POST['token']) && password_verify("testtoken",$_POST['token']))
{
    $testname=test_input($_POST['testname']);
    $class=test_input($_POST['uniclass']);

        if($testname!="")
        {
        $query=$db->prepare("INSERT INTO addtest(testname,class) VALUES (?,?)");
        $data=array($testname,$class);
        $execute=$query->execute($data);
        if($execute)
        {
            echo 0;
        }
        else{
            echo"something went wrong";
        }
    }

}
else{
    echo "server error";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>