<?php include '../include/Components/admin/header.php' ?>
<?php include '../include/Components/admin/navbar.php' ?>
<?php include '../include/Components/admin/sidebar.php' ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="continer-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Jadwal Dokter</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Data Jadwal Dokter</li>
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
                            <div class="card-title">Data Kegiatan</div>
                            <div class="card-tools">
                                <a href="#" data-toggle="modal" data-target="#modalTambahJadwal"
                                    class="btn btn-success btn-sm"><i class="fas fa-plus"></i>Tambah</a>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <th>No</th>
                                        <th>Dokter</th>
                                        <th>Hari</th>
                                        <th>Jam Kerja</th>
                                        <th>Aksi</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $data = getDataWithQuery($koneksi, "SELECT * FROM jadwal_dokter INNER JOIN dokter ON jadwal_dokter.id_dokter = dokter.id_dokter;");
                                        if ($data != null) {
                                            while ($r = mysqli_fetch_array($data)) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?= $no++; ?>
                                                    </td>
                                                    <td>
                                                        <?= $r['nama_dokter'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $r['hari'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $r['start_jam'] ?> -
                                                        <?= $r['end_jam'] ?>
                                                    </td>
                                                    <td>
                                                        <a href="#" data-toggle="modal"
                                                            data-target="#modalUpdateJadwal-<?= $r['id_jadwal'] ?>"
                                                            class="btn btn-warning btn-sm" id="btn-edit"><i
                                                                class="fas fa-edit"></i></a>
                                                        <a href="../include/Events/admin/JadwalEvents.php?act=delete&id=<?= $r['id_jadwal'] ?>"
                                                            class="btn btn-danger btn-sm a-confirm">
                                                            <i class="fas fa-trash"></i></a>

                                                        <div class="modal fade" id="modalUpdateJadwal-<?= $r['id_jadwal'] ?>">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Edit Jadwal</h4>
                                                                        <button type="button" class="close" data-dismiss="modal"
                                                                            aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form
                                                                        action="../include/Events/admin/JadwalEvents.php?act=update&id=<?= $r['id_jadwal'] ?>"
                                                                        method="post" enctype="multipart/form-data">
                                                                        <div class="modal-body">
                                                                            <div class="form-group">
                                                                                <label for="id_dokter">Dokter</label>
                                                                                <select name="id_dokter" id="id_dokter"
                                                                                    class="form-control form-select" required>
                                                                                    <option value=""> -- Pilih Dokter --
                                                                                    </option>
                                                                                    <?php
                                                                                    $no = 1;
                                                                                    $data_dokter = getAll($koneksi, 'dokter');
                                                                                    if ($data_dokter != null) {
                                                                                        while ($ray = mysqli_fetch_array($data_dokter)) {
                                                                                            ?>
                                                                                            <option value="<?= $ray['id_dokter'] ?>" <?= $r['id_dokter'] == $ray['id_dokter'] ? 'selected' : '' ?> >
                                                                                                <?= $ray['nama_dokter'] ?> (
                                                                                                <?= $ray['spesialis_dokter'] ?>)
                                                                                            </option>
                                                                                            <?php
                                                                                        }
                                                                                    }
                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="hari">Hari</label>
                                                                                <select name="hari" id="hari"
                                                                                    class="form-control form-select" required>
                                                                                    <option value="Senin" <?= $r['hari'] == 'Senin' ? 'selected' : '' ?>>Senin</option>
                                                                                    <option value="Selasa" <?= $r['hari'] == 'Selasa' ? 'selected' : '' ?>>Selasa</option>
                                                                                    <option value="Rabu" <?= $r['hari'] == 'Rabu' ? 'selected' : '' ?>>Rabu</option>
                                                                                    <option value="Kamis" <?= $r['hari'] == 'Kamis' ? 'selected' : '' ?>>Kamis</option>
                                                                                    <option value="Jum'at" <?= $r['hari'] == "Jum'at" ? 'selected' : '' ?>>Jum'at</option>
                                                                                    <option value="Sabtu" <?= $r['hari'] == 'Sabtu' ? 'selected' : '' ?>>Sabtu</option>
                                                                                    <option value="Minggu" <?= $r['hari'] == 'Minggu' ? 'selected' : '' ?>>Minggu</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="start_jam">Jam Mulai</label>
                                                                                        <input type="time" name="start_jam"
                                                                                            value="<?= $r['start_jam'] ?>"
                                                                                            id="start_jam" class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="end_jam">Jam Selesai</label>
                                                                                        <input type="time" name="end_jam"
                                                                                            value="<?= $r['end_jam'] ?>"
                                                                                            id="end_jam" class="form-control">
                                                                                    </div>
                                                                                </div>
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
        <div class="modal fade" id="modalTambahJadwal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Jadwal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="../include/Events/admin/JadwalEvents.php?act=store" method="post"
                        enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="id_dokter">Dokter</label>
                                <select name="id_dokter" id="id_dokter" class="form-control form-select" required>
                                    <option value=""> -- Pilih Dokter --</option>
                                    <?php
                                    $no = 1;
                                    $data_dokter = getAll($koneksi, 'dokter');
                                    if ($data_dokter != null) {
                                        while ($r = mysqli_fetch_array($data_dokter)) {
                                            ?>
                                            <option value="<?= $r['id_dokter'] ?>">
                                                <?= $r['nama_dokter'] ?> (
                                                <?= $r['spesialis_dokter'] ?>)
                                            </option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="hari">Hari</label>
                                <select name="hari" id="hari" class="form-control form-select" required>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jum'at">Jum'at</option>
                                    <option value="Sabtu">Sabtu</option>
                                    <option value="Minggu">Minggu</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="start_jam">Jam Mulai</label>
                                        <input type="time" name="start_jam" id="start_jam" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="end_jam">Jam Selesai</label>
                                        <input type="time" name="end_jam" id="end_jam" class="form-control">
                                    </div>
                                </div>
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