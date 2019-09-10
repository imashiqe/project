<?php 

if(isset($_GET['p'])){
require '../php/function.php';
$conn = pending_tb();

$no = validate($_GET['p']);



$sql = "DELETE FROM question WHERE no = $no";
$query = mysqli_query($conn, $sql);

if($query){
    header("location:question.panel.php?error=deleteSuccess");
    exit();
}else{
    header("location:question.panel.php?error=deletesql");
    exit();
}


    


}else{
    header("location:question.panel.php");
    exit();
}