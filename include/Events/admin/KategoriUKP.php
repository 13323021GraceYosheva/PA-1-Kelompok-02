<?php
include '../../Database/DBConnections.php';
include '../../Helper/DbHelper.php';

$path_upload = "../../../uploads/";
if (isset($_GET['act'])) {

    if ($_GET['act'] == 'store') {

        $data_insert = [
            'kategori_ukp' => $_POST['kategori_ukp'],
            'status_kategori_ukp' => $_POST['status_kategori_ukp'],
        ];
        if (StoreData($koneksi, 'kategori_ukp', $data_insert)) {
            setFlashData("Tambah Data Kategori UKP Berhasil", "success");
            header('Location: ../../../admin/kategori_ukp.php');
        }

    }
    if ($_GET['act'] == 'update') {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if ($id == null) {
            setFlashData("ID Kosong");
            header('Location: ../../../admin/kategori_ukp.php');
        }
        $data_update = [
            'kategori_ukp' => $_POST['kategori_ukp'],
            'status_kategori_ukp' => $_POST['status_kategori_ukp'],
        ];
        if (UpdateData($koneksi, 'kategori_ukp', ['id_kategori_ukp = ' . $id], $data_update)) {
            setFlashData("Edit Data Kategori UKP Berhasil", "success");
            header('Location: ../../../admin/kategori_ukp.php');
        }
    }
    if ($_GET['act'] == 'delete') {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if ($id == null) {
            setFlashData("ID Kosong");
            header('Location: ../../../admin/kategori_ukp.php');
        }
        if (DeleteData($koneksi, 'kategori_ukp', ['id_kategori_ukp = ' . $id])) {
            setFlashData("Delete Data Kategori UKP Berhasil", "success");
            header('Location: ../../../admin/kategori_ukp.php');
        }
    }
    if ($_GET['act'] == '') {
        header('Location: ../../../admin/kategori_layanan.php');
    }
} else {
    header('Location: ../../../admin/kategori_layanan.php');
}


?>