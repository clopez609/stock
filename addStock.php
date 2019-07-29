<?php
    require_once "dbStock.php";

    $gateway = new Gateway();
    
        
    if ( isset($_POST['id']) ){
        
        $value = $_POST{'id'};

        $result = $gateway->addReg($value);

        echo ($result);
    }
?>