<?php
include '../../Database/DBConnections.php';
include '../../Helper/DbHelper.php';

$path_upload = "../../../uploads/";
if(isset($_GET['act'])){

    if($_GET['act'] == 'store'){
        $foto = '-';
        if(isset($_FILES['foto_dokter'])){
         $uploads = UploadFiles($path_upload,$_FILES['foto_dokter']);
         $foto = $uploads != null ? $uploads : '-';
        }
        $data_insert = [
             'foto_dokter'=>$foto,
             'nama_dokter' => $_POST['nama_dokter'],
             'spesialis_dokter' => $_POST['spesialis_dokter'], 
             'no_hp_dokter' => $_POST['no_hp_dokter'],
             'alamat_dokter' => $_POST['alamat_dokter'],
        ];
        if(StoreData($koneksi,'dokter',$data_insert)){
             setFlashData("Tambah Data Dokter Berhasil","success");
             header('Location: ../../../admin/dokter.php');
        }
        
    }
    if($_GET['act'] == 'update'){
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if($id == null){
            setFlashData("ID Kosong");
            header('Location: ../../../admin/dokter.php');
        }
        $oldData = getDataAsConditions($koneksi,'dokter',"id_dokter = ".$id);
        $foto = $oldData['foto_dokter'];
        if(isset($_FILES['foto_dokter'])){
            $uploads = UploadFiles($path_upload,$_FILES['foto_dokter']);
            $foto = $uploads != null ? $uploads : $oldData['foto_dokter'];
            $uploads != null ? unlink($path_upload.$oldData['foto_dokter']) : null;
           }
           $data_update = [
            'foto_dokter'=>$foto,
            'nama_dokter' => $_POST['nama_dokter'],
            'spesialis_dokter' => $_POST['spesialis_dokter'], 
            'no_hp_dokter' => $_POST['no_hp_dokter'],
            'alamat_dokter' => $_POST['alamat_dokter'],
           ];
           if(UpdateData($koneksi,'dokter',['id_dokter = '.$id],$data_update)){
                setFlashData("Edit Data Dokter Berhasil","success");
                header('Location: ../../../admin/dokter.php');
           }
    }
    if($_GET['act'] == 'delete'){
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if($id == null){
            setFlashData("ID Kosong");
            header('Location: ../../../admin/dokter.php');
        }
        $oldData = getDataAsConditions($koneksi,'dokter',"id_dokter = ".$id);
        $foto = $oldData['foto_dokter'];
        if($foto != '-' && $foto != null){
            unlink($path_upload.$oldData['foto_dokter']);
        }
        if(DeleteData($koneksi,'dokter',['id_dokter = '.$oldData['id_dokter']])){
            setFlashData("Delete Data Dokter Berhasil","success");
            header('Location: ../../../admin/dokter.php');
        }
    }
    if($_GET['act'] == ''){
        header('Location: ../../../admin/dokter.php');
     }
}else{
    header('Location: ../../../admin/dokter.php');
}


?>