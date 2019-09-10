<?php require 'header.panel.php'; ?>

<!-- notice section -->
<section>
<div class="container">
<div class="section_title">
    <h2>
    <a id="home_btn" href="member.panel.php">&#8592;</a> 
    Member's Information Panel</h2>
</div>
<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
    <?php
        $em ='';
        if(isset($_GET['error'])){
                if($_GET['error'] === 'emptyFields'){
                    $em = '';
                }
                else if($_GET['error'] === 'sqlerrors'){
                    $em = '<p class="em">System Error!</p>';
                }
                else if($_GET['error'] === 'mcsuc'){
                    $em = '<p class="em_s">Delete Successful</p>';
                }
        }
        // display error message
        echo $em;
    ?>
    <div class="information">
        <?php
           
            $id = $name = $institute = $mobile = $gender = $student = $url = $location = $status = $btn1 = $btn2 = $btn3= '';
            //    code start
            if(isset($_POST['check_btn'])){
              $number = validate($_POST['check_data']);
              if(empty($number)){
                header("location:member.panel.php?error=emptyCheck");
                exit();
              }
              else{

                  $sql = "SELECT * FROM members WHERE mobile = ?";
                  $stmt = mysqli_stmt_init($conn);

                  if(!mysqli_stmt_prepare($stmt, $sql)){
                     header("location:member.panel.php?error=sqlerrordata");
                     exit();
                  }
                  else{
                     mysqli_stmt_bind_param($stmt, "s", $number);
                     mysqli_stmt_execute($stmt);
                     mysqli_stmt_store_result($stmt);
                     $checkResult = mysqli_stmt_num_rows($stmt);

                    //  if data found in pending table
                    if($checkResult > 0){
                         $src = "SELECT * FROM members WHERE mobile = $number";
                         $query = mysqli_query($conn, $src);
                            if($row = mysqli_fetch_assoc($query)){
                                $name      = $row['name'];
                                $id        = $row['id'];
                                $institute = $row['institute'];
                                $mobile    = $row['mobile'];
                                $gender    = $row['gender'];
                                $student   = $row['student'];
                                $url       = 'Not Available';
                                $location  = $row['location'];
                                $status    = $row['status'];

                                $btn1      = '<a type="submit"  class="pm_btn" href="member.delete.php?id='. $row['id'] .'&action=deleteCheck">Delete</a>';

                                if($status === 'blocked'){
                                    $btn2      = '<a type="submit"  class="pm_btn acc" href="member.delete.php?id='. $row['id'] .'&action=unblockCheck">Unblock</a>'; 
                                }
                                else if($status === 'active'){
                                    $btn2      = '<a type="submit"  class="pm_btn" href="member.delete.php?id='. $row['id'] .'&action=blockCheck">Block</a>'; 
                                }


                                    
           
                            }
                      } 
                    //   find data in members database
                        else{
                            
                            $sqlm = "SELECT * FROM pending WHERE mobile_number = ?";
                            $stmtm = mysqli_stmt_init($conn);
          
                            if(!mysqli_stmt_prepare($stmtm, $sqlm)){
                               header("location:member.panel.php?error=sqlerrordata");
                               exit();
                            }else{
                                mysqli_stmt_bind_param($stmtm, "s", $number);
                                mysqli_stmt_execute($stmtm);
                                mysqli_stmt_store_result($stmtm);
                                $checkResultm = mysqli_stmt_num_rows($stmtm);

                                if($checkResultm > 0){
                                    $srcm = "SELECT * FROM pending WHERE mobile_number = $number";
                                    $querys = mysqli_query($conn, $srcm);
                                       if($row = mysqli_fetch_assoc($querys)){
                                           $name      = $row['name'];
                                           $institute = $row['institute'];
                                           $mobile    = $row['mobile_number'];
                                           $gender    = $row['gender'];
                                           $student   = $row['student_of'];
                                           $url       = '<a href="'. $row['url'] .'" target="_blank">Visit</a>';
                                           $location  = $row['location'];
                                           $status    = 'pending';

                                           $btn1      = '  <a type="submit" class="pm_btn acc" href="pending.request.php?id='. $row['id'] .'&name='. $row['name'] . '&institute='. $row['institute'] .'&mobile='. $row['mobile_number'] .'&student='. $row['student_of'] .'&gender='. $row['gender'] .'&location='. $row['location'] .'&type=acceptc">Accept</a>';


                                           $btn2      = '<a type="submit"  class="pm_btn" href="pending.request.php?id='. $row['id'] .'&name='. $row['name'] . '&institute='. $row['institute'] .'&mobile='. $row['mobile_number'] .'&student='. $row['student_of'] .'&gender='. $row['gender'] .'&location='. $row['location'] .'&type=cancelc">Cancel</a>'; 
                                       }
                                }else{

                                    header("location:member.panel.php?error=nouserData");
                                    exit();


                                }

                            }
                            

                        
                      }
                   
                    }



                  }



            }else{
                header("location:member.panel.php");
            } 
        ?>

    <div class="check_info">
     <table>
       <tr>
           <td>Name</td>
           <td>:</td>
           <td><?php echo $name; ?></td>
       </tr>
       <tr>
           <td>Institution</td>
           <td>:</td>
           <td><?php echo $institute; ?></td>
       </tr>
       <tr>
           <td>Mobile Number</td>
           <td>:</td>
           <td><?php echo $mobile; ?></td>
       </tr>
       <tr>
           <td>Facebook</td>
           <td>:</td>
           <td><?php echo $url; ?></td>
       </tr>
       <tr>
           <td>Gender</td>
           <td>:</td>
           <td><?php echo $gender; ?></td>
       </tr>
       <tr>
           <td>Student</td>
           <td>:</td>
           <td><?php echo $student; ?></td>
       </tr>
       <tr>
           <td>Location</td>
           <td>:</td>
           <td><?php echo $location; ?></td>
       </tr>
       <tr>
           <td>Status</td>
           <td>:</td>
           <td><?php echo $status; ?></td>
       </tr>
     </table>
       <?php echo $btn1; echo $btn2; ?>
       
       <?php
        
        if($status === 'active' || $status === 'blocked'){
            
                   

            echo '<form action="member.update.php?id='. $id .'" method="POST" class="update_form">
            <h2>Update Information</h2>
            <p>Be careful when you update</p>
            <table>
                <tr>
                   <td>Full Name</td>
                   <td>:</td>
                   <td><input type="text" name="name" placeholder="Full Name"></td>
                </tr>
                <tr>
                   <td>Institution</td>
                   <td>:</td>
                   <td><input type="text" name="institute" placeholder="Institution"></td>
                </tr>
                <tr>
                   <td>Student Of</td>
                   <td>:</td>
                   <td>
                       <label for="school">School</label>
                       <input class="radio_input" type="radio" name="student" value="School" id="school">
                       <label for="college">College</label>
                       <input class="radio_input" type="radio" name="student" value="College" id="college">
                       <label for="university">University/Diploma</label>
                       <input class="radio_input" type="radio" name="student" value="University/Diploma" id="university">
                   </td>
                </tr>
                <tr>
                   <td>Gender</td>
                   <td>:</td>
                   <td>
                       <label for="male">Male</label>
                       <input class="radio_input" type="radio"  name="gender" value="male" id="male">
                       <label for="female">Female</label>
                       <input class="radio_input" type="radio" name="gender" value="female" id="female">
                   </td>
                </tr>
                <tr>
                   <td>Mobile Number</td>
                   <td>:</td>
                   <td><input type="text" name="mobile" placeholder="Mobile Number"></td>
                </tr>
                <tr>
                   <td>Location</td>
                   <td>:</td>
                   <td><input type="text" name="location" placeholder="Location"></td>
                </tr>
              </table>
               <button class="upbtn" type="submit" name="update_check">Update</button>
            </form>';
        }
       
       
       ?>

      

    </div>



    </div>
    </div>
    <div class="col-lg-2"></div>
</div>




</div>
</section>
<?php require 'footer.panel.php'; ?>