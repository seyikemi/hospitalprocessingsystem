<?php
    require_once('../scripts/pdo.php');
    session_start();

    if(!isset($_SESSION['doctor'])){
        header("Location:../web/index.html");
    }

    if(isset($_GET['admissionid'])){
        $admission = $_GET['admissionid'];
        $patient = $_GET['patientid'];
        global $conn;
        $output = "";
        $sql = "SELECT * FROM `admission_view` WHERE `addmissionID` = '$admission' AND `patientID` = '$patient'";
        $query = $conn->query($sql);
        $result = $query->fetchAll();
        foreach($result as $row){
            $name = $row['Firstname'].' '.$row['Surname'];
        }
    }

    function allAdmitted($admission, $patient){
        global $conn;
        $output = "";
        $sql = "SELECT * FROM `admission_view` WHERE `addmissionID` = '$admission' AND `patientID` = '$patient'";
        $query = $conn->query($sql);
        $result = $query->fetchAll();
        foreach($result as $row){
            $output .= '
            <p class="pull-left red-text" id="admissionid">'.$row['addmissionID'].'</p>
                                <p class="pull-right red-text" id="patientid">'.$row['patientID'].'</p>
                                <h3 class="text-center blue-text pb-3">'.$row['Firstname'].' '.$row['Surname'].'</h3>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <address class="black-text">'.$row['Address'].'
                                            <p>'.$row['E-mail'].'</p>
                                        </address>


                                    </div>
                                    <div class="col-lg-4">
                                        <p>Date Created:<span class="red-text pl-3">'.$row['Date_admitted'].'</span> </p>
                                        <p>Last Doctor Seen :<span class="red-text pl-3">'.$row['Last_doctor_assigned'].'</span> </p>

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
                                    <p>Phone Number : <span> '.$row['Mobile_number'].'</span></p>
                                    <p>Guardian : <span> '.$row['Guardian'].'</span></p>
                                    <p>Date Of Birth : <span> '.$row['DOB'].'</span></p>
                                    ';
        }
        return $output;
    }

    function allPrescriptions(){
        global $conn;
        $output = "";
        $sql = "SELECT * FROM `priscriptions`";
        $query = $conn->query($sql);
        $result = $query->fetchAll();
        foreach($result as $row){
            $output = '
                <tr>
                            <th scope="row">'.$row['ID'].'</th>
                            <td>'.$row['priscribed_drug'].'</td>
                            <td>'.$row['priscription_information'].'</td>
                        </tr>
            ';
        }
        return $output;
    }

    function diagnosis(){
        global $conn;
        $output = "";
        $sql = "SELECT * FROM `diagnosis_view`";
        $query = $conn->query($sql);
        $result = $query->fetchAll();
        foreach($result as $row){
            $output .= '
                 <h5>'.$row['current_diagnosis'].'<h5>
                <br>
                <h6><i>Diagnosed by '.$row['Employee_name'].'</i><h6>
            ';
        }
        return $output;
    }

    function Tests(){
        global $conn;
        $output = "";
        $sql = "SELECT * FROM `test_view`";
        $query = $conn->query($sql);
        $result = $query->fetchAll();
        foreach($result as $row){
            $output .= '
                 <tr>
                    <th scope="row">'.$row['ID'].'</th>
                    <td>'.$row['Employee_name'].'</td>
                    <td>'.$row['test_name'].'</td>
                    <td>'.$row['test_result'].'</td>
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
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/report.js"></script>

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
                    <a href="dashboardDoctor.php" class="list-group-item active  waves-effect">
                        <i class="fa fa-user mr-3"></i>Admitted Patients
                    </a>
                    <a href="dashboardDoctor5.php" class="list-group-item waves-effect">
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
                                <span><?= $name; ?></span>
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
                                <?php echo allAdmitted($admission, $patient); ?>


                                <div>
                                    <a class = "nav-link btn-warning  btn btn-md" onclick="diagnose()">Diagnose</a>
                                    <a class = "nav-link btn-warning  btn btn-md" onclick="prescribe()">Prescribe Drug</a>
                                    <a class = "nav-link btn-warning  btn btn-md" onclick="uploadTest()">Upload Test result</a>
                                    <a class = "nav-link btn-warning  btn btn-md" onclick=" viewDiagnosis()">View Diagnosis</a>
                                    <a class = "nav-link btn-warning  btn btn-md" onclick="viewPrescription()">View Prescription</a>
                                    <a class = "nav-link btn-warning  btn btn-md" onclick="viewTest()">View Test result</a>
                                    
                                    
                                </div>

                                </div>
                                <br>
                                <div style="border: 1px solid blue; padding: 10px;" class="">
                                    <h5 class="blue-text pt-3 text-center">Medical Report</h5>
            <div id="diagnose" style="display:none">
                <form action="DoctorClass.php" method="post">
                <div class="modal-body">
                    <label>Diagnosis</label><br>
                        <textarea name="details" id="priscripdetails" cols="50" rows="3" required></textarea>
                    <br>
                    <input type="hidden" name="admissionid" value="<?= $admission ?>">
                    <input type="hidden" name="patientid" value="<?= $patient ?>">
                    <input type="hidden" name="doctorid" value="<?= $_SESSION['doctor']; ?>">
                </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-sm btn-primary" name="diagnosePatient" value="New Diagnosis">
                        <input type="submit" class="btn btn-sm btn-primary" name="updatediagnosePatient" value="Update Diagnosis">
                    </div>
                </form>
            </div>
            <div id="priscribe" style="display:none">
                                        <h4>Add a Prescription</h4>
                <form action="DoctorClass.php" method="post">
                <div class="modal-body">
                    <label>Prescription ID</label>
                    <input type="text" name="prescriptionid" class="form-control" placeholder="enter 1,2,3..." required>
                    <br>
                    <label>Prescribed Drug</label><br>
                    <input type="text" name="prescription" class="form-control" required>
                    <br>
                    <input type="hidden" name="admissionid" value="<?= $admission ?>">
                    <input type="hidden" name="patientid" value="<?= $patient ?>">
                    <label>Prescription Details</label><br>
                        <textarea name="details" id="prescripdetails" cols="50" rows="3" required></textarea>
                    <br>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-sm btn-primary" name="PrescribePatient" value="Prescribe">
                </div>
                </form>
                <br>
                <h4>Remove a Prescription</h4>
                <form action="DoctorClass.php" method="post">
                    <div class="modal-body">
                        <label>Prescription ID</label>
                        <input type="text" name="prescriptionremoveid" class="form-control" placeholder="enter 1,2,3..." required>
                        <br>
                        <input type="hidden" name="admissionid" value="<?= $admission ?>">
                        <input type="hidden" name="patientid" value="<?= $patient ?>">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-sm btn-danger btn-primary" name="RemovePrescription" value="Remove Prescription">
                    </div>
                </form>
            </div>
            <div id="uploadtests" style="display:none">
                <h4>Upload Test Result</h4>
                <form action="DoctorClass.php" method="post">
                    <div class="modal-body">
                        <label>Test ID</label>
                        <input type="text" name="testid" class="form-control" placeholder="enter 1,2,3..." required>
                        <br>
                        <label>Test name</label>
                        <input type="text" name="testname" class="form-control" required>
                        <br>
                        <label>Test Result</label>
                        <input type="text" name="testres" class="form-control" required>
                        <br>
                        <input type="hidden" name="admissionid" value="<?= $admission ?>">
                        <input type="hidden" name="patientid" value="<?= $patient ?>">
                        <input type="hidden" name="doctorid" value="<?= $_SESSION['doctor']; ?>">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-sm  btn-primary" name="UploadTests" value="Upload">
                    </div>
                </form>
                <br>
                    <h4>Remove a Test Record</h4>
                <form action="DoctorClass.php" method="post">
                    <div class="modal-body">
                        <label>Test ID</label>
                        <input type="text" name="testremoveid" class="form-control" placeholder="enter 1,2,3..." required>
                        <br>
                        <input type="hidden" name="admissionid" value="<?= $admission ?>">
                        <input type="hidden" name="patientid" value="<?= $patient ?>">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-sm btn-danger btn-primary" name="RemoveTest" value="Remove Test Record">
                    </div>
                </form>
            </div>
            <div id="diagnosis" style="display:none">
                <h5>Current diagnosis for <?= $name; ?><h5>
                <br>
                <h4>Diagnosis<h4>
                <br>
                <?= diagnosis(); ?>
            </div>
            <div id="priscription" style="display:none">
                <h5>Current prescription(s) for <?= $name; ?><h5>
                <br>
                <h4>Prescription(s)<h4>
                <br>
                <table class="table table-hover table-fixed" style="overflow-y: scroll; height: 100px;">
                    <thead>
                        <tr>
                            <th>Prescription ID</th>
                            <th>Drug</th>
                            <th>Prescription</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php echo allPrescriptions(); ?>
                    </thbody>
                </table>
                <br>
                
            </div> 
            <div id="tests"   style="display:none">
                <h5>Test results for <?= $name; ?><h5>
                <br>
                <h4>Test(s)<h4>
                <br>
                <table class="table table-hover table-fixed" style="overflow-y: scroll; height: 100px;">
                    <thead>
                        <tr>
                            <th>Test ID</th>
                            <th>Issued by</th>
                            <th>Test Name</th>
                            <th>Test Result</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= Tests(); ?>
                    </tbody>
                </table>
                <br>
                
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