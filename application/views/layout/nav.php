<?php
// AMBIL DATA MENU DARI KONFIGURASI
$nav_produk 		= $this->konfigurasi_model->nav_produk();
$nav_produk_mobile 	= $this->konfigurasi_model->nav_produk();
?>

<div class="wrap_header">
<!-- Logo -->
<a href="index.html" class="logo">
	<img src="<?php echo base_url('assets/upload/image/logo/'.$site->logo) ?>" alt="<?php echo $site->namaweb ?> | <?php echo $site->tagline ?>">
</a>

<!-- Menu -->
<div class="wrap_menu">
	<nav class="menu">
		<ul class="main_menu">

			<!-- HOME -->
			<li>
				<a href="<?php echo base_url() ?>">Beranda</a>
			</li>

			<!-- MENU PRODUK -->
			<li>
				<a href="<?php echo base_url('produk') ?>">Produk &amp; Belanja</a>
				<ul class="sub_menu">
					<?php foreach($nav_produk as $nav_produk) { ?>
					<li><a href="<?php echo base_url('produk/kategori/'.$nav_produk->slug_kategori) ?>">
						<?php echo $nav_produk->nama_kategori ?>
					</a></li>
					<?php } ?>
				</ul>
			</li>

			<li>
				<a href="<?php echo base_url('kontak') ?>">Contact</a>
			</li>
		</ul>
	</nav>
</div>

<!-- Header Icon -->
<div class="header-icons">
	<a href="#" class="header-wrapicon1 dis-block">
		<img src="<?php echo base_url() ?>assets/template/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
	</a>

	<span class="linedivide1"></span>

	<div class="header-wrapicon2">
		<?php
		// Check data belanjaan ada atau tidak
		$troli 			= $this->cart->contents();

		?>
		<img src="<?php echo base_url() ?>assets/template/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
		<span class="header-icons-noti"><?php echo count($troli) ?></span>

		<!-- Header cart noti -->
		<div class="header-cart header-dropdown">
			<ul class="header-cart-wrapitem">

				<?php
				// Jika tidak ada data belanjaan
				if(empty($troli)) { 
				?>

				<li class="header-cart-item">
					<p class="alert alert-success">Troli Belanja Kosong</p>
				</li>

				<?php 
				// Kalau ada
				}else{ 
				// Total belanjaan
					$total_belanja = 'Rp. '.number_format($this->cart->total(),'0',',','.');
				// Tampilan data belanjaan
					foreach($troli as $troli) {
				?>

				<li class="header-cart-item">
					<div class="header-cart-item-img">
						<img src="<?php echo base_url() ?>assets/template/images/item-cart-01.jpg" alt="IMG">
					</div>

					<div class="header-cart-item-txt">
						<a href="#" class="header-cart-item-name">
							<?php echo $troli['name'] ?>
						</a>

						<span class="header-cart-item-info">
							<?php echo $troli['qty'] ?> x Rp. <?php echo number_format($troli['price'],'0',',','.') ?>: Rp. <?php echo number_format($troli['subtotal'],'0',',','.') ?>
						</span>
					</div>
				</li>
				<?php 
				} // Tutup foreach troli
				} // Tutup if
				?>
				
			</ul>

			<div class="header-cart-total">
				Total: <?php echo $total_belanja ?>
			</div>

			<div class="header-cart-buttons">
				<div class="header-cart-wrapbtn">
					<!-- Button -->
					<a href="<?php echo base_url('belanja/troli') ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
						Lihat Troli
					</a>
				</div>

				<div class="header-cart-wrapbtn">
					<!-- Button -->
					<a href="<?php echo base_url('belanja/checkout') ?>" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
						Check Out
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>

<!-- Header Mobile -->
<div class="wrap_header_mobile">
<!-- Logo moblie -->
<a href="index.html" class="logo-mobile">
<img src="<?php echo base_url() ?>assets/template/images/icons/logo.png" alt="IMG-LOGO">
</a>

