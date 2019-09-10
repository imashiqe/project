<?php require 'header.panel.php'; ?>


<!-- notice section -->
<section>
<div class="container">
<div class="section_title">
    <h2>
    <a id="home_btn" href="result.panel.php">&#8592;</a> 
    Season Result</h2>
</div>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Name</th>
      <th scope="col">Mobile</th>
      <th scope="col">Score</th>

      <th scope="col">Out of</th>
      <th scope="col">Updated</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  <?php

   if(isset($_POST['check'])){

    $season = validate($_POST['season_check']);

    if(empty($season)){
        header('location:result.panel.php?error=empty');
        exit();
    }else{

        $sql = "SELECT * FROM result WHERE season = ?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header('location:result.panel.php?error=sqlerror');
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, 's', $season);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $check = mysqli_stmt_num_rows($stmt);

            if($check < 1){
                header('location:result.panel.php?error=noseason');
                exit();
            }else{
                
                $get = "SELECT * FROM result WHERE season = $season";
                $query = mysqli_query($conn, $get);

                if(!$query){
                  header('location:result.panel.php?error=sqlerror');
                  exit();
                }else{

                  $myarray = array();

                  while($row = mysqli_fetch_assoc($query)){

                    $myarray[$row['position']] = '<tr>
                    <th scope="row">'. $row['position'] .'</th>
                    <td>'. $row['name'] .'</td>
                    <td>'. $row['mobile'] .'</td>
                    <td>'. $row['score'] .'</td>             
                    <td>'. $row['out_of'] .'</td>
                    <td>'. $row['date'] .'</td>
                    <td><a stype="button" class="btn btn-danger" href="result_delete.php?season='. $row['season'] .'&mobile='. $row['mobile'].'">Delete</a></td>
                  </tr>';


                  }

                    //  display result
                      ksort($myarray);
                      foreach($myarray as $x => $value){
                        echo $value;
                      }

                }




            }
        }
        


    }
      

   }else{
       header('location:result.panel.php');
       exit();
   }
  
  ?>

  


  </tbody>
</table>


</div>
</section>


<?php require 'footer.panel.php'; ?>
