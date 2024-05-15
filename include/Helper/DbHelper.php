<?php
date_default_timezone_set('Asia/Jakarta');


function getAll($koneksi,$table){
    $query = mysqli_query($koneksi,"SELECT * FROM $table;");
    $result = null ;
    if(mysqli_num_rows($query) > 0){
        $result = $query;
    }
    return $result;
}
function getAllDataAsConditions($koneksi,$table,$conditions,$select = "*"){
    $query = mysqli_query($koneksi,"SELECT $select FROM $table WHERE $conditions;");
    $result = null;
    if(mysqli_num_rows($query) > 0){
        $result = $query;
    }
    return $result;
}

function StoreData($koneksi,$table,$data){
    $result = null;
    $col = [];
    $row = [];
    foreach($data as $key => $value){
        array_push($col,'`'.$key.'`');
        array_push($row,"'".$value."'");
    }
    $query = "INSERT INTO $table(".implode(",",$col).") VALUES (".implode(",",$row).");";
    $result = mysqli_query($koneksi,$query);
    return $result;
}

function UpdateData($koneksi,$table,$conditions,$data){
    $result = null;
    $data_update = [];
    foreach($data as $key => $value){
        array_push($data_update,'`'.$key.'`='."'".$value."'");
    }
    $query = "UPDATE $table SET ".implode(", ",$data_update)." WHERE ".implode("AND ",$conditions).';';
    $result = mysqli_query($koneksi,$query);
    return $result;
}

function DeleteData($koneksi,$table,$conditions){
    $result  = null;
    $query = "DELETE FROM $table WHERE ".implode("AND ",$conditions).";";
    $result = mysqli_query($koneksi,$query);
    return $result;
}


function getDataAsConditions($koneksi,$table,$conditions,$select = "*"){
    $query = mysqli_query($koneksi,"SELECT $select FROM $table WHERE $conditions;");
    $result = null;
    if(mysqli_num_rows($query) > 0){
        $result = mysqli_fetch_assoc($query);
    }
    return $result;
}

function getDataWithQuery($koneksi,$query){
    $sql = mysqli_query($koneksi,$query);
    $result = null;
    if(mysqli_num_rows($sql) > 0){
        $result = $sql;
    }
    return $result;
}
function getDataCount($koneksi,$table){
    $sql = mysqli_query($koneksi,"SELECT COUNT(*) as C FROM $table;");
    $result = 0;
    if(mysqli_num_rows($sql) > 0){
        $result = mysqli_fetch_assoc($sql)['C'];
    }
    return $result;
}

function setFlashData($message,$status = "danger"){
    $_SESSION['flash_data']['message'] = $message;
    $_SESSION['flash_data']['status'] = $status;
}

function UploadFiles($path = null, $image = null){
    if($image == null) return null;
    if($path == null)  return null;
    $result = null;
    $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
    $filename = 'UPL_'.date('Y_M_D_h_i_s').'.'.$ext;
    $file_tmp = $image['tmp_name'];
    $upload_to = $path.$filename;
    if (move_uploaded_file($file_tmp, $upload_to)) {
        $result = $filename;
    }
    return $result;
}
function getSlug($string = null){
    if($string == null) return;
    $string = str_replace(' ', '-', $string);
    $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
    $result = strtolower($string);
    return $result;
    
}


?>