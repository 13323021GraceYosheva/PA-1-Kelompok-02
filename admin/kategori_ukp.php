<?php include '../include/Components/admin/header.php' ?>
<?php include '../include/Components/admin/navbar.php' ?>
<?php include '../include/Components/admin/sidebar.php' ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="continer-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Kategori UKP</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Data Kategori UKP</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <div class="card-title">Data Kategori UKP</div>
                            <div class="card-tools">
                                <a href="#" data-toggle="modal" data-target="#modalTambahKategori"
                                    class="btn btn-success btn-sm"><i class="fas fa-plus"></i>Tambah</a>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <th>No</th>
                                        <th>Kategori</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $data = getAll($koneksi, 'kategori_ukp');
                                        if ($data != null) {
                                            $no = 1;
                                            while ($r = mysqli_fetch_array($data)) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?= $no++; ?>
                                                    </td>
                                                    <td>
                                                        <?= $r['kategori_ukp'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $r['status_kategori_ukp'] == '1' ? '<span class="badge badge-success">Aktif</span>' : '<span class="badge badge-danger">Tidak Aktif</span>' ?>

                                                    </td>

                                                    <td>
                                                        <a href="#" data-toggle="modal"
                                                            data-target="#modalUpdateKategori-<?= $r['id_kategori_ukp'] ?>"
                                                            class="btn btn-warning btn-sm" id="btn-edit"><i
                                                                class="fas fa-edit"></i></a>
                                                        <a href="../include/Events/admin/KategoriUKP.php?act=delete&id=<?= $r['id_kategori_ukp'] ?>" class="btn btn-danger btn-sm a-confirm">
                                                            <i class="fas fa-trash"></i></a>
                                                        <div class="modal fade" id="modalUpdateKategori-<?= $r['id_kategori_ukp'] ?>">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Edit Kategori</h4>
                                                                        <button type="button" class="close" data-dismiss="modal"
                                                                            aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form action="../include/Events/admin/KategoriUKP.php?act=update&id=<?= $r['id_kategori_ukp'] ?>" method="post" enctype="multipart/form-data">
                                                                        <div class="modal-body">
                                                                            <div class="form-group">
                                                                                <label for="kategori_ukp">Nama Kategori</label>
                                                                                <input type="text" name="kategori_ukp"
                                                                                value="<?= $r['kategori_ukp'] ?>"
                                                                                    id="kategori_ukp" placeholder="Kategori UKP"
                                                                                    class="form-control">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="status_kategori_ukp">Status
                                                                                    Kategori</label>
                                                                                <select name="status_kategori_ukp"
                                                                                    id="status_kategori_ukp"
                                                                                    class="form-control" required>
                                                                                    <option value="1" <?= $r['status_kategori_ukp'] == '1' ? 'selected' : '' ?>>Aktif</option>
                                                                                    <option value="0" <?= $r['status_kategori_ukp'] == '0' ? 'selected' : '' ?>>Tidak Aktif</option>
                                                                                </select>
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
        <div class="modal fade" id="modalTambahKategori">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Kategori</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="../include/Events/admin/KategoriUKP.php?act=store" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="kategori_ukp">Nama Kategori</label>
                                <input type="text" name="kategori_ukp" id="kategori_ukp" placeholder="Kategori UKP"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="status_kategori_ukp">Status Kategori</label>
                                <select name="status_kategori_ukp" id="status_kategori_ukp" class="form-control"
                                    required>
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                </select>
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