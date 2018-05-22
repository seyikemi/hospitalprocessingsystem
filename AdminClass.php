<?php

    require_once('pdo.php');

        function createDoctor($password, $name, $email, $type){
            global $conn;
            $sql = "INSERT INTO `employee`(`Password`, `Employee_name`, `Employee_email`, `Designation`, `Role`) VALUES (:pass, :name, :email, :designation, :role)";
            $query = $conn->prepare($sql);
            $input = array(
                'pass' => $password,
                'name' => $name,
                'email' => $email,
                'designation' => 'doctor',
                'role' => $type
            );
            if($query->execute($input)){
                echo "<script>window.location='dashboardAdmin2.php'</script>";
            }else{echo "Ntorr!";}
        }

        function deleteDoctor($name, $id){
            global $conn;
            $sql = "DELETE FROM `employee` WHERE `employee`.`Employee_ID` = :id AND `employee`.`Employee_name` = :name";
            $query = $conn->prepare($sql);
            $input = array(
                'id' => $id,
                'name' => $name
            );
            if($query->execute($input)){
                echo "<script>window.location='dashboardAdmin2.php'</script>";
            }else{echo "Ntorr!";}
        }

        function createStaff($password, $name, $email, $type){
            global $conn;
            $sql = "INSERT INTO `employee`(`Password`, `Employee_name`, `Employee_email`, `Designation`, `Role`) VALUES (:pass, :name, :email, :designation, :role)";
            $query = $conn->prepare($sql);
            $input = array(
                'pass' => $password,
                'name' => $name,
                'email' => $email,
                'designation' => 'staff',
                'role' => $type
            );
            if($query->execute($input)){
                echo "<script>window.location='dashboardAdmin3.php'</script>";
            }else{echo "Ntorr!";}
        }

        function deleteStaff($name, $id){
            global $conn;
            $sql = "DELETE FROM `employee` WHERE `employee`.`Employee_ID` = :id AND `employee`.`Employee_name` = :name";
            $query = $conn->prepare($sql);
            $input = array(
                'id' => $id,
                'name' => $name
            );
            if($query->execute($input)){
                echo "<script>window.location='dashboardAdmin3.php'</script>";
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
                echo "<script>window.location='dashboardAdmin4.php'</script>";
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
                echo "<script>window.location='dashboardAdmin4.php'</script>";
            }else{echo "Ntorr!";}
        }

    

        if(isset($_POST['addDoc'])){
            $password = $_POST['pass'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $type = $_POST['type'];
            createDoctor($password, $name, $email, $type);
        }

        if(isset($_POST['addStaff'])){
            $password = $_POST['pass'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $type = $_POST['type'];
            createStaff($password, $name, $email, $type);
        }

        if(isset($_POST['deleteDoc'])){
            $name = $_POST['name'];
            $id = $_POST['id'];
            deleteDoctor($name, $id);
        }

        if(isset($_POST['deleteStaff'])){
            $name = $_POST['name'];
            $id = $_POST['id'];
            deleteStaff($name, $id);
        }

        if(isset($_POST['addQuest'])){
            $id = $_POST['id'];
            $quest = $_POST['quest'];
            addQuestionaire($id, $quest);
        }

        if(isset($_GET['action'])){
            if($_GET['action'] == "delete"){
                $id = $_GET['id'];
                deleteQuestionaire($id);
            }

        }

?>