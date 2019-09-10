<?php 
 require '../php/function.php';
 $conn = pending_tb();

if(isset($_POST['update_user_btn'])){
// if username is updated
  $olduser = validate($_POST['olduser']);
  $newuserOne = validate($_POST['newuser1']);
  $newuserTwo = validate($_POST['newuser2']);

  if(empty($olduser) || empty($newuserOne) || empty($newuserTwo)){
      header('location:security.panel.php?error=userempty');
      exit();
  }else{
     
     if($newuserOne !== $newuserTwo){
        header('location:security.panel.php?error=userdif');
        exit();
     }else{

       $old = "SELECT * FROM admins";
       $oldquery = mysqli_query($conn, $old);

       if(!$oldquery){
        header('location:security.panel.php?error=usersql');
        exit();  
       }else{

            if($row = mysqli_fetch_assoc($oldquery)){

                if($row['username'] !== $olduser){
                    header('location:security.panel.php?error=oldusererror');
                    exit();
                }else if($row['username'] === $newuserOne){
                    header('location:security.panel.php?error=userexists');
                    exit();
                }
                else if($row['username'] === $olduser){
                      
                    $update = "UPDATE admins SET username = '$newuserOne' ";
                    $update_query = mysqli_query($conn, $update);

                    if($update_query){

                        header('location:security.panel.php?error=usersuccess');
                        exit();

                    }else{
                        header('location:security.panel.php?error=usersql');
                        exit();
                    }

                }else{
                    header('location:security.panel.php?error=usersql');
                    exit(); 
                }

            }else{
                header('location:security.panel.php?error=usersql');
                exit(); 
            }

       }

     }

  }
  
    

}
else if(isset($_POST['update_pwd_btn'])){
    // if password is updated
    $olduser = validate($_POST['oldpwd']);
    $newuserOne = validate($_POST['newpwd1']);
    $newuserTwo = validate($_POST['newpwd2']);
  
    if(empty($olduser) || empty($newuserOne) || empty($newuserTwo)){
        header('location:security.panel.php?error=pwdempty');
        exit();
    }else{
       
       if($newuserOne !== $newuserTwo){
          header('location:security.panel.php?error=pwddif');
          exit();
       }else{
  
         $old = "SELECT * FROM admins";
         $oldquery = mysqli_query($conn, $old);
  
         if(!$oldquery){
          header('location:security.panel.php?error=pwdsql');
          exit();  
         }else{
  
              if($row = mysqli_fetch_assoc($oldquery)){
  
                  if($row['password'] !== $olduser){
                      header('location:security.panel.php?error=oldpwderror');
                      exit();
                  }else if($row['password'] === $newuserOne){
                      header('location:security.panel.php?error=pwdexists');
                      exit();
                  }
                  else if($row['password'] === $olduser){
                        
                      $update = "UPDATE admins SET password = '$newuserOne' ";
                      $update_query = mysqli_query($conn, $update);
  
                      if($update_query){
  
                          header('location:security.panel.php?error=pwdsuccess');
                          exit();
  
                      }else{
                          header('location:security.panel.php?error=pwdsql');
                          exit();
                      }
  
                  }else{
                      header('location:security.panel.php?error=pwdsql');
                      exit(); 
                  }
  
              }else{
                  header('location:security.panel.php?error=pwdsql');
                  exit(); 
              }
  
         }
  
       }
  
    }
}

else{
    header("location:security.panel.php");
    exit();
}
