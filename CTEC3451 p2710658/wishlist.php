<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-shop - Wishlist</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <?php
    require_once('include/header.php');
    require_once('wishlist_data.php');
    ?>

    <div class="container mt-5">
        <h1>Wishlist</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total_price = 0;
                foreach ($cart_items as $item) :
                    $total_price += $item['product_prices'] * $item['quantity'];
                ?>
                <tr>
                    <td>
                        <img src="<?= $item['product_images'] ?>" alt="<?= $item['product_name'] ?>"
                            style="width: 100px; height: 100px;">
                        <?= $item['product_name'] ?>
                    </td>
                    <td>$<?= $item['product_prices'] ?></td>
                    <td><?= $item['quantity'] ?></td>
                    <td>
                        <form action="remove_from_basket.php" method="POST">
                            <input type="hidden" name="product_id" value="<?= $item['product_id'] ?>">
                            <button type="submit" class="btn btn-danger">Remove</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <h4>Total price: $<?= $total_price ?></h4>
        <button class="btn btn-success mb-2" data-toggle="modal" data-target="#purchaseModal">Purchase</button>
    </div>

    <div class="modal fade" id="purchaseModal" tabindex="-1" role="dialog" aria-labelledby="purchaseModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="purchaseModalLabel">Payment and Shipping Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form onsubmit="validateForm(event)">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" required>
                        </div>
                        <div class="form-group">
                            <label for="zip">Postal Code</label>
                            <input type="text" class="form-control" id="zip" required>
                        </div>
                        <p>Total price: $<?= $total_price ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Pay Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>

</html>