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

			<div class="card">
				<div class="card-header text-right">
					<h3 class="card-title"><?= $title; ?></h3>
					<div class="col text-right ml-4"><button class="btn btn-primary btn-icon tambahRole" data-toggle="modal" data-target="#NewRoleModal">
							<i class="fa fa-fw fa-plus-circle"></i><span>Tambah Role</span>
						</button></div>
				</div>



				<div class="card-body">
					<div class="table-responsive">
						<table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0" style="width:100%">
							<thead>
								<tr>
									<th>No</th>
									<th>Role</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; ?>
								<?php foreach ($role as $r) : ?>
									<tr>
										<th scope="row"><?= $i; ?></th>
										<td><?= $r['role']; ?></td>
										<td>
											<div class="kt-section__content kt-section__content--solid">
												<a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>" class="btn btn-info detailAset" data-target="#detailModal">Akses</a>
												<a href="" class="btn btn-success ubahRole" data-toggle="modal" data-target="#NewRoleModal" data-id="<?= $r['id']; ?>"><i class="fa fa-pencil-square"></i></a>
												<a href="<?= base_url(''); ?>admin/hapus/<?= $r['id']; ?>" class="btn btn-danger tombol-hapus"><i class=" fa fa-trash-o"></i> </a>

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
<div class="modal fade" id="NewRoleModal" tabindex="-1" role="dialog" aria-labelledby="NewRoleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="NewRoleModalLabel">Tambah Role Baru</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('admin/role'); ?>" method="post">
					<input type="hidden" name="id" id="id">
					<div class="form-group">
						<label class="form-control-label">Nama Role:</label>
						<input type="text" class="form-control" id="role" name="role" placeholder="Masukan Nama Role">
					</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Tambah Role</button>
			</div>
			</form>
		</div>
	</div>
</div>

<!--end::Modal-->