<?php 
require '../php/function.php';
$conn = pending_tb();

if(isset($_POST['checkInd'])){


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
            
            $sql = "SELECT * FROM result WHERE season = $season AND mobile = $mobile";
            $query = mysqli_query($conn, $sql);

            if($row = mysqli_fetch_assoc($query)){

                $season = $row['season'];
                $name = $row['name'];
                $mobile = $row['mobile'];
                $score = $row['score'];
                $out_of = $row['out_of'];
                $position = $row['position'];
                $date = $row['date'];
                
              

                header('location:result.panel.php?season='. $season .'&name='. $name .'&mobile='. $mobile .'&score='. $score .'&out_of='. $out_of .'&position='. $position .'&date='. $date .'');
                exit();

            }else{
                header("location:result.panel.php?error=sqlerror");
                exit();
            }
           

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