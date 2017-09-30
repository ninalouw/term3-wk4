<?php include 'back_header.php'?>
<?php
	// Start the session
	session_start();
?>
<div class="container admin-container">
    <br>
    <br>
        <h3>Add a New Product</h3>
        <div class="col-md-12 col-lg-12">
            <form action="<?php echo htmlentities( $_SERVER[ 'PHP_SELF' ] ); ?>" method="post">
                <div class="form-group row">
                    <div class="col-md-6 col-lg-6">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="Title" name="title" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 col-lg-6">
                        <label for="client">Price</label>
                        <input type="text" class="form-control" id="price" placeholder="Price" name="price" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 col-lg-6">
                        <label for="category">Category</label>
                            <select class="form-control custom-select" name="category_id">
                                <option value="1" selected>Tops</option>
                                <option value="2">Pants</option>
                                <option value="3">Accessories</option>
                                <option value="4">Bras</option>
                                <option value="5">Mats</option>
                            </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 col-lg-6">
                        <label for="image">Image</label>
                        	<select  class="form-control imageSelect" name="image" required>
                                <?php
                                    foreach(glob('../img/*[.jpg, .jpeg, .png, .PNG]') as $filename){
                                        echo "<option>" . $filename . "</option>";
                                    }
                                ?>
                            </select>
                            <div class="image-preview"></div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
            <br>
        </div>
</div>
<?php include 'back_footer.php'?>
<?php
    include "db.php";
    db_connect();
    
    if(isset($_POST['title']) && isset($_POST['image']) && isset($_POST['price']) && isset($_POST['category_id']) && isset($_POST['submit'])){

        $connection = db_connect();
        
        if(!$connection) {
            echo "<p class='bg-danger'>Connection Failed</p>";
        }
        else {
            //set timezone
            date_default_timezone_set("America/Vancouver");
            //set charset
            mysqli_set_charset($connection, "utf8");
            //escape values from form for sql
            $title =  mysqli_real_escape_string($connection,$_POST['title']);
            $price =  mysqli_real_escape_string($connection,$_POST['price']);
            $categoryId =  mysqli_real_escape_string($connection,$_POST['category_id']);
            $image =  mysqli_real_escape_string($connection,$_POST['image']);

            //insert
            $insert = "INSERT INTO product_tb (title, image, price, category_id) 
                    VALUES ('$title','$image','$price', '$categoryId')";

            $insertResult = mysqli_query($connection, $insert);

            if(!$insertResult){
                echo "<div class='p-3 mb-2 bg-danger text-white'>Failed to add product!</div>";
            } else {
                echo "<div class='p-3 mb-2 bg-success text-white'>Successfully added product!</div>";
                echo "<script>window.location = 'admin.php';</script>";
                echo "<div class='p-3 mb-2 bg-success text-white'>Successfully added product!</div>";
            }
        }
        mysqli_close($connection);
    }
?>
<?php
    // Delete all session variables if user logs out
    if(!isset($_SESSION['username'])) {
        session_unset(); 
        session_destroy();
        echo "<script> location.replace('logIn.php')</script>";
    }
?> 