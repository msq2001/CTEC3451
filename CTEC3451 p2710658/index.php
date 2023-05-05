<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-shop</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
    .background-image {
        background-image: url('img/background.png');
        background-repeat: no-repeat;
        background-size: cover;
        height: 75vh;
        position: relative;
    }

    .product-grid {
        position: absolute;
        bottom: 5%;
        left: 50%;
        transform: translateX(-50%);
        width: 50%;
    }

    .product-grid img {
        width: 100%;
        object-fit: cover;
        /*  */
    }
    </style>
</head>

<body>
    <!-- Navigation -->
    <!-- ... -->
    <?php
require_once('include/header.php')
?>
    <div class="background-image">
        <div class="container product-grid">
            <div class="row">
                <div class="col-md-3">
                    <a href="shopcard.php?id=1"><img src="img/product1.jpg" class="d-block" alt="Product 1"></a>
                </div>
                <div class="col-md-3">
                    <a href="shopcard.php?id=2"><img src="img/product2.jpg" class="d-block" alt="Product 2"></a>
                </div>
                <div class="col-md-3">
                    <a href="shopcard.php?id=3"><img src="img/product3.jpg" class="d-block" alt="Product 3"></a>
                </div>
                <div class="col-md-3">
                    <a href="shopcard.php?id=4"><img src="img/product4.jpg" class="d-block" alt="Product 4"></a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>