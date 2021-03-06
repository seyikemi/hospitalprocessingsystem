<?php
    require_once('../scripts/pdo.php');
    session_start();

    if(!isset($_SESSION['doctor'])){
        header("Location:../web/index.html");
    }

    function Messages(){
        global $conn;
        $output = "";
        $staffid = $_SESSION['doctor'];
        $sql = "SELECT * FROM `staffmessage_view` WHERE `Staff` = '$staffid'";
        $query = $conn->query($sql);
        $result = $query->fetchAll();
        foreach($result as $row){
            $output .= '
                 <tr>
                    <th scope="row">Admin</th>
                    <td>'.$row['Content'].'</td>
                    <td><a href=DoctorClass.php?action=seen&id='.$row['FeedbackID'].' class="btn btn-sm  btn-primary pull-right animated shake">Seen</a><td>
                </tr>
            ';
        }
        return $output;
    }

    function numBills(){
        global $conn;
        $count = $conn->prepare("SELECT COUNT(*) FROM `billing_view`");
        if($count->execute()){
            $numBills = $count->fetchColumn();
        }
        return $numBills;
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
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="../css/style.min.css" rel="stylesheet">

</head>

<body class="grey lighten-3" style="overflow: hidden;">

    <!--Main Navigation-->
    <header>

        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
            <div class="container-fluid">

                <!-- Brand -->
                <a class="navbar-brand waves-effect" href="#">
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
                            <a class="nav-link waves-effect" href="#">Doctor
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>


                    </ul>

                    <ul class="navbar-nav nav-flex-icons">

                        <li class="nav-item">
                            <a href="Doctor.php" class="nav-link border border-light rounded waves-effect">
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
                    <a href="dashboardDoctor.php" class="list-group-item  waves-effect">
                        <i class="fa fa-user mr-3"></i>Admitted Patients
                    </a>
                     <a href="dashboardDoctor5.php" class="list-group-item waves-effect">
                        <i class="fa fa-user-o mr-3"></i>Patient Record
                    </a>
                    <a href="dashboardDoctor3.php" class="list-group-item  waves-effect">
                        <i class="fa fa-money mr-3"></i>Bills <span class="badge badge-pill red pull-right"><?= numBills(); ?></span>
                    </a>


                    <a href="dashboardDoctor4.php" class="list-group-item  list-group-item-action waves-effect">
                        <i class="fa fa-question mr-3"></i>Questionnaire</a>
                        <a href="dashboardDoctor7.php" class="list-group-item active list-group-item-action waves-effect">
                        <i class="fa fa-envelope mr-3"></i>Messages
                    </a>
                    <a href="Doctor.php" class="list-group-item list-group-item-action waves-effect">
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
                                <span>Messages</span>
                            </h4>

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

                            <!--Card content-->
                            <div class="card-body" style="height: 450px; overflow-y: scroll ">
                                <table class="table table-hover table-fixed" style="overflow-y: scroll; height: 100px;">
                                    <thead>
                                        <tr>
                                            <th>Sender</th>
                                            <th>Content</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php echo Messages(); ?>
                                    </tbody>
                                </table>

                                <!-- after adding new question the save becomes enable .....change disable to success -->
                                
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

</footer>
<!--/.Footer-->

<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="../js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="../js/mdb.min.js"></script>
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