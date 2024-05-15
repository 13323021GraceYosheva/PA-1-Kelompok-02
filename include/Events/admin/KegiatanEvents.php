<?php
include '../../Database/DBConnections.php';
include '../../Helper/DbHelper.php';

$path_upload = "../../../uploads/";
if (isset($_GET['act'])) {

    if ($_GET['act'] == 'store') {
        $foto = '-';
        if (isset($_FILES['foto_kegiatan'])) {
            $uploads = UploadFiles($path_upload, $_FILES['foto_kegiatan']);
            $foto = $uploads != null ? $uploads : '-';
        }
        $data_insert = [
            'foto_kegiatan' => $foto,
            'judul_kegiatan' => $_POST['judul_kegiatan'],
            'slug_kegiatan' => getSlug($_POST['judul_kegiatan']),
            'short_desc_kegiatan' => $_POST['short_desc_kegiatan'],
            'desc_kegiatan' => $_POST['desc_kegiatan'],
        ];
        if (StoreData($koneksi, 'kegiatan', $data_insert)) {
            setFlashData("Tambah Data Kegiatan Berhasil", "success");
            header('Location: ../../../admin/kegiatan.php');
        }
    }
    if ($_GET['act'] == 'update') {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if ($id == null) {
            setFlashData("ID Kosong");
            header('Location: ../../../admin/kegiatan.php');
        }
        $oldData = getDataAsConditions($koneksi, 'kegiatan', "id_kegiatan = " . $id);
        $foto = $oldData['foto_kegiatan'];
        if (isset($_FILES['foto_kegiatan'])) {
            $uploads = UploadFiles($path_upload, $_FILES['foto_kegiatan']);
            $foto = $uploads != null ? $uploads : $oldData['foto_kegiatan'];
            $uploads != null ? unlink($path_upload . $oldData['foto_kegiatan']) : null;
        }
        $data_update = [
            'foto_kegiatan' => $foto,
            'judul_kegiatan' => $_POST['judul_kegiatan'],
            'slug_kegiatan' => getSlug($_POST['judul_kegiatan']),
            'short_desc_kegiatan' => $_POST['short_desc_kegiatan'],
            'desc_kegiatan' => $_POST['desc_kegiatan'],
        ];
        if (UpdateData($koneksi, 'kegiatan', ['id_kegiatan = ' . $id], $data_update)) {
            setFlashData("Edit Data Kegiatan Berhasil", "success");
            header('Location: ../../../admin/kegiatan.php');
        }
    }
    if ($_GET['act'] == 'delete') {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if($id == null){
            setFlashData("ID Kosong");
            header('Location: ../../../admin/kegiatan.php');
        }
        $oldData = getDataAsConditions($koneksi,'kegiatan',"id_kegiatan = ".$id);
        $foto = $oldData['foto_kegiatan'];
        if($foto != '-' && $foto != null){
            unlink($path_upload.$oldData['foto_kegiatan']);
        }
        if(DeleteData($koneksi,'kegiatan',['id_kegiatan = '.$oldData['id_kegiatan']])){
            setFlashData("Delete Data Kegiatan Berhasil","success");
            header('Location: ../../../admin/kegiatan.php');
        }
    }
    if ($_GET['act'] == '') {
        header('Location: ../../../admin/kegiatan.php');
    }
} else {
    header('Location: ../../../admin/kegiatan.php');
}


?>