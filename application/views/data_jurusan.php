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
            <h3 class="text-primary m-0 font-weight-bold">Data Jurusan</h3>
        </div>
        <div class="card-body">
            <a href="#" class="btn btn-primary mb-3" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Tambah Data Jurusan</a>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Jurusan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= base_url('Jurusan/add') ?>" method="POST">
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="username"><strong>Kode Jurusan</strong></label>
                                            <input class="form-control" type="text" placeholder="Kode Jurusan" name="kodejurusan">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="username"><strong>Nama Jurusan</strong></label>
                                            <input class="form-control" type="text" placeholder="Nama Jurusan" name="namajurusan">
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
                            <th>Kode Jurusan</th>
                            <th>Nama Jurusan</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($jurusan as $jrs) : ?>
                            <tr>
                                <td><?= $jrs['kodejurusan'] ?></td>
                                <td><?= $jrs['namajurusan'] ?></td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="<?= base_url('Jurusan/edit/' . $jrs['id']) ?>">Edit</a>
                                            <a href="<?= base_url('Jurusan/delete/' . $jrs['id']) ?>" id="tombol-hapus" class="dropdown-item">Hapus</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td><strong>Kode Jurusan</strong></td>
                            <td><strong>Nama Jurusan</strong></td>
                            <td><strong></strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>