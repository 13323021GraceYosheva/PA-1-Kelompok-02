<?php
include '../../Database/DBConnections.php';
include '../../Helper/DbHelper.php';

$path_upload = "../../../uploads/";
if(isset($_GET['act'])){

    if($_GET['act'] == 'store'){
        $foto = '-';
       if(isset($_FILES['foto_artikel'])){
        $uploads = UploadFiles($path_upload,$_FILES['foto_artikel']);
        $foto = $uploads != null ? $uploads : '-';
       }
       $data_insert = [
            'foto_artikel'=>$foto,
            'judul_artikel' => $_POST['judul_artikel'],
            'short_desc_artikel' => $_POST['short_desc_artikel'], 
            'desc_artikel' => $_POST['desc_artikel'],
       ];
       if(StoreData($koneksi,'artikel',$data_insert)){
            setFlashData("Tambah Data Artikel Berhasil","success");
            header('Location: ../../../admin/artikel.php');
       }
       
    }
    if($_GET['act'] == 'update'){
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if($id == null){
            setFlashData("ID Kosong");
            header('Location: ../../../admin/artikel.php');
        }
        $oldData = getDataAsConditions($koneksi,'artikel',"id_artikel = ".$id);
        $foto = $oldData['foto_artikel'];
        if(isset($_FILES['foto_artikel'])){
            $uploads = UploadFiles($path_upload,$_FILES['foto_artikel']);
            $foto = $uploads != null ? $uploads : $oldData['foto_artikel'];
            $uploads != null ? unlink($path_upload.$oldData['foto_artikel']) : null;
           }
           $data_update = [
                'foto_artikel'=>$foto,
                'judul_artikel' => $_POST['judul_artikel'],
                'short_desc_artikel' => $_POST['short_desc_artikel'], 
                'desc_artikel' => $_POST['desc_artikel'],
           ];
           if(UpdateData($koneksi,'artikel',['id_artikel = '.$id],$data_update)){
                setFlashData("Edit Data Artikel Berhasil","success");
                header('Location: ../../../admin/artikel.php');
           }
    }
    if($_GET['act'] == 'delete'){
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if($id == null){
            setFlashData("ID Kosong");
            header('Location: ../../../admin/artikel.php');
        }
        $oldData = getDataAsConditions($koneksi,'artikel',"id_artikel = ".$id);
        $foto = $oldData['foto_artikel'];
        if($foto != '-' && $foto != null){
            unlink($path_upload.$oldData['foto_artikel']);
        }
        if(DeleteData($koneksi,'artikel',['id_artikel = '.$oldData['id_artikel']])){
            setFlashData("Delete Data Artikel Berhasil","success");
            header('Location: ../../../admin/artikel.php');
        }
    }
    if($_GET['act'] == ''){
        header('Location: ../../../admin/artikel.php');
     }
}else{
    header('Location: ../../../admin/artikel.php');
}


?>