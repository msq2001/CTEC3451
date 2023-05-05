<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-shop - Change Password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    <style>
    .form-change-password {
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
                <form class="form-change-password" action="change_password_process.php" method="post">
                    <h1 class="h3 mb-3 font-weight-normal text-center">Change Password</h1>
                    <label for="inputEmail" class="sr-only">Email address</label>
                    <input type="email" id="inputEmail" name="email" class="form-control mb-3"
                        placeholder="Email address" required autofocus>
                    <label for="inputOldPassword" class="sr-only">Old Password</label>
                    <input type="password" id="inputOldPassword" name="old_password" class="form-control mb-3"
                        placeholder="Old Password" required>
                    <label for="inputNewPassword" class="sr-only">New Password</label>
                    <input type="password" id="inputNewPassword" name="new_password" class="form-control mb-3"
                        placeholder="New Password" required>
                    <label for="inputConfirmNewPassword" class="sr-only">Confirm New Password</label>
                    <input type="password" id="inputConfirmNewPassword" name="confirm_new_password" class="form-control"
                        placeholder="Confirm New Password" required>
                    <button class="btn btn-lg btn-primary btn-block mt-4" type="submit">Change Password</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>