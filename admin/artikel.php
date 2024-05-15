<?php include '../include/Components/admin/header.php' ?>
<?php include '../include/Components/admin/navbar.php' ?>
<?php include '../include/Components/admin/sidebar.php' ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="continer-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Artikel</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Data Artikel</li>
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
                            <div class="card-title">Data Artikel</div>
                            <div class="card-tools">
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <th>No</th>
                                        <th>Foto</th>
                                        <th>Artikel</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $data = getAll($koneksi, 'artikel');
                                        if ($data != null) {
                                            while ($r = mysqli_fetch_array($data)) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?= $no++; ?>
                                                    </td>
                                                    <td>
                                                        <?= $r['foto_artikel'] != '-' && $r['foto_artikel'] != null ? ' <img src="../uploads/' . $r['foto_artikel'] . '" alt="Foto Artikel" width="150" class="img">' : '<span class="badge badge-danger">Tidak Ada Foto</span>' ?>
                                                    </td>
                                                    <td>
                                                        <?= $r['judul_artikel'] ?>
                                                    </td>
                                                    <td>
                                                        <a href="#" data-toggle="modal"
                                                            data-target="#modalUpdateArtikel-<?= $r['id_artikel'] ?>"
                                                            class="btn btn-warning btn-sm" id="btn-edit"><i
                                                                class="fas fa-edit"></i></a>
                                                        <a href="../include/Events/admin/ArtikelEvents.php?act=delete&id=<?= $r['id_artikel'] ?>"
                                                            class="btn btn-danger btn-sm a-confirm">
                                                            <i class="fas fa-trash"></i></a>
                                                        <div class="modal fade" id="modalUpdateArtikel-<?= $r['id_artikel'] ?>">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Edit Artikel</h4>
                                                                        <button type="button" class="close" data-dismiss="modal"
                                                                            aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form
                                                                        action="../include/Events/admin/ArtikelEvents.php?act=update&id=<?= $r['id_artikel'] ?>"
                                                                        method="post" enctype="multipart/form-data">
                                                                        <div class="modal-body">
                                                                            <div class="form-group">
                                                                                <img src="<?=  $r['foto_artikel'] != '-' && $r['foto_artikel'] != null ? '../uploads/' . $r['foto_artikel'] : '../assets/img/user.png' ?>"
                                                                                    alt="View Img" class="img view_img_update"
                                                                                    width="100">
                                                                                <br>
                                                                                <label for="foto_artikel">Foto</label>
                                                                                <input type="file" name="foto_artikel"
                                                                                    id="foto_artikel"
                                                                                    placeholder="Foto Kegiatan"
                                                                                    class="form-control foto_update">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="judul_artikel">Judul Artikel</label>
                                                                                <input type="text" name="judul_artikel"
                                                                                    id="judul_artikel"
                                                                                    value="<?= $r['judul_artikel'] ?>"
                                                                                    placeholder="Judul Artikel"
                                                                                    class="form-control">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="short_desc_artikel">Deskripsi
                                                                                    Singkat Artikel</label>
                                                                                <input type="text" name="short_desc_artikel"
                                                                                    id="short_desc_artikel"
                                                                                    value="<?= $r['short_desc_artikel'] ?>"
                                                                                    placeholder="Deksripsi Singkat Artikel"
                                                                                    class="form-control">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="desc_artikel">Artikel</label>
                                                                                <textarea name="desc_artikel" id="desc_artikel"
                                                                                    placeholder="Artikel" class="form-control"
                                                                                    cols="30" rows="10"><?= $r['desc_artikel'] ?></textarea>
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
        <div class="modal fade" id="modalTambahArtikel">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Artikel</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="../include/Events/admin/ArtikelEvents.php?act=store" method="post"
                        enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <img src="<?= '../assets/img/user.png' ?>" alt="View Img" class="img view_img_add"
                                    width="100">
                                <br>
                                <label for="foto_artikel">Foto</label>
                                <input type="file" name="foto_artikel" id="foto_artikel" placeholder="Foto Kegiatan"
                                    class="form-control foto_add">
                            </div>
                            <div class="form-group">
                                <label for="judul_artikel">Judul Artikel</label>
                                <input type="text" name="judul_artikel" id="judul_artikel" placeholder="Judul Artikel"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="short_desc_artikel">Deskripsi Singkat Artikel</label>
                                <input type="text" name="short_desc_artikel" id="short_desc_artikel"
                                    placeholder="Deksripsi Singkat Artikel" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="desc_artikel">Artikel</label>
                                <textarea name="desc_artikel" id="desc_artikel" placeholder="Artikel"
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