<!-- Button show menu -->
<div class="btn-show-menu">
<!-- Header Icon mobile -->
<div class="header-icons-mobile">
	<a href="#" class="header-wrapicon1 dis-block">
		<img src="<?php echo base_url() ?>assets/template/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
	</a>

	<span class="linedivide2"></span>

	<div class="header-wrapicon2">
		<?php
		// Check data belanjaan ada atau tidak
		$troli_mobile 			= $this->cart->contents();

		?>

		<img src="<?php echo base_url() ?>assets/template/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
		<span class="header-icons-noti"><?php echo count($troli_mobile) ?></span>

		<!-- Header cart noti -->
		<div class="header-cart header-dropdown">
			<ul class="header-cart-wrapitem">
				<li class="header-cart-item">
					<div class="header-cart-item-img">
						<img src="<?php echo base_url() ?>assets/template/images/item-cart-01.jpg" alt="IMG">
					</div>

					<div class="header-cart-item-txt">
						<a href="#" class="header-cart-item-name">
							White Shirt With Pleat Detail Back
						</a>

						<span class="header-cart-item-info">
							1 x $19.00
						</span>
					</div>
				</li>

				<li class="header-cart-item">
					<div class="header-cart-item-img">
						<img src="<?php echo base_url() ?>assets/template/images/item-cart-02.jpg" alt="IMG">
					</div>

					<div class="header-cart-item-txt">
						<a href="#" class="header-cart-item-name">
							Converse All Star Hi Black Canvas
						</a>

						<span class="header-cart-item-info">
							1 x $39.00
						</span>
					</div>
				</li>

				<li class="header-cart-item">
					<div class="header-cart-item-img">
						<img src="<?php echo base_url() ?>assets/template/images/item-cart-03.jpg" alt="IMG">
					</div>

					<div class="header-cart-item-txt">
						<a href="#" class="header-cart-item-name">
							Nixon Porter Leather Watch In Tan
						</a>

						<span class="header-cart-item-info">
							1 x $17.00
						</span>
					</div>
				</li>
			</ul>

			<div class="header-cart-total">
				Total: $75.00
			</div>

			<div class="header-cart-buttons">
				<div class="header-cart-wrapbtn">
					<!-- Button -->
					<a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
						View Cart
					</a>
				</div>

				<div class="header-cart-wrapbtn">
					<!-- Button -->
					<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
						Check Out
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
	<span class="hamburger-box">
		<span class="hamburger-inner"></span>
	</span>
</div>
</div>
</div>

<!-- Menu Mobile -->
<div class="wrap-side-menu" >
<nav class="side-menu">
<ul class="main-menu">
	<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
		<span class="topbar-child1">
			<?php echo $site->alamat ?>
		</span>
	</li>

	<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
		<div class="topbar-child2-mobile">
			<span class="topbar-email">
			<?php echo $site->email ?>
			</span>

			<div class="topbar-language rs1-select2">
				<select class="selection-1" name="time">
					<option><?php echo $site->telepon ?></option>
					<option><?php echo $site->email ?></option>
				</select>
			</div>
		</div>
	</li>

	<li class="item-topbar-mobile p-l-10">
		<div class="topbar-social-mobile">
			<a href="<?php echo $site->facebook ?>" class="topbar-social-item fa fa-facebook"></a>
			<a href="<?php echo $site->instagram ?>" class="topbar-social-item fa fa-instagram"></a>
		</div>
	</li>

	<!-- menu mobile homepage -->
	<li class="item-menu-mobile">
		<a href="<?php echo base_url() ?> ?>">Beranda</a>
	</li>

	<!-- menu mobile produk -->
	<li class="item-menu-mobile">
		<a href="<?php echo base_url('produk') ?>">Produk &amp; Belanja</a>
		<ul class="sub-menu">
			<?php foreach($nav_produk_mobile as $nav_produk_mobile) { ?>
			<li><a href="<?php echo base_url('produk/kategori/'.$nav_produk_mobile->slug_kategori) ?>">
				<?php echo $nav_produk_mobile->nama_kategori ?>
			</a></li>
			<?php } ?>
	
		</ul>
		<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
	</li>

	<!-- menu kontak mobile -->
	<li class="item-menu-mobile">
		<a href="<?php echo base_url('kontak') ?>">Contact</a>
	</li>
</ul>
</nav>
</div>
</header>