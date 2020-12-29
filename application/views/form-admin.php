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
                            <h3 class="text-primary m-0 font-weight-bold">Admin</h3>
                        </div>
                        <div class="card-body">
                            <?php foreach ($admin as $adm) : ?>
                                <form action="<?= base_url('Admin/update') ?>" method="POST">
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="username"><strong>NIP</strong></label>
                                                <input class="form-control" type="hidden" placeholder="NIM Mahasiswa" name="id" value="<?= $adm->nip ?>">
                                                <input class="form-control" type="text" placeholder="NIP Admin" name="nip" value="<?= $adm->nip ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="username"><strong>Nama</strong></label>
                                                <input class="form-control" type="text" placeholder="Nama Admin" name="nama" value="<?= $adm->nama ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="email"><strong>Email Address</strong></label>
                                                <input class="form-control" type="text" placeholder="Email" name="email" value="<?= $adm->email ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="username"><strong>Alamat</strong></label>
                                                <textarea class="form-control" name="alamat"><?= $adm->alamat; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="username"><strong>Kontak</strong></label>
                                                <input class="form-control" type="text" placeholder="Kontak Admin" name="nomorhp" value="<?= $adm->nomorhp; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="username"><strong>Level</strong></label>
                                                <select class="form-control" name="level" required>
                                                    <option value="0">Pilih Level Admin</option>
                                                    <option>Admin</option>
                                                    <option>Pimpinan</option>
                                                </select>
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