<div class=" content-area">
	<div class="page-header">
		<h4 class="page-title">Dashboard</h4>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="#">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">Dashboard 1</li>
		</ol>
	</div>

	<div class="row row-cards">
		<div class="col-sm-12 col-lg-6 col-xl-4 col-md-6">
			<div class="card card-img-holder text-default bg-color">
				<div class="row">
					<div class="col-4">
						<div class="square-icon br-tl-9 bg-primary text-center align-self-center shadow-primary"><i class="fa fa fa-credit-card fs-30  text-white"></i></div>
					</div>
					<div class="col-8">
						<div class="card-body card-padding">
							<h1 class="mb-2" style="font-size: 30px;">Rp. <?= number_format($saldo['total'], 0, ',', '.'); ?></h1>
							<h5 class="font-weight-normal mb-3">Saldo Kas</h5>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-lg-6 col-xl-4 col-md-6">
			<div class="card card-img-holder text-default bg-color">
				<div class="row">
					<div class="col-4">
						<div class="square-icon bg-secondary text-center align-self-center shadow-secondary"><i class="ti-stats-up fs-30  text-white"></i></div>
					</div>
					<div class="col-8">
						<div class="card-body card-padding">
							<h1 class="mb-2" style="font-size: 30px;">Rp. <?= number_format($total_masuk['total'], 0, ',', '.'); ?></h1>
							<h5 class="font-weight-normal mb-3">Pemasukan Kas</h5>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-sm-12 col-lg-6 col-xl-4 col-md-6">
			<div class="card card-img-holder text-default bg-color">
				<div class="row">
					<div class="col-4">
						<div class="square-icon bg-info text-center align-self-center shadow-info"><i class="ti-stats-down fs-30  text-white"></i></div>
					</div>
					<div class="col-8">
						<div class="card-body card-padding">
							<h1 class="mb-2" style="font-size: 30px;">Rp. <?= number_format($total_keluar['total'], 0, ',', '.'); ?></h1>
							<h5 class="font-weight-normal mb-3">Pengeluaran Kas</h5>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

</div>
</div>
</div>