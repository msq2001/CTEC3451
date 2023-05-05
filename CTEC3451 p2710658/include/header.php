<?php
session_start();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <h1 class="h3 mb-3 font-weight-normal text-center"><span style="color: green;">E</span>-SHOP</h1>
    </a>
    <form class="form-inline my-2 my-lg-0 mx-auto" action="search_products.php" method="GET">
        <input class="form-control mr-sm-2" type="search" name="query" placeholder="Search products"
            aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>

    <div class="navbar-nav">
        <a href="./admin_login.php" class="btn btn-outline-secondary text-secondary ml-2">Admin Login</a>
        <span>&nbsp;&nbsp;&nbsp;</span>

        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) : ?>
        <span class="navbar-text">Welcome, <?= $_SESSION['name'] ?></span>
        <a class="nav-item nav-link" href="./logout.php">Sign Out</a>
        <?php else: ?>
        <a href="./sigin.html" class="btn btn-outline-secondary text-secondary">Sign In</a>
        <span>&nbsp;&nbsp;&nbsp;</span>
        <a href="./signup.html" class="btn btn-outline-secondary text-secondary">Sign Up</a>

        <span>&nbsp;&nbsp;&nbsp;</span>
        <?php endif; ?>
        <a class="nav-item nav-link" href="./wishlist.php">
            <img src="img/cart-shopping-solid.svg" alt="Wishlist" width="20" height="20">
        </a>

    </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="navbar-nav">
        <a class="nav-item nav-link" href="./index.php">Home Decor</a>
        <a class="nav-item nav-link" href="./index2.php">Furniture</a>
        <a class="nav-item nav-link" href="#">Lighting</a>
        <a class="nav-item nav-link" href="#">Home Accents</a>
        <a class="nav-item nav-link" href="#">Rugs</a>
        <a class="nav-item nav-link" href="#">Outdoors</a>
        <a class="nav-item nav-link" href="#">Holidays</a>
        <a class="nav-item nav-link" href="#">Gifts Events</a>
        <a class="nav-item nav-link" href="./sellerapplication.php">Seller application</a>
    </div>
</nav>