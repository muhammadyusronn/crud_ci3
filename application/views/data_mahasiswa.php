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
            <h3 class="text-primary m-0 font-weight-bold">Data Mahasiswa</h3>
        </div>
        <div class="card-body">
            <a href="#" class="btn btn-primary mb-3" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Data Mahasiswa</a>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mahasiswa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('Mahasiswa/add') ?>" method="POST">
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="username"><strong>NIM</strong></label>
                                            <input class="form-control" type="text" placeholder="NIM Mahasiswa" name="nim">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="username"><strong>Nama</strong></label>
                                            <input class="form-control" type="text" placeholder="Nama Mahasiswa" name="nama">
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
                                            <input type="email" class="form-control" placeholder="Email mahasiswa" name="email">
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
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Jurusan</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($mahasiswa as $mhs) : ?>
                            <tr>
                                <td><?= $mhs['nim'] ?></td>
                                <td><?= $mhs['nama'] ?></td>
                                <td><?= $mhs['jurusannya'] ?></td>
                                <td><?= $mhs['email'] ?></td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="<?= base_url('Mahasiswa/edit/' . $mhs['id']) ?>">Edit</a>
                                            <a href="<?= base_url('Mahasiswa/delete/' . $mhs['id']) ?>" id="tombol-hapus" class="dropdown-item">Hapus</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td><strong>NIM</strong></td>
                            <td><strong>Nama</strong></td>
                            <td><strong>Jurusan</strong></td>
                            <td><strong>Email</strong></td>
                            <td><strong></strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>