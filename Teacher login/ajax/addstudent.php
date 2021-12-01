<?php
include('connection.php');
session_start();
if(isset($_POST['token']) && password_verify("teachertoken",$_POST['token']))
{
    $sname=test_input($_POST['sname']);
    $class=test_input($_POST['uniclass']);
    $email=test_input($_POST['email']);
    

    $query = $db->prepare('SELECT * FROM addstudent where email=?');
    $data=array($email);
    $execute=$query->execute($data);
    if($query->rowcount()>0)
    {
        echo"student already exist";
    }
    else
    {
        if($sname!="")
        {
        $password1_hash=password_hash(substr($sname,0,4)."7055", PASSWORD_DEFAULT);
        $query=$db->prepare("INSERT INTO addstudent(sname,class,email,password) VALUES (?,?,?,?)");
        $data=array($sname,$class,$email,$password1_hash);
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