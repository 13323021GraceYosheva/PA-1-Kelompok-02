<?php
include '../../Database/DBConnections.php';
include '../../Helper/DbHelper.php';

$path_upload = "../../../uploads/";
if (isset($_GET['act'])) {

    if ($_GET['act'] == 'store') {

        $data_insert = [
            'kategori_layanan' => $_POST['kategori_layanan'],
            'status_kategori_layanan' => $_POST['status_kategori_layanan'],
        ];
        if (StoreData($koneksi, 'kategori_layanan', $data_insert)) {
            setFlashData("Tambah Data Kategori Layanan Berhasil", "success");
            header('Location: ../../../admin/kategori_layanan.php');
        }

    }
    if ($_GET['act'] == 'update') {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if ($id == null) {
            setFlashData("ID Kosong");
            header('Location: ../../../admin/kategori_layanan.php');
        }
        $data_update = [
            'kategori_layanan' => $_POST['kategori_layanan'],
            'status_kategori_layanan' => $_POST['status_kategori_layanan'],
        ];
        if (UpdateData($koneksi, 'kategori_layanan', ['id_kategori_layanan = ' . $id], $data_update)) {
            setFlashData("Edit Data Kategori Layanan Berhasil", "success");
            header('Location: ../../../admin/kategori_layanan.php');
        }
    }
    if ($_GET['act'] == 'delete') {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if ($id == null) {
            setFlashData("ID Kosong");
            header('Location: ../../../admin/kategori_layanan.php');
        }
        if (DeleteData($koneksi, 'kategori_layanan', ['id_kategori_layanan = ' . $id])) {
            setFlashData("Delete Data Kategori Layanan Berhasil", "success");
            header('Location: ../../../admin/kategori_layanan.php');
        }
    }
    if ($_GET['act'] == '') {
        header('Location: ../../../admin/kategori_layanan.php');
    }
} else {
    header('Location: ../../../admin/kategori_layanan.php');
}


?>