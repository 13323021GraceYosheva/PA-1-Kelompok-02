<?php
include '../../Database/DBConnections.php';
include '../../Helper/DbHelper.php';

$path_upload = "../../../uploads/";
if (isset($_GET['act'])) {

    if ($_GET['act'] == 'store') {

        $data_insert = [
            'id_dokter' => $_POST['id_dokter'],
            'hari' => $_POST['hari'],
            'start_jam' => $_POST['start_jam'],
            'end_jam' => $_POST['end_jam'],
        ];
        if (StoreData($koneksi, 'jadwal_dokter', $data_insert)) {
            setFlashData("Tambah Data Jadwal Dokter Berhasil", "success");
            header('Location: ../../../admin/jadwal.php');
        }

    }
    if ($_GET['act'] == 'update') {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if ($id == null) {
            setFlashData("ID Kosong");
            header('Location: ../../../admin/jadwal.php');
        }
        $data_update = [
            'id_dokter' => $_POST['id_dokter'],
            'hari' => $_POST['hari'],
            'start_jam' => $_POST['start_jam'],
            'end_jam' => $_POST['end_jam'],
        ];
        if (UpdateData($koneksi, 'jadwal_dokter', ['id_jadwal = ' . $id], $data_update)) {
            setFlashData("Edit Data Jadwal Dokter Berhasil", "success");
            header('Location: ../../../admin/jadwal.php');
        }
    }
    if ($_GET['act'] == 'delete') {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if ($id == null) {
            setFlashData("ID Kosong");
            header('Location: ../../../admin/jadwal.php');
        }
        if (DeleteData($koneksi, 'jadwal_dokter', ['id_jadwal = ' . $id])) {
            setFlashData("Delete Data Jadwal Dokter Berhasil", "success");
            header('Location: ../../../admin/jadwal.php');
        }
    }
    if ($_GET['act'] == '') {
        header('Location: ../../../admin/jadwal.php');
    }
} else {
    header('Location: ../../../admin/jadwal.php');
}


?>