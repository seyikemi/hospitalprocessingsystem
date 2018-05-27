<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Hospital Management</title>
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
                            <a class="nav-link waves-effect" href="#">Staff
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
                    <a href="dashboardStaff.php" class="list-group-item  waves-effect">
                        <i class="fa fa-user mr-3"></i>Admitted Patients
                    </a>
                    <a href="dashboardStaff.php" class="list-group-item active waves-effect">
                        <i class="fa fa-user-o mr-3"></i>Patient Record
                    </a>
                    <a href="dashboardStaff3.php" class="list-group-item  waves-effect">
                        <i class="fa fa-money mr-3"></i>Bills <span class="badge red pull-right"> 3 bills unpaid</span>
                    </a>



                    <a href="dashboardStaff4.php" class="list-group-item  list-group-item-action waves-effect">
                        <i class="fa fa-question mr-3"></i>Questionnaire</a>
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
                                <a href=""><?php echo $_SESSION['staff']; ?></a>
                                <span>/</span>
                                <span>Nurse</span>
                                <span>/</span>
                                <span>Patient Record</span>
                                <span>/</span>
                                <span>Seyike Sojirin</span>
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
                                <p class="pull-left red-text">#2345</p>
                                <h3 class="text-center blue-text pb-3">Seyike Sojirin</h3>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <address class="black-text">1, Olufemi road off Akerele, Surulere Lagos<br>
                P.O Box 3456
                <p>ssojirin@gmail.com.com</p>
                </address>


                                    </div>
                                    <div class="col-lg-4">
                                        <p>Date Created:<span class="red-text pl-3">23/05/12</span> </p>
                                        <p>Last Admission Date:<span class="red-text pl-3">23/05/12</span> </p>
                                        <p>Last Doctor Seen :<span class="red-text pl-3">Doctor Chibueze .P</span> </p>

                                    </div>
                                    <div class="col-lg-4">
                                        <p>Weight:<span class="red-text pl-3">50kg</span> </p>
                                        <p>Height:<span class="red-text pl-3">6 feet</span> </p>
                                        <p>Bood Group:<span class="red-text pl-3">O+</span> </p>
                                    </div>

                                </div>
                                <!--  family record-->
                                <div>
                                    <h5 class="blue-text pt-3">Personal Profile</h5>
                                    <p>Full Name : <span> Sojirin Oluwseyikemi Nkechiyere</span></p>
                                    <p>Phone Number : <span>08092046613</span></p>
                                    <p>Occupation : <span> Student</span></p>
                                    <p>Guardian : <span> Mr Sojirin Dayo</span></p>
                                    <p>Date Of Birth : <span> 07/11/97</span></p>

                                </div>
                                <br>
                                <div style="border: 1px solid blue; padding: 10px;" class="">
                                    <h5 class="blue-text pt-3 text-center">Medical Report</h5>
                                    <p>Patient Has mild ulcer and inflamation in the lower abdomen; Patient is advised to avoid too hot food, cold food, too spicy food, and must not skip breakfast. if pain persist after first round of medition, pls see a
                                        doctor immediately.</p>
                                    <p>Test done : <span class="red-text pl-2"> HP-Pivory test</span></p>
                                    <p>Result : <span class="red-text">Negative</span></p>

                                    <br>
                                    <p class="bold blue-text">Prescription</p>
                                    <pre>
                1 panadol x 12  2-2-2           N100
                1 Mix mag                       N2500
                1 Vitamin C    2-2-2            N200

                Total                           N2800

            </pre>
                                    <p>By Dr Chibueze .P</p>
                                    <p class="blue-text">Total bill</p>
                                    <p>Drugs : <span class="red-text">N2800</span></p>
                                    <p>Test : <span class="red-text">N1000</span></p>
                                    <p>Total : <span class=" btn btn-sm btn-danger">N3800</span></p>
                                    <div class="text-center">
                                        <button class="btn btn-info btn-sm text-center"> Send Report to Patient</button>
                                        <button class="btn btn-info btn-sm text-center"> Send Bill to Patient <span class = "badge red ml-2">Unpaid</span></button>
                                    </div>

                                </div>
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