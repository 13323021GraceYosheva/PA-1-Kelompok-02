<?php include './include/Components/app/header.php' ?>

<section id="ukp">
    <div class="container">
        <div class="row">
            <div class="col-md-12 py-2">
                <ul class="nav nav-tabs justify-content-between bg-success rounded-pill p-2" id="myTab" role="tablist">
                    <li class="nav-item mx-1 my-1" role="presentation">
                        <button class="nav-link rounded-pill active" id="poliklinik-tab" data-toggle="tab"
                            data-target="#poliklinik-tab-pane" type="button" role="tab"
                            aria-controls="poliklinik-tab-pane" aria-selected="true">Rawat Jalan</button>
                    </li>
                    <li class="nav-item mx-1 my-1" role="presentation">
                        <button class="nav-link rounded-pill" id="pemeriksaan-medis-tab" data-toggle="tab"
                            data-target="#pemeriksaan-medis-tab-pane" type="button" role="tab"
                            aria-controls="pemeriksaan-medis-tab-pane" aria-selected="true">Pemeriksaan Umum</button>
                    </li>
                    <li class="nav-item mx-1 my-1" role="presentation">
                        <button class="nav-link rounded-pill" id="program-kesehatan-tab" data-toggle="tab"
                            data-target="#program-kesehatan-tab-pane" type="button" role="tab"
                            aria-controls="program-kesehatan-tab-pane" aria-selected="true">Kesehatan Keluarga</button>
                    </li>
                    <li class="nav-item mx-1 my-1" role="presentation">
                        <button class="nav-link rounded-pill" id="maklumat-tab" data-toggle="tab"
                            data-target="#maklumat-tab-pane" type="button" role="tab"
                            aria-controls="maklumat-tab-pane" aria-selected="true">TubercolosisParu</button>
                    </li>
                    <li class="nav-item mx-1 my-1" role="presentation">
                        <button class="nav-link rounded-pill" id="pemeriksaan-medis-tab" data-toggle="tab"
                            data-target="#pemeriksaan-medis-tab-pane" type="button" role="tab"
                            aria-controls="pemeriksaan-medis-tab-pane" aria-selected="true">Pemeriksaan Umum</button>
                    </li>
                    <li class="nav-item mx-1 my-1" role="presentation">
                        <button class="nav-link rounded-pill" id="program-kesehatan-tab" data-toggle="tab"
                            data-target="#program-kesehatan-tab-pane" type="button" role="tab"
                            aria-controls="program-kesehatan-tab-pane" aria-selected="true">Kesehatan Keluarga</button>
                    </li>
                    
                </ul>
            </div>
            <div class="col-md-12">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="poliklinik-tab-pane" role="tabpanel" aria-labelledby="poliklinik-tab"
                        tabindex="0">
                        <div class="container">
                            <div class="row py-5">
                                <div class="col-md-12 text-center my-auto">
                                    <h3>Isi Pelayanan Rawat Jalan</h3>
                                </div>
                            </div>
                            <div class="row py-5">
                                <div class="col-md-8 card" style="max-height: 40vh; height: 30vh;">
                                </div>
                                <div class="col-md-4 my-auto">
                                    <h3>Judul Disini</h3>
                                    <p>Text Disini</p>
                                </div>
                            </div>
                            <div class="row py-5">
                                <div class="col-md-8 card" style="max-height: 40vh; height: 30vh;">
                                </div>
                                <div class="col-md-4 my-auto">
                                    <h3>Judul Disini</h3>
                                    <p>Text Disini</p>
                                </div>
                            </div>
                            <div class="row py-5">
                                <div class="col-md-8 card" style="max-height: 40vh; height: 30vh;">
                                </div>
                                <div class="col-md-4 my-auto">
                                    <h3>Judul Disini</h3>
                                    <p>Text Disini</p>
                                </div>
                            </div>
                            <div class="row py-5">
                                <div class="col-md-8 card" style="max-height: 40vh; height: 30vh;">
                                </div>
                                <div class="col-md-4 my-auto">
                                    <h3>Judul Disini</h3>
                                    <p>Text Disini</p>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="tab-pane fade" id="pemeriksaan-medis-tab-pane" role="tabpanel" aria-labelledby="pemeriksaan-medis-tab"
                        tabindex="0"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include './include/Components/app/footer.php' ?>