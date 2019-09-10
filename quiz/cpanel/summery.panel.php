<?php require 'header.panel.php'; ?>
<!-- notice section -->
<section>
<div class="container">
<div class="section_title">
    <h2>Summery Panel</h2>
</div>
<?php
   
// total members
$totalSql = "SELECT * FROM members";
$stmt = mysqli_stmt_init($conn);

mysqli_stmt_prepare($stmt, $totalSql);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
$total = mysqli_stmt_num_rows($stmt);

// active members

$totalSql = "SELECT * FROM members WHERE status = 'active' ";
$stmt = mysqli_stmt_init($conn);

mysqli_stmt_prepare($stmt, $totalSql);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
$active = mysqli_stmt_num_rows($stmt);

// blocked members

$totalSql = "SELECT * FROM members WHERE status = 'blocked' ";
$stmt = mysqli_stmt_init($conn);

mysqli_stmt_prepare($stmt, $totalSql);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
$blocked = mysqli_stmt_num_rows($stmt);

// pending members

$totalSql = "SELECT * FROM pending";
$stmt = mysqli_stmt_init($conn);

mysqli_stmt_prepare($stmt, $totalSql);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
$pending = mysqli_stmt_num_rows($stmt);



?>
<ul class="summery">
    <li>Total Members = <?php echo $total; ?></li>
    <li>Total Active Members = <?php echo $active; ?></li>
    <li>Total Blocked Members = <?php echo $blocked; ?></li>
    <li>Total Pending Members = <?php echo $pending; ?></li>
</ul>
</div>
</section>
<?php require 'footer.panel.php'; ?>