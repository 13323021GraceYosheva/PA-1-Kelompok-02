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
                    <div class="card card-success card-outline">
                        <div class="card-header">
                            <div class="card-title">
                                Data Puskesmas
                            </div>
                        </div>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <img src="../assets/img/logo.jpg" width="100" class="img view_img_update" alt="Logo Puskesmas">
                                    <br>
                                    <label for="logo">Logo</label>
                                    <input type="file" class="form-input form-control foto_update" name="logo_puskesmas" id="logo">
                                </div>
                                <div class="form-group">
                                    <label for="nama_puskesmas">Nama Puskesmas</label>
                                    <input type="text" name="nama_puskesmas" id="nama_puskesmas" class="form-control" placeholder="Nama Puskesmas">
                                </div>
                                <div class="form-group">
                                    <label for="alamat_puskesmas">Alamat Puskesmas</label>
                                    <textarea name="alamat_puskesmas" id="alamat_puskesmas" class="form-control" placeholder="Alamat Puskesmas" cols="30" rows="10"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="short_deskripsi_puskesmas">Deskripsi Singkat Puskesmas</label>
                                    <input type="text" name="short_deskripsi_puskesmas" id="short_deskripsi_puskesmas" class="form-control" placeholder="Deskripsi Singkat Puskesmas">
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi_puskesmas">Deskripsi Puskesmas</label>
                                    <textarea name="deskripsi_puskesmas" id="deskripsi_puskesmas" class="form-control" placeholder="Deskripsi Puskesmas" cols="30" rows="10"></textarea>
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