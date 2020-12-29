<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-lg-12">
            <div class="row">
                <div class="col">
                    <?php if (isset($_SESSION['err_message'])) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong> <?= $_SESSION['err_message']; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php } ?>
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <h3 class="text-primary m-0 font-weight-bold">Jurusan</h3>
                        </div>
                        <div class="card-body">
                            <?php foreach ($jurusan as $jrs) : ?>
                                <form action="<?= base_url('Jurusan/update') ?>" method="POST">
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="username"><strong>Kode Jurusan</strong></label>
                                                <input class="form-control" type="hidden" placeholder="NIM Mahasiswa" name="id" value="<?= $jrs->id ?>">
                                                <input class="form-control" type="text" placeholder="Kode Jurusan" name="kodejurusan" value="<?= $jrs->kodejurusan ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="username"><strong>Nama Jurusan</strong></label>
                                                <input class="form-control" type="text" placeholder="Nama Jurusan" name="namajurusan" value="<?= $jrs->namajurusan ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" form-group"><button class="btn btn-warning btn-sm" type="submit">Ubah Data</button></div>
                                </form>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>