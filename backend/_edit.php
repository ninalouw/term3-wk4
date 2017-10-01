<!-- EDIT -->
<?php include 'back_header.php'?>
<body>
    <div class="container admin-container">
		<h3>Edit Your Product </h3>
		<?php
			include "backend_db.php";

			if(isset($_GET["id"])) {
				db_connect();

				if(db_connect()) {
					$id = mysqli_real_escape_string(db_connect(), $_GET["id"]);
					$tb = mysqli_real_escape_string(db_connect(), $_GET["tb"]);

					$query = "SELECT * FROM ".$tb." WHERE product_id='".$id."'";
                    $queryResult = mysqli_query(db_connect(), $query);

					if($queryResult) {
                        echo "<div class='col-sm-12 col-md-12 col-lg-12'>";
						echo '<form class="form" action="_edit_process.php" method="POST">';

						while($rowArray = mysqli_fetch_assoc($queryResult)) {

							foreach($rowArray as $name=>$value) {
								if($name === "title" || $name === "price") {
                                    echo "<div class='form-group row'>";
                                    echo "<div class='col-sm-12 col-md-6 col-lg-6'>";
									echo '<label>'.$name.': </label><input type="text" class="form-control" name="'.$name.'" value="'.$value.'" required>
										<br><br>';
                                    echo "</div>";
                                    echo "</div>";
								}
								else if ($name === "image"){
									echo "<div class='form-group row'>";
                                    echo "<div class='col-sm-12 col-md-6 col-lg-6'>";
									echo '<label>'.$name.': </label>';
									echo "<select  class='form-control imageSelect' id='imageSelect' name='".$name."' value='".$value."'>";
										foreach(glob('../img/*[.jpg, .jpeg, .png, .PNG]') as $filename){
											echo "<option>" . $filename . "</option>";
										}
									echo "</select>";
									echo "<div class='image-preview'></div>";
                                    echo "</div>";
                                    echo "</div>";
                                }
                                else if( $name === "category_id"){
                                    echo "<div class='form-group row'>";
                                    echo "<div class='col-sm-12 col-md-6 col-lg-6'>";
									echo '<label>'.$name.': </label>';
                                    echo "<select  class='form-control name='".$name."' value='".$value."'>";
                                    echo "<option value='".$value."' selected>" . $value. "</option>";
                                    echo "<option value='1' selected>Tops</option>";
                                    echo "<option value='2'>Pants</option>";
                                    echo "<option value='3'>Accessories</option>";
                                    echo "<option value='4'>Bras</option>";
                                    echo "<option value='5'>Mats</option>";
									echo "</select>";
                                    echo "</div>";
                                    echo "</div>";
                                }
								else {
									echo '<input type="hidden" name="'.$name.'" value="'.$value.'">';
								}
							}
                            echo '<input type="hidden" name="tb" value="'.$tb.'">';
                            echo '<input type="hidden" name="id" value="'.$id.'">';
							echo '<input type="submit" class="btn btn-primary" value="Edit">';
						}
						echo '</form>';
                        echo"</div>";
					}
				}
			}
			db_close(db_connect());
		?>
    </div>
	</body>
    <?php include 'back_footer.php'?>
</html>