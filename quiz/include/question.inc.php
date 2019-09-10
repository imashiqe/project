<?
php session_start();
init_set('display_errors','1');

?>
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
         if(isset($_POST['question_check_btn'])){
            require '../php/function.php';
            $conn = pending_tb();
            
            $number = validate($_POST['qnumber']);
            $qcode  = validate($_POST['qcode']);

            if(empty($number) || empty($qcode)){
                header("location:../question.php?error=emptyFields");
                exit();
            }else{
                  $sql_admins = "SELECT * FROM admins";
                  $query_admins = mysqli_query($conn, $sql_admins);
                  if($query_admins){

                    if($row = mysqli_fetch_assoc($query_admins)){

                        if($row['qcode'] === $qcode){
                            // check number

                            $sql_members = "SELECT * FROM members WHERE mobile = ?";
                            $stmt = mysqli_stmt_init($conn);

                            if(mysqli_stmt_prepare($stmt, $sql_members)){

                                mysqli_stmt_bind_param($stmt , 's', $number);
                                mysqli_stmt_execute($stmt);
                                $result = mysqli_stmt_get_result($stmt);

                                if($rows = mysqli_fetch_assoc($result)){

                                    if($rows['mobile'] === $number){

                                        if($rows['status'] === 'blocked'){
                                            header("location:../question.php?error=blocked");
                                            exit();
                                        }
                                        else if($rows['status'] === 'active'){
                                        // question Published start

                                            $time_sql = "SELECT * FROM admins";
                                            $timeQuery = mysqli_query($conn, $time_sql);
                                            $time = $code = '';
                                            if($qtime = mysqli_fetch_assoc($timeQuery));{
                                                $time = $qtime['qtime'];
                                                $code = $qtime['qcode'];
                                            }



                                     ?>
<div class="main_question">
 <div class="question_header">
   <a id="home_btn_m" href="../question.php">&#8592;</a>
   <h2>INVITATION QUIZ</h2>
   <p>Sponsored By</p>
   <h3>Invitation English Coaching Centre</h3>
   <ul>
     <li>Time : <?php echo $time; ?></li>
     <li>Code : <?php echo $code; ?></li>
   </ul>
   <p class="qmsg">Best of luck <span><?php echo $rows['name']; ?></span>. We hope you can finish the questions within the fixed time.</p>
 </div>
 <?php
     $que_sql = "SELECT * FROM question";
     $que_query = mysqli_query($conn, $que_sql);
    $myarray = array();
     while($row = mysqli_fetch_assoc($que_query)){      
      $myarray[$row['no']] = '<div class="qbody">
      <h2><span>'. $row['no'].'</span>'. $row['que'] .'</h2>
      <ul>
        <li><span>A</span>'. $row['opa'] .'</li>
        <li><span>B</span>'. $row['opb'] .'</li>
        <li><span>C</span>'. $row['opc'] .'</li>
        <li><span>D</span>'. $row['opd'] .'</li>
      </ul>
  </div>
  '; 
     }
     ksort($myarray);
     foreach($myarray as $x => $value){

        echo $value;
     }

  
  
  ?>
 
</div>

                                     <?php
                                        // question published end
                                        }
                                        else{
                                            header("location:../question.php?error=unauthorized");
                                            exit();
                                        }
                                        

                                    }else{

                                        header("location:../question.php?error=wrongNumber");
                                        exit();
                                    }
                                }else{
                                    header("location:../question.php?error=unauthorized");
                                     exit();
                                }



                            }else{
                                header("location:../question.php?error=sqlerror");
                                exit();
                            }



                        }else{
                                header("location:../question.php?error=wrongCode");
                                exit();
                        }
                    }



                  }else{
                    header("location:../question.php?error=sqlerror");
                    exit();
                  }      

            }

         }else{
             header("location:../question.php");
             exit();
         }
      
      
      
      
      
      ?>

  </div>
</body>
</html>