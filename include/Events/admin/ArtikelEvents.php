<?php
include '../../Database/DBConnections.php';
include '../../Helper/DbHelper.php';

if(isset($_GET['act'])){

    if($_GET['act'] == 'store'){
        
    }
    if($_GET['act'] == 'update'){
        
    }
    if($_GET['act'] == 'delete'){

    }
    if($_GET['act'] == ''){
        header('Location: ../../../admin/artikel.php');
     }
}else{
    header('Location: ../../../admin/artikel.php');
}


?>