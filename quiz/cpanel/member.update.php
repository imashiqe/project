<?php
require '../php/function.php';
$conn = pending_tb();



if(isset($_POST['update_check'])){
    $id        = validate($_GET['id']);
    $name      = validate($_POST['name']);
    $institute = validate($_POST['institute']);
    $student = validate($_POST['student']);
    $gender    = validate($_POST['gender']);
    $mobile    = validate($_POST['mobile']);
    $location  = validate($_POST['location']);

   if(!empty($id) && !empty($mobile)){
        
        $sql = "UPDATE members SET name = '$name', institute = '$institute' , student = '$student' , gender = '$gender' , mobile = '$mobile' , location = '$location' WHERE id = $id";

        $query = mysqli_query($conn, $sql);
        if($query){
            header('location:member.panel.php?error=updatesuccess');
            exit();
        }else{
            header('location:member.panel.php?error=updatesql');
            exit();
        }




   }else{
       header('location:member.panel.php?error=updateEmpty');
       exit();
   }






}else{
    header('location:member.panel.php');
    exit();
}




