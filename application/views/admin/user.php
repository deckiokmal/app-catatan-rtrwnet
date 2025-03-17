<div class="content-area">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

    <?= form_error('role', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
    <div class="page-header">
        <h4 class="page-title"><?= $title; ?></h4>

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
        </ol>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-header text-right">
                    <h3 class="card-title"><?= $title; ?></h3>
                    <div class="col text-right ml-4">
                        <button class="btn btn-primary btn-icon newUserAksesTambah" data-toggle="modal" data-target="#newUserAkses">
                            <i class="fa fa-fw fa-plus-circle"></i> <span>Tambah Pengguna</span>
                        </button>
                    </div>
                </div>



                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No HP</th>
                                    <th>Image</th>
                                    <th>Role</th>
                                    <th>Tanggal dibuat</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($admin as $ak) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $ak['name']; ?></td>
                                        <td><?= $ak['email']; ?></td>
                                        <td><?= $ak['no_hp']; ?></td>
                                        <td><img src="<?= base_url('assets/img/profile/') . $ak['image']; ?>" alt="image" height="50" widht="50"></td>
                                        <td><?= $ak['role']; ?></td>
                                        <td><?= date('d F Y H:i:s', $ak['date_created']); ?></td>
                                        <?php if ($ak['is_active'] == 1) : ?>
                                            <td class="text-left align-middle"><span class="badge badge-success">Aktif</span></td>
                                        <?php else : ?>
                                            <td class="text-left align-middle"><span class="badge badge-danger">Tidak Aktif</span></td>
                                        <?php endif; ?>
                                        <td>
                                            <a href="" class="btn btn-success newUserAksesUbah" data-toggle="modal" data-target="#newUserAkses" data-id="<?= $ak['id']; ?>"><span class="tags" data-toggle="kt-tooltip" data-placement="left" title="Edit"><i class="fa fa-pencil-square"></i></span></a>
                                            <a href="<?= base_url(''); ?>admin/hapusUser/<?= $ak['id']; ?>" class="btn btn-danger tombol-hapus"><span class="tags" data-toggle="kt-tooltip" data-placement="right" title="Delete"><i class=" fa fa-trash-o"></i></span></a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- table-wrapper -->
            </div>
            <!-- section-wrapper -->
        </div>
    </div>
</div>
</div>
</div>
</div>
<!--begin::Modal-->
<div class="modal fade" id="newUserAkses" tabindex="-1" role="dialog" aria-labelledby="newUserAksesLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newUserAksesLabel">Tambah User Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/userAkses'); ?>" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label class="form-control-label">Nama User:</label>
                        <input type="text" class="form-control" id="name" autocomplete="off" name="name" placeholder="Masukan Nama User">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Email User:</label>
                        <input type="text" class="form-control" id="email" autocomplete="off" name="email" placeholder="Masukan Email User">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Password:</label>
                        <input type="password" class="form-control" id="password1" autocomplete="off" name="password1" placeholder="Masukan Password">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Ulangi Password:</label>
                        <input type="password" class="form-control" id="password2" autocomplete="off" name="password2" placeholder="Ulangi Password">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">No Hp User:</label>
                        <input type="text" class="form-control" id="no_hp" autocomplete="off" name="no_hp" placeholder="Masukan No Hp User">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Role:</label>
                        <select name="role_id" id="role_id" class="form-control">
                            <option value="">Pilih Role</option>
                            <?php foreach ($role as $role) : ?>
                                <option value="<?= $role['id']; ?>"><?= $role['role']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah User</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!--end::Modal-->