<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Hospital management</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.min.css" rel="stylesheet">

</head>

<body class="grey lighten-3">

    <!--Main Navigation-->
    <header>

        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
            <div class="container-fluid">

                <!-- Brand -->
                <a class="navbar-brand waves-effect" href="index.php"> <strong class="blue-text">Hospital Processing App</strong>
                </a>

                <!-- Collapse -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Links -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Left -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link waves-effect" href="#">Doctor
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>


                    </ul>

                    <ul class="navbar-nav nav-flex-icons">

                        <li class="nav-item">
                            <a href="index.php" class="nav-link border border-light rounded waves-effect">
                                <i class="fa fa-arrow-right "></i>Log Out
                            </a>
                        </li>
                    </ul>

                </div>

            </div>
        </nav>
        <!-- Navbar -->








        <!-- Sidebar -->
    </header>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3" style="margin-top:5%">
                <div class="list-group list-group-flush">
                    <a href="dashboardDoctor.php" class="list-group-item waves-effect">
                        <i class="fa fa-user mr-3"></i>Admitted Patients
                    </a>
                    <a href="dashboardDoctor5.php" class="list-group-item waves-effect">
                        <i class="fa fa-user-o mr-3"></i>Patient Records
                    </a>
                    <a href="dashboardDoctor3.php" class="list-group-item active  waves-effect">
                        <i class="fa fa-money mr-3"></i>Bills <span class="badge red pull-right"> 3 bills unpaid</span>
                    </a>


                    <a href="dashboardDoctor4.php" class="list-group-item  list-group-item-action waves-effect">
                        <i class="fa fa-money mr-3"></i>Questionnaire</a>
                    <a href="index.php" class="list-group-item list-group-item-action waves-effect">
                        <i class="fa fa-arrow-right mr-3"> Log Out</i>
                    </a>
                </div>
            </div>






            <div class="col-lg-9 " style="margin-top:2%">


                <div class="container-fluid mt-5">

                    <!-- Heading -->
                    <div class="card mb-4 wow fadeIn">

                        <!--Card content-->
                        <div class="card-body d-sm-flex justify-content-between">

                            <h4 class="mb-2 mb-sm-0 pt-1">
                                <a href=""><?php echo $_SESSION['doctor']; ?></a>
                                <span>/</span>

                                <span>Patient Record</span>
                            </h4>

                            <form class="d-flex justify-content-center">
                                <!-- Default input -->
                                <input type="search" placeholder="Find a Patient" aria-label="Search" class="form-control">
                                <button class="btn btn-primary btn-sm my-0 p" type="submit">
                            <i class="fa fa-search"></i>
                        </button>

                            </form>

                        </div>

                    </div>
                    <!-- Heading -->




                    <!--Card-->

                    <!--/.Card-->

                </div>
                <!--Grid column-->



                <!--Grid row-->
                <div class="row wow fadeIn">

                    <!--Grid column-->
                    <div class="col-md-12 mb-4">
                        <div class="card">
                            <div class="card-body">

                                <!--Table-->
                                <table class="table table-hover table-fixed" style="overflow-y: scroll; height: 500px;">

                                    <!--Table head-->
                                    <thead>
                                        <tr>
                                            <th>#Patient ID</th>
                                            <th>First name</th>
                                            <th>Surname</th>
                                            <th>Phone number</th>
                                            <th>Address</th>
                                            <th>Due Date of Payment</th>
                                            <th>Amount</th>
                                            <th></th>


                                        </tr>
                                    </thead>
                                    <!--Table head-->

                                    <!--Table body-->
                                    <tbody>
                                        <tr>
                                            <th scope="row">4567</th>
                                            <td>Seyike</td>
                                            <td>Sojirin</td>
                                            <td>08092046613</td>
                                            <td>18, natufe off bode thomas junction</td>
                                            <td>23-03-18</td>
                                            <td class="red-text">N3800</td>
                                            <td><button class="btn btn-sm btn-danger">Send Reminder</button></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">4567</th>
                                            <td>Seyike</td>
                                            <td>Sojirin</td>
                                            <td>08092046613</td>
                                            <td>18, natufe off bode thomas junction</td>
                                            <td>23-03-18</td>
                                            <td class="red-text">N3800</td>
                                            <td><button class="btn btn-sm btn-danger">Send Reminder</button></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">4567</th>
                                            <td>Seyike</td>
                                            <td>Sojirin</td>
                                            <td>08092046613</td>
                                            <td>18, natufe off bode thomas junction</td>
                                            <td>23-03-18</td>
                                            <td class="red-text">N3800</td>
                                            <td><button class="btn btn-sm btn-danger">Send Reminder</button></td>

                                        </tr>


                                    </tbody>
                                    <!--Table body-->

                                </table>
                                <!--Table-->

                            </div>
                        </div>

                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Grid row-->
            </div>
            </main>
        </div>
    </div>
</body>

</footer>
<!--/.Footer-->

<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="js/mdb.min.js"></script>
<!-- Initializations -->
<script type="text/javascript">
    // Animations initialization
    new WOW().init();
</script>



</body>

</html>