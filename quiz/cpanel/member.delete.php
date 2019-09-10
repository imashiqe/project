<?php 
session_start();
if($_SESSION['user']){
    require '../php/function.php';
    $conn   = pending_tb();
    $id     = validate($_GET['id']);
    $action = validate($_GET['action']);

    if(!empty($id)){

     if($action === 'delete'){
        // delete from pending table
        $sql_del = "DELETE FROM members WHERE id = $id ";
        $result_del = mysqli_query($conn, $sql_del);
        if($result_del){
            header("location:member.panel.php?error=mcsuc");
            exit();
        }else{
        header("location:member.panel.php?error=sqlerrors");
        exit();
        }
     }
     
     else if($action === 'block'){
        // update status to block
        $sql_blocked = "UPDATE members SET status = 'blocked' WHERE id = $id ";
        $result_del = mysqli_query($conn, $sql_blocked);
        header("location:member.panel.php?error=successBlock");
        exit();
     }
     else if($action === 'blockCheck'){
        // update status to block
        $sql_blocked = "UPDATE members SET status = 'blocked' WHERE id = $id ";
        $result_del = mysqli_query($conn, $sql_blocked);
        header("location:member.panel.php?error=successBlockCheck");
        exit();
     }

     
     else if($action === 'unblock'){
        // update status to block
        $sql_blocked = "UPDATE members SET status = 'active' WHERE id = $id ";
        $result_del = mysqli_query($conn, $sql_blocked);
        header("location:blockList.php?error=successUnblock");
        exit();
     }

     else if($action === 'unblockCheck'){
        // update status to block
        $sql_blocked = "UPDATE members SET status = 'active' WHERE id = $id ";
        $result_del = mysqli_query($conn, $sql_blocked);
        header("location:member.panel.php?error=successUnblock");
        exit();


     }
     else if($action === 'deleteb'){
           // delete from pending table
           $sql_del = "DELETE FROM members WHERE id = $id ";
           $result_del = mysqli_query($conn, $sql_del);
          header("location:blockList.php?error=delete");
          exit();
     }

     else if($action === 'deleteCheck'){
                // delete from pending table
                $sql_del = "DELETE FROM members WHERE id = $id ";
                $result_del = mysqli_query($conn, $sql_del);
               header("location:member.panel.php?error=deleteCheck");
               exit();
     }
     
      

    }
    
    else{
        header("location:member.panel.php?error=emptyFields");
        exit();
    }





}else{
    header("location:member.panel.php");
    exit();
}

