<?php session_start(); 
if(!isset($_SESSION['user'])){
    header("location:../admiLogin.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>C-Panel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet"  href="source/cpanel.css" >

</head>
<body>
<nav class="navbar sticky-top text-right">
  <div class="container">
      <form action="logout.panel.php" method="POST">
         <button id="logout_btn" name="logout">Logout</button>
      </form>
      
      <?php
        require '../php/function.php';
        $conn = pending_tb();
        if($conn){
            echo '<p id="db_con">Database Connection Successful</p>';
        }else{
            echo '<p id="db_con_error">Database Connection Failed</p>';
        }
      ?>
      </div>
      </nav>

<nav class="option position-fixed">
    <div class="container">
        <ul>
            <li><a href="index.panel.php">Notice</a></li>
            <li><a href="question.panel.php">Question</a></li>
            <li><a href="member.panel.php">Members</a></li>
            <li><a href="result.panel.php">Result</a></li>
            <li><a href="security.panel.php">Security</a></li>
            <li><a href="summery.panel.php">Summery</a></li>
        </ul>
    </div>
</nav>