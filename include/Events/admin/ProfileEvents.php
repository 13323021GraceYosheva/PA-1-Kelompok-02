<?php
include '../../Database/DBConnections.php';
include '../../Helper/DbHelper.php';

$path_upload = "../../../uploads/";
if(isset($_GET['act'])){

   
    if($_GET['act'] == 'updateProfile'){
        $id = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : null;
        if ($id == null) {
            setFlashData("ID Kosong");
            header('Location: ../../../admin/profile.php');
        }
        $oldData = getDataAsConditions($koneksi, 'users', "id_users = " . $id);
       
        $data_update = [
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'email' => $_POST['email'],
            'username' => $_POST['username'],
            'password' => isset($_POST['password']) && $_POST['password'] != null ? md5($_POST['password']) : $oldData['password'],
        ];
        $foto = $oldData['img_user'];
        if (isset($_FILES['img_user'])) {
            $uploads = UploadFiles($path_upload, $_FILES['img_user']);
            $foto = $uploads != null ? $uploads : $oldData['img_user'];
            $uploads != null && $oldData['img_user'] != '-' ? unlink($path_upload . $oldData['img_user']) : null;
        }
        $data_update['img_user'] = $foto;
        if (UpdateData($koneksi, 'users', ['id_users = ' . $id], $data_update)) {
           
            setFlashData("Edit Data Profile Berhasil,Silahkan Re login untuk update Data", "success");
            header('Location: ../../../admin/profile.php');
        }
    }
    
    if($_GET['act'] == ''){
        header('Location: ../../../admin/profile.php');
     }
}else{
    header('Location: ../../../admin/profile.php');
}


?>