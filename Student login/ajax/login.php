<?php
include('connection.php');
session_start();
if(isset($_POST['token']) && password_verify("logintoken",$_POST['token']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

        $query = $db->prepare('SELECT * FROM addstudent WHERE email=?');
        $data = array($email);
        $execute = $query->execute($data);
        if($query->rowcount()>0)
        {
            while($datarow=$query->fetch())
            {
                if(password_verify($password,$datarow['password']))
                {
                    $_SESSION['sname']=$datarow['sname'];
                    $_SESSION['email']=$datarow['email'];
                    echo 0;
                }
                else
                {
                    echo 'wrong password';
                               
                }
            }
        }
        else
        {
            echo "Plese signup first no data found";
        }
}
else
{
    echo("server error");
}
?>