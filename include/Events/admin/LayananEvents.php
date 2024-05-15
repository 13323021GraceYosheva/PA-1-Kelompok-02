<?php
include '../../Database/DBConnections.php';
include '../../Helper/DbHelper.php';

$path_upload = "../../../uploads/";
if (isset($_GET['act'])) {

    if ($_GET['act'] == 'store') {
        $foto = '-';
        if (isset($_FILES['foto_layanan'])) {
            $uploads = UploadFiles($path_upload, $_FILES['foto_layanan']);
            $foto = $uploads != null ? $uploads : '-';
        }
        $data_insert = [
            'foto_layanan' => $foto,
            'nama_layanan' => $_POST['nama_layanan'],
            'slug_layanan' => getSlug($_POST['nama_layanan']),
            'short_desc_layanan' => $_POST['short_desc_layanan'],
            'desc_layanan' => $_POST['desc_layanan'],
            'id_kategori_layanan' => $_POST['id_kategori_layanan'],
        ];
        if (StoreData($koneksi, 'layanan', $data_insert)) {
            setFlashData("Tambah Data Layanan Berhasil", "success");
            header('Location: ../../../admin/layanan.php');
        }
    }
    if ($_GET['act'] == 'update') {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if ($id == null) {
            setFlashData("ID Kosong");
            header('Location: ../../../admin/layanan.php');
        }
        $oldData = getDataAsConditions($koneksi, 'layanan', "id_layanan = " . $id);
        $foto = $oldData['foto_layanan'];
        if (isset($_FILES['foto_layanan'])) {
            $uploads = UploadFiles($path_upload, $_FILES['foto_layanan']);
            $foto = $uploads != null ? $uploads : $oldData['foto_layanan'];
            $uploads != null ? unlink($path_upload . $oldData['foto_layanan']) : null;
        }
        $data_update = [
            'foto_layanan' => $foto,
            'nama_layanan' => $_POST['nama_layanan'],
            'slug_layanan' => getSlug($_POST['nama_layanan']),
            'short_desc_layanan' => $_POST['short_desc_layanan'],
            'desc_layanan' => $_POST['desc_layanan'],
            'id_kategori_layanan' => $_POST['id_kategori_layanan'],
        ];
        if (UpdateData($koneksi, 'layanan', ['id_layanan = ' . $id], $data_update)) {
            setFlashData("Edit Data Layanan Berhasil", "success");
            header('Location: ../../../admin/layanan.php');
        }
    }
    if ($_GET['act'] == 'delete') {
         $id = isset($_GET['id']) ? $_GET['id'] : null;
        if($id == null){
            setFlashData("ID Kosong");
            header('Location: ../../../admin/layanan.php');
        }
        $oldData = getDataAsConditions($koneksi,'layanan',"id_layanan = ".$id);
       
        $foto = $oldData['foto_layanan'];
        if($foto != '-' && $foto != null){
            unlink($path_upload.$oldData['foto_layanan']);
        }
        if(DeleteData($koneksi,'layanan',['id_layanan = '.$oldData['id_layanan']])){
            setFlashData("Delete Data Layanan Berhasil","success");
            header('Location: ../../../admin/layanan.php');
        }
    }
    if ($_GET['act'] == '') {
        header('Location: ../../../admin/layanan.php');
    }
} else {
    header('Location: ../../../admin/layanan.php');
}


?>