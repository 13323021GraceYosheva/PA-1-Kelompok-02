<?php
include '../../Database/DBConnections.php';
include '../../Helper/DbHelper.php';

if (isset($_GET['act'])) {

    if ($_GET['act'] == 'store') {
        $foto = '-';
        $data_insert = [
            'img_user' => $foto,
            'first_name' => $_POST['first_name'],
            'last_name' => getSlug($_POST['last_name']),
            'email' => $_POST['email'],
            'username' => $_POST['username'],
            'password' => md5($_POST['password']),
        ];
        if (StoreData($koneksi, 'users', $data_insert)) {
            setFlashData("Tambah Data Users Berhasil", "success");
            header('Location: ../../../admin/users.php');
        }
    }
    if ($_GET['act'] == 'update') {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if ($id == null) {
            setFlashData("ID Kosong");
            header('Location: ../../../admin/users.php');
        }
        $oldData = getDataAsConditions($koneksi, 'users', "id_users = " . $id);
        $data_update = [
            'first_name' => $_POST['first_name'],
            'last_name' => getSlug($_POST['last_name']),
            'email' => $_POST['email'],
            'username' => $_POST['username'],
            'password' => isset($_POST['password']) && $_POST['password'] != null ? md5($_POST['password']) : $oldData['password'],
        ];
        if (UpdateData($koneksi, 'users', ['id_users = ' . $id], $data_update)) {
            setFlashData("Edit Data Users Berhasil", "success");
            header('Location: ../../../admin/users.php');
        }
    }
    if ($_GET['act'] == 'delete') {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if ($id == null) {
            setFlashData("ID Kosong");
            header('Location: ../../../admin/users.php');
        }
        $oldData = getDataAsConditions($koneksi, 'users', "id_users = " . $id);

        $foto = $oldData['img_user'];
        if ($foto != '-' && $foto != null) {
            unlink($path_upload . $oldData['img_user']);
        }
        if (DeleteData($koneksi, 'users', ['id_users = ' . $oldData['id_users']])) {
            setFlashData("Delete Data Users Berhasil", "success");
            header('Location: ../../../admin/users.php');
        }
    }
    if ($_GET['act'] == '') {
        header('Location: ../../../admin/users.php');
    }
} else {
    header('Location: ../../../admin/users.php');
}


?>