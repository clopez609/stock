<?php
    require_once "dbStock.php";

    $gateway = new Gateway();

    if( isset($_POST['id']) ){

        $value = $_POST['id'];

        $result = $gateway->loadAllStock($value);
        
        echo json_encode($result);
    }
?>