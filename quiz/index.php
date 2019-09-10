<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>INVITATION QUIZ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/venobox.css" type="text/css" media="screen" />
    <link rel="stylesheet"  href="css/style.css" crossorigin="anonymous">
    <link rel="stylesheet"  href="css/responsive.css" crossorigin="anonymous">
</head>
<body>  
<div class="container ">
<div class="header">
    <div class="title">
        <p>We welcome you to</p>
        <h1>Invitation Quiz</h1>
    </div>
    <div class="option_list">
        <a href="admiLogin.php" target="_blank">
            <img src="img/admins.png" alt="admins">
            <span>Administrator</span>
        </a>

        <a class="venobox" data-autoplay="true" data-vbtype="video" href="https://youtu.be/IhU1sEfyOz8">
          <img src="img/guide.png" alt="admins">
          <span>Guideline</span>
        </a>

        <a class="check_box" href="result.php">
          <img src="img/result.png" alt="admins">
          <span>Result</span>
        </a>

        <a href="question.php">
          <img src="img/question.png" alt="question">
          <span>Questions</span>
        </a>
        <a href="join.php">
          <img src="img/request.png" alt="admins">
          <span>Joining</span>
        </a>
    </div>
</div>

<div class="footer_part">
    <div class="sponsor">
        <p>Sponsored by</p>
        <h1>Invitation English Coaching Centre</h1>
        <span>IECC was established in 2010 by M.A. Taher. IECC teaches English from class Eight to Hons.</span>
    </div>

    <div class="footer">
        <div class="row">
            <div class="col-lg-6">
                <ul class="social_link">

                    <li><a href="https://www.facebook.com/invitation.iecc" target="_blank">
                        <img src="img/arrow.png" alt="arrow">
                        <span>Invitation English Coaching</span>

                    </a>
                  </li>

                  <li><a href="https://www.facebook.com/invitation.ielts" target="_blank">
                          <img src="img/arrow.png" alt="arrow">
                          <span>Invitation IELTS Centre</span>
                      </a>
                    </li>
                    <li><a href="https://www.facebook.com/Invitation.tnt" target="_blank">
                          <img src="img/arrow.png" alt="arrow">
                          <span>Invitation Tour & Travel</span>

                      </a>
                    </li>

                </ul>
            </div>
            <div class="col-lg-6">

            <?php
            require 'php/function.php';
            $conn = pending_tb();
            $sql = "SELECT * FROM admins";
            $res = mysqli_query($conn, $sql);
            if(!$res){
                echo '<p class="con-err">Reading Error</p>';  
            }else{
                $row = mysqli_fetch_assoc($res);
                $message = $row['notice'];
            }

            ?>

                <div class="about">
                    <h2>Notice Me</h2>
                    <p><?php echo $message; ?> </p>
                </div>
            </div>
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
<script src="js/script.js"></script>
</body>
</html>