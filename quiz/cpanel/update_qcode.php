<?php 
require '../php/function.php';
if(isset($_POST['update_qcode_btn'])){
   
    $code = validate($_POST['update_code']);
    if(!empty($code)){

        $conn = pending_tb();
        $sql = "SELECT * FROM admins";
        $query = mysqli_query($conn, $sql);

        if($row = mysqli_fetch_assoc($query)){
            if($row['qcode'] === $code){
                header('location:question.panel.php?error=codeexists');
                exit();
            }else{

                $update = "UPDATE admins SET qcode = ?";
                $stmt = mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt, $update)){
                    header('location:question.panel.php?error=codesql');
                    exit();
                }else{

                    mysqli_stmt_bind_param($stmt, 's', $code);
                    if( mysqli_stmt_execute($stmt)){
                        header('location:question.panel.php?error=codesuccess');
                        exit();
                    }else{
                        header('location:question.panel.php?error=codesql');
                        exit();
                    }


                }

            }
        }

    
    }else{
        header('location:question.panel.php?error=codeempty');
        exit();
    }






}else{
    header('location:question.panel.php');
    exit();
}