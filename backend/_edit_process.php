<?php include 'back_header.php'?>
<?php
	include "backend_db.php";

	db_connect();

	if(db_connect()) {
		if(isset($_POST["id"])) {

			$update = "UPDATE ".$_POST["tb"]." SET ";
			foreach($_POST as $name=>$value) {
				if($name !== "id" AND $name !== "tb") {
					$update .= $name."='".$value."', ";
				}
			}
			$update = rtrim($update, ", ");
			$update .= " WHERE product_id='".mysqli_real_escape_string(db_connect(), $_POST['id'])."'";

			$updateResult = mysqli_query(db_connect(), $update);

			if($updateResult) {
                 echo"<div class='p-3 mb-2 bg-success text-white'>Updated successfully!</div>";
				echo "<script>window.location='admin.php';</script>";
			}
			else {
                echo"<div class='p-3 mb-2 bg-danger text-white'>Update Failed!</div>";
                var_dump($udpateResult);
                var_dump($update);
			}
		}
		db_close(db_connect());
	}
?>
<?php include 'back_footer.php'?>