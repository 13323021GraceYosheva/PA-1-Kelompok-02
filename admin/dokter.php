<?php include '../include/Components/admin/header.php' ?>
<?php include '../include/Components/admin/navbar.php' ?>
<?php include '../include/Components/admin/sidebar.php' ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="continer-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Dokter</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Data Dokter</li>
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
                            <div class="card-title">Data Dokter</div>
                            <div class="card-tools">
                                <a href="#" data-toggle="modal" data-target="#modalTambahDokter"
                                    class="btn btn-success btn-sm"><i class="fas fa-plus"></i>Tambah</a>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <th>No</th>
                                        <th>Foto Dokter</th>
                                        <th>Nama Dokter</th>
                                        <th>Spesialisasi</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $data = getAll($koneksi, 'dokter');
                                        if ($data != null) {
                                            $no = 1;
                                            while ($r = mysqli_fetch_array($data)) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?= $no++ ?>
                                                    </td>
                                                    <td>
                                                        <?= $r['foto_dokter'] != '-' && $r['foto_dokter'] != null ? ' <img src="../uploads/' . $r['foto_dokter'] . '" alt="Foto Dokter" width="150" class="img">' : '<span class="badge badge-danger">Tidak Ada Foto</span>' ?>
                                                    </td>
                                                    <td>
                                                        <?= $r['nama_dokter'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $r['spesialis_dokter'] ?>
                                                    </td>
                                                    <td>
                                                        <a href="#" data-toggle="modal"
                                                            data-target="#modalUpdateDokter-<?= $r['id_dokter'] ?>"
                                                            class="btn btn-warning btn-sm" id="btn-edit"><i
                                                                class="fas fa-edit"></i></a>
                                                        <a href="../include/Events/admin/DokterEvents.php?act=delete&id=<?= $r['id_dokter'] ?>"
                                                            class="btn btn-danger btn-sm a-confirm">
                                                            <i class="fas fa-trash"></i></a>

                                                        <div class="modal fade" id="modalUpdateDokter-<?= $r['id_dokter'] ?>">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Edit Dokter</h4>
                                                                        <button type="button" class="close" data-dismiss="modal"
                                                                            aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form
                                                                        action="../include/Events/admin/DokterEvents.php?act=update&id=<?=$r['id_dokter']?>"
                                                                        method="post" enctype="multipart/form-data">
                                                                        <div class="modal-body">
                                                                            <div class="form-group">
                                                                                <img src="<?= $r['foto_dokter'] != '-' && $r['foto_dokter'] != null ? '../uploads/' . $r['foto_dokter'] : '../assets/img/user.png' ?>"
                                                                                    alt="View Img" class="img view_img_update"
                                                                                    width="100">
                                                                                <br>
                                                                                <label for="foto_dokter">Foto</label>
                                                                                <input type="file" name="foto_dokter"
                                                                                    id="foto_dokter" placeholder="Foto Dokter"
                                                                                    class="form-control foto_update">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="nama_dokter">Nama Dokter</label>
                                                                                <input type="text" name="nama_dokter"
                                                                                    id="nama_dokter" value="<?= $r['nama_dokter'] ?>" placeholder="Nama Dokter"
                                                                                    class="form-control">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label
                                                                                    for="spesialis_dokter">Spesialisasi</label>
                                                                                <input type="text" name="spesialis_dokter"
                                                                                    id="spesialis_dokter"
                                                                                     value="<?= $r['spesialis_dokter'] ?>"
                                                                                    placeholder="Spesialisasi Dokter"
                                                                                    class="form-control">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="no_hp_dokter">No Hp</label>
                                                                                <input type="text" value="<?= $r['no_hp_dokter'] ?>" name="no_hp_dokter"
                                                                                    id="no_hp_dokter" placeholder="No Hp Dokter"
                                                                                    class="form-control">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="alamat_dokter">Alamat Dokter</label>
                                                                                <textarea name="alamat_dokter"
                                                                                    id="alamat_dokter"
                                                                                    placeholder="Alamat Dokter"
                                                                                    class="form-control" cols="30"
                                                                                    rows="10"><?= $r['alamat_dokter'] ?></textarea>
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
        <div class="modal fade" id="modalTambahDokter">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Dokter</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="../include/Events/admin/DokterEvents.php?act=store" method="post"
                        enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <img src="<?= '../assets/img/user.png' ?>" alt="View Img" class="img view_img_add"
                                    width="100">
                                <br>
                                <label for="foto_dokter">Foto</label>
                                <input type="file" accept="image/*,image/jpeg,image/png" name="foto_dokter" id="foto_dokter" placeholder="Foto Dokter"
                                    class="form-control foto_add">
                            </div>
                            <div class="form-group">
                                <label for="nama_dokter">Nama Dokter</label>
                                <input type="text" name="nama_dokter" id="nama_dokter" placeholder="Nama Dokter"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="spesialis_dokter">Spesialisasi</label>
                                <input type="text" name="spesialis_dokter" id="spesialis_dokter"
                                    placeholder="Spesialisasi Dokter" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="no_hp_dokter">No Hp</label>
                                <input type="text" name="no_hp_dokter" id="no_hp_dokter" placeholder="No Hp Dokter"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="alamat_dokter">Alamat Dokter</label>
                                <textarea name="alamat_dokter" id="alamat_dokter" placeholder="Alamat Dokter"
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