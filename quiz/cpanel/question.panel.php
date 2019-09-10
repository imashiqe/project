<?php require 'header.panel.php'; ?>
<!-- notice section -->
<section>
<div class="container">
<div class="section_title">
    <h2>Question Panel</h2>
</div>
<div class="row">

<div class="col-lg-6 text-left">
    <h2 class="colum_title">Settings</h2>
  <?php
   if(isset($_GET['error'])){
       if($_GET['error'] === 'timeempty'){
          echo '<p class="em">Time Set Empty!</p>';
       }
       else if($_GET['error'] === 'timeexists'){
        echo '<p class="em">This is already used!</p>';
       }

       else if($_GET['error'] === 'timesuccess'){
        echo '<p class="em_s">Update Successful</p>';
       }
       else if($_GET['error'] === 'timesql'){
        echo '<p class="em">System Error</p>';
       }
   }
  
  ?>
    <form action="update_qtime.php" method='POST' class="qtimeForm">
      <input type="text" name="update_qtime" placeholder="Update Time">
      <button name="update_qtime_btn">Update</button>
    </form>
<?php
   if(isset($_GET['error'])){
       if($_GET['error'] === 'codeempty'){
          echo '<p class="em">Code Set Empty!</p>';
       }
       else if($_GET['error'] === 'codeexists'){
        echo '<p class="em">This is already used!</p>';
       }

       else if($_GET['error'] === 'codesuccess'){
        echo '<p class="em_s">Update Successful</p>';
       }
       else if($_GET['error'] === 'codesql'){
        echo '<p class="em">System Error</p>';
       }
   }
  
  ?>
    <form action="update_qcode.php" method='POST' class="qtimeForm">
      <input type="text" name="update_code" placeholder="Update Code">
      <button name="update_qcode_btn">Update</button>
    </form>

    <form action="update_insert_question.php" method='POST' class="questionForm">
    <?php
   if(isset($_GET['error'])){
       if($_GET['error'] === 'qempty'){
          echo '<p class="em">Input Field Empty!</p>';
       }
       else if($_GET['error'] === 'qexists'){
        echo '<p class="em">This is already used!</p>';
       }

       else if($_GET['error'] === 'qsuccess'){
        echo '<p class="em_s">Update Successful</p>';
       }
       else if($_GET['error'] === 'qsql'){
        echo '<p class="em">System Error</p>';
       }
       else if($_GET['error'] === 'nan'){
        echo '<p class="em">Position NaN</p>';
       }
       else if($_GET['error'] === 'qno'){
        echo '<p class="em">Position does not exists</p>';
       }
       else if($_GET['error'] === 'usuccess'){
        echo '<p class="em_s">Update Successful</p>';
       }
   }
  
  ?>
    <h2>Insert/Update Question</h2>
      <table class="mb-4">
        <tr>
            <td>Question</td>
            <td>: <input type="text" name="question" placeholder="Question"></td>
        </tr>
        <tr>
            <td>Option A</td>
            <td>: <input type="text" name="opa" placeholder="Option A"></td>
        </tr>
        <tr>
            <td>Option B</td>
            <td>: <input type="text" name="opb" placeholder="Option B"></td>
        </tr>
        <tr>
            <td>Option C</td>
            <td>: <input type="text" name="opc" placeholder="Option C"></td>
        </tr>
        <tr>
            <td>Option D</td>
            <td>: <input type="text" name="opd" placeholder="Option D"></td>
        </tr>
        <tr>
            <td>Position</td>
            <td>: <input type="text" name="position" placeholder="position"></td>
        </tr>
      </table>
      <button id="st_btn" name="insert_btn">Insert</button>
      <button id="st_btn" name="update_btn">Update</button>
    </form>

</div>
<div class="col-lg-6">
    <h2 class="colum_title">Question Preview</h2>
  <?php
     $time = "SELECT * FROM admins";
     $query = mysqli_query($conn , $time);
     if($row = mysqli_fetch_assoc($query)){
         echo ' <p class="dis_ques">Time : '. $row['qtime'] .'</p>
         <p class="dis_ques">Code : '. $row['qcode'] .'</p>';
     }
  ?>
  <?php
   if(isset($_GET['error'])){
       if($_GET['error'] === 'deleteSuccess'){
          echo '<p class="em_s">Delete Successful</p>';
       }
       else if($_GET['error'] === 'deletesql'){
        echo '<p class="em">System Error</p>';
       }
   }
  
  ?>
   
  <div class="question_preview">
  
  <?php
     $que_sql = "SELECT * FROM question";
     $que_query = mysqli_query($conn, $que_sql);
    $myarray = array();
     while($row = mysqli_fetch_assoc($que_query)){      
      $myarray[$row['no']] = '<table cellpadding="0" cellspacing="0" border="0" width ="100%">
      <tr>
         <td>
            <table cellpadding="0" cellspacing="0" border="0" width ="100%">
                <tr>
                  <td class="qline" width= "10%">'. $row['no'] .'</td>
                  <td class="qline" width= "80%">'. $row['que'] .'</td>
                  <td class="qline" width= "10%"><a href="deleteQuestion.php?p='.$row['no'].'">Delete</a></td>
                </tr>
            </table>
         </td>
      </tr>

      <tr>
         <td>
            <table cellpadding="0" cellspacing="0" border="0" width ="100%">
                <tr>
                  <td class="opline" width= "10%"></td>
                  <td class="opline" width= "80%"><span>A</span>'. $row['opa'] .'</td>
                  <td class="opline" width= "10%"></td>
                </tr>
            </table>
         </td>
      </tr>

      <tr>
         <td>
            <table cellpadding="0" cellspacing="0" border="0" width ="100%">
                <tr>
                <td class="opline" width= "10%"></td>
                  <td class="opline" width= "80%"><span>B</span>'. $row['opb'] .'</td>
                  <td class="opline" width= "10%"></td>
                </tr>
            </table>
         </td>
      </tr>

      <tr>
         <td>
         <table cellpadding="0" cellspacing="0" border="0" width ="100%">
            <tr>
            <td class="opline" width= "10%"></td>
              <td class="opline" width= "80%"><span>C</span>'. $row['opc'] .'</td>
              <td class="opline" width= "10%"></td>
            </tr>
           </table>
         </td>
      </tr>

      <tr>
         <td>
          <table cellpadding="0" cellspacing="0" border="0" width ="100%">
            <tr>
            <td class="opline" width= "10%"></td>
              <td class="opline" width= "80%"><span>D</span>'. $row['opd'] .'</td>
              <td class="opline" width= "10%"></td>
            </tr>
           </table>
         </td>
      </tr>
   </table>'; 
     }
     ksort($myarray);
     foreach($myarray as $x => $value){

        echo '<div class="singleQ">'. $value .'</div>';
     }

  
  
  ?>


  </div>
    
 

</div>

</div>
</div>
</section>
<?php require 'footer.panel.php'; ?>