<?php include 'back_header.php'?>
<?php
	// Start the session
	session_start();
?>
<body>
<div class="container-fluid">
    <h3>Products Table</h3>

    <!-- //get data for table -->

<?php
    // Delete all session variables if user logs out
    if(!isset($_SESSION['username'])) {
        session_unset(); 
        session_destroy();
        echo "<script> location.replace('logIn.php')</script>";
    }
?> 

</body>
<?php include 'back_footer.php'?>