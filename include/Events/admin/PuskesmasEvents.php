<?php
include '../../Database/DBConnections.php';
include '../../Helper/DbHelper.php';

$path_upload = "../../../uploads/";
if(isset($_GET['act'])){

   
    if($_GET['act'] == 'UpdatePuskesmas'){
        $cek = getAll($koneksi,"setting_puskesmas");
        $s_ray = [];
         if($cek != null){
            while($r = mysqli_fetch_array($cek)){
                array_push($s_ray,$r['nama_setting']);
                $data_update = [];
                if(isset($_FILES[$r['nama_setting']]) && $_FILES[$r['nama_setting']] != null){
                    $uploads = UploadFiles($path_upload, $_FILES[$r['nama_setting']]);
                    $data_update['value'] = $uploads != null ? $uploads : $r['value'];
                    $uploads != null && $r['value'] != '-' ? unlink($path_upload . $r['value']) : null;
                }
                if(isset($_POST[$r['nama_setting']]) && $_POST[$r['nama_setting']] != null){
                    $data_update['value'] = $_POST[$r['nama_setting']];
                }
                if($data_update != null){
                    UpdateData($koneksi,'setting_puskesmas',["id_setting = ".$r['id_setting']],$data_update);
                }
            }
         }
         //Jika Tidak Ada Data
        foreach($_POST as $p => $v){
            $data_settings = [
                "nama_setting" => $p,
                "default_value" => "-",
                "value" => $v != null ? $v : ""
            ];
            if(!in_array($p,$s_ray)){
               StoreData($koneksi,"setting_puskesmas",$data_settings);
            }
        }
        foreach($_FILES as $p => $v){
            if(!in_array($p,$s_ray)){
                $data_settings = [
                    "nama_setting" => $p,
                    "default_value" => "-",
                    "value" => "-"
                ];
                if(isset($_FILES[$p]) && $_FILES[$p] != null){
                    $uploads = UploadFiles($path_upload, $_FILES[$p]);
                    $data_settings['value'] = $uploads != null ? $uploads : "-";
                }
               StoreData($koneksi,"setting_puskesmas",$data_settings);
            }
        }
        setFlashData("Setting Puskesmas Berhasil", "success");
        header('Location: ../../../admin/puskesmas.php');
    }
    
    if($_GET['act'] == ''){
        header('Location: ../../../admin/puskesmas.php');
     }
}else{
    header('Location: ../../../admin/puskesmas.php');
}


?>