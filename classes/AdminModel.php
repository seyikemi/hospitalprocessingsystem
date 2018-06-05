<?php

    require_once('../scripts/pdo.php');

    class AdminModel{

        

        function createDoctor($password, $name, $email, $type){
            global $conn;
            $sql = "INSERT INTO `employee`(`Password`, `Employee_name`, `Employee_email`, `Designation`, `Role`) VALUES (:pass, :name, :email, :designation, :role)";
            $query = $conn->prepare($sql);
            $input = array(
                'pass' => md5($password),
                'name' => $name,
                'email' => $email,
                'designation' => 'doctor',
                'role' => $type
            );
            if($query->execute($input)){
                echo "<script>window.location='../admin/dashboardAdmin2.php'</script>";
            }else{echo "Ntorr!";}
        }

        function deleteDoctor($id){
            global $conn;
            $sql = "DELETE FROM `employee` WHERE `employee`.`Employee_ID` = :id";
            $query = $conn->prepare($sql);
            $input = array(
                'id' => $id
            );
            if($query->execute($input)){
                echo "<script>window.location='../admin/dashboardAdmin2.php'</script>";
            }else{echo "Ntorr!";}
        }

        function createStaff($password, $name, $email, $type){
            global $conn;
            $sql = "INSERT INTO `employee`(`Password`, `Employee_name`, `Employee_email`, `Designation`, `Role`) VALUES (:pass, :name, :email, :designation, :role)";
            $query = $conn->prepare($sql);
            $input = array(
                'pass' => md5($password),
                'name' => $name,
                'email' => $email,
                'designation' => 'staff',
                'role' => $type
            );
            if($query->execute($input)){
                echo "<script>window.location='../admin/dashboardAdmin3.php'</script>";
            }else{echo "Ntorr!";}
        }

        function deleteStaff($id){
            global $conn;
            $sql = "DELETE FROM `employee` WHERE `employee`.`Employee_ID` = :id";
            $query = $conn->prepare($sql);
            $input = array(
                'id' => $id
            );
            if($query->execute($input)){
                echo "<script>window.location='../admin/dashboardAdmin3.php'</script>";
            }else{echo "Ntorr!";}
        }

        function addQuestionaire($id, $question){
            global $conn;
            $sql = "INSERT INTO `questioniare`(`ID`, `Question`) VALUES (:id,:question)";
            $query = $conn->prepare($sql);
            $input = array(
                'id' => $id,
                'question' => $question
            );
            if($query->execute($input)){
                echo "<script>window.location='../admin/dashboardAdmin4.php'</script>";
            }
        }

        function deleteQuestionaire($id){
            global $conn;
            $sql = "DELETE FROM `questioniare` WHERE `questioniare`.`ID` = :id";
            $query = $conn->prepare($sql);
            $input = array(
                'id' => $id,
            );
            if($query->execute($input)){
                echo "<script>window.location='../admin/dashboardAdmin4.php'</script>";
            }else{echo "Ntorr!";}
        }
    }

?>