<?php require 'header.panel.php'; ?>
<!-- notice section -->
<section>
<div class="container">
<div class="section_title">
    <h2>Security Panel</h2>
</div>
<div class="row">
    <div class="col-lg-1"></div>
    <div class="col-lg-5">
       <h2 class="colum_title">Update Username</h2>

       <div class="security_panel">
            <?php
            if(isset($_GET['error'])){
                if($_GET['error'] === 'userempty'){
                    echo '<p class="em">Empty Field</p>';
                }
                else if($_GET['error'] === 'usersql'){
                    echo '<p class="em">System Error</p>';
                }
                else if($_GET['error'] === 'userdif'){
                    echo '<p class="em">New Usernames are not same</p>';
                }
                else if($_GET['error'] === 'oldusererror'){
                    echo '<p class="em">Old Username Wrong</p>';
                }
                else if($_GET['error'] === 'userexists'){
                    echo '<p class="em">Username Exists</p>';
                }
                else if($_GET['error'] === 'usersuccess'){
                    echo '<p class="em_s">Update Successful</p>';
                }
            }
           
           ?>           
           <form action="update_username.php" method="POST">
               <input type="text" name="olduser" placeholder="Old Username">
               <input type="text" name="newuser1" placeholder="New Username">
               <input type="text" name="newuser2" placeholder="Repeat New Username">
               <button name="update_user_btn">Update</button>
           </form>
       </div>


    </div>
    <div class="col-lg-1"></div>
    <div class="col-lg-5">
       <h2 class="colum_title">Update Password</h2>
       <div class="security_panel">
       <?php
            if(isset($_GET['error'])){
                if($_GET['error'] === 'pwdempty'){
                    echo '<p class="em">Empty Field</p>';
                }
                else if($_GET['error'] === 'pwdsql'){
                    echo '<p class="em">System Error</p>';
                }
                else if($_GET['error'] === 'pwddif'){
                    echo '<p class="em">New Password are not same</p>';
                }
                else if($_GET['error'] === 'oldpwderror'){
                    echo '<p class="em">Old Password Wrong</p>';
                }
                else if($_GET['error'] === 'pwdexists'){
                    echo '<p class="em">Password Exists</p>';
                }
                else if($_GET['error'] === 'pwdsuccess'){
                    echo '<p class="em_s">Update Successful</p>';
                }
            }
           
           ?>  
           <form action="update_username.php" method="POST">
               <input type="text" name="oldpwd" placeholder="Old Password">
               <input type="text" name="newpwd1" placeholder="New Password">
               <input type="text" name="newpwd2" placeholder="Repeat New Password">
               <button name="update_pwd_btn">Update</button>
           </form>
       </div>
    </div>
    <div class="col-lg-1"></div>
</div>



</div>
</section>
<?php require 'footer.panel.php'; ?>