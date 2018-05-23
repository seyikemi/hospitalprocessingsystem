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

    function addDiagnosis($admission, $details, $doctor, $patient){
        global $conn;
        $sql = "INSERT INTO `diagnosis`(`admission_id`, `current_diagnosis`, `doctor_ID`) VALUES (:admissionid,:details,:doctorid)";
        $query = $conn->prepare($sql);
        $query->bindValue(':admissionid', $admission, PDO::PARAM_STR);
        $query->bindValue(':details', $details, PDO::PARAM_STR);
        $query->bindValue(':doctorid', $doctor, PDO::PARAM_STR);
        if($query->execute()){
            echo "<script>window.location='dashboardDoctor2.php?admissionid=".$admission."&patientid=".$patient."'</script>";
        }
    }

    function updateDiagnosis($admission, $details, $doctor, $patient){
        global $conn;
        $sql = "UPDATE `diagnosis` SET `current_diagnosis`=:details,`doctor_ID`=:doctorid WHERE `admission_id` = '$admission'";
        $query = $conn->prepare($sql);
        $query->bindValue(':details', $details, PDO::PARAM_STR);
        $query->bindValue(':doctorid', $doctor, PDO::PARAM_STR);
        if($query->execute()){
             echo "<script>window.location='dashboardDoctor2.php?admissionid=".$admission."&patientid=".$patient."'</script>";
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
             echo "<script>window.location='dashboardDoctor2.php?admissionid=".$admission."&patientid=".$pid."'</script>";
        }
    }

    function removePres($pid, $admission, $pi){
        global $conn;
        $sql = "DELETE FROM `priscriptions` WHERE `ID` = :pid";
        $query = $conn->prepare($sql);
        $query->bindValue(':pid', $pid, PDO::PARAM_STR);
        if($query->execute()){
             echo "<script>window.location='dashboardDoctor2.php?admissionid=".$admission."&patientid=".$pi."'</script>";
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
             echo "<script>window.location='dashboardDoctor2.php?admissionid=".$admission."&patientid=".$pi."'</script>";
        }
    }

    function removeTest($tid, $admission, $pi){
        global $conn;
        $sql = "DELETE FROM `tests` WHERE `ID` = :tid";
        $query = $conn->prepare($sql);
        $query->bindValue(':tid', $tid, PDO::PARAM_STR);
        if($query->execute()){
             echo "<script>window.location='dashboardDoctor2.php?admissionid=".$admission."&patientid=".$pi."'</script>";
        }
    }

    function Bill($input){
        global $conn;
        $sql = "INSERT INTO `billing`(`billing_ID`, `addmission_ID`, `issuer`, `Bill_Summary`, `amount_payable`, `issued_date`, `date_due`, `status`)
        VALUES (:bid,:admission,:issuer,:bs,:ap,:ida,:ddu,:status)";
        $query = $conn->prepare($sql);
        if($query->execute($input)){
            echo "<script>window.location='dashboardDoctor3.php'</script>";
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
            echo "<script>window.location='dashboardDoctor4.php'</script>";
        }
    }

    function transfer($admission, $doctor, $last){
        global $conn;
        $sql = "UPDATE `admission` SET `Doctor_assigned`=:doctor,`Last_doctor_assigned`=:last WHERE `addmissionid` = :admission";
        $query = $conn->prepare($sql);
        $query->bindValue(':doctor', $doctor, PDO::PARAM_STR);
        $query->bindValue(':last', $last, PDO::PARAM_STR);
        $query->bindValue(':admission', $admission, PDO::PARAM_STR);
        if($query->execute()){
            echo "<script>window.location='dashboardDoctor.php'</script>";
        }
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
    if(isset($_POST['updatePatient'])){
        $id = $_POST['id'];
        if(isset($_POST['fname'])){
            $fname = $_POST['fname'];
            if($fname !== ""){
            global $conn;
            $sql = "UPDATE `patient` SET `Firstname`=:fname WHERE `ID` = :id";
            $query = $conn->prepare($sql);
            $query->bindValue(':id', $id, PDO::PARAM_STR);
            $query->bindValue(':fname', $fname, PDO::PARAM_STR);
                if($query->execute()){
                    echo "<script>window.location='dashboardDoctor6.php?PatientID=".$id."'</script>";
                }
            }
        }
        if(isset($_POST['lname'])){
            global $conn;
            $lname = $_POST['lname'];
            if($lname !== ""){
            $sql = "UPDATE `patient` SET `Surname`=:lname WHERE `ID` = :id";
            $query = $conn->prepare($sql);
            $query->bindValue(':id', $id, PDO::PARAM_STR);
            $query->bindValue(':lname', $lname, PDO::PARAM_STR);
            if($query->execute()){
                echo "<script>window.location='dashboardDoctor6.php?PatientID=".$id."'</script>";
            }
        }
        }
        if(isset($_POST['dob'])){
            global $conn;
            $dob = $_POST['dob'];
            if($dob !== ""){
            $sql = "UPDATE `patient` SET `Date_Of_Birth`=:dob WHERE `ID` = :id";
            $query = $conn->prepare($sql);
            $query->bindValue(':id', $id, PDO::PARAM_STR);
            $query->bindValue(':dob', $dob, PDO::PARAM_STR);
            if($query->execute()){
                echo "<script>window.location='dashboardDoctor6.php?PatientID=".$id."'</script>";
            }
        }
        }
        if(isset($_POST['phone'])){
            global $conn;
            $phone = $_POST['phone'];
            if($phone !== ""){
            $sql = "UPDATE `patient` SET `Phone_number`=:phone WHERE `ID` = :id";
            $query = $conn->prepare($sql);
            $query->bindValue(':id', $id, PDO::PARAM_STR);
            $query->bindValue(':phone', $phone, PDO::PARAM_STR);
            if($query->execute()){
                echo "<script>window.location='dashboardDoctor6.php?PatientID=".$id."'</script>";
            }
        }
        }
        if(isset($_POST['address'])){
            global $conn;
            $address = $_POST['address'];
            if($address !== ""){
            $sql = "UPDATE `patient` SET `Address`=:address WHERE `ID` = :id";
            $query = $conn->prepare($sql);
            $query->bindValue(':id', $id, PDO::PARAM_STR);
            $query->bindValue(':address', $address, PDO::PARAM_STR);
            if($query->execute()){
                echo "<script>window.location='dashboardDoctor6.php?PatientID=".$id."'</script>";
            }
        }
        }
        if(isset($_POST['email'])){
            global $conn;
            $mail = $_POST['email'];
            if($mail !== ""){
            $sql = "UPDATE `patient` SET `E-mail`=:mail WHERE `ID` = :id";
            $query = $conn->prepare($sql);
            $query->bindValue(':id', $id, PDO::PARAM_STR);
            $query->bindValue(':mail', $mail, PDO::PARAM_STR);
            if($query->execute()){
                echo "<script>window.location='dashboardDoctor6.php?PatientID=".$id."'</script>";
            }
        }
        }
        if(isset($_POST['guardian'])){
            global $conn;
            $guardian = $_POST['guardian'];
            if($guardian !== ""){
            $sql = "UPDATE `patient` SET `Guardian`=:guardian WHERE `ID` = :id";
            $query = $conn->prepare($sql);
            $query->bindValue(':id', $id, PDO::PARAM_STR);
            $query->bindValue(':guardian', $guardian, PDO::PARAM_STR);
            if($query->execute()){
                echo "<script>window.location='dashboardDoctor6.php?PatientID=".$id."'</script>";
            }
        }
        }
        if(isset($_POST['weight'])){
            global $conn;
            $weight = $_POST['weight'];
            if($weight !== ""){
            $sql = "UPDATE `patient` SET `Weight`=:weight WHERE `ID` = :id";
            $query = $conn->prepare($sql);
            $query->bindValue(':id', $id, PDO::PARAM_STR);
            $query->bindValue(':weight', $weight, PDO::PARAM_STR);
            if($query->execute()){
                echo "<script>window.location='dashboardDoctor6.php?PatientID=".$id."'</script>";
            }
        }
        }
        if(isset($_POST['height'])){
            global $conn;
            $height = $_POST['height'];
            if($height !== ""){
            $sql = "UPDATE `patient` SET `Height`=:height WHERE `ID` = :id";
            $query = $conn->prepare($sql);
            $query->bindValue(':id', $id, PDO::PARAM_STR);
            $query->bindValue(':height', $height, PDO::PARAM_STR);
            if($query->execute()){
                echo "<script>window.location='dashboardDoctor6.php?PatientID=".$id."'</script>";
            }
        }
        }
        if(isset($_POST['bloodgroup'])){
            global $conn;
            $blood = $_POST['bloodgroup'];
            if($blood !== ""){
            $sql = "UPDATE `patient` SET `Blood Group`=:blood WHERE `ID` = :id";
            $query = $conn->prepare($sql);
            $query->bindValue(':id', $id, PDO::PARAM_STR);
            $query->bindValue(':blood', $blood, PDO::PARAM_STR);
            if($query->execute()){
                echo "<script>window.location='dashboardDoctor6.php?PatientID=".$id."'</script>";
            }
        }
        }
        if(isset($_POST['genotype'])){
            global $conn;
            $genotype = $_POST['genotype'];
            if($genotype !== ""){
            $sql = "UPDATE `patient` SET `Genotype`=:genotype WHERE `ID` = :id";
            $query = $conn->prepare($sql);
            $query->bindValue(':id', $id, PDO::PARAM_STR);
            $query->bindValue(':genotype', $genotype, PDO::PARAM_STR);
            if($query->execute()){
                echo "<script>window.location='dashboardDoctor6.php?PatientID=".$id."'</script>";
            }
        }
        }
        if(isset($_POST['status'])){
            global $conn;
            $status = $_POST['status'];
            if($status !== ""){
            $sql = "UPDATE `patient` SET `Status`=:status WHERE `ID` = :id";
            $query = $conn->prepare($sql);
            $query->bindValue(':id', $id, PDO::PARAM_STR);
            $query->bindValue(':status', $status, PDO::PARAM_STR);
            if($query->execute()){
                echo "<script>window.location='dashboardDoctor6.php?PatientID=".$id."'</script>";
            }
        }
        }
        echo "<script>window.location='dashboardDoctor6.php?PatientID=".$id."'</script>";
    }

    if(isset($_POST['diagnosePatient'])){
        $diagnosis = $_POST['details'];
        $admission = $_POST['admissionid'];
        $doctor = $_POST['doctorid'];
        $patient = $_POST['patientid'];
        addDiagnosis($admission, $diagnosis, $doctor, $patient);
    }

    if(isset($_POST['updatediagnosePatient'])){
        $diagnosis = $_POST['details'];
        $admission = $_POST['admissionid'];
        $doctor = $_POST['doctorid'];
        $patient = $_POST['patientid'];
        updateDiagnosis($admission, $diagnosis, $doctor, $patient);
    }

    if(isset($_POST['PrescribePatient'])){
        $pi = $_POST['prescriptionid'];
        $p =$_POST['prescription'];
        $admission = $_POST['admissionid'];
        $pd = $_POST['details'];
        $pid = $_POST['patientid'];
        addPres($pi, $p, $admission, $pd, $pid);
    }

    if(isset($_POST['RemovePrescription'])){
        $pid = $_POST['prescriptionremoveid'];
        $admission = $_POST['admissionid'];
        $pi = $_POST['patientid'];
        removePres($pid, $admission, $pi);
    }

    if(isset($_POST['UploadTests'])){
        $tid = $_POST['testid'];
        $tn = $_POST['testname'];
        $tr = $_POST['testres'];
        $admission = $_POST['admissionid'];
        $pi = $_POST['patientid'];
        $did = $_POST['doctorid'];
        addTest($tid, $admission, $did, $tn, $tr, $pi);
    }

    if(isset($_POST['RemoveTest'])){
        $tid = $_POST['testremoveid'];
        $admission = $_POST['admissionid'];
        $pi = $_POST['patientid'];
        removeTest($tid, $admission, $pi);
    }

    if(isset($_GET['admissionid'])){
        $admission = $_GET['admissionid'];
        $patient = $_GET['patientid'];
        $date = date('Y-m-d');
        global $conn;
        $sql = "UPDATE `admission` SET `Date_closed`=:date WHERE `addmissionID` = :admission AND `patientID` = :patient";
        $query = $conn->prepare($sql);
            $query->bindValue(':admission', $admission, PDO::PARAM_STR);
            $query->bindValue(':patient', $patient, PDO::PARAM_STR);
            $query->bindValue(':date', $date, PDO::PARAM_STR);
            if($query->execute()){
                echo "<script>window.location='dashboardDoctor.php'</script>";
            }
    }

    if(isset($_GET['PatientID'])){
        $patient = $_GET['PatientID'];
        global $conn;
        $sql = "DELETE FROM `patient` WHERE `patient`.`ID` = :patient";
        $query = $conn->prepare($sql);
            $query->bindValue(':patient', $patient, PDO::PARAM_STR);
            if($query->execute()){
                echo "<script>window.location='dashboardDoctor5.php'</script>";
            }
    }

    if(isset($_POST['billPatient'])){
        $bid = $_POST['billid'];
        $admission = $_POST['aid'];
        $iss = $_POST['issuer'];
        $bs = $_POST['bs'];
        $ap = $_POST['apay'];
        $ida = $_POST['date_issued'];
        $ddu = $_POST['ddu'];
        $status = $_POST['status'];
        $input = array(
            'bid' => $bid,
            'admission' => $admission,
            'issuer' => $iss,
            'bs' => $bs,
            'ap' => $ap,
            'ida' => $ida,
            'ddu' => $ddu,
            'status' => $status
        );
        Bill($input); 
    }

    if(isset($_GET['action'])){
        if($_GET['action']  == 'clear'){
            $bill = $_GET['billingID'];
            $admission = $_GET['admissionID'];
            global $conn;
            $sql = "UPDATE `billing` SET `status`= 'Paid' WHERE `billing_ID` = :bill AND `addmission_ID` = :aid";
            $query = $conn->prepare($sql);
            $query->bindValue(':bill', $bill, PDO::PARAM_STR);
            $query->bindValue(':aid', $admission, PDO::PARAM_STR);
            if($query->execute()){
                echo "<script>window.location='dashboardDoctor3.php'</script>";
            }
        }
    }

    if(isset($_POST['remindPatient'])){
            echo "<script>alert('Letter Sent')</script>";
            echo "<script>window.location='dashboardDoctor3.php'</script>";
        }

    if(isset($_POST['transferPatient'])){
        $admission = $_POST['admissionid'];
        $doctor = $_POST['doctorassigned'];
        $last = $_POST['last_admitting_staff'];
        transfer($admission, $doctor, $last);
    }

    if(isset($_POST['submitQ'])){
        $qid = $_POST['id'];
        $reply = $_POST['reply'];
        $sid = $_POST['doc'];
        $rep = trim($reply);
        if($rep !== ""){
        submitQ($qid, $rep, $sid);
        }else{
            echo "<script>alert('No reply sent')</script>";
            echo "<script>window.location='dashboardDoctor4.php'</script>";
        }
    }

    if(isset($_GET['action'])){
            if($_GET['action']  == 'seen'){
                $id = $_GET['id'];
                global $conn;
                $sql = "UPDATE `staff_message` SET `Seen`='Y' WHERE `ID` = :id";
                $query = $conn->prepare($sql);
                $input = array(
                    'id' => $id
                );
                if($query->execute($input)){
                    echo "<script>window.location='dashboardStaff7.php'</script>";
                }else{echo "Ntorr!";}
            }
        }

?>