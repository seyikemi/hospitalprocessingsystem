<?php

    require_once('../scripts/pdo.php');
    require_once('../classes/AdminModel.php');

        $adminObj = new AdminModel;

        if(isset($_POST['addDoc'])){
            $password = $_POST['pass'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $type = $_POST['type'];
            $adminObj->createDoctor($password, $name, $email, $type);
        }

        if(isset($_POST['addStaff'])){
            $password = $_POST['pass'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $type = $_POST['type'];
            $adminObj->createStaff($password, $name, $email, $type);
        }

        if(isset($_POST['deleteDoc'])){
            $checkbox = $_POST['check'];
            for($i=0;$i<count($checkbox);$i++){
                $del_id = $checkbox[$i]; 
                $adminObj->deleteDoctor($del_id);
            }
        }

        if(isset($_POST['deleteStaff'])){
            $checkbox = $_POST['check'];
            for($i=0;$i<count($checkbox);$i++){
                $del_id = $checkbox[$i]; 
                $adminObj->deleteStaff($del_id);
            }
        }

        if(isset($_POST['addQuest'])){
            $id = $_POST['id'];
            $quest = $_POST['quest'];
            $adminObj->addQuestionaire($id, $quest);
        }

        if(isset($_GET['action'])){
            if($_GET['action'] == "delete"){
                $id = $_GET['id'];
                $adminObj->deleteQuestionaire($id);
            }

        }

        if(isset($_GET['action'])){
            if($_GET['action']  == 'seen'){
                $id = $_GET['id'];
                global $conn;
                $sql = "UPDATE `adminfeedback` SET `Seen`='Y' WHERE `Feedback_ID` = :id";
                $query = $conn->prepare($sql);
                $input = array(
                    'id' => $id
                );
                if($query->execute($input)){
                    echo "<script>window.location='dashboardAdmin5.php'</script>";
                }else{echo "Ntorr!";}
            }
        }

        if(isset($_POST['reply'])){
            $sid = $_POST['staffid'];
            $rip = $_POST['replyid'];
            $seen = 'N';
            global $conn;
            $sql = "INSERT INTO `staff_message`(`Content`, `Staff_ID`, `Seen`) VALUES (:rip,:sid,:seen)";
            $query = $conn->prepare($sql);
            $input = array(
                'rip' => $rip,
                'sid' => $sid,
                'seen' => $seen
            );
            if($query->execute($input)){
                echo "<script>window.location='dashboardAdmin5.php'</script>";
            }else{echo "Ntorr!";}
        }

?>