<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/admiLogin.css">
    <link rel="stylesheet" href="css/admiLogin.responsive.css">

    <style>
      .em{
         color:red;
         font-family: 'arial';
         font-weight: 600;
      }
    </style>
</head>
<body>

<?php
$em ='';
if(isset($_GET['error'])){
    if($_GET['error'] == 'emptyFields'){
       $em = '<p class="em">Empty Fields</p>';
    }
    else if($_GET['error'] == 'errorsql'){
        $em = '<p class="em">System Error</p>';
    }
    else if($_GET['error'] == 'nouser'){
        $em = '<p class="em">Incorrect</p>';
    }
    
    else{
        $em =' ';
    }


}

if(isset($_SESSION['user'])){
    header("location:cpanel/index.panel.php?success=welcome");
    exit();
}else{
  
    echo '<a id="home_btn" href="index.php">&#8592;</a>

    <div class="container">
    <div class="box">
       <form action="cpanel/login.panel.php" method="POST">
           <h2>Administration</h2>
            '. $em .'
           <ul>
           <li>
               <span><img src="img/user.svg" alt="user"></span>
               <input type="text" name="uid" id="" placeholder="username">
           </li>
           <li>
               <span><img src="img/shield.svg" alt="shield"></span>
               <input type="password" name="pwd" id="" placeholder="password">
           </li>
           </ul>
           <button type="submit" name="login_button">Login</button>
       </form>
    </div>
    
    </div>';

}




?>







<!-- all bootstrap script files are here -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
</body>
</html>