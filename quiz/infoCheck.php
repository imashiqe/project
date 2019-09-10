<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Information</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/join.css">  
    <link rel="stylesheet" href="css/join.responsive.css">  
</head>
<body>
<a id="home_btn" href="join.php">&#8592;</a>
<div class="container">
        <?php
          $name = $institute = $mobile = $student = $gender = $location = $status = '';
            if(isset($_POST['check'])){
                require 'php/function.php';
                $conn = pending_tb();

                $number = validate($_POST['checkNumber']);

                if(empty($number)){
                    header("location:join.php?error=empty");
                    exit();
                }else{
                    // finding number into member database
                    $sql = "SELECT * FROM members WHERE mobile = ?";
                    $stmt = mysqli_stmt_init($conn);

                    if(!mysqli_stmt_prepare($stmt, $sql)){
                        header("location:join.php?error=sqlerror");
                        exit();
                    }
                    else{

                        mysqli_stmt_bind_param($stmt, 's', $number);
                        mysqli_stmt_execute($stmt);
                        mysqli_stmt_store_result($stmt);
                        $result = mysqli_stmt_num_rows($stmt);
                        if($result > 0){
                            //  store member data to defined variable
                            $sql = "SELECT * FROM members WHERE mobile = $number";
                            $query = mysqli_query($conn, $sql);

                            if($row = mysqli_fetch_assoc($query)){
                                $name      = $row['name'];
                                $institute = $row['institute'];
                                $mobile    = $row['mobile'];
                                $student   = $row['student'];
                                $gender    = $row['gender'];
                                $location  = $row['location'];
                                $status    = $row['status'];
                            }

                        }
                        else{

                                // finding number into pending database
                                $sqls = "SELECT * FROM pending WHERE mobile_number = ?";
                                $stmts = mysqli_stmt_init($conn);
                                if(!mysqli_stmt_prepare($stmts, $sqls)){
                                    header("location:join.php?error=sqlerror");
                                    exit();
                                }else{
                                    mysqli_stmt_bind_param($stmts, 's', $number);
                                    mysqli_stmt_execute($stmts);
                                    mysqli_stmt_store_result($stmts);
                                    $results = mysqli_stmt_num_rows($stmts);

                                    if($results > 0){
                                        //  store member data to defined variable
                                        $sqls = "SELECT * FROM pending WHERE mobile_number = $number";
                                        $querys = mysqli_query($conn, $sqls);
            
                                        if($row = mysqli_fetch_assoc($querys)){
                                            $name      = $row['name'];
                                            $institute = $row['institute'];
                                            $mobile    = $row['mobile_number'];
                                            $student   = $row['student_of'];
                                            $gender    = $row['gender'];
                                            $location  = $row['location'];
                                            $status    = 'pending';
                                       }
                                }
                                else{
                                    header("location:join.php?error=nouser");
                                    exit();
                                }
                        }

                    }


                }
            }
            }else{
                header("location:join.php");
                exit();
            }
           

        ?>
    <div class="show_search_detail">
           <?php
            if($status === 'active'){
                echo '<h2 class="search_title_g">'. $status .'</h2>';
            }else if($status == 'blocked'){
                echo '<h2 class="search_title_r">'. $status .'</h2>';
            }else if($status == 'pending'){
                echo '<h2 class="search_title_o">'. $status .'</h2>';
            }
            
            ?>
        <table>
             
            <tr>
                <td>Name</td>
                <td>:</td>
                <td><?php echo $name; ?></td>
            </tr>
            <tr>
                <td>Institution</td>
                <td>:</td>
                <td><?php echo $institute; ?></td>
            </tr>
            <tr>
                <td>Student</td>
                <td>:</td>
                <td><?php echo $student; ?></td>
            </tr>
            <tr>
                <td>Mobile Number</td>
                <td>:</td>
                <td><?php echo $mobile; ?></td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>:</td>
                <td><?php echo $gender; ?></td>
            </tr>
            <tr>
                <td>Location</td>
                <td>:</td>
                <td><?php echo $location; ?></td>
            </tr>
        </table>
     </div>

</div>
</body>
</html>