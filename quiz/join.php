<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Join</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/venobox.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/join.css">
    <link rel="stylesheet" href="css/join.responsive.css">
</head>
<body>
    <a id="home_btn" class="cbb" href="index.php">&#8592;</a>

<div class="container">
<div class="all_content">
   <div class="row ddd">
       <div class="col-lg-5 p-lg-5 p-sm-5 left">
           <div class="join_rules">
               <h2>Before you join .. .. </h2>

                <a class="venobox" data-autoplay="true" data-vbtype="video" href="https://youtu.be/r7OQQA4Z-jg">WATCH THIS</a>
                <a href="https://www.facebook.com/invitationcentre.help" target="_blank">GET HELP</a>

               <ul>
                   <li>You must fill up the form with correct information.</li>

                   <li>If you can't find your facebook url, contact us. We will be happy to help you.</li>

                   <li>You must enter your full name for the registration.</li>

                   <li>Less than 11 digits of phone number won’t be accepted.</li>

                   <li> Your mobile number must be active and can’t be used for more than once.</li>

                   <li>We recommend you to use information according to your school’s/college’s/university’s id card. </li>

                   <li>Empty form won’t be accepted.</li>

                   <li>After filling up the form send us a facebook friend request.</li>

                   <li>You will have notification through facebook or via SMS about your request.</li>

                   <li>If you face any problem, feel free to contact us.</li>

                   <p>Thank you for reading </p>
               </ul>
           </div>
       </div>
       <div class="col-lg-7 p-lg-5 p-sm-5 ppp">
           <form class="info_check" action="infoCheck.php" method="POST">
                <?php
                  $msg = '<h4>Check Information</h4>';
                   if(isset($_GET['error'])){
                       if($_GET['error'] === 'sqlerror'){
                           $msg = '<h4 style="color:red">System Error</h4>';
                       }
                       else if($_GET['error'] === 'empty'){
                        $msg = '<h4 style="color:red">Empty Field</h4>';
                      }
                      else if($_GET['error'] === 'nouser'){
                        $msg = '<h4 style="color:red">Found Nothing!</h4>';
                      }
                   }
                
                   echo $msg;
                ?>
                

                <input type="text" name="checkNumber" placeholder="Enter Mobile Number">
                <button type="submit" name='check'>
                    <img src="img/arrow.png" alt="arrow">
                </button>
           </form>
           <form class='rForm' action="joinMsg.php" method="post">
               <h4>Send joining request</h4>
               <p>Full Name</p>
               <input type="text" name="name" placeholder="Your Full Name">

               <p>Institution Name</p>
               <input type="text" name="institute" placeholder="Institution Name">

               <p>Mobile Number</p>
               <input type="text" name="mobile_number" placeholder="Mobile Number">

               <p>Facebook URL</p>
               <input type="text" name="url" placeholder="e.g. www.facebook.com/jhonedoe">

               <P>Gender</P>
               <label for="male" class="gender_label">MALE
                   <input id="male" type="radio" checked="checked" name="gender" value="male">
                   <span class="checkmark"></span>
               </label>

               <label for="female" class="gender_label">FEMALE
                   <input id="female" type="radio" name="gender" value="female">
                   <span class="checkmark"></span>
               </label>

               <P>Student of</P>
               <label for="school" class="gender_label">SCHOOL
                   <input id="school" type="radio" checked="checked" name="student" value="School">
                   <span class="checkmark"></span>
               </label>

               <label for="college" class="gender_label">COLLEGE
                   <input id="college" type="radio" name="student" value="College">
                   <span class="checkmark"></span>
               </label>

               <label for="university" class="gender_label">UNIVERSITY/DIPLOMA
                   <input id="university" type="radio" name="student" value="University/Diploma">
                   <span class="checkmark"></span>
               </label>

               <p>Location</p>
               <input type="text" name="location" placeholder="Your location">

               <button id='submit_btn' type="submit" name='request_btn'>Request to Join</button>
           </form>
       </div>
   </div>
</div>
</div>


<!-- all bootstrap script files are here -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
<!-- custom files -->
<script src="js/join.js"></script>
</body>
</html>