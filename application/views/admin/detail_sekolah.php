<link rel="stylesheet" type="text/css" href="<?= base_url('assets/build/css/lightslider.min.css') ?>">
<div class="page-fixed-main-content">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h3>Detail Informasi Sekolah</h3>
				</div>
				<div class="x_content">
					<?= $this->session->flashdata('msg') ?>
					<div class="row">
						<div class="col-md-5">
							<div class="demo">
								<?php  
									$path = 'assets/foto/sekolah-' . $sekolah->id;
									if (!file_exists(FCPATH . $path))
									{
										$photos = [];
									}
									else
									{
										$photos = scandir(FCPATH . $path);
									}
									$photos = array_values(array_diff($photos, ['.', '..']));
								?>
							    <ul id="lightSlider">
							    	<?php if (count($photos) <= 0): ?>
							    		<li data-thumb="http://placehold.it/400">
								            <img width="400" src="http://placehold.it/400" />
								        </li>
							    	<?php else: ?>
								    	<?php foreach ($photos as $photo): ?>
									        <li data-thumb="<?= base_url($path . '/' . $photo) ?>">
									            <img width="400" src="<?= base_url($path . '/' . $photo) ?>" />
									        </li>
								    	<?php endforeach; ?>
								    <?php endif; ?>
							    </ul>
							</div>
						</div>
						<div class="col-md-7">
							<table class="table table-bordered">
								<tbody>
									<tr>
										<td style="width: 200px !important;">
											<b>Nama Sekolah</b>
										</td>
										<td><?= $sekolah->nama_sekolah ?></td>
									</tr>
									<tr>
										<td>
											<b>Alamat</b>
										</td>
										<td><?= $sekolah->alamat ?></td>
									</tr>
									<tr>
										<td>
											<b>Akreditasi</b>
										</td>
										<td><?= $sekolah->akreditasi ?></td>
									</tr>
									<tr>
										<td>
											<b>Biaya Masuk</b>
										</td>
										<td><?= 'Rp. ' . number_format($sekolah->biaya_masuk, 2, ',', '.') ?></td>
									</tr>
									<tr>
										<td>
											<b>SPP Bulanan</b>
										</td>
										<td><?= 'Rp. ' . number_format($sekolah->spp_bulanan, 2, ',', '.') ?></td>
									</tr>
									<tr>
										<td>
											<b>Fasilitas</b>
										</td>
										<td>
											<ul>
												<?php  
													foreach ($fasilitas as $row)
													{
														echo '<li>' . $row . '</li>';
													}
												?>
											</ul>
										</td>
									</tr>
									<tr>
										<td>
											<b>Ekstrakurikuler</b>
										</td>
										<td>
											<ul>
												<?php  
													foreach ($ekstrakurikuler as $row)
													{
														echo '<li>' . $row . '</li>';
													}
												?>
											</ul>
										</td>
									</tr>
									<tr>
										<td>
											<b>Lokasi</b>
										</td>
										<td>
											<ul>
												<?php  
													foreach ($lokasi as $row)
													{
														echo '<li>' . $row . '</li>';
													}
												?>
											</ul>
										</td>
									</tr>
									<tr>
										<td>
											<b>Jarak</b>
										</td>
										<td><?= $sekolah->jarak ?> km</td>
									</tr>
									<tr>
										<td>
											<b>Telepon</b>
										</td>
										<td><?= $sekolah->telepon ?></td>
									</tr>
									<?php if ($sekolah->valid == 0): ?>
									<tr>
										<td></td>
										<td>
											<a class="btn btn-success" href="<?= base_url('admin/verifikasi-sekolah/' . $sekolah->id ) ?>">Verifikasi</a>
										</td>
									</tr>
									<?php else: ?>
									<tr>
										<td><b>Status</b></td>
										<td>Terverifikasi</td>
									</tr>
									<?php endif; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="x_panel">
				<div class="x_title">
					<h3>Peta Lokasi Sekolah</h3>
				</div>
				<div class="x_content">
					<div class="row">
						<div class="col-md-12">
							<div id="map" style="height: 350px;"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function initMap() {
		// koordinat palembang
		let lat = <?= $sekolah->latitude ?>;
		let lng = <?= $sekolah->longitude ?>;
		let currentLocation = new google.maps.LatLng(lat, lng);

		let map = new google.maps.Map(document.getElementById('map'), {
			center: currentLocation,
			zoom: 16
		});

        let markers = [];
        // Create a marker for each place.
        markers.push(new google.maps.Marker({
			map: map,
			position: currentLocation
        }));
	}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDV1CNPBI4qy_Wr5jDjKe0Pb40u9Tn27UA&libraries=places&callback=initMap" async defer></script>
<script type="text/javascript" src="<?= base_url('assets/build/js/lightslider.min.js') ?>"></script>
<script type="text/javascript">
	$('#lightSlider').lightSlider({
	    gallery: true,
	    item: 1,
	    loop: true,
	    slideMargin: 0,
	    thumbItem: <?= count($photos) ?>
	});
</script>