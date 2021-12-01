<?php
include('connection.php');
session_start();
if(isset($_POST['token']) && password_verify("testtoken",$_POST['token']))
{
    $testname=test_input($_POST['testname']);
    $class=test_input($_POST['uniclass']);

    $query = $db->prepare('SELECT * FROM addtest where testname=?');
    $data=array($testname);
    $execute=$query->execute($data);
    if($query->rowcount()>0)
    {
        echo"test already exist";
    }
    else
    {
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