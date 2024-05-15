<?php
include '../../Database/DBConnections.php';
include '../../Helper/DbHelper.php';

if(isset($_GET['act'])){

   
    if($_GET['act'] == 'updateProfile'){
        
    }
    
    if($_GET['act'] == ''){
        header('Location: ../../../admin/profile.php');
     }
}else{
    header('Location: ../../../admin/profile.php');
}


?>