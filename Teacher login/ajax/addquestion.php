<?php
include('connection.php');
session_start();
if(isset($_POST['token']) && password_verify("questiontoken",$_POST['token']))
{
    $testname=test_input($_POST['testname']);
    $question=test_input($_POST['question']);
    $opt1=test_input($_POST['opt1']);
    $opt2=test_input($_POST['opt2']);
    $opt3=test_input($_POST['opt3']);
    $opt4=test_input($_POST['opt4']);
    $correct=test_input($_POST['correct']);

   
    
        $query=$db->prepare('INSERT INTO addquestion(testname,question,opt1,opt2,opt3,opt4,correct) VALUES (?,?,?,?,?,?,?)');

        $data=array($testname,$question,$opt1,$opt2,$opt3,$opt4,$correct);

        $execute=$query->execute($data);
        if($execute)
        {
            echo 0;
        }
        else{
            echo 2;
        }

}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>

