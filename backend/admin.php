<?php include 'back_header.php'?>
<?php
	// Start the session
	session_start();
?>
<body>
<div class="container admin-container">
    <h3 class="text-center">Products Table</h3>

    <!-- //get data for table -->
        <?php 
            include "db.php";
            
            db_connect();

            if(db_connect()) {
                $query ="SELECT * FROM product_tb
                         INNER JOIN category_tb
                         ON category_tb.category_id=product_tb.category_id
                         ORDER BY product_id ";
                $queryResult = mysqli_query(db_connect(), $query);

                $numberOfRows = mysqli_num_rows($queryResult);

                if( $numberOfRows > 0 ){
                    echo "<div class='table-responsive'>";
                    echo "<table class='table table-condensed table-striped table-hover table-responsive'>";
                    echo "<tr class='info' style='width:100%;'>
                                <th>Product ID</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Category ID</th>
                                <th>Category Name</th>
                            </tr>";

                    while($rowArray = mysqli_fetch_assoc($queryResult)) {	
                        $productId = $rowArray["product_id"];
                        $title = $rowArray["title"];
                        $unformattedImage = $rowArray["image"];
                        //add ../ to image path
                        $image = substr_replace($unformattedImage, '../',0,0);
                        $price = $rowArray["price"];
                        //categories
                        $categoryId = $rowArray["category_id"];
                        $categoryName = $rowArray["category_name"];
                        echo "<tr>";
                            echo "<td>".$productId."</td>";
                            echo "<td>".$title."</td>";
                            echo "<td>".$price."</td>";
                            echo "<td><img style='width:40px; height:50px' src='".$image." '></td>";
                            echo "<td>".$categoryId."</td>";
                            echo "<td>".$categoryName."</td>";
                            echo "<td><a class='btn btn-info' href='_edit.php?tb=product_tb&id=".$productId."'>Edit</a></td>";
                            echo "<td><a class='btn btn-danger' href='_delete_process.php?id=".$productId."&tb=product_tb'>Delete</a></td>";
                        echo "</tr>";
                    }

                    echo "</table>";
                    echo "</div>";
                }
                else {
                    echo "<p>No info to display!</p>";
                }
            }
            else {
                echo "Connection Failed";
            }

        ?>
</div>

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