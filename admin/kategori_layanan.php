<?php include '../include/Components/admin/header.php' ?>
<?php include '../include/Components/admin/navbar.php' ?>
<?php include '../include/Components/admin/sidebar.php' ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="continer-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Kategori Layanan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Data Kategori Layanan</li>
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
                            <div class="card-title">Data Kategori Layanan</div>
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
                                        $data = getAll($koneksi, 'kategori_layanan');
                                        if ($data != null) {
                                            $no = 1;
                                            while ($r = mysqli_fetch_array($data)) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?= $no++; ?>
                                                    </td>
                                                    <td>
                                                        <?= $r['kategori_layanan'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $r['status_kategori_layanan'] == '1' ? '<span class="badge badge-success">Aktif</span>' : '<span class="badge badge-danger">Tidak Aktif</span>' ?>

                                                    </td>

                                                    <td>
                                                        <a href="#" data-toggle="modal" data-target="#modalUpdateKategori-<?= $r['id_kategori_layanan'] ?>" class="btn btn-warning btn-sm" id="btn-edit"><i
                                                                class="fas fa-edit"></i></a>
                                                        <a href="../include/Events/admin/KategoriLayananEvents.php?act=delete&id=<?= $r['id_kategori_layanan'] ?>" class="btn btn-danger btn-sm a-confirm">
                                                            <i class="fas fa-trash"></i></a>
                                                        <div class="modal fade"
                                                            id="modalUpdateKategori-<?= $r['id_kategori_layanan'] ?>">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Edit Kategori</h4>
                                                                        <button type="button" class="close" data-dismiss="modal"
                                                                            aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form action="../include/Events/admin/KategoriLayananEvents.php?act=update&id=<?= $r['id_kategori_layanan'] ?>" method="post" enctype="multipart/form-data">
                                                                        <div class="modal-body">
                                                                            <div class="form-group">
                                                                                <label for="kategori_layanan">Nama Kategori</label>
                                                                                <input type="text" name="kategori_layanan"
                                                                                    value="<?= $r['kategori_layanan'] ?>"
                                                                                    id="kategori_layanan" placeholder="Kategori Layanan"
                                                                                    class="form-control">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="status_kategori_layanan">Status
                                                                                    Kategori</label>
                                                                                <select name="status_kategori_layanan"
                                                                                    id="status_kategori_layanan"
                                                                                    class="form-control" required>
                                                                                    <option value="1"
                                                                                        <?= $r['status_kategori_layanan'] == '1' ? 'selected' : '' ?>>Aktif</option>
                                                                                    <option value="0"
                                                                                        <?= $r['status_kategori_layanan'] == '0' ? 'selected' : '' ?>>Tidak Aktif</option>
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
                    <form action="../include/Events/admin/KategoriLayananEvents.php?act=store" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="kategori_layanan">Nama Kategori</label>
                                <input type="text" name="kategori_layanan" id="kategori_layanan"
                                    placeholder="Kategori Layanan" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="status_kategori_layanan">Status Kategori</label>
                                <select name="status_kategori_layanan" id="status_kategori_layanan" class="form-control"
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