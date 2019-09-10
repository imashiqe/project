<?php

require '../php/function.php';
$conn = pending_tb();

if(isset($_POST['insert'])){
// if result insert is clicked
   
  $season   = validate($_POST['season']);
  $mobile   = validate($_POST['mobile']);
  $score    = validate($_POST['score']);
  $out_of    = validate($_POST['out_of']);
  $position = validate($_POST['position']);
  $date     = date("d-m-Y");

  if(empty($season) || empty($mobile) || empty($score) || empty ($position) || empty($out_of)){

        header("location:result.panel.php?error=empty");
        exit();
  }
  else{
     
    $result_sql   = "SELECT * FROM result WHERE season = ? AND mobile = ?";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $result_sql)){

        header("location:result.panel.php?error=sqlerror");
        exit();

    }else{
        mysqli_stmt_bind_param($stmt , 'ss', $season, $mobile);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $checkResult = mysqli_stmt_num_rows($stmt);
        
        if($checkResult > 0){
            header("location:result.panel.php?error=resultExists");
            exit();
        }else{

            $check_position = "SELECT * FROM result WHERE season = ? AND position = ?";
            $pos_stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($pos_stmt, $check_position)){

                header("location:result.panel.php?error=sqlerror");
                exit();
        
            }else{
                mysqli_stmt_bind_param($pos_stmt , 'ss', $season , $position);
                mysqli_stmt_execute($pos_stmt);
                mysqli_stmt_store_result($pos_stmt);
                $pos_res = mysqli_stmt_num_rows($pos_stmt);

                if($pos_res > 0){
                    header("location:result.panel.php?error=positionExists");
                    exit();
                }else{
                        $member_sql   = "SELECT * FROM members WHERE mobile = ?";
                                $stmt_m = mysqli_stmt_init($conn);

                                
                                if(!mysqli_stmt_prepare($stmt_m, $member_sql)){

                                    header("location:result.panel.php?error=sqlerror");
                                    exit();

                                }else{

                                    mysqli_stmt_bind_param($stmt_m , 's', $mobile);
                                    mysqli_stmt_execute($stmt_m);
                                    mysqli_stmt_store_result($stmt_m);
                                    $checkmember = mysqli_stmt_num_rows($stmt_m);

                                    if($checkmember < 1){

                                        header("location:result.panel.php?error=nouser");
                                        exit();

                                    }else{

                                        $get_sql   = "SELECT * FROM members WHERE mobile = $mobile";
                                        $stmt_query = mysqli_query($conn , $get_sql);

                                    if($rows = mysqli_fetch_assoc($stmt_query)){
                                        //  check if the name empty
                                        if(empty($rows['name'])){
                                            header("location:result.panel.php?error=noname");
                                            exit();
                                        }else{
                                        //  INSET Result into Result table;
                                            $insert  = "INSERT INTO result(season, name, mobile, score, out_of, position, date) ";
                                            $insert .= "VALUES (?, ?, ?,?, ?, ?, ?)";
                                            $in_stmt = mysqli_stmt_init($conn);

                                            if(!mysqli_stmt_prepare($in_stmt, $insert)){
                                                header("location:result.panel.php?error=sqlerror");
                                                exit();
                                            }else{
                                                $name = $rows['name'];
                                                mysqli_stmt_bind_param($in_stmt ,'sssssss', $season, $name, $mobile, $score, $out_of, $position, $date);

                                                if(mysqli_stmt_execute($in_stmt)){
                                                    header("location:result.panel.php?error=insertsuccess");
                                                    exit();

                                                }else{
                                                    header("location:result.panel.php?error=sqlerror");
                                                    exit();
                                                }

                                            }
                    

                                        }


                                    }else{

                                        header("location:result.panel.php?error=sqlerror");
                                        exit();
                                    }



                                    }


                                }
                }
                
            }

       


        }



    }
    


      

  }



}

else if(isset($_POST['update'])){
// if update button in clicekd
 
$season   = validate($_POST['season']);
$mobile   = validate($_POST['mobile']);
$score    = validate($_POST['score']);
$out_of    = validate($_POST['out_of']);
$position = validate($_POST['position']);
$date     = date("d-m-Y");

if(empty($season) || empty($mobile) || empty($score) || empty ($position) || empty($out_of)){

      header("location:result.panel.php?error=empty");
      exit();
}
else{
   
  $result_sql   = "SELECT * FROM result WHERE season = ? AND mobile = ?";
  $stmt = mysqli_stmt_init($conn);

  if(!mysqli_stmt_prepare($stmt, $result_sql)){

      header("location:result.panel.php?error=sqlerror");
      exit();

  }else{
      mysqli_stmt_bind_param($stmt , 'ss', $season, $mobile);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $checkResult = mysqli_stmt_num_rows($stmt);
      
      if($checkResult < 1){
          header("location:result.panel.php?error=noresulthere");
          exit();
      }else{

          $member_sql   = "SELECT * FROM members WHERE mobile = ?";
          $stmt_m = mysqli_stmt_init($conn);

          
           if(!mysqli_stmt_prepare($stmt_m, $member_sql)){

              header("location:result.panel.php?error=sqlerror");
              exit();

          }else{

              mysqli_stmt_bind_param($stmt_m , 's', $mobile);
              mysqli_stmt_execute($stmt_m);
              mysqli_stmt_store_result($stmt_m);
              $checkmember = mysqli_stmt_num_rows($stmt_m);

              if($checkmember < 1){

                  header("location:result.panel.php?error=nouser");
                  exit();

              }else{

                  $get_sql   = "SELECT * FROM members WHERE mobile = $mobile";
                  $stmt_query = mysqli_query($conn , $get_sql);

                 if($rows = mysqli_fetch_assoc($stmt_query)){
                  //  check if the name empty
                    if(empty($rows['name'])){
                      header("location:result.panel.php?error=noname");
                      exit();
                    }else{
                   //  INSET Result into Result table;
                      $insert  = "UPDATE result SET season = ?, name = ?, mobile = ?, score = ?, out_of = ?, position = ?, date = ? WHERE season = $season AND mobile = $mobile";
                      $in_stmt = mysqli_stmt_init($conn);

                      if(!mysqli_stmt_prepare($in_stmt, $insert)){
                          header("location:result.panel.php?error=sqlerror");
                          exit();
                      }else{
                          $name = $rows['name'];
                          mysqli_stmt_bind_param($in_stmt ,'sssssss', $season, $name, $mobile, $score, $out_of, $position, $date);

                          if(mysqli_stmt_execute($in_stmt)){
                              header("location:result.panel.php?error=updatesuccess");
                              exit();

                          }else{
                              header("location:result.panel.php?error=sqlerror");
                              exit();
                          }

                      }


                    }


                 }else{

                  header("location:result.panel.php?error=sqlerror");
                  exit();
                 }



              }


          }


      }



  }
  


    

}




}
else{

    header("location:result.panel.php");
    exit();
}
