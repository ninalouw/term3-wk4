<!-- php header -->
<?php include "partials/header.php"?>

<!-- categories filter -->
<div class="container">
    <section class="filters">
        <div class="filters-products">
            <p class="lead"> Choose product categories to view products</p>
            <div class="filters-toggles">
                <span class="filters-toggle active" data-product="tops">Tops</span>
                <span class="filters-toggle active" data-product="pants">Pants</span>
                <span class="filters-toggle active" data-product="accessories">Accessories</span>
                <span class="filters-toggle active" data-product="bras">Bras</span>
                <span class="filters-toggle active" data-product="mats">Mats</span>
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
                      ON product_tb.id=category_tb.product_id
                      ORDER BY id ";
            $queryResult = mysqli_query(db_connect(), $query);
            // var_dump($queryResult);

            $numberOfRows = mysqli_num_rows($queryResult);

            if( $numberOfRows > 0 ){

                echo "<div class='row'>";

                while($rowArray = mysqli_fetch_assoc($queryResult)) {	

                    $id = $rowArray["id"];
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
                        <div class='col-lg-3 col-md-3 col-sm-6 col-xs-6'>
                            <input type='hidden' name='".$id."' value='".$id."'>
                            <input type='hidden' name='".$categoryId."' value='".$categoryId."'>
                            <div class='card'>
                            <img class='card-img-top' src='$image' alt='Card image'>
                            <div class='card-body'>
                                <h4 class='card-title'>$title</h4>
                                <p class='card-text text-muted'>Category: $categoryName</p>
                                <p class='card-text'>The best $lowerCaseCategory ever.</p>
                                <p class='card-text'>$ $price</p>
                                <a href='' class='btn btn-primary buy-btn'>Buy</a>
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