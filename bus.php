<?php
    session_start();

    if(!isset($_SESSION['passengerL'])) {
        $_SESSION['passengerCtr'] = 0;
        $_SESSION['passengerL'] = array();
    } 
    else {
        if(isset($_POST['submit'])) {
            $pass_name = $_POST['pName'];
            $pass_dest = $_POST['pDest'];
            $ticketNum = $_POST['busNum'];

            $_SESSION['passengerCtr'] += 1;
            $newPass = array("bn" => $ticketNum, "pn" =>$_SESSION['passengerCtr'], "name" =>$pass_name, "dest"=>$pass_dest);
            array_push($_SESSION['passengerL'], $newPass);
            // $_SESSION['passengerL'] = $newPass;
        }

        if(isset($_POST['clear'])) {
            session_destroy();
            header("location: index.php");
        }
    }

    function delPassenger() {
        array_pop($_SESSION['passengerL']);

        $_SESSION['passengerCtr'] -= 1;
    }



?>