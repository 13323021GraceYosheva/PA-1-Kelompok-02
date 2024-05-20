<?php include '../include/Components/admin/header.php' ?>
<?php include '../include/Components/admin/navbar.php' ?>
<?php include '../include/Components/admin/sidebar.php' ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="continer-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Users</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Data Users</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-md-12">
                    <?php
                    if (isset($_SESSION['flash_data'])) {
                        ?>
                        <div
                            class="alert alert-<?= isset($_SESSION['flash_data']['status']) ? $_SESSION['flash_data']['status'] : '' ?>">
                            <?= isset($_SESSION['flash_data']['message']) ? $_SESSION['flash_data']['message'] : '' ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="col-md-12">
                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <div class="card-title">Data Users</div>
                            <div class="card-tools">
                                <a href="#" data-toggle="modal" data-target="#modalTambahUser"
                                    class="btn btn-success btn-sm"><i class="fas fa-plus"></i>Tambah</a>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Password</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $data = getAll($koneksi, 'users');
                                        if ($data != null) {
                                            $no = 1;
                                            while ($r = mysqli_fetch_array($data)) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?= $no++; ?>
                                                    </td>
                                                    <td>
                                                        <?= $r['first_name'] ?>
                                                        <?= $r['last_name'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $r['email'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $r['username'] ?>
                                                    </td>
                                                    <td>*******</td>
                                                    <td>
                                                        <a href="#" data-toggle="modal"
                                                            data-target="#modalUpdate-<?= $r['id_users'] ?>"
                                                            class="btn btn-warning btn-sm" id="btn-edit"><i
                                                                class="fas fa-edit"></i></a>
                                                        <a href="../include/Events/admin/UsersEvents.php?act=delete&id=<?= $r['id_users'] ?>" class="btn btn-danger btn-sm a-confirm">
                                                            <i class="fas fa-trash"></i></a>
                                                        <div class="modal fade" id="modalUpdate-<?= $r['id_users'] ?>">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Edit Users</h4>
                                                                        <button type="button" class="close" data-dismiss="modal"
                                                                            aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form action="../include/Events/admin/UsersEvents.php?act=update&id=<?= $r['id_users'] ?>" method="post" enctype="multipart/form-data">
                                                                        <div class="modal-body">
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label>Nama Depan</label>
                                                                                        <input type="text" value="<?= $r['first_name'] ?>" name="first_name"
                                                                                            id="first_name" class="form-control"
                                                                                            placeholder="Nama Depan">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label>Nama Belakang</label>
                                                                                        <input type="text" name="last_name"
                                                                                            id="last_name" value="<?= $r['last_name'] ?>" class="form-control"
                                                                                            placeholder="Nama Belakang">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Email</label>
                                                                                <input type="email" name="email" value="<?= $r['email'] ?>" id="email"
                                                                                    class="form-control" placeholder="Email">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Username</label>
                                                                                <input type="text" name="username" value="<?= $r['username'] ?>" id="username"
                                                                                    class="form-control" placeholder="Username">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Password</label>
                                                                                <input type="password" name="password"
                                                                                    id="password" class="form-control"
                                                                                    placeholder="Password">
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer justify-content-between">
                                                                            <button type="button" class="btn btn-default btn-sm"
                                                                                data-dismiss="modal">Close</button>
                                                                            <button type="submit"
                                                                                class="btn btn-success btn-sm">Save
                                                                                changes</button>
                                                                        </div>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modalTambahUser">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Users</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="../include/Events/admin/UsersEvents.php?act=store" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Depan</label>
                                        <input type="text" name="first_name" id="first_name" class="form-control"
                                            placeholder="Nama Depan">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Belakang</label>
                                        <input type="text" name="last_name" id="last_name" class="form-control"
                                            placeholder="Nama Belakang">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" id="username" class="form-control"
                                    placeholder="Username">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Password">
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success btn-sm">Save changes</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
</div>

<?php include '../include/Components/admin/footer.php' ?>