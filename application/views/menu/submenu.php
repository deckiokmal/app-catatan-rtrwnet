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
                        <button class="btn btn-primary btn-icon newSubmenuTambah" data-toggle="modal" data-target="#newSubmenu">
                            <i class="fa fa-fw fa-plus-circle"></i><span>Tambah Submenu</span>
                        </button>
                    </div>
                </div>



                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Menu</th>
                                    <th>Url</th>
                                    <th>Icon</th>
                                    <th>Active</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($subMenu as $sm) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $sm['title']; ?></td>
                                        <td><?= $sm['menu']; ?></td>
                                        <td><?= $sm['url']; ?></td>
                                        <td><?= $sm['icon']; ?></td>
                                        <td><?= $sm['is_active']; ?></td>
                                        <td>
                                            <div class="kt-section__content kt-section__content--solid" id="edit">
                                                <a href="" class="btn btn-success btn-elevate btn-icon newSubmenuUbah" data-toggle="modal" data-target="#newSubmenu" data-id="<?= $sm['id']; ?>"><span class="tags" data-toggle="kt-tooltip" data-placement="left" title="Edit"><i class=" fa fa-edit"></i></span></a>
                                                <a href="<?= base_url(''); ?>menu/hapusSub/<?= $sm['id']; ?>" class="btn btn-danger btn-elevate btn-icon tombol-hapus"><span class="tags" data-toggle="kt-tooltip" data-placement="right" title="Delete"><i class=" fa fa-trash-o"></i></span></a>
                                            </div>


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
<div class="modal fade" id="newSubmenu" tabindex="-1" role="dialog" aria-labelledby="newSubmenuLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubmenuLabel">Tambah Menu Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('menu/submenu'); ?>" method="post">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">Nama Submenu:</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Masukan Nama Submenu">
                    </div>
                    <div class="form-group">
                        <select name="menu_id" id="menu_id" class="form-control">
                            <option value="">Select Menu</option>
                            <?php foreach ($menu as $m) : ?>
                                <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="form-control-label">URL Submenu:</label>
                        <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url">
                    </div>
                    <div class="kt-checkbox-list">
                        <label class="kt-checkbox" for="is_active">
                            <input type="checkbox" checked="checked" value="1" name="is_active" id="is_active"> Active ?
                            <span></span>
                        </label>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Submenu</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!--end::Modal-->