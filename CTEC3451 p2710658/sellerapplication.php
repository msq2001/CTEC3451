<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Application</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
    .btn-custom {
        background-color: white;
        color: gray;
    }
    </style>
    <script>
    $(document).ready(function() {
        $(".btn-custom").click(function() {
            var contentId = $(this).data("content");
            $(".content").hide();
            $("#" + contentId).show();
        });
    });
    </script>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4 font-weight-bold">Seller Application</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="btn-group btn-group-lg d-flex justify-content-center">
                    <button type="button" class="btn btn-custom" data-content="content1">Application Criteria</button>
                    <button type="button" class="btn btn-custom" data-content="content2">Company Profile</button>
                    <button type="button" class="btn btn-custom" data-content="content3">Web & Social Media</button>
                    <button type="button" class="btn btn-custom" data-content="content4">Contact Info</button>
                    <button type="button" class="btn btn-custom" data-content="content5">Confirm Account</button>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card content" id="content1" style="display:none;">
                    <div class="card-body">
                        <p>Copywright will prowide is wonderful serenity has taken possession of my entier as soul, like
                            these sweet mornings of spring which I enjoy with my heart, I am alone Standards</p>
                        <p class="mt-2 mb-4"><a href="guideline.html" style="color: green; text-decoration: none;">Read
                                our Buyer guidelines</a></p>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Your account</h5>
                                <hr>
                                <img src="img/head.png" alt="Profile Image" class="rounded-circle float-left mr-3"
                                    style="width: 100px; height: 100px;">
                                <br>
                                <div class="form-group mt-3">
                                    <br>
                                    <input type="email" class="form-control" placeholder="Email">
                                </div>
                                <a class="text-center" style="color: orange;" href="logout.php">Sign out and apply with
                                    another account</a>
                            </div>
                            <div class="col-md-6">
                                <h5>How did you hear about Shopper</h5>
                                <div class="form-group">
                                    <select class="form-control" id="howDidYouHear">
                                        <option value="Newspaper">Newspaper</option>
                                        <option value="TV">TV</option>
                                        <option value="Website">Website</option>
                                        <!-- Add more options here -->
                                    </select>
                                </div>

                                <!-- Add more options here -->
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card content" id="content2" style="display:none;">
                    <div class="card-body">
                        <h1>Company Profile</h1>
                        <p>Welcome to our e-shop! Our company is dedicated to providing customers with a wide range of
                            high-quality products, including electronics, clothing, home goods, and more. We strive to
                            offer competitive prices and exceptional customer service, ensuring a seamless and enjoyable
                            shopping experience for all our customers.</p>
                    </div>
                </div>
                <div class="card content" id="content3" style="display:none;">
                    <div class="card-body">
                        <h1>Web & Social Media</h1>
                        <p>Stay connected with our e-shop through our various social media platforms! Follow us on
                            Facebook, Instagram, and Twitter for the latest updates on promotions, new product arrivals,
                            and exclusive discounts. Don't forget to sign up for our newsletter to receive special
                            offers and news directly to your inbox.</p>
                    </div>
                </div>
                <div class="card content" id="content4" style="display:none;">
                    <div class="card-body">
                        <h1>Contact Info</h1>
                        <p>If you have any questions or concerns regarding our e-shop, please don't hesitate to get in
                            touch with our customer support team. You can reach us via email at support@eshop.com or by
                            phone at (123) 456-7890. Our dedicated support team is available to assist you Monday
                            through Friday from 9 AM to 5 PM.</p>
                    </div>
                </div>
                <div class="card content" id="content5" style="display:none;">
                    <div class="card-body">
                        <h1>Confirm Account</h1>
                        <p>To finalize your account setup and begin shopping on our e-shop, please make sure to confirm
                            your email address by clicking the link sent to your inbox. If you haven't received the
                            confirmation email, please check your spam folder or request a new link. Once your account
                            is confirmed, you can start browsing our wide selection of products and enjoy the benefits
                            of being an e-shop customer.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>