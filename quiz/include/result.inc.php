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
    <link rel="stylesheet" type="text/css" href=../css/question.css>
    <link rel="stylesheet" type="text/css" href=../css/question.responsive.css>
</head>
<body> 
  <div class="container">
      <?php
         if(isset($_POST['result_check_btn'])){
            require '../php/function.php';
            $conn = pending_tb();
           
    $season = validate($_POST['season_num']);
    $mobile = validate($_POST['mobile_num']);

    if(empty($season) || empty($mobile)){
        header('location:../result.php?error=emptyFields');
        exit();
    }else{

        $check = "SELECT * FROM result WHERE season = $season AND mobile = $mobile";
        $stmt  = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $check);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $num = mysqli_stmt_num_rows($stmt);

        if($num > 0){

            $member = "SELECT * FROM members WHERE mobile = ?";
            $stmt   = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $member)){
                header('location:../result.php?error=sqlerror');
                exit();
            }else{
                mysqli_stmt_bind_param($stmt, 's', $mobile);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $check_num = mysqli_stmt_num_rows($stmt);

                if($check_num < 1){
                    header('location:../result.php?error=Unauthorized');
                    exit();
                }else{
                    $get   = "SELECT * FROM members WHERE mobile = $mobile";
                    $get_m = mysqli_query($conn, $get);

                    if($mem = mysqli_fetch_assoc($get_m)){
                        if($mem['status'] === 'blocked'){
                            header('location:../result.php?error=blocked');
                            exit();
                        }else{

                            $name = $inst = $mobi = $gend = $type = $status = '';
                            $score = $out_of = $posi = $seasons = $date = $location = '';

                            $name   = $mem['name'];
                            $inst   = $mem['institute'];
                            $mobi   = $mem['mobile'];
                            $gend   = $mem['gender'];
                            $type   = $mem['student'];
                            $status = $mem['status'];
                            $location = $mem['location'];

                        

                            $sql = "SELECT * FROM result WHERE season = $season AND mobile = $mobile";
                            $query = mysqli_query($conn, $sql);

                            if($row = mysqli_fetch_assoc($query)){

                                $seasons = $row['season'];
                                $score = $row['score'];
                                $out_of = $row['out_of'];
                                $posi = $row['position'];
                                $date = $row['date'];



                            }else{
                                header("location:../result.php?error=sqlerror");
                                exit();
                            }


                        }
                    }

                }

            }

            

           

  
           

        }else{
            header('location:../result.php?error=noresulthere');
            exit();
            
        }

       
    }
       


         }else{
             header("location:../result.php");
             exit();
         }
      
      
      
      
      
      ?>
      <div class="show_result">
        <div class="show_result_header">
            <h2>Invitation Quiz</h2>
            <h3>This quiz program is sponsored by Invitation English Coaching Centre</h3>
        </div>
        <a id="gb" href="../result.php">Go back</a>
        <table>
            <tr>
                <td>Name</td>
                <td><?php echo $name; ?></td>
            </tr>
            <tr>
                <td>Institution</td>
                <td><?php echo $inst; ?></td>
            </tr>
            <tr>
                <td>Mobile Number</td>
                <td><?php echo $mobi; ?></td>
            </tr>
            <tr>
                <td>Level</td>
                <td><?php echo $type; ?></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td><?php echo $gend; ?></td>
            </tr>
            <tr>
                <td>Season No</td>
                <td><?php echo $seasons; ?></td>
            </tr>
            <tr>
                <td class='nt'>Score</td>
                <td class='nt'><?php echo $score; ?></td>
            </tr>
            <tr>
                <td class='nt'>Out Of</td>
                <td class='nt'><?php echo $out_of; ?></td>
            </tr>
            <tr>
                <td class='nt'>Position</td>
                <td class='nt'><?php echo $posi; ?></td>
            </tr>
            <tr>
                <td>Status</td>
                <td class="r_st"><?php echo $status; ?></td>
            </tr>
            <tr>
                <td>updated</td>
                <td><?php echo $date; ?></td>
            </tr>
            <tr>
                <td>Location</td>
                <td><?php echo $location; ?></td>
            </tr>
        </table>


                               
      </div>

  </div>
</body>
</html>