<?php include '../include/Components/admin/header.php' ?>
<?php include '../include/Components/admin/navbar.php' ?>
<?php include '../include/Components/admin/sidebar.php' ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="continer-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Layanan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Data Layanan</li>
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
                            <div class="card-title">Data Layanan</div>
                            <div class="card-tools">
                                <a href="#" data-toggle="modal" data-target="#modalTambahLayanan"
                                    class="btn btn-success btn-sm"><i class="fas fa-plus"></i>Tambah</a>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Layanan</th>
                                        <th>Kategori</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $data = getDataWithQuery($koneksi, "SELECT * FROM layanan INNER JOIN kategori_layanan ON layanan.id_kategori_layanan = kategori_layanan.id_kategori_layanan ;");
                                        if ($data != null) {
                                            $no = 1;
                                            while ($r = mysqli_fetch_array($data)) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?= $no++; ?>
                                                    </td>
                                                    <td>
                                                        <?= $r['foto_layanan'] != '-' && $r['foto_layanan'] != null ? ' <img src="../uploads/' . $r['foto_layanan'] . '" alt="Foto Kegiatan" width="150" class="img">' : '<span class="badge badge-danger">Tidak Ada Foto</span>' ?>
                                                    </td>
                                                    <td>
                                                        <?= $r['nama_layanan'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $r['kategori_layanan'] ?>
                                                    </td>
                                                    <td>
                                                        <a href="#" data-toggle="modal"
                                                            data-target="#modalUpdateLayanan-<?= $r['id_layanan'] ?>"
                                                            class="btn btn-warning btn-sm" id="btn-edit"><i
                                                                class="fas fa-edit"></i></a>
                                                        <a href="../include/Events/admin/LayananEvents.php?act=delete&id=<?= $r['id_layanan'] ?>"
                                                            class="btn btn-danger btn-sm a-confirm">
                                                            <i class="fas fa-trash"></i></a>
                                                        <div class="modal fade" id="modalUpdateLayanan-<?= $r['id_layanan'] ?>">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Edit Layanan</h4>
                                                                        <button type="button" class="close" data-dismiss="modal"
                                                                            aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form
                                                                        action="../include/Events/admin/LayananEvents.php?act=update&id=<?= $r['id_layanan'] ?>"
                                                                        method="post" enctype="multipart/form-data">
                                                                        <div class="modal-body">
                                                                            <div class="form-group">
                                                                                <img src="<?= $r['foto_layanan'] != '-' && $r['foto_layanan'] != null ? '../uploads/' . $r['foto_layanan'] : '../assets/img/user.png' ?>"
                                                                                    alt="View Img" class="img view_img_update"
                                                                                    width="100">
                                                                                <br>
                                                                                <label for="foto_layanan">Foto</label>
                                                                                <input type="file" name="foto_layanan"
                                                                                    id="foto_layanan" placeholder="Foto Layanan"
                                                                                    class="form-control foto_update">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="id_kategori_layanan">Kategori
                                                                                    Layanan</label>
                                                                                <select class="form-control"
                                                                                    name="id_kategori_layanan"
                                                                                    id="id_kategori_layanan" required>
                                                                                    <option value="">-- Pilih Layanan --
                                                                                    </option>
                                                                                    <?php $data_kategori = getAll($koneksi, 'kategori_layanan');
                                                                                    if ($data_kategori != null) {
                                                                                        while ($ray = mysqli_fetch_array($data_kategori)) {
                                                                                            ?>
                                                                                            <option
                                                                                                value="<?= $ray['id_kategori_layanan'] ?>"
                                                                                                <?= $ray['id_kategori_layanan'] == $r['id_kategori_layanan'] ? 'selected' : '' ?>>
                                                                                                <?= $ray['kategori_layanan'] ?> (
                                                                                                <?= $ray['status_kategori_layanan'] == '1' ? 'Aktif' : 'Tidak Aktif' ?>
                                                                                                )
                                                                                            </option>
                                                                                            <?php
                                                                                        }
                                                                                    }
                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="nama_layanan">Nama Layanan</label>
                                                                                <input type="text" name="nama_layanan"
                                                                                    value="<?= $r['nama_layanan'] ?>"
                                                                                    id="nama_layanan" placeholder="Nama Layanan"
                                                                                    class="form-control">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="short_desc_layanan">Deskripsi
                                                                                    Singkat Layanan</label>
                                                                                <input type="text" name="short_desc_layanan"
                                                                                    id="short_desc_layanan"
                                                                                    value="<?= $r['short_desc_layanan'] ?>"
                                                                                    placeholder="Deksripsi Singkat Layanan"
                                                                                    class="form-control">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="desc_layanan">Deskripsi
                                                                                    Layanan</label>
                                                                                <textarea name="desc_layanan" id="desc_layanan"
                                                                                    placeholder="Deskripsi Layanan"
                                                                                    class="form-control summernote" cols="30"
                                                                                    rows="10"><?= $r['desc_layanan'] ?></textarea>
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
        <div class="modal fade" id="modalTambahLayanan">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Layanan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="../include/Events/admin/LayananEvents.php?act=store" method="post"
                        enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <img src="<?= '../assets/img/user.png' ?>" alt="View Img" class="img view_img_add"
                                    width="100">
                                <br>
                                <label for="foto_layanan">Foto</label>
                                <input type="file" name="foto_layanan" id="foto_layanan" placeholder="Foto Layanan"
                                    class="form-control foto_add">
                            </div>
                            <div class="form-group">
                                <label for="id_kategori_layanan">Kategori Layanan</label>
                                <select class="form-control" name="id_kategori_layanan" id="id_kategori_layanan"
                                    required>
                                    <option value="">-- Pilih Layanan --</option>
                                    <?php $data_kategori = getAll($koneksi, 'kategori_layanan');
                                    if ($data_kategori != null) {
                                        while ($ray = mysqli_fetch_array($data_kategori)) {
                                            ?>
                                            <option value="<?= $ray['id_kategori_layanan'] ?>">
                                                <?= $ray['kategori_layanan'] ?> (
                                                <?= $ray['status_kategori_layanan'] == '1' ? 'Aktif' : 'Tidak Aktif' ?> )
                                            </option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nama_layanan">Nama Layanan</label>
                                <input type="text" name="nama_layanan" id="nama_layanan" placeholder="Nama Layanan"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="short_desc_layanan">Deskripsi Singkat Layanan</label>
                                <input type="text" name="short_desc_layanan" id="short_desc_layanan"
                                    placeholder="Deksripsi Singkat Layanan" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="desc_layanan">Deskripsi Layanan</label>
                                <textarea name="desc_layanan" id="desc_layanan" placeholder="Deskripsi Layanan"
                                    class="form-control summernote" cols="30" rows="10"></textarea>
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