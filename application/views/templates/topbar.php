<body class="">
	<div id="global-loader"></div>
	<div class="page">
		<div class="page-main">
			<div class="app-header1 header py-1 d-flex">
				<div class="container-fluid">
					<div class="d-flex">
						<a class="header-brand" href="#">
							<img src="<?= base_url('assets/'); ?>img\logo\logo.png?nocache=<?php echo time(); ?>" style="width:130px; height:auto; " class="header-brand-img" alt="catatan rt rw net logo">
						</a>
						<div class="menu-toggle-button">
							<a class="nav-link wave-effect" href="#" id="sidebarCollapse">
								<span class="fa fa-bars"></span>
							</a>
						</div>
						<div class="d-flex order-lg-2 ml-auto header-right-icons header-search-icon">
							<!-- <div class="p-2">
								<form class="input-icon ">
									<div class="input-icon-addon">
										<i class="fe fe-search"></i>
									</div>
									<input type="search" class="form-control header-search" placeholder="Search&hellip;" tabindex="1">
								</form>
							</div> -->

							<div class="dropdown d-none d-md-flex">
								<a class="nav-link icon full-screen-link nav-link-bg">
									<i class="fa fa-expand" id="fullscreen-button"></i>
								</a>
							</div>

							<!-- <div class="dropdown d-none d-md-flex">
								<a class="nav-link icon" data-toggle="dropdown">
									<i class="fa fa-bell-o"></i>
									<span class="nav-unread bg-warning"></span>
								</a>
								<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
									<a href="#" class="dropdown-item d-flex pb-3">
										<div class="notifyimg">
											<i class="fa fa-thumbs-o-up"></i>
										</div>
										<div>
											<strong>Someone likes our posts.</strong>
											<div class="small text-muted">3 hours ago</div>
										</div>
									</a>
									<a href="#" class="dropdown-item d-flex pb-3">
										<div class="notifyimg">
											<i class="fa fa-commenting-o"></i>
										</div>
										<div>
											<strong> 3 New Comments</strong>
											<div class="small text-muted">5 hour ago</div>
										</div>
									</a>
									<a href="#" class="dropdown-item d-flex pb-3">
										<div class="notifyimg">
											<i class="fa fa-cogs"></i>
										</div>
										<div>
											<strong> Server Rebooted.</strong>
											<div class="small text-muted">45 mintues ago</div>
										</div>
									</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item text-center">View all Notification</a>
								</div>
							</div> -->

							<div class="dropdown d-none d-md-flex ">
								<a class="nav-link icon " data-toggle="dropdown">
									<i class="fe fe-grid floating"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
									<ul class="drop-icon-wrap p-1">
										<li>
											<a href="<?= base_url('kas'); ?>" class="drop-icon-item">
												<i class="fe fe-layers text-dark"></i>
												<span class="block">Kas Masuk</span>
											</a>
										</li>
										<li>
											<a href="<?= base_url('kas/kas_keluar'); ?>" class="drop-icon-item">
												<i class="fe fe-users text-dark"></i>
												<span class="block">Kas Keluar</span>
											</a>
										</li>
										<li>
											<a href="<?= base_url('iuran'); ?>" class="drop-icon-item">
												<i class="fe fe-gitlab text-dark"></i>
												<span class="block">Bayar Iuran</span>
											</a>
										</li>
										<li>
											<a href="<?= base_url('pelanggan'); ?>" class="drop-icon-item">
												<i class="fa fa-fw fa-group text-dark"></i>
												<span class="block">Pelanggan</span>
											</a>
										</li>
										<li>
											<a href="<?= base_url('iuran/bulan_ini'); ?>" class="drop-icon-item">
												<i class="fe fe-user-plus text-dark"></i>
												<span class="block">Rekap</span>
											</a>
										</li>
										<li>
											<a href="<?= base_url('laporan/kas'); ?>" class="drop-icon-item">
												<i class="fe fe-book-open text-dark"></i>
												<span class="block">Laporan Kas</span>
											</a>
										</li>
									</ul>
									<div class="dropdown-divider"></div>
									<h5 class="text-center">Pintasan Menu</h5>
								</div>
							</div>
							<div class="dropdown text-center selector">
								<a href="#" class="nav-link leading-none" data-toggle="dropdown">
									<span class="avatar avatar-sm brround cover-image" data-image-src="<?= base_url('assets/img/profile/') . $user['image']; ?>"></span>
								</a>
								<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow ">

									<a class="dropdown-item" href="<?= base_url('user/edit'); ?>">
										<i class="dropdown-icon mdi mdi-account-outline"></i> Profile
									</a>

									<div class="dropdown-divider"></div>

									<a class="dropdown-item" href="<?= base_url('auth/logout'); ?>">
										<i class="dropdown-icon mdi  mdi-logout-variant"></i> Sign out
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>