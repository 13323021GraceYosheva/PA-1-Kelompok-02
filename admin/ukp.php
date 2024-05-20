<?php include '../include/Components/admin/header.php' ?>
<?php include '../include/Components/admin/navbar.php' ?>
<?php include '../include/Components/admin/sidebar.php' ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="continer-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data UKP</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Data UKP</li>
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
                            <div class="card-title">Data UKP</div>
                            <div class="card-tools">
                                <a href="#" data-toggle="modal" data-target="#modalTambahUkp"
                                    class="btn btn-success btn-sm"><i class="fas fa-plus"></i>Tambah</a>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>UKP</th>
                                        <th>Kategori</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $data = getDataWithQuery($koneksi, "SELECT * FROM ukp INNER JOIN kategori_ukp ON ukp.id_kategori_ukp = kategori_ukp.id_kategori_ukp ;");
                                        if ($data != null) {
                                            $no = 1;
                                            while ($r = mysqli_fetch_array($data)) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?= $no++; ?>
                                                    </td>
                                                    <td>
                                                        <?= $r['foto_ukp'] != '-' && $r['foto_ukp'] != null ? ' <img src="../uploads/' . $r['foto_ukp'] . '" alt="Foto Kegiatan" width="150" class="img">' : '<span class="badge badge-danger">Tidak Ada Foto</span>' ?>
                                                    </td>
                                                    <td>
                                                        <?= $r['nama_ukp'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $r['kategori_ukp'] ?>
                                                    </td>
                                                    <td>
                                                        <a href="#" data-toggle="modal"
                                                            data-target="#modalUpdateUkp-<?= $r['id_ukp'] ?>"
                                                            class="btn btn-warning btn-sm" id="btn-edit"><i
                                                                class="fas fa-edit"></i></a>
                                                        <a href="../include/Events/admin/UKPEvents.php?act=delete&id=<?= $r['id_ukp'] ?>"
                                                            class="btn btn-danger btn-sm a-confirm">
                                                            <i class="fas fa-trash"></i></a>

                                                        <div class="modal fade" id="modalUpdateUkp-<?= $r['id_ukp'] ?>">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Edit UKP</h4>
                                                                        <button type="button" class="close" data-dismiss="modal"
                                                                            aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form
                                                                        action="../include/Events/admin/UKPEvents.php?act=update&id=<?= $r['id_ukp'] ?>"
                                                                        method="post" enctype="multipart/form-data">
                                                                        <div class="modal-body">
                                                                            <div class="form-group">
                                                                                <img src="<?= $r['foto_ukp'] != '-' && $r['foto_ukp'] != null ? '../uploads/' . $r['foto_ukp'] : '../assets/img/user.png' ?>"
                                                                                    alt="View Img" class="img view_img_update"
                                                                                    width="100">
                                                                                <br>
                                                                                <label for="foto_ukp">Foto</label>
                                                                                <input type="file" name="foto_ukp" id="foto_ukp"
                                                                                    placeholder="Foto Layanan"
                                                                                    class="form-control foto_update">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="id_kategori_ukp">Kategori
                                                                                    UKP</label>
                                                                                <select class="form-control"
                                                                                    name="id_kategori_ukp" id="id_kategori_ukp"
                                                                                    required>
                                                                                    <option value="">-- Pilih Kategori --
                                                                                    </option>
                                                                                    <?php $data_kategori = getAll($koneksi, 'kategori_ukp');
                                                                                    if ($data_kategori != null) {
                                                                                        while ($ray = mysqli_fetch_array($data_kategori)) {
                                                                                            ?>
                                                                                            <option
                                                                                                value="<?= $ray['id_kategori_ukp'] ?>"
                                                                                                <?= $ray['id_kategori_ukp'] == $r['id_kategori_ukp'] ? 'selected' : '' ?>>
                                                                                                <?= $ray['kategori_ukp'] ?> (
                                                                                                <?= $ray['status_kategori_ukp'] == '1' ? 'Aktif' : 'Tidak Aktif' ?>
                                                                                                )
                                                                                            </option>
                                                                                            <?php
                                                                                        }
                                                                                    }
                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="nama_ukp">Nama Ukp</label>
                                                                                <input type="text" name="nama_ukp" id="nama_ukp"
                                                                                    value="<?= $r['nama_ukp'] ?>"
                                                                                    placeholder="Nama UKP" class="form-control">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="short_desc_ukp">Deskripsi Singkat
                                                                                    UKP</label>
                                                                                <input type="text" name="short_desc_ukp"
                                                                                    id="short_desc_ukp"
                                                                                    value="<?= $r['short_desc_ukp'] ?>"
                                                                                    placeholder="Deksripsi Singkat UKP"
                                                                                    class="form-control">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="desc_ukp">Deskripsi UKP</label>
                                                                                <textarea name="desc_ukp" id="desc_ukp"
                                                                                    placeholder="Deskripsi UKP"
                                                                                    class="form-control summernote" cols="30"
                                                                                    rows="10"><?= $r['desc_ukp'] ?></textarea>
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
        <div class="modal fade" id="modalTambahUkp">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah UKP</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="../include/Events/admin/UKPEvents.php?act=store" method="post"
                        enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <img src="<?= '../assets/img/user.png' ?>" alt="View Img" class="img view_img_add"
                                    width="100">
                                <br>
                                <label for="foto_ukp">Foto</label>
                                <input type="file" name="foto_ukp" id="foto_ukp" placeholder="Foto Layanan"
                                    class="form-control foto_add">
                            </div>
                            <div class="form-group">
                                <label for="id_kategori_ukp">Kategori
                                    UKP</label>
                                <select class="form-control" name="id_kategori_ukp" id="id_kategori_ukp" required>
                                    <option value="">-- Pilih Kategori --
                                    </option>
                                    <?php $data_kategori = getAll($koneksi, 'kategori_ukp');
                                    if ($data_kategori != null) {
                                        while ($ray = mysqli_fetch_array($data_kategori)) {
                                            ?>
                                            <option value="<?= $ray['id_kategori_ukp'] ?>">
                                                <?= $ray['kategori_ukp'] ?> (
                                                <?= $ray['status_kategori_ukp'] == '1' ? 'Aktif' : 'Tidak Aktif' ?>
                                                )
                                            </option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nama_ukp">Nama Ukp</label>
                                <input type="text" name="nama_ukp" id="nama_ukp" placeholder="Nama UKP"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="short_desc_ukp">Deskripsi Singkat UKP</label>
                                <input type="text" name="short_desc_ukp" id="short_desc_ukp"
                                    placeholder="Deksripsi Singkat UKP" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="desc_ukp">Deskripsi UKP</label>
                                <textarea name="desc_ukp" id="desc_ukp" placeholder="Deskripsi UKP" class="form-control summernote"
                                    cols="30" rows="10"></textarea>
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