<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Question</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/venobox.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href=css/question.css>
    <link rel="stylesheet" type="text/css" href=css/question.responsive.css>



</head>
<body>
<a id="home_btn" href="index.php">&#8592;</a>
 <div class="container">
     <form class="question_form" action="include/question.inc.php" method="POST">
         <div class="video">

             <a class="venobox" data-autoplay="true" data-vbtype="video" href="https://youtu.be/LC9GaXkdxF8"><img src="img/play-button.png" alt="play button"></a>

         </div>
         <?php
            if(isset($_GET['error'])){
                if($_GET['error'] === 'emptyFields'){
                    echo '<p class="emsg_r">Empty Field!</p>';
                }
                else if($_GET['error'] === 'sqlerror'){
                    echo '<p class="emsg_r">System Error!</p>';
                }
                else if($_GET['error'] === 'wrongCode'){
                    echo '<p class="emsg_r">Wrong Code! Try again</p>';
                }
                else if($_GET['error'] === 'wrongNumber'){
                    echo '<p class="emsg_r">Wrong Number! Try again</p>';
                }
                else if($_GET['error'] === 'blocked'){
                    echo '<p class="emsg_r">This Number is Blocked</p>';
                }
                else if($_GET['error'] === 'unauthorized'){
                    echo '<p class="emsg_r">Unauthorized Number</p>';
                }

            }
           
         
         ?>
         <div class="form">
             <input type="text" name='qnumber' placeholder="Mobile Number">
             <input type="password" name='qcode' placeholder="Question Code"> 
             <button class="form_btn" name="question_check_btn">Check Question</button>
             <a class="form_btn" href="https://www.facebook.com/invitationcentre.help" target="_blank">Help</a>
         </div>
     </form>
 </div>

<!-- venobox js -->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

<script src="js/venobox.min.js"></script>
<!-- custom files -->
<script>
    // venobox 
$(document).ready(function(){
    $('.venobox').venobox(); 
});
</script>
</body>
</html>