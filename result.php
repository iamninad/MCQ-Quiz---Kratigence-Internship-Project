<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Simple Online Quiz">
    <meta name="author" content="Val Okafor">   
    <title>Simple Quiz</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <link href="css/theme.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style2.css">
  </head>

  

<body>
<div class="wrapper">
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
    <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left" src></i>
                    </button>
                </div>
            </nav>
            <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    <?php
        include 'dbconfig.php';
        $fetchqry = "SELECT * FROM `quiz`";
        $result=mysqli_query($con,$fetchqry);
        $num=mysqli_num_rows($result);
        $i=1;
        for($i;$i<=$num;$i++){
            @$userselected = $_POST[$i];
            $fetchqry2 = "UPDATE `quiz` SET `userans`='$userselected' WHERE `id`=$i"; 
            mysqli_query($con,$fetchqry2);
        } 
        $qry3 = "SELECT `ans`, `userans` FROM `quiz`;";
        $result3 = mysqli_query($con,$qry3);
        while($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
            if($row3['ans']==$row3['userans']){
	            @$_SESSION['score'] += 1 ;
            }
            else{
                @$_SESSION['negscore'] += 1;
            }
        }
    ?> 
    <div class="col-md-offset-2 col-md-8">
        <h2>Result:</h2><br><br>
        <span><p class="font-weight-light">No. of Correct Answers:</p>&nbsp;
        <?php  echo $no = @$_SESSION['score'];   ?>
        <p class="font-weight-light">No. of Incorrect Answers:</p>&nbsp;
        <?php  echo $nno = @$_SESSION['negscore'];   ?>
        </span><br>
        <span><p class="font-weight-light">Your Score:</p>&nbsp<?php if(isset($no) && isset($nno)) echo $no-$nno/2; ?></span>
    </div>
    </div>
</body>
</html>
