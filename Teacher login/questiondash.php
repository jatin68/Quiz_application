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
                        <div class="form-group">
                            <label for="test">TEST NAME: </label><br>
                            <!-- <div class="contain-input">
                                <div class="list3" id="list3"></div>
                            </div> -->
                            <select name="list3" id="list3" class="form-control">
                                    <option value="0">SELECT TEST</option>
                            </select>
                        </div>
                        <h4><b>
                        Select file :</b>
                        </h4>
                        <input type="file"  name="excel" id="excel"><br>
                        <div class="button1">
                        <input type="submit" id="submit" value="submit" name="submit" class="button" onclick="adddata()">
                        </div>

                        <!-- <label for="question">QUESTION:</label><br>
                        <textarea type="text" placeholder="Enter question" class="form-control" name="question" id="question"></textarea><br>
                        <label for="opt1">OPTION 1:</label><br>
                        <input type="text" placeholder="Enter option 1" class="form-control" name="opt1" id="opt1"><br>
                        <label for="opt2">OPTION 2:</label><br>
                        <input type="text" placeholder="Enter option 2" class="form-control" name="opt2" id="opt2"><br>
                        <label for="opt3">OPTION 3:</label><br>
                        <input type="text" placeholder="Enter option 3" class="form-control" name="opt3" id="opt3"><br>
                        <label for="opt4">OPTION 4:</label><br>
                        <input type="text" placeholder="Enter option 4" class="form-control" name="opt4" id="opt4"><br>
                        <label for="correct">CORREST OPTION:</label><br>
                        <input type="text" placeholder="Enter correct opt" class="form-control" name="correct" id="correct"><br>
                        <div class="button1">
                            <button class="button" onclick="addquestion();">SUBMIT</button>
                        </div> -->
                    </form>
                </div>
                <div class="col-sm-3"></div>
            </div>         
        </div>
    </div>
    </section>

<script type="text/javascript">
    // function addquestion() {
    //     var testname= document.getElementById('testname').value;
    //     var question = document.getElementById('question').value;
    //     var opt1 = document.getElementById('opt1').value;
    //     var opt2 = document.getElementById('opt2').value;
    //     var opt3 = document.getElementById('opt3').value;
    //     var opt4 = document.getElementById('opt4').value;
    //     var correct = document.getElementById('correct').value;
    //    var token = "<?php echo password_hash("questiontoken", PASSWORD_DEFAULT);?>"
    //     if (question !== "" && opt1 !== "" && opt2 !=="" && opt3 !== "" && opt4 !== "" && correct !== "") {
    //         $.ajax(
    //             {
    //                 type: 'POST',
    //                 url: "ajax/addquestion.php",
    //                 data: { testname:testname , question:question , opt1:opt1 , opt2:opt2 , opt3:opt3 , opt4:opt4 , correct:correct ,token:token },
    //                 success: function (data) {
    //                     if (data == 0) {
    //                         alert('question added successfully');
    //                         window.location = "questiondash.php";
    //                     }
    //                 }
    //             }
    //         );
    //     }
    //     else {
    //         alert('fill all fields');
    //     }
    // }
    function adddata() {
        var tform = document.getElementById('tform');
        var data = new FormData(tform);
        var token = "<?php echo password_hash("addstudent", PASSWORD_DEFAULT); ?>"
            $.ajax({
                type: 'POST',
                url: "ajax/excel.php",
                    contentType:false,
                    processData:false,
                    data: data,
                    success: function(data) {
                    alert(data);
                    if (data == 0) {
                        alert('data added successfully');
                        window.location = "questiondash.php";
                    }
                }
            });

    }
    gettest();
    function gettest()
    {
        var classid = <?php echo $_SESSION['class']; ?>;
        var token = "<?php echo password_hash("gettest", PASSWORD_DEFAULT);?>";

        $.ajax(
            {
                type: 'POST',
                url: "ajax/gettest.php",
                data: {classid:classid,token:token},
                success: function (data) 
                {
                    $('#list3').html(data);

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












