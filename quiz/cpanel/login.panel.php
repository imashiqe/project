<?php
if(isset($_POST['login_button'])){
// connecting with function file 
require '../php/function.php';
// database connected
$connection = pending_tb();
    
  $username = validate($_POST['uid']);
  $password = validate($_POST['pwd']);

  if(empty($username) || empty($password)){
      header("location: ../admiLogin.php?error=emptyFields");
      exit();
  }
//   if the username and password are not empty 
  else{

    $sql = "SELECT * FROM admins WHERE username = ? AND password = ?";
    $stmt = mysqli_stmt_init($connection);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../admiLogin.php?error=errorsql");
        exit();
    }else{
    // if connectio works fine
        mysqli_stmt_bind_param($stmt,"ss", $username, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($result)){   
            
            if($password === $row['password']){
                session_start();
                $_SESSION['id'] = $row['id'];
                $_SESSION['user'] = $row['username'];

                header("location:index.panel.php?success=success");
                exit();

            }else if($password !== $row['password']){
                header("location: ../admiLogin.php?error=nouser");
                exit();
            }else{
                header("location: ../admiLogin.php?error=nouser");
                exit();
            }
        } 
        // if no user found
        else{
            header("location: ../admiLogin.php?error=nouser");
                exit();
        }
    }
  }
}
else{
// if the submit button is not clicked
    header("location:../admiLogin.php");
    exit();
}


