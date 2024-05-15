<?php
include '../Database/DBConnections.php';
include '../Helper/DbHelper.php';


if(isset($_GET['act'])){
    if($_GET['act'] == 'login'){
        if(!isset($_POST) && !isset($_POST['email']) && !isset($_POST['email']) ){
            setFlashData("Email / Password tidak dicantumkan");
            header('Location: ../../login.php');
        }
        $username = $_POST['email'];
        $pass = md5($_POST['password']);
        $query = mysqli_query($koneksi,"SELECT * FROM users WHERE users.email = '$username' AND users.password = '$pass'");
        if(mysqli_num_rows($query) > 0){
            $data = mysqli_fetch_assoc($query);
            $_SESSION['id_user'] = $data['id_users'];
            $_SESSION['nama_user'] = $data['first_name'].' '.$data['last_name'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['foto_user'] = $data['img_user'];
            $_SESSION['isLogin'] = true;
            header('Location: ../../admin/index.php');
        }else{
         setFlashData("Akun tidak ditemukan / Belum Terdaftar");
         header('Location: ../../login.php');
        }
    }
    if($_GET['act'] == 'signout'){
        session_destroy();
        header('Location: ../../login.php');
     }
     if($_GET['act'] == ''){
        header('Location: ../../login.php');
     }
}


?>