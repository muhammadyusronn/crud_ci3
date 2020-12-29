<div class="container-fluid">
    <?php if (isset($_SESSION['err_message'])) { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> <?= $_SESSION['err_message']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>
    <?php if (isset($_SESSION['succ_message'])) { ?>
        <div class="flash-data" data-flashdata="<?= $_SESSION['succ_message']; ?>"></div>
    <?php } ?>

    <div class="card shadow">
        <div class="card-header py-3">
            <h3 class="text-primary m-0 font-weight-bold">Data Admin</h3>
        </div>
        <div class="card-body">
            <a href="#" class="btn btn-primary mb-3" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Data Admin</a>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Admin</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('Admin/add') ?>" method="POST">
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="username"><strong>NIP</strong></label>
                                            <input class="form-control" type="text" placeholder="NIP Admin" name="nip">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="email"><strong>Email Address</strong></label>
                                            <input type="email" class="form-control" placeholder="Email Admin" name="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="username"><strong>Nama</strong></label>
                                            <input class="form-control" type="text" placeholder="Nama Admin" name="nama">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="username"><strong>Alamat</strong></label>
                                            <textarea class="form-control" name="alamat"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="username"><strong>Kontak</strong></label>
                                            <input class="form-control" type="text" placeholder="Kontak Admin" name="nomorhp">
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
                                <button type="reset" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table my-0" id="example">
                    <thead>
                        <tr>
                            <th>NIP</th>
                            <th>Email</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Kontak</th>
                            <th>Level</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // print_r($admin);
                        foreach ($admin as $adm) : ?>
                            <tr>
                                <td><?= $adm['nip'] ?></td>
                                <td><?= $adm['email'] ?></td>
                                <td><?= $adm['nama'] ?></td>
                                <td><?= $adm['alamat'] ?></td>
                                <td><?= $adm['nomorhp'] ?></td>
                                <td><?= $adm['level'] ?></td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="<?= base_url('Admin/edit/' . $adm['nip']) ?>">Edit</a>
                                            <a href="<?= base_url('Admin/delete/' . $adm['nip']) ?>" id="tombol-hapus" class="dropdown-item">Hapus</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td><strong>NIP</strong></td>
                            <td><strong>Email</strong></td>
                            <td><strong>Nama</strong></td>
                            <td><strong>Alamat</strong></td>
                            <td><strong>Kontak</strong></td>
                            <td><strong>Level</strong></td>
                            <td><strong></strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>