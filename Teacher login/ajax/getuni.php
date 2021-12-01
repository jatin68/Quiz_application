<?php
include('connection.php');
session_start();
if(isset($_POST['token']) && password_verify("getuni",$_POST['token']))
{

        $check=$db->prepare('SELECT * FROM adduniversity');

        $data=array();

        $execute=$check->execute($data);
?>
<select name="university" id="university" class="form-control">
    <option value="0">Select University</option>
    <?php
        while($datarow=$check->fetch())
        {
    ?>
    <option value="<?php echo $datarow['uid'];?>"><?php echo $datarow['uniname'];?></option>
    <?php } ?>
</select>
<?php
 function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
}?>