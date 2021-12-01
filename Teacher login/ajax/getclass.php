<?php
include('connection.php');
session_start();
if(isset($_POST['token']) && password_verify("getclass",$_POST['token']))
{
    $cid = $_POST['classid'];
    $query=$db->prepare('SELECT * FROM addclass where id=?');
    $data=array($cid);
    $execute=$query->execute($data);
?>
<select name="class" id="class" class="form-control">
    <option value="0">Select Class</option>
    <?php
        while($datarow=$query->fetch())
        {
    ?>
    <option value="<?php echo $datarow['id'];?>"><?php echo $datarow['class'];?></option>
    <?php } ?>
</select>
<?php

    }

?>
   