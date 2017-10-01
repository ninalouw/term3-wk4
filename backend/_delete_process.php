<?php include 'back_header.php'?>
<?php
	// DELETE
	include "backend_db.php";

	db_connect();

	if(db_connect()) {
		if(isset($_GET["id"])) {

			$id = mysqli_real_escape_string(db_connect(), $_GET['id']);
			$tb = mysqli_real_escape_string(db_connect(), $_GET['tb']);

			$delete = "DELETE FROM ".$tb." WHERE product_id='".$id."'";
			$deleteResult = mysqli_query(db_connect(), $delete);

			if($deleteResult) {
                echo"<div class='p-3 mb-2 bg-success text-white'>Deleted successfully!</div>";
                echo "<script>window.location = 'admin.php';</script>";
			}
			else {
                echo"<div class='p-3 mb-2 bg-danger text-white'>Delete Failed!</div>";
			}
		}
		db_close(db_connect());
	}
?>
<?php include 'back_footer.php'?>