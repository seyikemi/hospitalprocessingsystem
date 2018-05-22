<?php
require_once('pdo.php');
     session_start();

     function allDoctors(){
        global $conn;
        $output = '';
        $sql = "SELECT * FROM `doctor_view`";
        $query = $conn->query($sql);
        $result = $query->fetchAll();
        foreach ($result as $row) {
            $output .= '<tr>
                <th scope="row">'.$row['Doctor_ID'].'</th>
                <td>'.$row['Doctor_name'].'</td>
                <td>'.$row['Doctor_email'].'</td>
                <td>'.$row['Type'].'</td>
            </tr>';
        }
        return $output;
    }

    function numDoc(){
        global $conn;
        $count = $conn->prepare("SELECT COUNT(*) FROM `doctor_view`");
        if($count->execute()){
            $numDoc = $count->fetchColumn();
        }
        return $numDoc;
    }

    function numStaff(){
        global $conn;
        $count = $conn->prepare("SELECT COUNT(*) FROM `staff_view`");
        if($count->execute()){
            $numDoc = $count->fetchColumn();
        }
        return $numDoc;
    }

     function allStaffs(){
        global $conn;
        $output = '';
        $sql = "SELECT * FROM `staff_view`";
        $query = $conn->query($sql);
        $result = $query->fetchAll();
        $totalStaff = count($result);
        foreach ($result as $row) {
            $output .= '<tr>
                <th scope="row">'.$row['Staff_ID'].'</th>
                <td>'.$row['Staff_name'].'</td>
                <td>'.$row['Staff_email'].'</td>
                <td>'.$row['Position'].'</td>
            </tr>';
        }
        return $output;
    }
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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.min.css" rel="stylesheet">
</head>

<body class="grey lighten-3" style="overflow: hidden;">

    <!--Main Navigation-->
    <header>

        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
            <div class="container-fluid">

                <!-- Brand -->
                <a class="navbar-brand waves-effect" href="index.php">
                    <strong class="blue-text">Hospital Processing App</strong>
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
                            <a class="nav-link waves-effect" href="#">Admin
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>


                    </ul>

                    <!-- Right -->
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
                    <a href="#" class="list-group-item active waves-effect">
                        <i class="fa fa-pie-chart mr-3"></i>Dashboard
                    </a>
                    <a href="dashboardAdmin2.php" class="list-group-item list-group-item-action waves-effect">
                        <i class="fa fa-user mr-3"></i>Doctors</a>
                    <a href="dashboardAdmin3.php" class="list-group-item list-group-item-action waves-effect">
                        <i class="fa fa-table mr-3"></i>Staffs</a>

                    <a href="dashboardAdmin4.php" class="list-group-item list-group-item-action waves-effect">
                        <i class="fa fa-money mr-3"></i>Questionnaire</a>
                    <a href="Admin.html" class="list-group-item list-group-item-action waves-effect">
                        <i class="fa fa-arrow-right mr-3"> Log Out</i>
                    </a>
                </div>
            </div>



            <div class="col-lg-9" style="margin-top:2%">



                <div class="container-fluid mt-5">

                    <!-- Heading -->
                    <div class="card mb-4 wow fadeIn">

                        <!--Card content-->
                        <div class="card-body d-sm-flex justify-content-between">

                            <h4 class="mb-2 mb-sm-0">
                                <a href=""><?php echo $_SESSION['username']; ?></a>
                                <span>/</span>
                                <span>Dashboard</span>
                            </h4>

                            <form class="d-flex justify-content-center">
                                <!-- Default input -->
                                <input type="search" placeholder="Search name" aria-label="Search" class="form-control">
                                <button class="btn btn-primary btn-sm my-0 p" type="submit">
                            <i class="fa fa-search"></i>
                        </button>

                            </form>

                        </div>

                    </div>
                    <!-- Heading -->




                    <!--Card-->
                    <div class="card mb-4">

                        <!--Card content-->
                        <div class="card-body">

                            <!-- List group links -->
                            <div class="list-group list-group-flush">
                                <a class="list-group-item list-group-item-action waves-effect">Number of Doctors
                                    <span class="badge badge-success badge-pill pull-right"><?php echo numDoc()  ?>
                                   
                                    </span>
                                </a>
                                <a class="list-group-item list-group-item-action waves-effect">Number of staffs
                        
                                    <span class="badge badge-danger badge-pill pull-right"><?php echo numStaff()  ?>
                                    </span>
                                </a>

                            </div>
                            <!-- List group links -->

                        </div>

                    </div>
                    <!--/.Card-->

                </div>
                <!--Grid column-->



                <!--Grid row-->
                <div class="row wow fadeIn">

                    <!--Grid column-->
                    <div class="col-md-6 mb-4">

                        <!--Card-->
                        <div class="card">

                            <!--Card content-->
                            <div class="card-body" style="height: 400px; overflow-y: scroll ">

                                <!-- Table  -->
                                <table class="table table-hover">
                                    <!-- Table head -->
                                    <thead class="blue-grey lighten-4">
                                        <h5>Registered Doctors</h5>
                                        <tr>
                                            <th>#ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Type</th>
                                        </tr>
                                    </thead>
                                    <!-- Table head -->

                                    <!-- Table body -->
                                    <tbody>
                                        <?php
                                                echo allDoctors();
                                            ?>
                                    </tbody>
                                    <!-- Table body -->
                                </table>
                                <!-- Table  -->

                            </div>

                        </div>
                        <!--/.Card-->

                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6 mb-4">

                        <!--Card-->
                        <div class="card">

                            <!--Card content-->
                            <div class="card-body" style="height: 400px; overflow-y: scroll ">

                                <!-- Table  -->
                                <table class="table table-hover">
                                    <!-- Table head -->
                                    <h5>Registered Staffs</h5>
                                    <thead class="blue lighten-4">
                                        <tr>
                                            <th>#ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Position</th>
                                        </tr>
                                    </thead>
                                    <!-- Table head -->

                                    <!-- Table body -->
                                    <tbody>
                                        <?php
                                                echo allStaffs();
                                            ?>
                                    </tbody>
                                    <!-- Table body -->
                                </table>
                                <!-- Table  -->

                            </div>

                        </div>
                        <!--/.Card-->

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

<!-- Charts -->


<!--Google Maps-->
<script src="https://maps.google.com/maps/api/js"></script>


</body>

</html>