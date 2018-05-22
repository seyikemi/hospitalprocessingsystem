<?php
require_once('pdo.php');
function adminValidate($username, $password){
    global $conn;
    $sql = "SELECT COUNT(*) FROM admin WHERE username=:username AND password=:pass";
    $query = $conn->prepare($sql);
    $query->bindValue(':username', $username, PDO::PARAM_STR);
    $query->bindValue(':pass', $password, PDO::PARAM_STR);
    if($query->execute()){
        if($query->fetchColumn() == 0) {
            echo '<script>alert("Invalid Login Details")</script>';
            echo '<script>window.location="Admin.html"</script>'; 
            }else{
                session_start();
                $_SESSION['username'] = $username;
                echo '<script>window.location="DashboardAdmin.php"</script>';
            }
    }
}

function doctorValidate($username, $password){
    global $conn;
   $sql = "SELECT COUNT(*) FROM doctor_view WHERE Doctor_ID=:username AND Password=:pass";
    $query = $conn->prepare($sql);
    if(ctype_digit($username)){
        $query->bindValue(':username', $username, PDO::PARAM_STR);
        $query->bindValue(':pass', $password, PDO::PARAM_STR);
        if($query->execute()){
            if($query->fetchColumn() == 0) {
                echo '<script>alert("Invalid Login Details")</script>';
                echo '<script>window.location="Doctor.html"</script>'; 
            }else{
                session_start();
                $_SESSION['doctor'] = $username;
                echo '<script>window.location="dashboardDoctor.php"</script>';
            }
        }
    }else{
        echo '<script>alert("Invalid Login Details")</script>';
        echo '<script>window.location="Doctor.html"</script>';
    }
}

function staffValidate($username, $password){
    global $conn;
    $sql = "SELECT COUNT(*) FROM staff_view WHERE Staff_ID=:username AND Password=:pass";
    $query = $conn->prepare($sql);
    if(ctype_digit($username)){
        $query->bindValue(':username', $username, PDO::PARAM_STR);
        $query->bindValue(':pass', $password, PDO::PARAM_STR);
        if($query->execute()){
            if($query->fetchColumn() == 0) {
                echo '<script>alert("Invalid Login Details")</script>';
                echo '<script>window.location="Staff.html"</script>';  
            }else{
                session_start();
                $_SESSION['staff'] = $username;
                echo '<script>window.location="dashboardStaff.php"</script>';
            }
        }
    }else{
        echo '<script>alert("Invalid Login Details")</script>';
        echo '<script>window.location="Staff.html"</script>';
    }
}

if(isset($_POST['AdminSubmit'])){
    $username = $_POST['AdminID'];
    $password = $_POST['password'];
    adminValidate($username,$password);
}

if(isset($_POST['DocSubmit'])){
    $username = $_POST['DocID'];
    $password = $_POST['password'];
    doctorValidate($username,$password);
}

if(isset($_POST['StaffSubmit'])){
    $username = $_POST['staffID'];
    $password = $_POST['password'];
    staffValidate($username,$password);
}

?>