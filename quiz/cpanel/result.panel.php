<?php require 'header.panel.php'; ?>
<!-- notice section -->
<section>
<div class="container">
<div class="section_title">
    <h2>Result Panel</h2>
</div>

<div class="result_part">
  <div class="message_box">
  <?php
   $msg = '<p class="em_s">Notification</p>';
     if(isset($_GET['error'])){
       
        if($_GET['error'] === 'empty'){
          $msg = '<p class="em">Empty Input Field</p>';
        }
        else if($_GET['error'] === 'sqlerror'){
          $msg = '<p class="em">System Error</p>';
        }
        else if($_GET['error'] === 'resultExists'){
          $msg = '<p class="em">This result already exists in this season</p>';
        }
        else if($_GET['error'] === 'positionExists'){
          $msg = '<p class="em">This position already exists in this season</p>';
        }
        else if($_GET['error'] === 'nouser'){
          $msg = '<p class="em">This number is not found in database</p>';
        }
        else if($_GET['error'] === 'noname'){
          $msg = '<p class="em">This number does not have any name set</p>';
        }
        else if($_GET['error'] === 'insertsuccess'){
          $msg = '<p class="em_s">Insert Successful</p>';
        }
        else if($_GET['error'] === 'noresulthere'){
          $msg = '<p class="em">This result is not available</p>';
        }
        else if($_GET['error'] === 'updatesuccess'){
          $msg = '<p class="em_s">Update Successful</p>';
        }
        else if($_GET['error'] === 'noseason'){
          $msg = '<p class="em">This Season is not available</p>';
        }
        else if($_GET['error'] === 'nodelete'){
          $msg = '<p class="em">Unable to delete this result</p>';
        }
        else if($_GET['error'] === 'deletesuccess'){
          $msg = '<p class="em_s">Delete Success</p>';
        }
        else if($_GET['error'] === 'nores'){
          $msg = '<p class="em">No result found</p>';
        }

     }
     echo $msg;
  ?>
    
  </div>
<div class="row">
  <div class="col-lg-4 brr">
        <form class="update_result" action="update_result.php" method="POST">
                <input type="text" name="season" placeholder="Season Number">
                <input type="text" name="mobile" placeholder="mobile Number">
                <input type="text" name="score" placeholder="Score/Result">
                <input type="text" name="out_of" placeholder="Score out of">
                <input type="text" name="position" placeholder="position">
                <button class="st_btn mt-3" name="insert">Insert</button>
                <button class="st_btn mt-3" name="update">Update</button>
        </form>

  </div>
  <div class="col-lg-8">
        <form class="season_form" action="check_season.php" method="POST">
            <input type="text" name="season_check" placeholder="Season Number">
            <button class="st_btn" name="check">Check</button>
        </form>


            <form class="season_form" action="result_delete.php" method="POST">
            <input type="text" name="season" placeholder="Season Number">
            <input type="text" name="mobile" placeholder="mobile Number">
            <button class="st_btn st_btn_red" name="delete">Delete</button>
            </form>


            <form class="season_form" action="check_indi_result.php" method="POST">
            <input type="text" name="season" placeholder="Season Number">
            <input type="text" name="mobile" placeholder="mobile Number">
            <button class="st_btn" name="checkInd">Check</button>
          </form>

  <?php
     $season = $name = $mobile = $score = $out_of = $position = $date = '';
     if(isset($_GET['season']) && isset($_GET['mobile']) && isset($_GET['score'])){

      echo '<table class="table table-striped">
      <tbody>
        <tr>
          <th scope="row">Updated</th>
          <td>'. $_GET['date'] .'</td>
          <th scope="row">Score</th>
          <td>'. $_GET['score'] .'</td>
        </tr>
        <tr>
          <th scope="row">Name</th>
          <td>'. $_GET['name'] .'</td>
          <th scope="row">Out_of</th>
          <td>'. $_GET['out_of'] .'</td>
        </tr>
        <tr>
          <th scope="row">Mobile</th>
          <td>'. $_GET['mobile'] .'</td>
          <th scope="row">position</th>
          <td>'. $_GET['position'] .'</td>
        </tr>
      </tbody>
    </table>';

     }
  ?>




  </div>
</div>



    
</div>


</div>
</section>
<?php require 'footer.panel.php'; ?>