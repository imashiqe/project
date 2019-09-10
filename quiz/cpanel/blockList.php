<?php require 'header.panel.php'; ?>
<!-- notice section -->
<section>
<div class="container">
<div class="section_title">
    <h2><a id="home_btn" href="member.panel.php">&#8592;</a>   Block List</h2> 
</div>
<?php
        $em ='';
        if(isset($_GET['error'])){
                if($_GET['error'] === 'delete'){
                    $em = '<p class="em_s">Delete Successful</p>';
                }
                else if($_GET['error'] === 'successUnblock'){
                    $em = '<p class="em_s">Unblock Successful</p>';
                }
        }
        echo $em;
?>
<div class="row">
<div class="col-lg-3"></div>
<div class="col-lg-6">
         
<div class="accordion" id="accordionBlock">
<!-- PENDING SECTION START -->
<?php
  $sql_active = "SELECT * FROM members";
  $result_active = mysqli_query($conn, $sql_active);
  while($row = mysqli_fetch_assoc($result_active)){
    if($row['status'] === 'blocked'){
        //  list start

      echo '<div class="card pen">
      <div class="card-header pen" id="headingThree">
        <h2 class="m-0">
          <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_active'.$row['id'].'" aria-expanded="true" aria-controls="collapse_active'.$row['id'].'">
          '.$row['name'].'
          </button>
        </h2>
      </div>
      <div id="collapse_active'.$row['id'].'" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionBlock">
        <div class="card-body pen cap">
           <table>
               <tr>
                   <td>Name</td>
                   <td>:</td>
                   <td>'.$row['name'].'</td>
               </tr>
  
               <tr>
                   <td>Institution</td>
                   <td>:</td>
                   <td>'.$row['institute'].'</td>
               </tr>
               <tr>
                   <td>Mobile</td>
                   <td>:</td>
                   <td>'.$row['mobile'].'</td>
               </tr>
               <tr>
                   <td>Student</td>
                   <td>:</td>
                   <td>'.$row['student'].'</td>
               </tr>

               <tr>
                   <td>Gender</td>
                   <td>:</td>
                   <td>'.$row['gender'].'</td>
               </tr>
               <tr>
                   <td>Location</td>
                   <td>:</td>
                   <td>'.$row['location'].'</td>
               </tr>
               <tr>
                   <td>Status</td>
                   <td>:</td>
                   <td id="status_blocked">'.$row['status'].'</td>
               </tr>
           </table>
           

           <a type="submit"  class="pm_btn" href="member.delete.php?id='. $row['id'] .'&action=deleteb">Delete</a>
           <a type="submit"  class="pm_btn acc" href="member.delete.php?id='. $row['id'] .'&action=unblock">Unblock</a>

        </div>
      </div>
    </div>';



// list end
    }
  }

?>



<!-- start -->
  
  <!-- end -->

</div>

</div>
<div class="col-lg-3"></div>
</div>



</div>
</section>
<?php require 'footer.panel.php'; ?>