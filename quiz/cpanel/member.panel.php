<?php require 'header.panel.php'; ?>
<!-- Member section -->
<section>
<div class="container">
<div class="section_title">
    <h2>Member Panel</h2>
</div>

<div class="row">
    <div class="col-lg-4">
    <h2 class="colum_title">Pending Request</h2>


    <?php
        $em ='';
        if(isset($_GET['error'])){
                if($_GET['error'] === 'emptyField'){
                    $em = '';
                }
                else if($_GET['error'] === 'sqlerror'){
                    $em = '<p class="em">System Error!</p>';
                }
                else if($_GET['error'] === 'success'){
                    $em = '<p class="em_s">Update Successful</p>';
                }
                else if($_GET['error'] === 'exists'){
                    $em = '<p class="em">Mobile Number already used</p>';
                }
                else if($_GET['error'] === 'csuc'){
                    $em = '<p class="em_s">Request Canceled</p>';
                }
        }
        echo $em;
        ?>




<div class="accordion" id="accordionExample">
<!-- PENDING SECTION START -->
<?php
  $sql = "SELECT * FROM pending";
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_assoc($result)){
//  list start

      echo '<div class="card pen">
      <div class="card-header pen" id="headingOne">
        <h2 class="m-0">
          <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse'.$row['id'].'" aria-expanded="true" aria-controls="collapse'.$row['id'].'">
          '.$row['name'].'
          </button>
        </h2>
      </div>
      <div id="collapse'.$row['id'].'" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body pen">
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
                   <td>'.$row['mobile_number'].'</td>
               </tr>
               <tr>
                   <td>Student</td>
                   <td>:</td>
                   <td>'.$row['student_of'].'</td>
               </tr>
               <tr>
                   <td>Facebook</td>
                   <td>:</td>
                   <td><a href="'.$row['url'].'" target="_blank">Visit</a></td>
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
           </table>
           
           <a type="submit" class="pm_btn acc" href="pending.request.php?id='. $row['id'] .'&name='. $row['name'] . '&institute='. $row['institute'] .'&mobile='. $row['mobile_number'] .'&student='. $row['student_of'] .'&gender='. $row['gender'] .'&location='. $row['location'] .'&type=accept">Accept</a>

           <a type="submit"  class="pm_btn" href="pending.request.php?id='. $row['id'] .'&name='. $row['name'] . '&institute='. $row['institute'] .'&mobile='. $row['mobile_number'] .'&student='. $row['student_of'] .'&gender='. $row['gender'] .'&location='. $row['location'] .'&type=cancel">Cancel</a>

        </div>
      </div>
    </div>';



// list end
  }

?>



<!-- start -->
  
  <!-- end -->

</div>


    



    </div>
    <div class="col-lg-4 menroll">
    <h2 class="colum_title">Manual Enrollment</h2>
    <?php
        $em ='';
        if(isset($_GET['error'])){
                if($_GET['error'] === 'emptyCheck'){
                    $em = '<p class="em">Empty Field</p>';
                }
                else if($_GET['error'] === 'sqlerrordata'){
                    $em = '<p class="em">System Error!</p>';
                }
                else if($_GET['error'] === 'nouserData'){
                    $em = '<p class="em_s">Found Nothing</p>';
                }
                else if($_GET['error'] === 'successUnblock'){
                    $em = '<p class="em_s">Unblock Successful</p>';
                }
                else if($_GET['error'] === 'successBlockCheck'){
                    $em = '<p class="em_s">Block Successful</p>';
                }
                else if ($_GET['error'] === 'deleteCheck'){
                    $em = '<p class="em_s">Delete Successful</p>';
                }
                else if ($_GET['error'] === 'successAccept'){
                    $em = '<p class="em_s">Request Accepted</p>';
                }
                else if ($_GET['error'] === 'csucAccept'){
                    $em = '<p class="em_s">Request Canceled</p>';
                }
                else if($_GET['error'] === 'updateEmpty'){
                    $em = '<p class="em">Update Field Empty</p>';
                }
                else if($_GET['error'] === 'updatesql'){
                    $em = '<p class="em">System Error!</p>';
                }
                else if($_GET['error'] === 'updatesuccess'){
                    $em = '<p class="em_s">Update Successful</p>';
                }
        }
        echo $em;
    ?>
<!-- middle colum -->
     <a id="blockList" href="blockList.php">See Block List</a>
     <form class="check_data" action="member.check.php" method="POST">
         <input name='check_data' type="text" placeholder="Search">
         <button name="check_btn">Search</button>
     </form>



    </div>










    <div class="col-lg-4">
    <h2 class="colum_title">Active Members</h2>

    <?php
        $em ='';
        if(isset($_GET['error'])){
                if($_GET['error'] === 'emptyFields'){
                    $em = '<p class="em_s">Empty Data</p>';
                }
                else if($_GET['error'] === 'sqlerrors'){
                    $em = '<p class="em">System Error!</p>';
                }
                else if($_GET['error'] === 'mcsuc'){
                    $em = '<p class="em_s">Delete Successful</p>';
                }
                else if($_GET['error'] === 'successBlock'){
                    $em = '<p class="em_s">Block Successful</p>';
                }
        }
        echo $em;
    ?>

<div class="accordion" id="accordionActive">
<!-- PENDING SECTION START -->
<?php
  $sql_active = "SELECT * FROM members";
  $result_active = mysqli_query($conn, $sql_active);
  while($row = mysqli_fetch_assoc($result_active)){
    if($row['status'] === 'active'){
        //  list start

      echo '<div class="card pen">
      <div class="card-header pen" id="headingtwo">
        <h2 class="m-0">
          <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse_active'.$row['id'].'" aria-expanded="true" aria-controls="collapse_active'.$row['id'].'">
          '.$row['name'].'
          </button>
        </h2>
      </div>
      <div id="collapse_active'.$row['id'].'" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionActive">
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
                   <td id="status_active">'.$row['status'].'</td>
               </tr>
           </table>
           

           <a type="submit"  class="pm_btn" href="member.delete.php?id='. $row['id'] .'&action=delete">Delete</a>
           <a type="submit"  class="pm_btn" href="member.delete.php?id='. $row['id'] .'&action=block">Block</a>

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
</div>



</div>
</section>
<?php require 'footer.panel.php'; ?>