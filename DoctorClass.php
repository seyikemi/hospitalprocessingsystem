<?php
    require_once("pdo.php");
    
    function addPatient($input){
        global $conn;
        $sql = "INSERT INTO `patient`(`ID`, `Firstname`, `Surname`, `Date_Of_Birth`, `Phone_number`, `Address`, `E-mail`, `Guardian`, `Weight`, `Height`, `Blood Group`, `Genotype`, `Status`) 
        VALUES (:id,:firstname,:surname,:dob,:phone,:address,:mail,:guardian,:weight,:height,:blood,:genotype,:status)";
        $query = $conn->prepare($sql);
        if($query->execute($input)){
            echo "<script>window.location='dashboardDoctor.php'</script>";
        }
    }

    function admitPatient($input){
        global $conn;
        $sql = "INSERT INTO `admission`(`addmissionid`, `patientID`, `Date_admitted`, `Admitting_staff`, `Doctor_assigned`)
        VALUES (:id,:patientid,:date_admitted,:admitting_staff,:doctorassigned)";
        $query = $conn->prepare($sql);
        if($query->execute($input)){
            echo "<script>window.location='dashboardDoctor.php'</script>";
        }
    }

    function deletePatient($id){
        global $conn;
        $sql = "DELETE FROM `patient` WHERE `patient`.`ID` = :id";
        $query = $conn->prepare($sql);
        $input = array(
            'id' => $id,
        );
        if($query->execute($input)){
            header('Location:dashboardDoctor5.php');
        }else{echo "Ntorr!";}
    }


    if(isset($_POST['addPatient'])){
        $input = array(
            'id' => $_POST['patientid'],
            'firstname' => $_POST['fname'],
            'surname' => $_POST['lname'],
            'dob' => $_POST['dob'],
            'phone' => $_POST['phone'],
            'address' => $_POST['address'],
            'mail' => $_POST['email'],
            'guardian' => $_POST['guardian'],
            'weight' => $_POST['weight'],
            'height' => $_POST['height'],
            'blood' => $_POST['bloodgroup'],
            'genotype' => $_POST['genotype'],
            'status' => $_POST['status']
        );
        addPatient($input);
    }

    if(isset($_POST['admitPatient'])){
        $input = array(
            'id' => $_POST['admissionid'],
            'patientid' => $_POST['patientid'],
            'date_admitted' => $_POST['date_admitted'],
            'admitting_staff' => $_POST['admitting_staff'],
            'doctorassigned' => $_POST['doctorassigned']
        );
        admitPatient($input);
    }

    if(isset($_POST['addPatient1'])){
        $input = array(
            'id' => $_POST['patientid'],
            'firstname' => $_POST['fname'],
            'surname' => $_POST['lname'],
            'dob' => $_POST['dob'],
            'phone' => $_POST['phone'],
            'address' => $_POST['address'],
            'mail' => $_POST['email'],
            'guardian' => $_POST['guardian'],
            'weight' => $_POST['weight'],
            'height' => $_POST['height'],
            'blood' => $_POST['bloodgroup'],
            'genotype' => $_POST['genotype'],
            'status' => $_POST['status']
        );
        addPatient($input);
        header('Location:dashboardDoctor5.php');
    }

    if(isset($_POST['removePatient'])){
        $id = $_POST['patientid'];
        deletePatient($id);
    }


?>