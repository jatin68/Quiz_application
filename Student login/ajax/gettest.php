<?php
include('connection.php');
session_start();
if(isset($_POST['token']) && password_verify("gettest",$_POST['token']))
{
   
        $query=$db->prepare('SELECT * FROM addquestion');
        $data=array();
        $execute=$query->execute($data);
        ?>

        <?php
            $Srno=1;
        while($datarow=$query->fetch())
        {
            ?>
            <p><?php echo $datarow['id'];?>.<?php echo $datarow['question'];?></p>
            <input name="radio" type="radio" value="<?php echo $datarow['id'];?>">
            <label><?php echo $datarow['opt1'];?></label><br>
            <input name="radio" type="radio" value="<?php echo $datarow['id'];?>">
            <label><?php echo $datarow['opt2'];?></label><br>
            <input name="radio" type="radio" value="<?php echo $datarow['id'];?>">
            <label><?php echo $datarow['opt3'];?></label><br>
            <input name="radio" type="radio" value="<?php echo $datarow['id'];?>">
            <label><?php echo $datarow['opt4'];?></label>
            <?php
            $Srno++;
        } ?>
        </table>
        <?php


}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  ?>