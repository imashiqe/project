<?php
session_start();
if($_SESSION['user']){
 require '../php/function.php';
 $conn = pending_tb();

   $id          = validate($_GET['id']);
   $name        = validate($_GET['name']);
   $institute   = validate($_GET['institute']);
   $mobile      = validate($_GET['mobile']);
   $student     = validate($_GET['student']);
   $gender      = validate($_GET['gender']);
   $location    = validate($_GET['location']);
   $type        = validate($_GET['type']);

   if(!empty($id) || !empty($name) || !empty($institute) || !empty($mobile)){
     // accept the pending request
    if($type === 'accept' || $type === 'acceptc'){
    // check if the data exists
    $sql_check = "SELECT mobile FROM members WHERE mobile = $mobile";
    $query_check = mysqli_query($conn, $sql_check);
    $num = mysqli_fetch_assoc($query_check);
    if($num['mobile'] === $mobile){
        header("location:member.panel.php?error=exists");
        exit();
    }else{
        // if the data does not exists
           // inset data to member data table
            $sql_insert = "INSERT INTO members (name, institute, mobile, student, gender, location, status) ";
            $sql_insert .= "VALUES ('$name', '$institute', '$mobile', '$student', '$gender', '$location','active')";
            $result_insert = mysqli_query($conn, $sql_insert);
            if($result_insert){
                if($type === 'accept'){
                  header("location:member.panel.php?error=success");
                }else if($type === 'acceptc'){
                  header("location:member.panel.php?error=successAccept");
                }

                    // delete from pending table
                    $sql_del = "DELETE FROM pending WHERE id = $id ";
                    $result_del = mysqli_query($conn, $sql_del);
                    if(!$result_del){
                        if($type === 'accept'){
                          header("location:member.panel.php?error=sqlerror");
                          exit();
                        }else if($type === 'acceptc'){
                          header("location:member.check.php?error=sqlerror");
                          exit();
                        }
                   }
          }else{
            header("location:member.panel.php?error=sqlerror");
            exit();
          }

    }

    // cancle action
   }
    else if($type === 'cancel' || $type === 'cancelc'){
           // delete from pending table
           $sql_del = "DELETE FROM pending WHERE id = $id ";
           $result_del = mysqli_query($conn, $sql_del);
           if($result_del){
               if($type === 'cancel'){
                header("location:member.panel.php?error=csuc");
                exit();
               }else if($type === 'cancelc'){
                header("location:member.panel.php?error=csucAccept");
               }
          }else{
            header("location:member.panel.php?error=sqlerror");
            exit();
          }
    }
    



   }else{
    header("location:member.panel.php?error=emptyField");
    exit();
   }

}else{
    header("location:member.panel.php");
    exit();
}


