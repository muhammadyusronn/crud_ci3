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
                            <h3 class="text-primary m-0 font-weight-bold">Mahasiswa</h3>
                        </div>
                        <div class="card-body">
                            <?php foreach ($mahasiswa as $mhs) : ?>
                                <form action="<?= base_url('Mahasiswa/update') ?>" method="POST">
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="username"><strong>NIM</strong></label>
                                                <input class="form-control" type="hidden" placeholder="NIM Mahasiswa" name="id" value="<?= $mhs->id ?>">
                                                <input class="form-control" type="text" placeholder="NIM Mahasiswa" name="nim" value="<?= $mhs->nim ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="username"><strong>Nama</strong></label>
                                                <input class="form-control" type="text" placeholder="Nama Mahasiswa" name="nama" value="<?= $mhs->nama ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="username"><strong>Jurusan</strong></label>
                                                <select class="form-control" name="jurusan" required>
                                                    <option value="0">Pilih Jurusan Mahasiswa</option>
                                                    <?php foreach ($jurusan  as $jrs) { ?>
                                                        <option value="<?= $jrs['kodejurusan'] ?>"><?= $jrs['namajurusan'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="email"><strong>Email Address</strong></label>
                                                <input class="form-control" type="text" placeholder="Email mahasiswa" name="email" value="<?= $mhs->email ?>">
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