
<?php
// pending databse connection
function pending_tb(){
    $serverName = 'localhost';
    $userName = 'root';
    $password = '';
    $dbName = 'quiz';
    $connection = mysqli_connect($serverName, $userName, $password, $dbName);
    return $connection;
}

// request form validation
function validate($data){
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripcslashes($data);
    return $data;
}


// unexpected error message
$unexpected_error_message = '<div class="messagePage">    
<h2>Fatal Error</h2>
<p>Unexpected System ERROR</p>
<div class="img">
    <img src="img/unexpected.png" alt="join message">
</div>
<div class="msg">
    <p>
        We apologize to make you fall in trouble. Please Contact us to solve this system problem.
        <a href="join.php">go back</a>
        <a href="https://www.facebook.com/invitationcentre.help" target="_empty">Contact us</a>
    </p>
</div>
</div>';

// pending message
$pending_message = '<div class="messagePage">
<h2> Pending...</h2>
<p>You have already a pending request with this mobile number.</p>
<div class="img">
    <img src="img/pending.png" alt="join message">
</div>
<div class="msg">
    <p>
        Hello. We are looking into your request. We will come back to you soon.
        If you want to cancel or want more information about your request, feel free to contact us.
        <a href="join.php">go back</a>
        <a href="https://www.facebook.com/invitationcentre.help" target="_empty">Contact us</a>
    </p>
</div>
</div>';

// thank you message 
$thank_you_message = '<div class="messagePage">            
<h2>Thank You</h2>
<p>We will look into your request.</p>
<div class="img">
    <img src="img/thanks.png" alt="join message">
</div>
<div class="msg">
    <p>
        Thank you for the request. We have received it. We will let you know through Facebook or via Mobile SMS. Till then please wait and stay with us.

        <a href="join.php">go back</a>
        <a href="https://www.facebook.com/invitationcentre.help" target="_empty">Facebook ID</a>
    </p>
</div>
</div>';
// sorry message
$sorry_message = '<div class="messagePage">
<h2>SORRY!</h2>
<p>You might have missed any input field</p>
<div class="img">
    <img src="img/joinmessage1.png" alt="join message">
</div>
<div class="msg">
    <p>
        We are sorry to say that we can\'t receive your information because you might missing any information field. Please fill up all the informtion carefully and try again or contact us on our facebook id;
        <a href="join.php">Try again</a>
        <a href="https://www.facebook.com/invitationcentre.help" target="_empty">Facebook ID</a>
    </p>
</div>

</div>';






