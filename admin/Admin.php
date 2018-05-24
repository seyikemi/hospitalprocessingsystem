<?php
    session_start();
    session_unset();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Hospital Processing App</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="../css/style.css" rel="stylesheet">
</head>

<body>

    <!-- Start your project here-->
    <nav class="navbar navbar-expand-lg navbar-dark primary-color">
        <a class="navbar-brand" href="../index.html">Hospital Management System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../index.html">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="Admin.php">Admin <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../doctor/Doctor.php">Doctor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../staff/Staff.php">Staff</a>
                </li>
            </ul>
        </div>
    </nav>




    <div tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <!--Modal: Contact form-->
        <div class="modal-dialog cascading-modal" role="document">

            <!--Content-->
            <div class="modal-content">

                <!--Header-->
                <div class="modal-header primary-color white-text">
                    <h4 class="title">
                        <i class="fa fa-pencil"></i>Admin Login</h4>

                </div>
                <!--Body-->
                <form action="../scripts/validate.php" method="post">
                    <div class="modal-body">

                        <!-- Default input name -->
                        <label for="defaultFormNameModalEx">Admin ID</label>
                        <input type="text" id="defaultFormNameModalEx" name="AdminID" class="form-control form-control-sm">

                        <br>


                        <label for="defaultFormMessageModalEx">Password</label>
                        <input type="password" id="defaultFormpasswordModalEx" name="password" class=" form-control"></input>

                        <div class="text-center mt-4 mb-2">
                            <input type="submit" value="Login" class="btn btn-primary" name="AdminSubmit" style="height: 46.879999999999995px;">
                            <i class="fa fa-send ml-2"></i>
                        </div>

                    </div>
                </form>
            </div>
            <!--/.Content-->
        </div>
        <!--/Modal: Contact form-->
    </div>




    <!--Footer-->
    <footer class="page-footer font-small fixedbo primary-color pt-0">

        <!--Footer Links-->
        <div class="container">




            <!--Grid row-->
            <div class="row d-flex text-center justify-content-center mb-md-0 mb-4">

                <!--Grid column-->


            </div>
            <!--Grid row-->

            <hr class="clearfix d-md-none " style="margin: 10% 15% 5%;">

            <!--Grid row-->
            <div class="row pb-3">

                <!--Grid column-->

                <!--Grid column-->
            </div>
            <!--Grid row-->

        </div>
        <!--/Footer Links-->

        <!--Copyright-->
        <div class="footer-copyright py-3 text-center">
            © 2018 Copyright:
            <a href="https://mdbootstrap.com/material-design-for-bootstrap/"> MDBootstrap.com </a>
        </div>
        <!--/Copyright-->

    </footer>
    <!--/Footer-->

    <!-- /Start your project here-->

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../js/mdb.min.js"></script>
</body>

</html>