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
			<div class="col-sm-2" style="padding: 0%;">                       
                <div class="heading1"><u>
                    <i class="fa fa-home"></i> DASHBOARD</u>
                </div>
                <div class="navbar" > 
                <ul>
                    <li>  
                        <a href="dashboard.php" id="button3" class="btn">Select Quiz</a>
                    </li>
                    <li>
                        <a href="logout.php" id="button2" class="btn">LOGOUT</a>
                    </li>                    

                </ul>
                </div>
			</div>
			<div class="col-sm-10" style="padding: 0%">
				<div class="heading">
				    <h1>Welcome <?php echo $_SESSION['sname'];?></h1>
                    <h4> <?php echo $_SESSION['email'];?></h4>
			    </div>
			    <div class="col-sm-12" id="bg">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                	    <form class="show" id="tform">
                            <div class="box-footer">
                                <div class="teacherlist" id="teacherlist"></div>
                            </div>                            
                        </form>
                    </div>
                    <div class="col-sm-3"></div>
                </div>         
		    </div>
        </div>
	</section>

<script type="text/javascript">
   
   gettest()
    function gettest()
    {
        var token='<?php echo password_hash("gettest", PASSWORD_DEFAULT);?>';

        $.ajax(
        {
            type:'POST',
            url:"ajax/gettest.php",
            data:{token:token},
            success:function(data)
            {
                $('#teacherlist').html(data);
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












