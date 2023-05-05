<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-shop - Admin Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
    .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
    }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <form class="form-signin" action="admin_auth.php" method="post">
                    <h1 class="h3 mb-3 font-weight-normal text-center"><span style="color: green;">E</span>-SHOP - Admin
                        Login</h1>
                    <label for="inputUsername" class="sr-only">Username</label>
                    <input type="text" id="inputUsername" name="username" class="form-control mb-1"
                        placeholder="Username" required autofocus>
                    <br>
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" name="password" class="form-control mb-1"
                        placeholder="Password" required>
                    <br>
                    <button class="btn btn-lg btn-success btn-block mt-4" style="font-size: medium;"
                        type="submit">Login</button>
                    <div class="text-center mt-3">
                        <a href="index.php" class="btn"
                            style="border-color: green; background-color: white; color: green;">Return to Homepage</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>