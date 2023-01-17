<?php
session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <title> User Login Page </title>
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="./public/css/cyborg-bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="./public/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="./public/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="./public/fontawesome/css/all.min.css" type="text/css" rel="stylesheet">
    <style>
        #reg_frame {
            border: 1px solid #17a2b8;
        }

        input[type="password"] {
            border-right: none;

        }

        input[type="submit"],
        input[type="reset"] {
            border-radius: 4px;
        }

        #msg_frame {
            float: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="mt-lg-4 mt-md-4 mt-3">
            <div class="row justify-content-around">
                <div class="col-md-6 col-lg-6 jumbotron shadow-lg bg-light" id="reg_frame">


                    <?php
                    if (isset($_SESSION['reg_success'])) {
                    ?>
                        <div class='alert alert-success alert-dismissible fade show d-inline-block' role="alert" id="msg_frame">
                            <button type='button' class="close" data-dismiss="alert">
                                <i class='fa fa-times-circle fa-1x'></i>
                            </button>
                            <h6 class="alert-heading font-weight-bold">
                                <i class="fa fa-check-circle fa-1x"></i> Registration Successful!
                            </h6>
                        </div>
                    <?php
                    }
                    unset($_SESSION['reg_success']);
                    ?>


                    <?php
                    if (isset($_SESSION['invalid_user'])) {
                    ?>
                        <div class='alert alert-warning alert-dismissible fade show d-inline-block' role="alert" id="msg_frame">
                            <button type='button' class="close" data-dismiss="alert">
                                <i class='fa fa-times-circle fa-1x'></i>
                            </button>
                            <h6 class="alert-heading font-weight-bold"> Login Failed! </h6>
                            <p class="text-dark font-weight-bold">
                                <i class="fa fa-user-times fa-1x"></i> Invalid Account!
                            </p>
                        </div>
                    <?php
                    }
                    unset($_SESSION['invalid_user']);
                    ?>


                    <?php
                    if (isset($_SESSION['input_error'])) {
                    ?>
                        <div class='alert alert-danger alert-dismissible fade show d-inline-block' role="alert" id="msg_frame">
                            <button type='button' class="close" data-dismiss="alert">
                                <i class='fa fa-times-circle fa-1x'></i>
                            </button>
                            <h6 class="alert-heading font-weight-bold"> All input fields are required! </h6>
                        </div>
                    <?php
                    }
                    unset($_SESSION['input_error']);
                    ?>




                    <?php
                    if (isset($_SESSION["wrong_password"])) {
                    ?>
                        <div class='alert alert-warning alert-dismissible fade show d-inline-block' role="alert" id="msg_frame">
                            <button type='button' class="close" data-dismiss="alert">
                                <i class='fa fa-times-circle fa-1x'></i>
                            </button>
                            <h6 class="alert-heading font-weight-bold"> Login Failed! </h6>
                            <p class='text-dark font-weight-bold'>
                                <i class="fa fa-user-shield fa-1x"></i> Invalid Password!
                            </p>
                        </div>
                    <?php
                    }
                    unset($_SESSION["wrong_password"]);
                    ?>



                    <h1 class="course-heading m-3 text-center">
                        <i class="fa fa-user-alt fa-1x"></i> User Login
                    </h1>
                    <form action="controllers/login_controller.php" method="POST">

                        <div class='input-group mt-3'>
                            <div class="input-group-prepend mr-2">
                                <span class="input-group-text bg-info text-light">
                                    <i class="fa fa-envelope fa-1x"></i>
                                </span>
                            </div>
                            <input type="email" class="form-control shadow rounded" placeholder="someone@example.com" name="email" value="<?php if (isset($_COOKIE["userEmail"])) {
                                                                                                                                                echo $_COOKIE["userEmail"];
                                                                                                                                            } ?>">
                        </div>

                        <div class='input-group mt-3'>
                            <div class="input-group-prepend mr-2">
                                <span class="input-group-text bg-info text-light">
                                    <i class="fa fa-key fa-1x"></i>
                                </span>
                            </div>
                            <input type="password" class="form-control" placeholder="Enter Password" name="password1" id="password-field-1" value="<?php if (isset($_COOKIE["userPassword"])) {
                                                                                                                                                        echo $_COOKIE["userPassword"];
                                                                                                                                                    } ?>">
                            <div class="input-group-append" style="border-left: none;">
                                <span class="input-group-text bg-white" style="border-left: none;">
                                    <i class="fa fa-eye-slash fa-1x" id="pass-status-1" onclick="return viewPassword1()"></i>
                                </span>
                            </div>
                        </div>

                        <div class='input-group mt-3'>
                            <div class="input-group-prepend mr-2">
                                <span class="input-group-text bg-info text-light">
                                    <i class="fa fa-user-check fa-1x"></i>
                                </span>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="remember_me" class="form-check-input" <?php if (isset($_COOKIE["userEmail"])) { ?> checked <?php } ?>>
                                <label class='form-check-label mr-4'> Remember Me </label>
                            </div>

                        </div>

                        <div class="input-group mt-3 ml-md-5 ml-lg-5">
                            <input type="reset" name='reset' value="Reset" class="btn btn-outline-dark btn-md m-2">
                            <input type="submit" name='login' value="Sign In" class="btn btn-outline-info btn-md m-2">
                            <a href="index.php" class="btn btn-outline-success btn-md m-2">
                                Register
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="./public/jquery-3.3.1.js"></script>
    <script src="./public/popper.min.js"></script>
    <script src="./public/js/bootstrap.min.js"></script>
    <script src="./public/fontawesome/js/all.min.js"> </script>

    <script>
        function viewPassword1() {
            var passwordInput = document.getElementById('password-field-1');
            var eye = document.getElementById('pass-status-1');

            if (passwordInput.type == 'password') {
                passwordInput.type = 'text';
                eye.classList.toggle('fa-eye');

            } else {
                passwordInput.type = 'password';
                eye.classList.toggle('fa-eye-slash');
            }
        }
    </script>
</body>

</html>