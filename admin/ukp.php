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
                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <div class="card-title">Data Kegiatan</div>
                            <div class="card-tools">
                                <a href="#" data-toggle="modal" data-target="#modalTambahUkp" class="btn btn-success btn-sm"><i class="fas fa-plus"></i>Tambah</a>
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
                                                        <?= $r['foto_ukp'] != '-' || $r['foto_ukp'] != null ? ' <img src="../uploads/' . $r['foto_ukp'] . '" alt="Foto Kegiatan" width="150" class="img">' : '<span class="badge badge-danger">Tidak Ada Foto</span>' ?>
                                                    </td>
                                                    <td>
                                                        <?= $r['nama_ukp'] ?>
                                                    </td>
                                                    <td>
                                                        <?= $r['kategori_ukp'] ?>
                                                    </td>
                                                    <td>
                                                        <a href="#" data-toggle="modal" data-target="#modalUpdateUkp-<?= $r['id_ukp'] ?>" class="btn btn-warning btn-sm" id="btn-edit"><i
                                                                class="fas fa-edit"></i></a>
                                                        <a href="#" class="btn btn-danger btn-sm a-confirm">
                                                            <i class="fas fa-trash"></i></a>
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
    </section>
</div>

<?php include '../include/Components/admin/footer.php' ?>