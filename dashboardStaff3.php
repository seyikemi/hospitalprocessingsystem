<?php
    require_once('pdo.php');
    session_start();

    if(!isset($_SESSION['staff'])){
        header("Location:Staff.php");
    }

    function allBills(){
        global $conn;
        $output = "";
        $sql = "SELECT * FROM `billing_view`";
        $query = $conn->query($sql);
        $result = $query->fetchAll();
        foreach($result as $row){
            $output .= '
                 <tr>
                    <th scope="row">'.$row['patientID'].'</th>
                    <td>'.$row['Firstname'].'</td>
                    <td>'.$row['Surname'].'</td>
                    <td>'.$row['Mobile_number'].'</td>
                    <td>'.$row['Contact_address'].'</td>
                    <td>'.$row['date_due'].'</td>
                    <td class="red-text">N'.$row['amount_payable'].'</td>
                    <td><a data-toggle="modal" data-target="#RemindPatient" class="btn btn-sm btn-danger">Send Reminder</a></td>
                    <td><a href=DoctorClass.php?action=clear&billingID='.$row['billingID'].'&admissionID='.$row['admissionID'].' class="btn btn-sm btn-primary">Clear Bill</a></td>
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
    
    function remainderLetter(){
        global $conn;
        $output = "";
        $sql = "SELECT * FROM `billing_view`";
        $query = $conn->query($sql);
        $result = $query->fetchAll();
        foreach($result as $row){
            $output .= '
                <p class="pull-left red-text" id="admissionid">'.$row['admissionID'].'</p>
                                <p class="pull-right red-text" id="patientid">'.$row['patientID'].'</p>
                                <h3 class="text-center blue-text pb-3">Payment Reminder</h3>
                                <p>Date:<span class="red-text pl-3">'.date('Y-m-d').'</span> </p>
                                <h3 class="text-center blue-text pb-3">'.$row['Firstname'].' '.$row['Surname'].'</h3>
                                    <div>
                                        <address class="black-text">'.$row['Contact_address'].'
                                            <p>'.$row['Email'].'</p>
                                            <p>'.$row['Mobile_number'].'</p>
                                        </address>
                            <p>Dear '.$row['Firstname'].' '.$row['Surname'].'</p>

                                    </div>
                                    <div>
                                        <p>You have an outstanding bill '.$row['Summary'].' valued at N'.$row['amount_payable'].' to be paid on or before '.$row['date_due'].'</p>
                                        <p>Please ensure to pay your blls</p>
                                    </div>
                                    <div>
                                        <p>Yours Sincerely</p>
                                        <p>Akoka Medical Centre</span> </p>
                                        <p>No 234, Univeristy road, Akoka</p>
                                        <p>0903356132</p>
                                        <p>info@akokamedical.com</p>
                                    </div>
            ';
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
                            <a class="nav-link waves-effect" href="#">Staff
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>


                    </ul>

                    <ul class="navbar-nav nav-flex-icons">

                        <li class="nav-item">
                            <a href="Staff.php" class="nav-link border border-light rounded waves-effect">
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
                    <a href="dashboardStaff.php" class="list-group-item waves-effect">
                        <i class="fa fa-user mr-3"></i>Admitted Patients
                    </a>
                    <a href="dashboardStaff5.php" class="list-group-item waves-effect">
                        <i class="fa fa-user-o mr-3"></i>Patient Records
                    </a>
                    <a href="dashboardStaff3.php" class="list-group-item active  waves-effect">
                        <i class="fa fa-money mr-3"></i>Bills <span class="badge badge-pill red pull-right"> <?php echo numBills()?> </span>
                    </a>


                    <a href="dashboardStaff4.php" class="list-group-item  list-group-item-action waves-effect">
                        <i class="fa fa-question mr-3"></i>Questionnaire</a>
                        <a href="dashboardStaff7.php" class="list-group-item list-group-item-action waves-effect">
                        <i class="fa fa-envelope mr-3"></i>Messages
                    </a>
                    <a href="Staff.php" class="list-group-item list-group-item-action waves-effect">
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
                                <span>Bills</span>
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
                                        <?= allBills(); ?>


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