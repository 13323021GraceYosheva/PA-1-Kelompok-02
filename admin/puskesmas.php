<?php include '../include/Components/admin/header.php' ?>
<?php include '../include/Components/admin/navbar.php' ?>
<?php include '../include/Components/admin/sidebar.php' ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="continer-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Puskesmas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Data Puskesmas</li>
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
                    $data = getPuskesmasSettings($koneksi);
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
                            <div class="card-title">
                                Data Puskesmas
                            </div>
                        </div>
                        <form action="../include/Events/admin/PuskesmasEvents.php?act=UpdatePuskesmas" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <img src=" <?= $data != null && $data['logo_puskesmas'] != '-' ? '../uploads/'.$data['logo_puskesmas'] : '../assets/img/logo.jpg' ?> " width="100" class="img view_img_update" alt="Logo Puskesmas">
                                    <br>
                                    <label for="logo">Logo</label>
                                    <input type="file" class="form-input form-control foto_update" name="logo_puskesmas" id="logo">
                                </div>
                                <div class="form-group">
                                    <label for="nama_puskesmas">Nama Puskesmas</label>
                                    <input type="text" value="<?= $data != null && $data['nama_puskesmas'] != '-' ? $data['nama_puskesmas'] : '' ?>" name="nama_puskesmas" id="nama_puskesmas" class="form-control" placeholder="Nama Puskesmas">
                                </div>
                                <div class="form-group">
                                    <label for="alamat_puskesmas">Alamat Puskesmas</label>
                                    <textarea name="alamat_puskesmas" id="alamat_puskesmas" class="form-control" placeholder="Alamat Puskesmas" cols="30" rows="10"><?= $data != null && $data['alamat_puskesmas'] != '-' ? $data['alamat_puskesmas'] : '' ?></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Koordinat Puskesmas</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lat">Lat</label>
                                            <input type="text" value="<?= $data != null && $data['lat_puskesmas'] != '-' ? $data['lat_puskesmas'] : '' ?>" name="lat_puskesmas" id="lat_puskesmas" class="form-control" placeholder="Latitude">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lng">Lng</label>
                                            <input type="text" name="lng_puskesmas" id="lng_puskesmas" value="<?= $data != null && $data['lng_puskesmas'] != '-' ? $data['lng_puskesmas'] : '' ?>" class="form-control" placeholder="Longitude">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email_puskesmas">Email Puskesmas</label>
                                    <input type="email" name="email_puskesmas" value=" <?= $data != null && $data['email_puskesmas'] != '-' ? $data['email_puskesmas'] : '' ?>" id="email_puskesmas" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="no_telp">No Telp</label>
                                    <input type="text" name="no_telp" value="<?= $data != null && $data['no_telp'] != '-' ? $data['no_telp'] : '' ?>" id="no_telp" class="form-control" placeholder="No Telp">
                                </div>
                                <div class="form-group">
                                    <label for="short_deskripsi_puskesmas">Deskripsi Singkat Puskesmas / Profile Singkat Puskesmas</label>
                                    <input type="text" name="short_deskripsi_puskesmas" value="<?= $data != null && $data['short_deskripsi_puskesmas'] != '-' ? $data['short_deskripsi_puskesmas'] : '' ?>" id="short_deskripsi_puskesmas" class="form-control" placeholder="Deskripsi Singkat Puskesmas">
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi_puskesmas">Deskripsi Tentang Puskesmas / Profile Puskesmas</label>
                                    <textarea name="deskripsi_puskesmas" id="deskripsi_puskesmas" class="form-control summernote" placeholder="Deskripsi Puskesmas" cols="30" rows="10"><?= $data != null && $data['deskripsi_puskesmas'] != '-' ? $data['deskripsi_puskesmas'] : '' ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="visi_puskesmas">isi Visi</label>
                                    <textarea name="visi_puskesmas" id="visi_puskesmas"  class="form-control summernote" placeholder="Visi Puskesmas" cols="30" rows="10"><?= $data != null && $data['visi_puskesmas'] != '-' ? $data['visi_puskesmas'] : '' ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="misi_puskesmas">isi Misi</label>
                                    <textarea name="misi_puskesmas" id="misi_puskesmas" class="form-control summernote" placeholder="Misi Puskesmas" cols="30" rows="10"><?= $data != null && $data['misi_puskesmas'] != '-' ? $data['misi_puskesmas'] : '' ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="struktur_organisasi">Struktur Organisasi</label>
                                    <textarea name="struktur_organisasi" id="struktur_organisasi" class="form-control summernote" placeholder="Struktur Organisasi" cols="30" rows="10"><?= $data != null && $data['struktur_organisasi'] != '-' ? $data['struktur_organisasi'] : '' ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="maklumat">Maklumat</label>
                                    <textarea name="maklumat" id="maklumat" class="form-control summernote" placeholder="Maklumat" cols="30" rows="10"><?= $data != null && $data['maklumat'] != '-' ? $data['maklumat'] : '' ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="janji_layanan">Janji Layanan</label>
                                    <textarea name="janji_layanan" id="janji_layanan" class="form-control summernote" placeholder="Janji Layanan" cols="30" rows="10"><?= $data != null && $data['janji_layanan'] != '-' ? $data['janji_layanan'] : '' ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="dasar_hukum">Dasar Hukum</label>
                                    <textarea name="dasar_hukum" id="dasar_hukum" class="form-control summernote" placeholder="Dasar Hukum" cols="30" rows="10"><?= $data != null && $data['dasar_hukum'] != '-' ? $data['dasar_hukum'] : '' ?></textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include '../include/Components/admin/footer.php' ?>