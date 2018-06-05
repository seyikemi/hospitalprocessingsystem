<?php
    require_once('../scripts/pdo.php');
    session_start();

    if(!isset($_SESSION['doctor'])){
        header("Location:../web/index.html");
    }

    if(isset($_GET['PatientID'])){
        $patient = $_GET['PatientID'];
        global $conn;
        $output = "";
        $sql = "SELECT * FROM `patient` WHERE `ID` = '$patient'";
        $query = $conn->query($sql);
        $result = $query->fetchAll();
        foreach($result as $row){
            $name = $row['Firstname'].' '.$row['Surname'];
        }
    }

    function getLastAdmitted($patient){
        global $conn;
        $sql = "SELECT `Date_closed` FROM `admission` WHERE `patientID` = '$patient' ORDER BY `Date_closed` DESC LIMIT 1";
        $output = '';
        $query = $conn->query($sql);
        $answer = $query->fetchAll();
        foreach($answer as $row){
            $output = $row['Date_closed'];
        }
        return $output;
    }

    function allPatients($patient){
        global $conn;
        $output = "";
        $sql = "SELECT * FROM `patient` WHERE `ID` = '$patient'";
        $query = $conn->query($sql);
        $result = $query->fetchAll();
        foreach($result as $row){
            $output .= '
            <p class="pull-left red-text">'.$row['ID'].'</p>
                                <h3 class="text-center blue-text pb-3">'.$row['Firstname'].' '.$row['Surname'].'</h3>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <address class="black-text"> '.$row['Address'].'<br>
                                            <p>'.$row['E-mail'].'</p>
                                        </address>


                                    </div>
                                    <div class="col-lg-4">';
            $output .= '
            <p>Last Admission Date:<span class="red-text pl-3">'.getLastAdmitted($patient).'</span> </p>';
            $output .= '

            </div>
                                <div class="col-lg-4">
                                    <p>Weight:<span class="red-text pl-3">'.$row['Weight'].'</span> </p>
                                    <p>Height:<span class="red-text pl-3">'.$row['Height'].'</span> </p>
                                    <p>Bood Group:<span class="red-text pl-3">'.$row['Blood Group'].'</span> </p>
                                </div>

                            </div>
                            <!--  family record-->
                            <div>
                                <h5 class="blue-text pt-3">Personal Profile</h5>
                                <p>Full Name : <span> '.$row['Firstname'].' '.$row['Surname'].'</span></p>
                                <p>Phone Number : <span>'.$row['Phone_number'].'</span></p>
                                <p>Guardian : <span> '.$row['Guardian'].'</span></p>
                                <p>Date Of Birth : <span> '.$row['Date_Of_Birth'].'</span></p>

                            </div>
                            <br>
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
    <title>Hospital Management</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="../css/style.min.css" rel="stylesheet">

</head>

<body class="grey lighten-3">

    <!--Main Navigation-->
    <header>

        <!-- Navbar -->
        <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
            <div class="container-fluid">

                <!-- Brand -->
                <a class="navbar-brand waves-effect" href="#"> <strong class="blue-text">Hospital Processing App</strong>
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
                    <a href="dashboardDoctor5.php" class="list-group-item active waves-effect">
                        <i class="fa fa-user-o mr-3"></i>Patient Records
                    </a>
                    <a href="dashboardDoctor3.php" class="list-group-item   waves-effect">
                        <i class="fa fa-money mr-3"></i>Bills <span class="badge badge-pill red pull-right"><?= numBills(); ?></span>
                    </a>



                    <a href="dashboardDoctor4.php" class="list-group-item  list-group-item-action waves-effect">
                        <href="#" i class="fa fa-question mr-3">
                            </i>Questionnaire</a>
                            <a href="dashboardDoctor7.php" class="list-group-item list-group-item-action waves-effect">
                        <i class="fa fa-envelope mr-3"></i>Messages
                    </a>
                    <a href="Doctor.php" class="list-group-item list-group-item-action waves-effect">
                        <i class="fa fa-arrow-right mr-3"> Log Out</i>
                    </a>
                </div>
                <div class="white px-3 py-3 mt-4 ">
                    <label>Can't Rememnber something, then google it</label>
                    <form method="get" action="https://www.google.com/search" target="_blank">
                    <input type="search" name="q" class="form-control" placeholder="find...">
                    <div class="text-center">
                        <input type="submit" class="btn-warning btn btn-md " value="Search">
                    </div>
                    </form>
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
                                <span>/</span>
                                <span><?= $name ?></span>
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
                            <div class="card-body">
                                <?= allPatients($patient); ?>

                                <div style="border: 1px solid blue; padding: 10px;" class="">
                                <h4>Update Patient Record</h4>
                    <form action="DoctorClass.php" method="post">
                    <div class="modal-body">
                    <label>Firstname</label>
                    <input type="text" name="fname" class="form-control">
                    <br>
                    <label>Lastname</label>
                    <input type="text" name="lname" class="form-control" >
                    <br>
                    <label>Date of birth</label>
                    <input type="date" name="dob" class="form-control" >
                    <br>
                    <label>Phone Number</label>
                    <input type="phone" name="phone" class="form-control">
                    <br>
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" >
                    <br>
                    <label>Email</label>
                    <input type="email" name="email" class="form-control">
                    <br>
                    <label>Guardian</label>
                    <input type="text" name="guardian" class="form-control" >
                    <br>
                    <label>Weight</label>
                    <input type="text" name="weight" class="form-control">
                    <br>
                    <label>Height</label>
                    <input type="text" name="height" class="form-control">
                    <br>
                    <label>Blood Group</label>
                    <input type="text" name="bloodgroup" class="form-control" >
                    <br>
                    <label>Genotype</label>
                    <input type="text" name="genotype" class="form-control" >
                    <br>
                    <label>Status</label>
                    <input type="text" name="status" class="form-control" >
                    <br>
                    <input type="hidden" name="id" class="form-control" value="<?php echo $patient ?>" >
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-sm btn-success btn-primary" name="updatePatient" value="Update">
                </div>
            </form>
                                    <!-- <div class="text-center">
                                        <button class="btn btn-info btn-sm text-center"> Send Report to Patient</button>
                                        <button class="btn btn-info btn-sm text-center"> Send Bill to Patient <span class = "badge red ml-2">Unpaid</span></button>
                                    </div> -->
                                    

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




</body>

</html>