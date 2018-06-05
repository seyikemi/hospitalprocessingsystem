<?php
    require_once('../scripts/pdo.php');
    session_start();

    if(!isset($_SESSION['doctor'])){
        header("Location:../web/index.html");
    }

    function allPatients(){
        global $conn;
        $output = '';
        $sql = "SELECT * FROM `patient_view`";
        $query = $conn->query($sql);
        $result = $query->fetchAll();
        foreach($result as $row){
            $output .= '<tr>
                            <th scope="row">'.$row['PatientID'].'</th>
                            <td>'.$row['Firstname'].' '.$row['Surname'].'</td>
                            <td>'.$row['Phone_number'].'</td>
                            <td>'.$row['Address'].'</td>
                            <td>'.$row['E-mail'].'</td>
                            <td>'.$row['Status'].'</td>
                            <td><a href=DoctorClass.php?PatientID='.$row['PatientID'].' class="btn btn-sm btn-danger">Delete</a></td>
                            <td><a href=dashboardDoctor6.php?PatientID='.$row['PatientID'].' class="btn btn-sm btn-success">Patient file</a></td>
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
                        <i class="fa fa-user-o mr-3"></i>Patient Record
                    </a>
                    <a href="dashboardDoctor3.php" class="list-group-item  waves-effect">
                        <i class="fa fa-money mr-3"></i>Bills <span class="badge badge-pill red pull-right"><?= numBills(); ?></span>
                    </a>


                    <a href="dashboardDoctor4.php" class="list-group-item  list-group-item-action waves-effect">
                        <i class="fa fa-question mr-3"></i>Questionnaire</a>
                        <a href="dashboardDoctor7.php" class="list-group-item list-group-item-action waves-effect">
                        <i class="fa fa-envelope mr-3"></i>Messages
                    </a>
                    <a href="Doctor.php" class="list-group-item list-group-item-action waves-effect">
                        <i class="fa fa-arrow-right mr-3"> Log Out</i>
                    </a>
                </div>


                <section class = "pt-5 text-center">
                    <div class = " white py-3">
                        <a class = "btn btn-primary btn-md" data-toggle="modal" data-target="#AddPatient">Add Patient</a>
                        <!--  -->
                    </div>
                </section>
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
                                            <th>Full Name</th>
                                            <th>Phone Number</th>
                                            <th>Address</th>
                                            <th>E-mail</th>
                                            <th>Status</th>
                                            <th></th>
                                            <th></th>

                                        </tr>
                                    </thead>
                                    <!--Table head-->

                                    <!--Table body-->
                                    <tbody>
                                        <?php echo allPatients(); ?>
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
    <!--Add patient modal-->
    <div class="modal fade" id="AddPatient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="AddPatientLabel">Add Patient</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <form action="DoctorClass.php" method="post">
                <div class="modal-body">
                    <label>Patient ID</label>
                    <input type="text" name="patientid" class="form-control" required>
                    <br>
                    <label>Firstname</label>
                    <input type="text" name="fname" class="form-control" required>
                    <br>
                    <label>Lastname</label>
                    <input type="text" name="lname" class="form-control" required>
                    <br>
                    <label>Date of birth</label>
                    <input type="date" name="dob" class="form-control" required>
                    <br>
                    <label>Phone Number</label>
                    <input type="phone" name="phone" class="form-control" required>
                    <br>
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" required>
                    <br>
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                    <br>
                    <label>Guardian</label>
                    <input type="text" name="guardian" class="form-control" >
                    <br>
                    <label>Weight</label>
                    <input type="text" name="weight" class="form-control" required>
                    <br>
                    <label>Height</label>
                    <input type="text" name="height" class="form-control" required>
                    <br>
                    <label>Blood Group</label>
                    <input type="text" name="bloodgroup" class="form-control" required>
                    <br>
                    <label>Genotype</label>
                    <input type="text" name="genotype" class="form-control" required>
                    <br>
                    <label>Status</label>
                    <input type="text" name="status" class="form-control" required>
                    <br>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-sm btn-success btn-primary" name="addPatient1" value="Save">
                    <button type="button" class="btn btn-sm btn-danger btn-primary"  data-dismiss="modal">Close</button>
                </div>
            </form>
            </div>
        </div>
    </div>
        <!--Remove patient modal-->
    <div class="modal fade" id="RemovePatient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="RemovePatientLabel">Remove Patient</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <form action="DoctorClass.php" method="post">
                <div class="modal-body">
                    <label>Patient ID</label>
                    <input type="text" name="patientid" class="form-control" required>
                    <br>
                    <label>Firstname</label>
                    <input type="text" name="Fname" class="form-control" >
                    <br>
                    <label>Lastname</label>
                    <input type="text" name="Lname" class="form-control" >
                    <br>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-sm btn-danger btn-primary" name="removePatient" value="Remove">
                    <button type="button" class="btn btn-sm btn-primary"  data-dismiss="modal">Close</button>
                </div>
            </form>
            </div>
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