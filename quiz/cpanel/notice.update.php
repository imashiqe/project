<?php 

if(isset($_POST['update_notice'])){
    require '../php/function.php';
    
    $notice = validate($_POST['notice']);
    if(empty($notice)){
        header('location:index.panel.php?error=emptyNotice');
         exit();
    }else{
        $conn = pending_tb();
        $sqlr = "SELECT * FROM admins WHERE notice = ?";
        $stmtr = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmtr, $sqlr)){
            header('location:index.panel.php?error=sqlError');
            exit();

        }
        // if works fine
        else{
            mysqli_stmt_bind_param($stmtr, "s", $notice);
            mysqli_stmt_execute($stmtr);
            $res = mysqli_stmt_get_result($stmtr);
            if($row = mysqli_fetch_assoc($res)){

                if($notice == $row['notice']){
                    header('location:index.panel.php?error=exists');
                    exit();
                } 

            }else{
                // if the input does not exists
                        $sql = "UPDATE admins SET notice = ? WHERE id = 1";
                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt, $sql)){
                            // system error message
                            header('location:index.panel.php?error=sqlError');
                            exit();
                        }else{
                            mysqli_stmt_bind_param($stmt, "s", $notice);
                            mysqli_stmt_execute($stmt);
                            header('location:index.panel.php?error=none');
                            exit();
                        }
    
    
                    }
        }
        
    }
}else{
    header('location:index.panel.php');
    exit();
}