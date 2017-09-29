<!-- php header -->
<?php include "partials/header.php"?>

<!-- categories filter -->
<div class="container">
    <section class="filters">
        <div class="filters-products">
            <p class="lead"> Choose product categories to view products</p>
            <div class="filters-toggles">
                <span class="filters-toggle active" data-product="men">Men</span>
                <span class="filters-toggle active" data-product="women">Women</span>
                <span class="filters-toggle active" data-product="bras">Sports Bras</span>
                <span class="filters-toggle active" data-product="pants">Pants</span>
                <span class="filters-toggle active" data-product="tops">Tops</span>
                <span class="filters-toggle active" data-product="accessories">Accessories</span>
            </div>
        </div>
    </section>
    <!-- second card section -->
    <h2 class="text-center">Some Dummy Products</h2>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
            <div class="card">
            <img class="card-img-top" src="img/bra-2.jpeg" alt="Card image">
            <div class="card-body">
                <h4 class="card-title">Sports Bra</h4>
                <p class="card-text text-muted">The best sports bra ever.</p>
                <p class="card-text">$50</p>
                <a href="products.php" class="btn btn-primary">Buy</a>
            </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
            <div class="card">
            <img class="card-img-top" src="img/pants-5.jpeg" alt="Card image">
            <div class="card-body">
                <h4 class="card-title">Pants</h4>
            <p class="card-text text-muted">The best pants ever.</p>
                <p class="card-text">$90</p>
                <a href="products.php" class="btn btn-primary">Buy</a>
            </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
            <div class="card">
            <img class="card-img-top" src="img/top-1.jpeg" alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title">Top</h4>
            <p class="card-text text-muted">The best top ever.</p>
                <p class="card-text">$97</p>
                <a href="products.php" class="btn btn-primary">Buy</a>
            </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
            <div class="card">
            <img class="card-img-top" src="img/pants-7.jpeg" alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title">Pants</h4>
                <p class="card-text text-muted">The best pants ever.</p>
                <p class="card-text">$88</p>
                <a href="products.php" class="btn btn-primary">Buy</a>
            </div>
            </div>
        </div>

    </div>
</div>
<!-- php footer -->
<?php include "partials/footer.php"?>