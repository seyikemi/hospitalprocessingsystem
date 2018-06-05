<?php
    require_once('../scripts/pdo.php');
    session_start();

    if(!isset($_SESSION['username'])){
        header("Location:../web/index.html");
    }

    function allStaffs(){
        global $conn;
        $output = '';
        $sql = "SELECT * FROM `staff_view`";
        $query = $conn->query($sql);
        $result = $query->fetchAll();
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

    function delStaff(){
         global $conn;
        $output = '';
        $sql = "SELECT * FROM `staff_view`";
        $query = $conn->query($sql);
        $result = $query->fetchAll();
        foreach ($result as $row) {
            $output .= '<tr>
                <td><input type="checkbox" id="checkItem" name="check[]" value='.$row["Staff_ID"].'></td>
                <th scope="row">'.$row['Staff_ID'].'</th>
                <td>'.$row['Staff_name'].'</td>
                <td>'.$row['Staff_email'].'</td>
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
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="../css/style.css" rel="stylesheet">

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
                            <a class="nav-link waves-effect" href="#">Admin
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>


                    </ul>

                    <!-- Right -->
                    <ul class="navbar-nav nav-flex-icons">

                        <li class="nav-item">
                            <a href="Admin.php" class="nav-link border border-light rounded waves-effect">
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
                    <a href="dashboardAdmin.php" class="list-group-item  waves-effect">
                        <i class="fa fa-pie-chart mr-3"></i>Dashboard
                    </a>
                    <a href="dashboardAdmin2.php" class="list-group-item  list-group-item-action waves-effect">
                        <i class="fa fa-user mr-3"></i>Doctors
                    </a>
                    <a href="#" class="list-group-item active list-group-item-action waves-effect">
                        <i class="fa fa-table mr-3"></i>Staffs</a>

                    <a href="dashboardAdmin4.php" class="list-group-item list-group-item-action waves-effect">
                        <i class="fa fa-question mr-3"></i>Questionnaire</a>
                        <a href="dashboardAdmin5.php" class="list-group-item list-group-item-action waves-effect">
                        <i class="fa fa-envelope mr-3"></i>Messages
                    </a>
                    <a href="Admin.php" class="list-group-item list-group-item-action waves-effect">
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
                                <a href=""><?php echo $_SESSION['username']; ?></a>
                                <span>/</span>
                                <span>Staffs</span>
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

                                <!-- Table  -->
                                <table class="table table-hover">
                                    <h5>Registered Staffs<span><button type = "button" class = "btn-danger btn btn-sm pull-right" data-toggle="modal" data-target="#DeleteModal">Remove Staff</button></span>
                                        <span><button type = "button" class = "btn-info btn btn-sm pull-right" data-toggle="modal" data-target="#exampleModal">Create new Staffs</button></span></h5>


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
    <!-- Modal -->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create New Staff</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <form action="AdminClass.php" method="post">
                    <div class="modal-body">
                        <label>Designated Password</label>
                        <input type="text" name="pass" class="form-control" placeholder="******" required>
                        <br>
                        <label>Name</label>
                        <input type="text" name="name" class="form-control">
                        <br>
                        <label>Email</label>
                        <input type="email" name="email" class="form-control">
                        <br>
                        <label>Type of Staff</label>
                        <input type="text" name="type" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-sm  btn-primary" name="addStaff" value="Save changes">
                        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="DeleteModalLabel">Remove Staff</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <form action="AdminClass.php" method="post">
                <div class="modal-body">
                <table class="table table-hover  ">
                                    <!-- Table head -->
                                    <thead class="blue-grey lighten-4">
                                        <tr>
                                            <th><input type="checkbox" id="checkAl"> Select All</th>
                                            <th>#ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                        </tr>
                                    </thead>
                                    <!-- Table head -->

                                    <!-- Table body -->
                                    <tbody>
                                            <?= delStaff(); ?>
                                    </tbody>
                                    <!-- Table body -->
                                </table>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-sm btn-danger btn-primary" name="deleteStaff" value="YES">
                    <button type="button" class="btn btn-sm  btn-primary"  data-dismiss="modal">NO</button>
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

    $("#checkAl").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>

<!-- Charts -->


<!--Google Maps-->
<script src="https://maps.google.com/maps/api/js"></script>


</body>

</html>