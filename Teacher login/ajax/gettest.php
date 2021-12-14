<?php
include('connection.php');
session_start();
if(isset($_POST['token']) && password_verify("gettest",$_POST['token']))
{
    $cid=$_POST['classid'];

        $check=$db->prepare('SELECT * FROM addtest where class=?');

        $data=array($cid);

        $execute=$check->execute($data);
?>
<select name="testname" id="testname" class="form-control">
    <option value="0">Select Test</option>
    <?php
        while($datarow=$check->fetch())
        {
    ?>
    <option value="<?php echo $datarow['id'];?>"><?php echo $datarow['testname'];?></option>
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