<?php
include('connection.php');
session_start();
if(isset($_POST['token']) && password_verify("getstudent",$_POST['token']))
{
   
        $query=$db->prepare('SELECT * FROM addstudent JOIN addclass ON addstudent.class=addclass.id JOIN adduniversity ON addclass.uid=adduniversity.uid;');
        $data=array();
        $execute=$query->execute($data);
        ?>
        <table class="table table-striped table-bordered table-dark">
            <tr>
                <td>Sr.no</td>
                <td>Name</td>
                <td>Email</td>
                <td>Class</td>
                <td>University</td>
                <td>Delete</td>
            </tr>
        <?php
            $Srno=1;
        while($datarow=$query->fetch())
        {
            ?>
            <tr>
                <td><?php echo $Srno?></td>
                <td><?php echo $datarow['sname']?></td>
                <td><?php echo $datarow['email']?></td>
                <td><?php echo $datarow['class']?></td>
                <td><?php echo $datarow['uniname']?></td>
                <td><button onclick="deleted(this.value);" class="contact-delete" value="<?php echo $datarow['sid']?>">Delete</button>
            </tr>
            <?php
            $Srno++;
        }
    }
  ?>