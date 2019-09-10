<?php 
require '../php/function.php';
$conn = pending_tb();

if(isset($_GET['season']) && isset($_GET['mobile'])){

    $season = validate($_GET['season']);
    $mobile = validate($_GET['mobile']);

    if(empty($season) || empty($mobile)){
        header('location:result.panel.php?error=nodelete');
        exit();
    }else{

        $sql = "DELETE FROM result WHERE season = $season AND mobile = $mobile";
        $query = mysqli_query($conn, $sql);
        header('location:result.panel.php?error=deletesuccess');
        exit();
    }



}
else if(isset($_POST['delete'])){


    $season = validate($_POST['season']);
    $mobile = validate($_POST['mobile']);

    if(empty($season) || empty($mobile)){
        header('location:result.panel.php?error=empty');
        exit();
    }else{

        $check = "SELECT * FROM result WHERE season = $season AND mobile = $mobile";
        $stmt  = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $check);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $num = mysqli_stmt_num_rows($stmt);

        if($num > 0){
            
            $sql = "DELETE FROM result WHERE season = $season AND mobile = $mobile";
            $query = mysqli_query($conn, $sql);
            header('location:result.panel.php?error=deletesuccess');
            exit();

        }else{
            header('location:result.panel.php?error=noresulthere');
            exit();
            
        }

       
    }

}
else{
    header('location:result.panel.php');
    exit();
}