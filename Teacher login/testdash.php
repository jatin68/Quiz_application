<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
    integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="normalize.min.css">
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
	<section>
		<div class="col-sm-12" style="padding: 0%">
			<div class="col-sm-2" style="padding: 0%">                       
                <div class="heading1"><u>
                <i class="fa fa-home"></i> DASHBOARD
                </u></div>
                <div class="navbar"> 
                <ul>
                    <li>  
                        <a href="dashboard.php" id="button3" class="btn">ADD STUDENT</a>
                    </li>
                    <li>
                        <a href="testdash.php" id="button2" class="btn">ADD TEST</a>
                    </li>
                    <li>
                        <a href="questiondash.php" id="button2" class="btn">ADD QUESTION</a>
                    </li>                     
                    <li>
                        <a href="logout.php" id="button2" class="btn">LOGOUT</a>
                    </li>
                </ul>
                </div>
			</div>
			<div class="col-sm-10" style="padding: 0%">
				<div class="heading">
				<h1>Welcome <?php echo $_SESSION['tname'];?></h1>
                <h4> <?php echo $_SESSION['email'];?></h4>
			    </div>
			     <div class="col-sm-12" id="bg">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                	<form class="show" id="tform">
                            <label for="testname">ADD TEST:</label><br>
                            <input type="text" placeholder="Enter test name" class="form-control" name="testname" id="testname"><br>
                            <!-- <div class="form-group">
                            <label for="uni">UNIVERSITY: </label><br> -->
                            <!-- <select name="list2" id="list2" class="form-control" onchange="getclass();">
                                     <option value="0">Select University</option>
                            </select> 
                            </div> -->
                                <div class="form-group">
                                <label for="tclass">CLASS: </label><br>
                                <!--<div class="contain-input">
                                    <div class="list1" id="list1"></div>
                                </div>-->
                                <select name="list1" id="list1" class="form-control" >
                                     <option value="0">Select class</option>
                                 </select>
                            </div>
                            <div class="button1">
                                <button class="button" onclick="addtest();">SUBMIT</button>
                            </div>
                    </form>
                    
  
                </div>
                <div class="col-sm-3"></div>
            </div>
            </div>
		</div>
	</section>

<script type="text/javascript">
   

    function addtest() {
        var testname = document.getElementById('testname').value;
        var uniclass = document.getElementById('list1').value;
        var token = "<?php echo password_hash("testtoken", PASSWORD_DEFAULT);?>"
        if (testname !== "" && uniclass != "") {
            $.ajax(
                {
                    type: 'POST',
                    url: "ajax/addtest.php",
                    data: { testname:testname, uniclass: uniclass, token:token },
                    success: function (data) {
                        if (data == 0) {
                            alert('test added successfully');
                            window.location = "testdash.php";
                        }
                    }
                }
            );
        }
        else {
            alert('fill all fields');
        }
    }

 
    // getuni()
    // function getuni()
    // {
    //     var token = "<?php echo password_hash("getuni", PASSWORD_DEFAULT);?>";

    //     $.ajax(
    //         {
    //             type: 'POST',
    //             url: "ajax/getuni1.php",
    //             data: {token:token},
    //             success: function (data) 
    //             {
    //                 $('#list2').html(data);

    //             }
    //         });
    // }

    getclass();
    function getclass()
    {
        var classid= <?php echo $_SESSION['class']; ?>;
        var token = "<?php echo password_hash("getclass", PASSWORD_DEFAULT);?>"
        $.ajax(
            {
                type: 'POST',
                url: "ajax/getclass.php",
                data: {token:token,classid:classid},
                success: function (data) 
                {
                    $('#list1').html(data);
                }
            });
    }


 
</script>
<script type=text/javascript>
 $('form').submit(function(e){
     e.preventDefault();
 });
</script>

</html>












