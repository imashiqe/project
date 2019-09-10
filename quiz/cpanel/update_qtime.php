<?php 
require '../php/function.php';
if(isset($_POST['update_qtime_btn'])){
   
    $time = validate($_POST['update_qtime']);
    if(!empty($time)){

        $conn = pending_tb();
        $sql = "SELECT * FROM admins";
        $query = mysqli_query($conn, $sql);

        if($row = mysqli_fetch_assoc($query)){
            if($row['qtime'] === $time){
                header('location:question.panel.php?error=timeexists');
                exit();
            }else{

                $update = "UPDATE admins SET qtime = ?";
                $stmt = mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt, $update)){
                    header('location:question.panel.php?error=timesql');
                    exit();
                }else{

                    mysqli_stmt_bind_param($stmt, 's', $time);
                    if( mysqli_stmt_execute($stmt)){
                        header('location:question.panel.php?error=timesuccess');
                        exit();
                    }else{
                        header('location:question.panel.php?error=timesql');
                        exit();
                    }


                }

            }
        }

    
    }else{
        header('location:question.panel.php?error=timeempty');
        exit();
    }






}else{
    header('location:question.panel.php');
    exit();
}