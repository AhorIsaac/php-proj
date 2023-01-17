<?php
session_start();

if (!($_SESSION["username"])) {
    header('location: login.php');
    exit();
}

?>

<!DOCTYPE html>
<html>

<head>
    <title> User HomePage </title>
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="./public/css/cyborg-bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="./public/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="./public/fontawesome/css/all.min.css" type="text/css" rel="stylesheet">
    <style>
        .nav-link {
            color: white;
        }

        #user_img {
            height: 100px;
            width: 100px;
            border-radius: 50px;
            border: 1px solid orange;
        }

        #logout_button {
            border-radius: 20px;
        }

        .site_logo {
            font-weight: bold;
            -webkit-font-weight: bold;
            -moz-font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-info navbar-fixed-top p-4 shadow">
            <a href="#" class="navbar-brand text-light p-4">
                <span class="site_logo">Proj</span>
            </a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
                <span class="navbar-toggler-icon text-dark"></span>
            </button>
            <div class="collapse navbar-collapse text-center" id="navbarMenu">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <?php if (isset($_SESSION["image"])) { ?>
                                <img src="storage/<?php echo $_SESSION["image"]; ?>" id="user_img" />
                            <?php } else { ?>
                                <i class="fa fa-user-alt fa-3x"></i>
                            <?php } ?>
                            <p class="font-weight-bold text-light"> <?php if (isset($_SESSION["username"])) {
                                                                        echo $_SESSION["username"];
                                                                    } ?> </p>
                            <a href="logout.php" class="btn btn-outline-light btn-md" id="logout_button">
                                <i class="fa fa-power-off fa-1x"></i>
                            </a>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <?php
        if (isset($_SESSION['login_success'])) {
        ?>
            <div class='alert alert-success alert-dismissible fade show d-inline-block' role="alert" id="msg_frame">
                <button type='button' class="close" data-dismiss="alert">
                    <i class='fa fa-times-circle fa-1x'></i>
                </button>
                <h6 class="alert-heading font-weight-bold">
                    <i class="fa fa-check-circle fa-1x"></i> Login Successful!
                </h6>
                <p class="text-info">
                    Welcome
                    <?php if (isset($_SESSION["username"])) {
                        echo $_SESSION["username"];
                    } ?>
                </p>
            </div>
        <?php
        }
        unset($_SESSION['login_success']);
        ?>

        <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Custom jumbotron</h1>
                <p class="col-md-8 fs-4">Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.</p>
                <button class="btn btn-info btn-lg" type="button">Get Started</button>
            </div>
        </div>

    </div>
    <script src="./public/jquery-3.3.1.js"></script>
    <script src="./public/popper.min.js"></script>
    <script src="./public/js/bootstrap.min.js"></script>
    <script src="./public/fontawesome/js/all.min.js"> </script>
</body>

</html>