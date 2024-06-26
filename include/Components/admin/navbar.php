<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header disabled">Profile Users</span>
                <div class="dropdown-item disabled">
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" src="<?= $_SESSION['foto_user'] != '-' && $_SESSION['foto_user'] != null ? '../uploads/'.$_SESSION['foto_user'] : '../assets/img/user.png'  ?>"
                            alt="User profile picture">
                        <h3 class="profile-username text-center"><?= $_SESSION['nama_user'] != null ? $_SESSION['nama_user'] : 'Anonymous' ?></h3>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <a href="profile.php" class="dropdown-item">
                    <i class="fas fa-user mr-2"></i> Profile
                </a>
                <div class="dropdown-divider"></div>
                <a href="../include/Events/AuthEvents.php?act=signout" class="dropdown-item a-confirm">
                    <i class="fas fa-power-off mr-2"></i> SignOut
                </a>
            </div>
        </li>
    </ul>
</nav>