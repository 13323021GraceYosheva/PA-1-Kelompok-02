<?php include '../include/Components/admin/header.php' ?>
<?php include '../include/Components/admin/navbar.php' ?>
<?php include '../include/Components/admin/sidebar.php' ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="continer-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Profile Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Profile Users</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <div class="card card-success card-outline">
                        <div class="card-body">
                            <?php 
                                $data = getDataAsConditions($koneksi,'users','id_users = '.$_SESSION['id_user']);
                            ?>
                            <div class="text-center">
                                <small>Profile User</small>
                                <br><br>
                                <img class="profile-user-img img-fluid img-circle"
                                    src="<?= $data['img_user'] != '-' && $data['img_user'] != null ? '../uploads/'.$data['img_user'] : '../assets/img/user.png'  ?>" alt="User profile picture">
                                <h3 class="profile-username text-center">Jhon Doe</h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table" border="0">
                                    <tr>
                                        <td>Nama Depan</td>
                                        <td>: <?= $data['first_name'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Belakang</td>
                                        <td>: <?= $data['last_name'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>: <?= $data['email'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td>: <?= $data['username'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Password</td>
                                        <td>: ******</td>
                                    </tr>
                                </table>
                            </div>
                            <a href="../include/Events/AuthEvents.php?act=signout" class="btn btn-danger form-control a-confirm">Sign Out</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <div class="card-title">
                                Update Profile
                            </div>
                        </div>
                        <form action="../include/Events/admin/ProfileEvents.php?act=updateProfile" enctype="multipart/form-data" method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <img src="<?= $data['img_user'] != '-' && $data['img_user'] != null ? '../uploads/'.$data['img_user'] : '../assets/img/user.png'  ?>" alt="View Img" class="img view_img_update" width="100">
                                    <br>
                                    <label for="img_user">Foto User</label>
                                    <input type="file" accept="image/png,image/jpeg,image/*" name="img_user" id="img_user" class="form-control foto_update">
                                </div>
                                <div class="form-group">
                                    <label for="first_name">Nama Depan</label>
                                    <input type="text" name="first_name" id="first_name" class="form-control" value="<?= $data['first_name'] ?>" placeholder="Nama Depan">
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Nama Belakang</label>
                                    <input type="text" name="last_name" id="last_name" class="form-control" value="<?= $data['last_name'] ?>" placeholder="Nama Belakang">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" value="<?= $data['email'] ?>" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" id="username" class="form-control" value="<?= $data['username'] ?>" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" value="" placeholder="Password">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include '../include/Components/admin/footer.php' ?>