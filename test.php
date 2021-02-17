<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Test 1</title>
    <?php require 'dbconfig.php';
session_start(); ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style2.css">
</head>

<body>
<div class="wrapper">
<!-- Side Navbar -->
    <nav id="sidebar">
        <div class="sidebar-header">
        </div>
        <ul class="list-unstyled components">
            <li>
                <a href="test.php">Start Test</a>
            </li>
            <li>
                <a href="result.php">Result</a>
            </li>
            <li>
                <a href="contact.php">Contact</a>
            </li>
        </ul>
    </nav>
<!-- Navbar End -->

    <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left" src></i>
                    </button>
                </div>
            </nav>
            <h5 class="text-muted mt-3 mb-3 font-weight-light"><br>Correct Answer = +1<br>Incorrect Answer = 0.5</h5>
            <div class="time text-center font-weight-bold" id="navbar">Time Left :<span id="timer"></span></div>
            <div class="text-center">
            <button class="btn btn-primary mt-3" id="mybut" onclick="myFunction()">START QUIZ</button></div>


    <div id="myDIV" style="padding: 10px 30px;">
        <form action="result.php" method="post" id="form">  				
            <table>
                <?php   $fetchqry = "SELECT * FROM `quiz`";
				    $result=mysqli_query($con,$fetchqry);
				    $num=mysqli_num_rows($result);
				   while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
		  ?>
  <tr><td><h3 class="font-weight-light"><br><?php echo @$snr +=1;?>&nbsp;-&nbsp;<?php echo @$row['que'];?></h3></td></tr>
  <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;a )&nbsp;&nbsp;&nbsp;<input required type="radio" name="<?php echo $snr;?>" value="<?php echo $row['option 1'];?>">&nbsp;<?php echo $row['option 1']; ?><br>
  <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;b )&nbsp;&nbsp;&nbsp;<input required type="radio" name="<?php echo $snr;?>" value="<?php echo $row['option 2'];?>">&nbsp;<?php echo $row['option 2'];?></td></tr>
  <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;c )&nbsp;&nbsp;&nbsp;<input required type="radio" name="<?php echo $snr;?>" value="<?php echo $row['option 3'];?>">&nbsp;<?php echo $row['option 3']; ?></td></tr>
  <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;d )&nbsp;&nbsp;&nbsp;<input required type="radio" name="<?php echo $snr;?>" value="<?php echo $row['option 4'];?>">&nbsp;<?php echo $row['option 4']; ?><br><br><br></td></tr>
			    <?php  }
					?> 
		<tr><td style="text-align:center;"><button class="btn btn-primary button3" name="click" >Submit Quiz</button></td></tr>
	</table>
    <form>
    </div>
    <script>
        function myFunction() {
	        var x = document.getElementById("myDIV");
            var b = document.getElementById("mybut");
            var x = document.getElementById("myDIV");
	        if (x.style.display === "none") { 
	        b.style.visibility = 'hidden';
	        x.style.display = "block";
	        startTimer();
        }
    }
    window.onload = function() {
    document.getElementById('myDIV').style.display = 'none';
    };
    </script>
    <?php			
        $fetchtime = "SELECT `timer` FROM `quiz` WHERE id=1";
		$fetched = mysqli_query($con,$fetchtime);
		$time = mysqli_fetch_array($fetched,MYSQLI_ASSOC);
        $settime = $time['timer'];		
    ?>
    <script type="text/javascript">
 
    document.getElementById('timer').innerHTML = '<?php echo $settime; ?>';
 
    function startTimer() {
        var presentTime = document.getElementById('timer').innerHTML;
        var timeArray = presentTime.split(/[:]+/);
        var m = timeArray[0];
        var s = checkSecond((timeArray[1] - 1));
        if(s==59){m=m-1}
        if(m==0 && s==0){document.getElementById("form").submit();}
        document.getElementById('timer').innerHTML =
        m + ":" + s;
        setTimeout(startTimer, 1000);
    }
 
    function checkSecond(sec) {
        if (sec < 10 && sec >= 0) {sec = "0" + sec};
        if (sec < 0) {sec = "59"};
        return sec;
        if(sec == 0 && m == 0){ alert('stop it')};
    }
    </script>
 
    <script>
    window.onscroll = function() {myFun()};
    var navbar = document.getElementById("navbar");
    var sticky = navbar.offsetTop -50;
 
    function myFun() {
        if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky")
    } else {
        navbar.classList.remove("sticky");
    }
    }
    </script>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>

</body>
</html>