<?php
session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <title> User Registration Page </title>
    <meta charset='utf-8'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="./public/css/cyborg-bootstrap.min.css" type="text/css" rel="stylesheet">
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
                    if (isset($_SESSION['pass_error'])) {
                    ?>
                        <div class='alert alert-danger alert-dismissible fade show d-inline-block' role="alert" id="msg_frame">
                            <button type='button' class="close" data-dismiss="alert">
                                <i class='fa fa-times-circle fa-1x'></i>
                            </button>
                            <h6 class="alert-heading font-weight-bold"> The two passwords do not match! </h6>
                        </div>
                    <?php
                    }
                    unset($_SESSION['pass_error']);
                    ?>


                    <?php
                    if (isset($_SESSION['acc_error'])) {
                    ?>
                        <div class='alert alert-warning alert-dismissible fade show d-inline-block' role="alert" id="msg_frame">
                            <button type='button' class="close" data-dismiss="alert">
                                <i class='fa fa-times-circle fa-1x'></i>
                            </button>
                            <h6 class="alert-heading font-weight-bold"> Account Already Exist! </h6>
                            <p class='text-dark font-weight-bold'>
                                This <i class="fa fa-user-alt fa-1x"></i> already registered!
                            </p>
                        </div>
                    <?php
                    }
                    unset($_SESSION['acc_error']);
                    ?>


                    <?php
                    if (isset($_SESSION['img_error'])) {
                    ?>
                        <div class='alert alert-danger alert-dismissible fade show d-inline-block' role="alert" id="msg_frame">
                            <button type='button' class="close" data-dismiss="alert">
                                <i class='fa fa-times-circle fa-1x'></i>
                            </button>
                            <h6 class="alert-heading font-weight-bold"> Invalid <i class='fa fa-image fa-1x'></i> format </h6>
                        </div>
                    <?php
                    }
                    unset($_SESSION['img_error']);
                    ?>


                    <h1 class="course-heading m-3 text-center">
                        <i class="fa fa-user-alt fa-1x"></i> User Registration
                    </h1>
                    <form action="controllers/registration_controller.php" method="POST" enctype="multipart/form-data">
                        <div class='input-group mt-3'>
                            <div class="input-group-prepend mr-2">
                                <span class="input-group-text bg-info text-light">
                                    <i class="fa fa-user fa-1x"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control shadow rounded" placeholder="Create Username" name="username">
                        </div>

                        <div class='input-group mt-3'>
                            <div class="input-group-prepend mr-2">
                                <span class="input-group-text bg-info text-light">
                                    <i class="fa fa-envelope fa-1x"></i>
                                </span>
                            </div>
                            <input type="email" class="form-control shadow rounded" placeholder="someone@example.com" name="email">
                        </div>

                        <div class='input-group mt-3'>
                            <div class="input-group-prepend mr-2">
                                <span class="input-group-text bg-info text-light">
                                    <i class="fa fa-key fa-1x"></i>
                                </span>
                            </div>
                            <input type="password" class="form-control" placeholder="Create Password" name="password1" id="password-field-1">
                            <div class="input-group-append" style="border-left: none;">
                                <span class="input-group-text bg-white" style="border-left: none;">
                                    <i class="fa fa-eye-slash fa-1x" id="pass-status-1" onclick="return viewPassword1()"></i>
                                </span>
                            </div>
                        </div>

                        <div class='input-group mt-3'>
                            <div class="input-group-prepend mr-2">
                                <span class="input-group-text bg-info text-light">
                                    <i class="fa fa-lock fa-1x"></i>
                                </span>
                            </div>
                            <input type="password" class="form-control" placeholder="Repeat Password" name="password2" id="password-field-2">
                            <div class="input-group-append" style="border-left: none;">
                                <span class="input-group-text bg-white" style="border-left: none;">
                                    <i class="fa fa-eye-slash fa-1x" id="pass-status-2" onclick="return viewPassword2()"></i>
                                </span>
                            </div>
                        </div>

                        <div class='input-group mt-3'>
                            <div class="input-group-prepend mr-2">
                                <span class="input-group-text bg-info text-light">
                                    <i class="fa fa-image fa-1x"></i>
                                </span>
                            </div>
                            <input type="file" class="form-control shadow rounded" placeholder="choose profile pic" name="image" accept="image/*">
                        </div>


                        <div class="input-group mt-3 ml-md-5 ml-lg-5">
                            <input type="reset" name='reset' value="Reset" class="btn btn-outline-dark btn-md m-2">
                            <input type="submit" name='register' value="Sign Up" class="btn btn-outline-info btn-md m-2">
                            <a href="login.php" class="btn btn-outline-success btn-md m-2">
                                Already Have an Account?
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

        function viewPassword2() {
            var passwordInput = document.getElementById('password-field-2');
            var eye = document.getElementById('pass-status-2');

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