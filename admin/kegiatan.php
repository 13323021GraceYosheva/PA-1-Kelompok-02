<?php include '../include/Components/admin/header.php' ?>
<?php include '../include/Components/admin/navbar.php' ?>
<?php include '../include/Components/admin/sidebar.php' ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="continer-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Kegiatan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Data Kegiatan</li>
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
                            <div class="card-title">Data Kegiatan</div>
                            <div class="card-tools">
                                <a href="#" data-toggle="modal" data-target="#modalTambahKegiatan"
                                    class="btn btn-success btn-sm"><i class="fas fa-plus"></i>Tambah</a>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Kegiatan</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $data = getAll($koneksi, 'kegiatan');
                                        if ($data != null) {
                                            $no = 1;
                                            while ($r = mysqli_fetch_array($data)) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?= $no++; ?>
                                                    </td>
                                                    <td>
                                                        <?= $r['foto_kegiatan'] != '-' && $r['foto_kegiatan'] != null ? ' <img src="../uploads/' . $r['foto_kegiatan'] . '" alt="Foto Kegiatan" width="150" class="img">' : '<span class="badge badge-danger">Tidak Ada Foto</span>' ?>
                                                    </td>
                                                    <td>
                                                        <?= $r['judul_kegiatan'] ?>
                                                    </td>

                                                    <td>
                                                        <a href="#" data-toggle="modal"
                                                            data-target="#modalUpdateKegiatan-<?= $r['id_kegiatan'] ?>"
                                                            class="btn btn-warning btn-sm" id="btn-edit"><i
                                                                class="fas fa-edit"></i></a>
                                                        <a href="../include/Events/admin/KegiatanEvents.php?act=delete&id=<?= $r['id_kegiatan'] ?>"
                                                            class="btn btn-danger btn-sm a-confirm">
                                                            <i class="fas fa-trash"></i></a>
                                                        <div class="modal fade"
                                                            id="modalUpdateKegiatan-<?= $r['id_kegiatan'] ?>">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Tambah Kegiatan</h4>
                                                                        <button type="button" class="close" data-dismiss="modal"
                                                                            aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form
                                                                        action="../include/Events/admin/KegiatanEvents.php?act=update&id=<?= $r['id_kegiatan'] ?>"
                                                                        method="post" enctype="multipart/form-data">
                                                                        <div class="modal-body">
                                                                            <div class="form-group">
                                                                                <img src="<?= $r['foto_kegiatan'] != '-' && $r['foto_kegiatan'] != null ? '../uploads/' . $r['foto_kegiatan'] : '../assets/img/user.png' ?>"
                                                                                    alt="View Img" class="img view_img_update"
                                                                                    width="100">
                                                                                <br>
                                                                                <label for="foto_kegiatan">Foto</label>
                                                                                <input type="file" name="foto_kegiatan"
                                                                                    id="foto_kegiatan"
                                                                                    placeholder="Foto Kegiatan"
                                                                                    class="form-control foto_update">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="judul_kegiatan">Judul
                                                                                    Kegiatan</label>
                                                                                <input type="text" name="judul_kegiatan"
                                                                                    id="judul_kegiatan"
                                                                                    value="<?= $r['judul_kegiatan'] ?>"
                                                                                    placeholder="Judul Kegiatan"
                                                                                    class="form-control">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="short_desc_kegiatan">Deskripsi
                                                                                    Singkat Kegiatan</label>
                                                                                <input type="text" name="short_desc_kegiatan"
                                                                                    id="short_desc_kegiatan"
                                                                                    value="<?= $r['short_desc_kegiatan'] ?>"
                                                                                    placeholder="Deksripsi Singkat Kegiatan"
                                                                                    class="form-control">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="desc_kegiatan">Deskripsi
                                                                                    Kegiatan</label>
                                                                                <textarea name="desc_kegiatan"
                                                                                    id="desc_kegiatan"
                                                                                    placeholder="Deskripsi Kegiatan"
                                                                                    class="form-control" cols="30"
                                                                                    rows="10"><?= $r['desc_kegiatan'] ?></textarea>
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
        <div class="modal fade" id="modalTambahKegiatan">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Kegiatan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="../include/Events/admin/KegiatanEvents.php?act=store" method="post"
                        enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <img src="<?= '../assets/img/user.png' ?>"
                                    alt="View Img" class="img view_img_add" width="100">
                                <br>
                                <label for="foto_kegiatan">Foto</label>
                                <input type="file" name="foto_kegiatan" id="foto_kegiatan" placeholder="Foto Kegiatan"
                                    class="form-control foto_add">
                            </div>
                            <div class="form-group">
                                <label for="judul_kegiatan">Judul Kegiatan</label>
                                <input type="text" name="judul_kegiatan" id="judul_kegiatan"
                                    placeholder="Judul Kegiatan" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="short_desc_kegiatan">Deskripsi Singkat Kegiatan</label>
                                <input type="text" name="short_desc_kegiatan" id="short_desc_kegiatan"
                                    placeholder="Deksripsi Singkat Kegiatan" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="desc_kegiatan">Deskripsi Kegiatan</label>
                                <textarea name="desc_kegiatan" id="desc_kegiatan" placeholder="Deskripsi Kegiatan"
                                    class="form-control" cols="30" rows="10"></textarea>
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