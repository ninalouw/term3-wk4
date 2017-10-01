<!-- php header -->
<?php include "partials/header.php"?>
<?php include "partials/modal.php"?>

<!-- categories filter -->
<div class="container">
    <section class="filters">
        <div class="filters-categories">
            <p class="lead">Choose Categories</p>
            <div class="filters-toggles">
                <span class="filters-toggle active" data-category="Tops">Tops</span>
                <span class="filters-toggle active" data-category="Pants">Pants</span>
                <span class="filters-toggle active" data-category="Accessories">Accessories</span>
                <span class="filters-toggle active" data-category="Bras">Bras</span>
                <span class="filters-toggle active" data-category="Mats">Mats</span>
            </div>
        </div>
    </section>
    <!-- second card section -->
    <h2 class="text-center">Our Products</h2>
    <?php 
        include "backend/db.php";
        
        db_connect();

        if(db_connect()) {
            $query = " SELECT * FROM product_tb
                      INNER JOIN category_tb
                      ON category_tb.category_id=product_tb.category_id ";
            $queryResult = mysqli_query(db_connect(), $query);
            // var_dump($queryResult);

            $numberOfRows = mysqli_num_rows($queryResult);

            if( $numberOfRows > 0 ){

                echo "<div class='row'>";

                while($rowArray = mysqli_fetch_assoc($queryResult)) {	

                    $productId = $rowArray["product_id"];
                    $title = $rowArray["title"];
                    $unformattedImage = $rowArray["image"];
                    //image has ../, remove it
                    $image = ltrim( $unformattedImage, "../" );
                    $price = $rowArray["price"];
                    //categories
                    $categoryId = $rowArray["category_id"];
                    $categoryName = $rowArray["category_name"];
                    $lowerCaseCategory = strtolower($rowArray["category_name"]);
                    echo "
                        <div class='category col-lg-3 col-md-3 col-sm-6 col-xs-6' data-category='".$categoryName."'>
                            <input type='hidden' name='".$productId."' value='".$productId."'>
                            <input type='hidden' name='".$categoryId."' value='".$categoryId."'>
                            <div class='card'>
                            <img class='card-img-top' src='$image' alt='Card image'>
                            <div class='card-body'>
                                <h4 class='card-title title'>$title</h4>
                                <p class='card-text text-muted'>Category: $categoryName</p>
                                <p class='card-text'>The best $lowerCaseCategory ever.</p>
                                <p class='card-text price'>$ $price</p>
                                <button type='button' class='btn btn-primary buy-btn'>Buy</button>
                            </div>
                            </div>
                        </div>
                        ";
                }
                echo "</div>";
            }
            else {
                echo "<p>No info to display!</p>";
            }
        }
        else {
            echo "<p>Connection Failed</p>";
        }

    ?>
</div>
<!-- php footer -->
<?php include "partials/footer.php"?>
<script src="js/filter.js"></script>
<script src="js/cart.js"></script>