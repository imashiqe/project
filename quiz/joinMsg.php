<?php session_start(); ?>
<?php include 'php/function.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thank you</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/joinMsg.css">
    <link rel="stylesheet" href="css/joinMsg.responsive.css">
</head>
<body>

<div class="container">
<?php

// database connection function
$pending_table = pending_tb();
if(isset($_POST['request_btn'])){
    // connecting data from input form and validate them;
   $name            = validate($_POST['name']);
   $institute       = validate($_POST['institute']);
   $mobile_numbers  = validate($_POST['mobile_number']);
   $mobile_number   = '';
   if(strlen($mobile_numbers) < 10){
        $mobile_number = '';
   }else{
// checking is number is numeric
      if(!is_numeric($mobile_numbers)){
          $mobile_number = '';
      }else{
        $mobile_number = $mobile_numbers;
      }
   }
   $url             = validate($_POST['url']);
   $gender          = validate($_POST['gender']);
   $student_of          = validate($_POST['student']);
   $location        = validate($_POST['location']);

//    after fillup the form
   if(!empty($name && $institute && $mobile_number && $url && $gender && $student_of && $location)){
    
     // eheck if the data already exists using prepare statement
        $checkQuery ="SELECT mobile_number FROM pending WHERE mobile_number = ?";
        // $chekqueryResult = mysqli_query($pending_table, $checkQuery);
        $stmt = mysqli_stmt_init($pending_table);
        if(!mysqli_stmt_prepare($stmt, $checkQuery)){
             // unexpected error message
             echo $unexpected_error_message;
             exit();
        }
        // stmt working fine now bind them
        else{
            // binding placeholder with stmt
            mysqli_stmt_bind_param($stmt, "s", $mobile_number);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $nor = mysqli_stmt_num_rows($stmt);

            if($nor >= 1){
                echo $pending_message;
               exit();
            }else{
                // Insert data to pending database
                $pending_table_query = "INSERT INTO pending (name, institute, mobile_number, url, gender, student_of, location) VALUES ( ?, ?, ?, ?, ?, ?, ?)";

                $stmt = mysqli_stmt_init($pending_table);
                if(!mysqli_stmt_prepare($stmt, $pending_table_query)){
                         // unexpected error message
                        echo $unexpected_error_message;
                        exit();
                  }
                // working fine now insert data to databse
                else{
                    mysqli_stmt_bind_param($stmt, "sssssss", $name, $institute, $mobile_number, $url, $gender, $student_of, $location);
                    mysqli_stmt_execute($stmt);
                    // succcessful message
                    echo $thank_you_message;
                    exit();
                }
            }
        }

// if the form is not submitted with information
   }else{
    //    form is not valid;
       echo $sorry_message;
       exit();
   }
}else{
    // returning to join page
    header("location:join.php");
    exit();
}
?>




</div>
</body>
</html>