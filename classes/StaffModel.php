<?php

require_once('../scripts/pdo.php');


class StaffModel{

        function addPatient($input){
        global $conn;
        $sql = "INSERT INTO `patient`(`ID`, `Firstname`, `Surname`, `Date_Of_Birth`, `Phone_number`, `Address`, `E-mail`, `Guardian`, `Weight`, `Height`, `Blood Group`, `Genotype`, `Status`) 
        VALUES (:id,:firstname,:surname,:dob,:phone,:address,:mail,:guardian,:weight,:height,:blood,:genotype,:status)";
        $query = $conn->prepare($sql);
        if($query->execute($input)){
            echo "<script>window.location='../staff/dashboardStaff.php'</script>";
        }
    }

    function admitPatient($input){
        global $conn;
        $sql = "INSERT INTO `admission`(`addmissionid`, `patientID`, `Date_admitted`, `Admitting_staff`, `Doctor_assigned`)
        VALUES (:id,:patientid,:date_admitted,:admitting_staff,:doctorassigned)";
        $query = $conn->prepare($sql);
        if($query->execute($input)){
            echo "<script>window.location='../staff/dashboardStaff.php'</script>";
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
            header('Location:../staff/dashboardDoctor5.php');
        }else{echo "Ntorr!";}
    }

    function addDiagnosis($admission, $details, $doctor, $patient){
        global $conn;
        $sql = "INSERT INTO `diagnosis`(`admission_id`, `current_diagnosis`, `doctor_ID`) VALUES (:admissionid,:details,:doctorid)";
        $query = $conn->prepare($sql);
        $query->bindValue(':admissionid', $admission, PDO::PARAM_STR);
        $query->bindValue(':details', $details, PDO::PARAM_STR);
        $query->bindValue(':doctorid', $doctor, PDO::PARAM_STR);
        if($query->execute()){
            echo "<script>window.location='../staff/dashboardStaff6.php?admissionid=".$admission."&patientid=".$patient."'</script>";
        }
    }

    function updateDiagnosis($admission, $details, $doctor, $patient){
        global $conn;
        $sql = "UPDATE `diagnosis` SET `current_diagnosis`=:details,`doctor_ID`=:doctorid WHERE `admission_id` = '$admission'";
        $query = $conn->prepare($sql);
        $query->bindValue(':details', $details, PDO::PARAM_STR);
        $query->bindValue(':doctorid', $doctor, PDO::PARAM_STR);
        if($query->execute()){
             echo "<script>window.location='../staff/dashboardStaff6.php?admissionid=".$admission."&patientid=".$patient."'</script>";
        }
    }

    function addPres($pi, $p, $admission, $pd, $pid){
        global $conn;
        $sql = "INSERT INTO `priscriptions`(`ID`, `admission_id`, `priscribed_drug`, `priscription_information`) VALUES (:id,:admission,:p,:pd)";
        $query = $conn->prepare($sql);
        $query->bindValue(':id', $pi, PDO::PARAM_STR);
        $query->bindValue(':admission', $admission, PDO::PARAM_STR);
        $query->bindValue(':p', $p, PDO::PARAM_STR);
        $query->bindValue(':pd', $pd, PDO::PARAM_STR);
        if($query->execute()){
             echo "<script>window.location='../staff/dashboardStaff6.php?admissionid=".$admission."&patientid=".$pid."'</script>";
        }
    }

    function removePres($pid, $admission, $pi){
        global $conn;
        $sql = "DELETE FROM `priscriptions` WHERE `ID` = :pid";
        $query = $conn->prepare($sql);
        $query->bindValue(':pid', $pid, PDO::PARAM_STR);
        if($query->execute()){
             echo "<script>window.location='../staff/dashboardStaff6.php?admissionid=".$admission."&patientid=".$pi."'</script>";
        }
    }

    function addTest($tid, $admission, $did, $tn, $tr, $pi){
        global $conn;
        $sql = "INSERT INTO `tests`(`ID`, `admission_id`, `issuing_staff`, `test_name`, `test_result`) VALUES (:tid,:admission,:did,:tn,:tr)";
        $query = $conn->prepare($sql);
        $query->bindValue(':tid', $tid, PDO::PARAM_STR);
        $query->bindValue(':admission', $admission, PDO::PARAM_STR);
        $query->bindValue(':did', $did, PDO::PARAM_STR);
        $query->bindValue(':tn', $tn, PDO::PARAM_STR);
        $query->bindValue(':tr', $tr, PDO::PARAM_STR);
        if($query->execute()){
             echo "<script>window.location='../staff/dashboardStaff6.php?admissionid=".$admission."&patientid=".$pi."'</script>";
        }
    }

    function removeTest($tid, $admission, $pi){
        global $conn;
        $sql = "DELETE FROM `tests` WHERE `ID` = :tid";
        $query = $conn->prepare($sql);
        $query->bindValue(':tid', $tid, PDO::PARAM_STR);
        if($query->execute()){
             echo "<script>window.location='../staff/dashboardStaff6.php?admissionid=".$admission."&patientid=".$pi."'</script>";
        }
    }

    function Bill($input){
        global $conn;
        $sql = "INSERT INTO `billing`(`billing_ID`, `addmission_ID`, `issuer`, `Bill_Summary`, `amount_payable`, `issued_date`, `date_due`, `status`)
        VALUES (:bid,:admission,:issuer,:bs,:ap,:ida,:ddu,:status)";
        $query = $conn->prepare($sql);
        if($query->execute($input)){
            echo "<script>window.location='../staff/dashboardStaff3.php'</script>";
        }
    }

    function submitQ($qid, $reply, $sid){
        global $conn;
        $seen = "N";
        $sql = "INSERT INTO `adminfeedback`(`Question_ID`, `Reply`, `Staff_ID`, `Seen`) 
        VALUES (:qid,:reply,:sid,:seen)";
        $query = $conn->prepare($sql);
        $query->bindValue(':qid', $qid, PDO::PARAM_STR);
        $query->bindValue(':reply', $reply, PDO::PARAM_STR);
        $query->bindValue(':sid', $sid, PDO::PARAM_STR);
        $query->bindValue(':seen', $seen, PDO::PARAM_STR);
        if($query->execute()){
            echo "<script>alert('Feedback Sent')</script>";
            echo "<script>window.location='../staff/dashboardStaff4.php'</script>";
        }
    }

}
?>