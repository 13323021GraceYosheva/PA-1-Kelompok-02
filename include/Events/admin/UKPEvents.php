<?php
include '../../Database/DBConnections.php';
include '../../Helper/DbHelper.php';

$path_upload = "../../../uploads/";
if (isset($_GET['act'])) {

    if ($_GET['act'] == 'store') {
        $foto = '-';
        if (isset($_FILES['foto_ukp'])) {
            $uploads = UploadFiles($path_upload, $_FILES['foto_ukp']);
            $foto = $uploads != null ? $uploads : '-';
        }
        $data_insert = [
            'foto_ukp' => $foto,
            'nama_ukp' => $_POST['nama_ukp'],
            'slug_ukp' => getSlug($_POST['nama_ukp']),
            'short_desc_ukp' => $_POST['short_desc_ukp'],
            'desc_ukp' => $_POST['desc_ukp'],
            'id_kategori_ukp' => $_POST['id_kategori_ukp'],
        ];
        if (StoreData($koneksi, 'ukp', $data_insert)) {
            setFlashData("Tambah Data UKP Berhasil", "success");
            header('Location: ../../../admin/ukp.php');
        }
    }
    if ($_GET['act'] == 'update') {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if ($id == null) {
            setFlashData("ID Kosong");
            header('Location: ../../../admin/ukp.php');
        }
        $oldData = getDataAsConditions($koneksi, 'ukp', "id_ukp = " . $id);
        $foto = $oldData['foto_ukp'];
        if (isset($_FILES['foto_ukp'])) {
            $uploads = UploadFiles($path_upload, $_FILES['foto_ukp']);
            $foto = $uploads != null ? $uploads : $oldData['foto_ukp'];
            $uploads != null ? unlink($path_upload . $oldData['foto_ukp']) : null;
        }
        $data_update = [
            'foto_ukp' => $foto,
            'nama_ukp' => $_POST['nama_ukp'],
            'slug_ukp' => getSlug($_POST['nama_ukp']),
            'short_desc_ukp' => $_POST['short_desc_ukp'],
            'desc_ukp' => $_POST['desc_ukp'],
            'id_kategori_ukp' => $_POST['id_kategori_ukp'],
        ];
        if (UpdateData($koneksi, 'ukp', ['id_ukp = ' . $id], $data_update)) {
            setFlashData("Edit Data UKP Berhasil", "success");
            header('Location: ../../../admin/ukp.php');
        }
    }
    if ($_GET['act'] == 'delete') {
         $id = isset($_GET['id']) ? $_GET['id'] : null;
        if($id == null){
            setFlashData("ID Kosong");
            header('Location: ../../../admin/ukp.php');
        }
        $oldData = getDataAsConditions($koneksi,'ukp',"id_ukp = ".$id);
       
        $foto = $oldData['foto_ukp'];
        if($foto != '-' && $foto != null){
            unlink($path_upload.$oldData['foto_ukp']);
        }
        if(DeleteData($koneksi,'ukp',['id_ukp = '.$oldData['id_ukp']])){
            setFlashData("Delete Data UKP Berhasil","success");
            header('Location: ../../../admin/ukp.php');
        }
    }
    if ($_GET['act'] == '') {
        header('Location: ../../../admin/ukp.php');
    }
} else {
    header('Location: ../../../admin/ukp.php');
}


?>