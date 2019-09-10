<?php require 'header.panel.php'; ?>
<!-- notice section -->
<section>
<div class="container">

<div class="section_title">
    <h2>Notice Panel</h2>
</div>
<div class="row">
    <div class="col-lg-6">
        <h2 class="colum_title">Update Notice</h2>
        <?php
        $em ='';
        if(isset($_GET['error'])){
                if($_GET['error'] === 'emptyNotice'){
                    $em = '<p class="em">Empty input field</p>';
                }
                else if($_GET['error'] === 'sqlError'){
                    $em = '<p class="em">System Error!</p>';
                }
                else if($_GET['error'] === 'none'){
                    $em = '<p class="em_s">Update Successful</p>';
                }
                else if($_GET['error'] === 'exists'){
                    $em = '<p class="em">This Notice Already Exists</p>';
                }
        }
        echo $em;
        ?>
        
        <form class="notice_form" action="notice.update.php" method="Post">
            <p>Don't use upto 50 words</p>
            <textarea name="notice" id="notice" placeholder="Write Notice using less than 50 words"></textarea>
            <button id="st_btn" name="update_notice">Update</button>
        </form>


    </div>
    <div class="col-lg-6">
        <h2 class="colum_title">available Notice</h2>

            <?php
            $sql = "SELECT * FROM admins";
            $res = mysqli_query($conn, $sql);
            if(!$res){
                echo '<p class="con-err">Reading Error</p>';  
            }else{
                echo '<p class="con-succ">Reading Successful</p>';  
                $row = mysqli_fetch_assoc($res);
                echo '<p class="av_notice">'.$row["notice"] .'</p>';
            }
            
            ?>

    </div>

</div>

</div>
</section>
<?php require 'footer.panel.php'; ?>