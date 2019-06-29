<link rel="stylesheet" type="text/css" href="<?= base_url('assets/custom/css/card.ios.css') ?>">
<link href="<?= base_url('assets') ?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

<!-- PNotify -->
<link href="<?= base_url('assets') ?>/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
<link href="<?= base_url('assets') ?>/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">

<style type="text/css">
	#loader {
	  position: absolute;
	  left: 50%;
	  top: 50%;
	  z-index: 1;
	  margin: -75px 0 0 -75px;
	  border: 8px solid #f3f3f3;
	  border-radius: 50%;
	  border-top: 8px solid #3498db;
	  width: 50px;
	  height: 50px;
	  -webkit-animation: spin 2s linear infinite;
	  animation: spin 2s linear infinite;
	}

	@-webkit-keyframes spin {
	  0% { -webkit-transform: rotate(0deg); }
	  100% { -webkit-transform: rotate(360deg); }
	}

	@keyframes spin {
	  0% { transform: rotate(0deg); }
	  100% { transform: rotate(360deg); }
	}
</style>

<div class="page-fixed-main-content">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h3>Cari Sekolah</h3>
				</div>
				<div class="x_content">
					<div class="row">
						<div class="col-md-6">
							<div class="text-center">
								<button class="btn red btn-xs" type="button" data-toggle="modal" href="#modal">Atur Bobot Pencarian</button>
								<button type="button" onclick="cari(); return false;" class="btn btn-success btn-xs">
									<i class="fa fa-search"></i> Cari
								</button>
								<button class="btn yellow btn-xs" type="button" data-toggle="modal" href="#perhitungan">Tampilkan Perhitungan</button>
							</div>
							<br><br>
							<?= form_open_multipart('user/rank', ['class' => 'form-horizontal form-label-left']) ?>
								<div class="item form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="akreditasi">Akreditasi</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<select id="akreditasi" name="akreditasi" class="form-control col-md-7 col-xs-12">
											<option value="">Pilih..</option>
											<option value="A">A</option>
											<option value="B">B</option>
											<option value="C">C</option>
											<option value="Belum Terakreditasi">Belum Terakreditasi</option>
										</select>
									</div>
								</div>

								<div class="item form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="biaya_masuk">Range Biaya Masuk</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<select id="biaya_masuk" name="biaya_masuk" class="form-control col-md-7 col-xs-12">
											<option value="">Pilih..</option>
											<?php $v = 0; for ($i = count($range['biaya_masuk']) - 1; $i >= 0; $i--): ?>
												<option value="<?= ++$v ?>"><?= 'Rp. ' . number_format($range['biaya_masuk'][$i]['min'], 2, ',', '.') . ' - ' . 'Rp. ' . number_format($range['biaya_masuk'][$i]['max'], 2, ',', '.') ?></option>
											<?php endfor; ?>
										</select>
									</div>
								</div>
								
								<div class="item form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="spp_bulanan">Range Biaya SPP Bulanan</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<select id="spp_bulanan" name="spp_bulanan" class="form-control col-md-7 col-xs-12">
											<option value="">Pilih..</option>
											<?php $v = 0; for ($i = count($range['spp_bulanan']) - 1; $i >= 0; $i--): ?>
												<option value="<?= ++$v ?>"><?= 'Rp. ' . number_format($range['spp_bulanan'][$i]['min'], 2, ',', '.') . ' - ' . 'Rp. ' . number_format($range['spp_bulanan'][$i]['max'], 2, ',', '.') ?></option>
											<?php endfor; ?>
										</select>
									</div>
								</div>
								<div class="item form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="fasilitas">Fasilitas</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<p style="padding: 5px;">
											<div class="row">
												<div class="col-md-6">
													<input type="checkbox" name="fasilitas[]" id="fasilitas1" value="Auditorium" data-parsley-mincheck="1" class="flat" /> Auditorium
							                        <br/><br/>

							                        <input type="checkbox" name="fasilitas[]" id="fasilitas2" value="Kolam Renang" class="flat" /> Kolam Renang
							                        <br/><br/>

							                        <input type="checkbox" name="fasilitas[]" id="fasilitas3" value="Konsultasi Psikologi" class="flat" /> Konsultasi Psikologi
							                        <br/><br/>

							                        <input type="checkbox" name="fasilitas[]" id="fasilitas4" value="Katering" class="flat" /> Katering
							                        <br/><br/>

							                        <input type="checkbox" name="fasilitas[]" id="fasilitas5" value="Antar Jemput Anak" class="flat" /> Antar Jemput Anak
							                        <br/><br/>

							                        <input type="checkbox" name="fasilitas[]" id="fasilitas6" value="Lab. Komputer" class="flat" /> Lab. Komputer
							                        <br/><br/>

							                        <input type="checkbox" name="fasilitas[]" id="fasilitas7" value="Lab. Multimedia" class="flat" /> Lab. Multimedia
							                        <br/><br/>

							                        <input type="checkbox" name="fasilitas[]" id="fasilitas8" value="Halaman Parkir" class="flat" /> Halaman Parkir
							                        <br/><br/>

							                        <input type="checkbox" name="fasilitas[]" id="fasilitas9" value="Aula" class="flat" /> Aula
							                        <br/><br/>

							                        <input type="checkbox" name="fasilitas[]" id="fasilitas10" value="Mushola __ Masjid" class="flat" /> Mushola / Masjid
							                        <br/><br/>

							                        <input type="checkbox" name="fasilitas[]" id="fasilitas11" value="Perpustakaan" class="flat" /> Perpustakaan
							                        <br/><br/>

							                        <input type="checkbox" name="fasilitas[]" id="fasilitas12" value="Ruang Kelas Ber-AC" class="flat" /> Ruang Kelas Ber-AC
							                        <br/><br/>
												</div>
												<div class="col-md-6">
													<input type="checkbox" name="fasilitas[]" id="fasilitas13" value="Wifi" class="flat" /> Wifi
							                        <br/><br/>

							                        <input type="checkbox" name="fasilitas[]" id="fasilitas14" value="Asuransi Kecelakaan" class="flat" /> Asuransi Kecelakaan
							                        <br/><br/>

							                        <input type="checkbox" name="fasilitas[]" id="fasilitas15" value="CCTV" class="flat" /> CCTV
							                        <br/><br/>

							                        <input type="checkbox" name="fasilitas[]" id="fasilitas16" value="Pelayanan Kesehatan" class="flat" /> Pelayanan Kesehatan
							                        <br/><br/>

							                        <input type="checkbox" name="fasilitas[]" id="fasilitas17" value="Lab. Sains" class="flat" /> Lab. Sains
							                        <br/><br/>

							                        <input type="checkbox" name="fasilitas[]" id="fasilitas18" value="Lab. Matematika" class="flat" /> Lab. Matematika
							                        <br/><br/>

							                        <input type="checkbox" name="fasilitas[]" id="fasilitas19" value="Koperasi" class="flat" /> Koperasi
							                        <br/><br/>

							                        <input type="checkbox" name="fasilitas[]" id="fasilitas20" value="Kantin" class="flat" /> Kantin
							                        <br/><br/>

							                        <input type="checkbox" name="fasilitas[]" id="fasilitas21" value="UKS" class="flat" /> UKS
							                        <br/><br/>

							                        <input type="checkbox" name="fasilitas[]" id="fasilitas22" value="Lap. Olahraga" class="flat" /> Lap. Olahraga
							                        <br/><br/>

							                        <input type="checkbox" name="fasilitas[]" id="fasilitas23" value="Taman Bermain" class="flat" /> Taman Bermain
							                        <br/><br/>
												</div>
											</div>
					                    </p>
									</div>
								</div>
								<div class="item form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="ekstrakurikuler">Ekstrakurikuler</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<p style="padding: 5px;">
											<div class="row">
												<div class="col-md-6">
							                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler1" value="Robotic" class="flat" /> Robotic
							                        <br/><br/>

							                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler2" value="Panahan" class="flat" /> Panahan
							                        <br/><br/>

							                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler3" value="Marching Band" class="flat" /> Marching Band
							                        <br/><br/>

							                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler4" value="Berenang" class="flat" /> Berenang
							                        <br/><br/>

							                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler5" value="Multimedia Club" class="flat" /> Multimedia Club
							                        <br/><br/>

							                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler6" value="Tenis Meja" class="flat" /> Tenis Meja
							                        <br/><br/>

							                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler7" value="Tilawah Qur`an" class="flat" /> Tilawah Qur`an
							                        <br/><br/>

							                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler8" value="Da`i Cilik" class="flat" /> Da`i Cilik
							                        <br/><br/>

							                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler9" value="Public Speaking" class="flat" /> Public Speaking Training
							                        <br/><br/>

							                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler10" value="Melukis" class="flat" /> Melukis
							                        <br/><br/>

							                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler11" value="Teater" class="flat" /> Teater
							                        <br/><br/>

							                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler24" value="Mewarnai" class="flat" /> Mewarnai
							                        <br/><br/>

							                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler25" value="Seni Tari" class="flat" /> Seni Tari
							                        <br/><br/>

							                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler26" value="Karate" class="flat" /> Karate
							                        <br/><br/>
													
													 <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler30" value="Science Club" class="flat" /> Science Club
							                        <br/><br/>
												</div>

												<div class="col-md-6">
													<input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler12" value="Catur" class="flat" /> Catur
							                        <br/><br/>

							                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler13" value="Arabic Club" class="flat" /> Arabic Club
							                        <br/><br/>

							                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler14" value="Tahfidz Al-Qur`an" class="flat" /> Tahfidz Al-Qur`an
							                        <br/><br/>

							                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler15" value="Tahsin Al-Qur`an" class="flat" /> Tahsin Al-Qur`an
							                        <br/><br/>

							                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler16" value="Paskibra" class="flat" /> Paskibra
							                        <br/><br/>

							                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler17" value="Komputer" class="flat" /> Komputer
							                        <br/><br/>

							                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler18" value="Grup Seni Islam" class="flat" /> Grup Seni Islam
							                        <br/><br/>

							                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler19" value="Taekwondo" class="flat" /> Taekwondo
							                        <br/><br/>

							                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler20" value="Pencak Silat" class="flat" /> Pencak Silat
							                        <br/><br/>

							                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler21" value="Seni Musik" class="flat" /> Seni Musik
							                        <br/><br/>

							                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler22" value="Futsal" class="flat" /> Futsal
							                        <br/><br/>

							                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler23" value="PMR" class="flat" /> PMR
							                        <br/><br/>

							                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler27" value="Pramuka" class="flat" /> Pramuka
							                        <br/><br/>

							                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler28" value="English Club" class="flat" /> English Club
							                        <br/><br/>

							                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler29" value="Matematika" class="flat" /> Matematika
							                        <br/><br/>
													
													
												</div>
											</div>
					                    </p>
									</div>
								</div>
								<div class="item form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="lokasi">Lokasi</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<p style="padding: 5px;">
											<div class="row">
												<div class="col-md-6">
							                        <input type="checkbox" name="lokasi[]" id="lokasi1" value="Di Tepi Jalan Raya" class="flat" /> Di Tepi Jalan Raya
							                        <br/><br/>

							                        <input type="checkbox" name="lokasi[]" id="lokasi2" value="Daerah Perkantoran" class="flat" /> Daerah Perkantoran
							                        <br/><br/>

							                        <input type="checkbox" name="lokasi[]" id="lokasi3" value="Di Tepi Jalan Sedang" class="flat" /> Di Tepi Jalan Sedang
							                        <br/><br/>
												</div>
												<div class="col-md-6">
													<input type="checkbox" name="lokasi[]" id="lokasi4" value="Daerah Usaha" class="flat" /> Daerah Usaha
							                        <br/><br/>

							                        <input type="checkbox" name="lokasi[]" id="lokasi5" value="Daerah Perkampungan" class="flat" /> Daerah Perkampungan
							                        <br/><br/>
												</div>
											</div>
					                    </p>
									</div>
								</div>
		                      
								<div class="item form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="lokasi_sekolah">Lokasi Sekolah <span class="required">*</span></label>
									<input id="pac-input" class="controls" type="text" placeholder="Cari Lokasi"/>
									<div id="map" style="height: 250px;"></div>
								</div>

								<div class="ln_solid"></div>
								<div class="form-group">
									<div class="col-md-6 col-md-offset-3">
										<button type="button" onclick="cari(); return false;" class="btn btn-success">
											<i class="fa fa-search"></i> Cari
										</button>
									</div>
								</div>
		                    <?= form_close() ?>
						</div>
						<div class="col-md-6">
							<div class="promotion-section">
							    <div class="w-container promotion-container">
									<div class="promo-flex" style="margin: 0 !important; overflow-y: scroll; height: 700px;">
										<div id="loader" style="display: none;"></div>
										<div style="height: 100%;" id="result">
											<?php foreach ($sekolah as $row): ?>
												<?php  
													$path = 'assets/foto/sekolah-' . $row['id'];
													if (!file_exists(FCPATH . $path))
													{
														$foto = [];
													}
													else 
													{
														$foto = scandir(FCPATH . $path);
													}
													$foto = array_values(array_diff($foto, ['.', '..']));
												?>
												<a href="<?= base_url('user/detail-sekolah/' . $row['id']) ?>">
													<div class="w-clearfix w-preserve-3d promo-card">
														<img width="100%" height="200" src="<?= isset($foto[0]) ? base_url($path . '/' . $foto[0]) : 'http://placehold.it/313x313' ?>">
														<div class="blog-bar color-pink"></div>
														<div class="blog-post-text">
															<?= $row['nama_sekolah'] ?>
															<div class="blog-description pink-text"><?= 'Rp. ' . number_format($row['biaya_masuk'], 2, ',', '.') ?></div>
														</div>
													</div>
												</a>
											<?php endforeach; ?>
										</div>
							      	</div>
							    </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>

<div class="modal fade" id="modal" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Atur Bobot Kriteria Pencarian</h4>
            </div>
            <div class="modal-body">
            	<?php foreach ($kriteria as $row): ?>
            		<div class="form-group">
						<label class="control-label" for="<?= $row->key ?>"><?= $row->kriteria ?></label>
						<select class="form-control" name="<?= $row->key ?>" id="bobot_<?= $row->key ?>">
							<?php  
								$labels = [
									'Sangat Tidak Penting', 'Tidak Penting', 'Netral', 'Penting', 'Sangat Penting'
								];
								for ($i = 0; $i < 5; $i++):
							?>
								<option value="<?= $i + 1 ?>"><?= $i + 1 . ' (' . $labels[$i] . ')' ?></option>
							<?php endfor; ?>
						</select>
					</div>
            	<?php endforeach; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="button" class="btn green" onclick="atur_bobot();" data-dismiss="modal">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="perhitungan" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="width: 90%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Alur Perhitungan</h4>
            </div>
            <div class="modal-body">
            	<div class="row">
            		<div class="col-md-12" id="calculation">
            			<?php if (isset($_SESSION['solution_matrix'], $_SESSION['distance_result'], $_SESSION['normalized_result'], $_SESSION['result'])): ?>
		            		<h4>Matriks Keputusan Ternormalisasi Terbobot</h4>
		            		<table class="table table-bordered table-hover table-striped" style="width: 100% !important;">
		            			<thead>
		            				<tr>
		            					<th>No.</th>
		            					<?php foreach ($_SESSION['normalized_result'][0] as $key => $value): ?>
			            					<th><?= $key ?></th>
			            				<?php endforeach; ?>
		            				</tr>
		            			</thead>
		            			<tbody>
		            				<?php foreach ($_SESSION['normalized_result'] as $i => $row): ?>
		            					<tr>
		            						<td><?= $i + 1 ?></td>
		            						<?php foreach ($row as $k => $cell): ?>
		            							<td><?= $cell ?></td>
		            						<?php endforeach; ?>
		            					</tr>
		            				<?php endforeach; ?>
		            			</tbody>
		            		</table>

		            		<h4>Matriks Solusi Ideal</h4>
		            		<table class="table table-bordered table-hover table-striped" style="width: 100% !important;">
		            			<thead>
		            				<tr>
		            					<th>-</th>
		            					<?php foreach ($_SESSION['solution_matrix']['positive'] as $key => $value): ?>
			            					<th><?= $key ?></th>
			            				<?php endforeach; ?>
		            				</tr>
		            			</thead>
		            			<tbody>
		            				<?php foreach ($_SESSION['solution_matrix'] as $key => $value): ?>
		            					<tr>
		            						<td><?= $key ?></td>
		            						<?php foreach ($row as $k => $cell): ?>
		            							<td><?= $cell ?></td>
		            						<?php endforeach; ?>
		            					</tr>
		            				<?php endforeach; ?>
		            			</tbody>
		            		</table>

		            		<h4>Jarak Solusi Ideal</h4>
		            		<table class="table table-bordered table-hover table-striped" style="width: 100% !important;">
		            			<thead>
		            				<tr>
		            					<th>-</th>
		            					<th>Jarak Positif</th>
		            					<th>Jarak Negatif</th>
		            				</tr>
		            			</thead>
		            			<tbody>
		            				<?php foreach ($_SESSION['distance_result'] as $i => $row): ?>
		            					<tr>
		            						<td><?= $i + 1 ?></td>
		            						<td><?= $row['positive'] ?></td>
		            						<td><?= $row['negative'] ?></td>
		            					</tr>
		            				<?php endforeach; ?>
		            			</tbody>
		            		</table>

		            		<h4>Table Nilai Preferensi</h4>
		            		<table class="table table-bordered table-hover table-striped" style="width: 100% !important;">
		            			<thead>
		            				<tr>
		            					<th>-</th>
		            					<th>Preferensi</th>
		            				</tr>
		            			</thead>
		            			<tbody>
		            				<?php foreach ($_SESSION['result'] as $i => $row): ?>
		            					<tr>
		            						<td><?= $i + 1 ?></td>
		            						<td><?= $row ?></td>
		            					</tr>
		            				<?php endforeach; ?>
		            			</tbody>
		            		</table>
		            	<?php else: ?>
		            		<p>Anda belum melakukan pencarian</p>
		            		<?php var_dump($_SESSION); ?>
		            	<?php endif; ?>
            		</div>
            	</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- PNotifyy -->
<script src="<?= base_url('assets') ?>/vendors/pnotify/dist/pnotify.js"></script>
<script src="<?= base_url('assets') ?>/vendors/pnotify/dist/pnotify.buttons.js"></script>

<script src="<?= base_url('assets') ?>/vendors/iCheck/icheck.min.js"></script>

<script type="text/javascript">
	let aturBobot = false;
	let bobot = {};

	function atur_bobot() {
		aturBobot = true;
		<?php foreach ($kriteria as $row): ?>
			bobot['<?= $row->key ?>'] = $('#bobot_<?= $row->key ?>').val();
			if (bobot['<?= $row->key ?>'] == '') {
				aturBobot = false;
			}
		<?php endforeach; ?>
	}

	function cari() {
		if (!aturBobot) {
			alert('Anda harus mengatur bobot pencarian terlebih dahulu');
			return;
		}

		const data = {
			cari: true,
			biaya_masuk: $('#biaya_masuk').val(),
			spp_bulanan: $('#spp_bulanan').val(),
			akreditasi: $('#akreditasi').val(),
			fasilitas: get_checkbox_values('fasilitas[]') || [],
			ekstrakurikuler: get_checkbox_values('ekstrakurikuler') || [],
			lokasi: get_checkbox_values('lokasi') || []
		};

		<?php foreach ($kriteria as $row): ?>
			data['bobot_<?= $row->key ?>'] = bobot['<?= $row->key ?>'];
		<?php endforeach; ?>

		$.ajax({
			url: '<?= base_url('user/rank') ?>',
			type: 'POST',
			data: data,
			beforeSend: function() {
				$('#result').css('display', 'none');
				$('#loader').css('display', 'block');
			},
			success: function(response) {
				let json = $.parseJSON(response);
				let data = json.rank;
				let session = json.session;
				console.log(session);
				showCalculation(session);

				$('#result').css('display', 'block');
				$('#loader').css('display', 'none');

				let html = '';
				for (let i = 0; i < data.length; i++) {
					html += '<a href="<?= base_url('user/detail-sekolah') ?>/' + data[i].id + '">' +
						'<div class="w-clearfix w-preserve-3d promo-card">' +
								'<img width="100%" height="200" src="' + data[i].foto + '">' +
								'<div class="blog-bar color-pink"></div>' +
								'<div class="blog-post-text">' +
									data[i].nama_sekolah +
									'<div class="blog-description pink-text">' + data[i].biaya_masuk + '</div>' +
								'</div>' +
							'</div>' +
						'</a>';
				}

				$('#result').html((data.length > 0 ? html : '<p>No results found</p>'));
			},
			error: function(error) { 
				console.log(error.responseText); 
				$('#result').css('display', 'block');
				$('#loader').css('display', 'none');	
			}
		});
	}

	function get_checkbox_values(name) {
		return $('input[name="' + name + '"]:checked').map(function() { return $(this).val(); }).get();
	}

	function showCalculation(data) {
		let html = '<h4>Matriks Keputusan Ternormalisasi Terbobot</h4>' +
    		'<table class="table table-bordered table-hover table-striped" style="width: 100% !important;">' +
    			'<thead>' +
    				'<tr>' +
    					'<th>No.</th>';

    	for (let key in data.normalized_result[0]) {

    		html += '<th>' + key  + '</th>';

    	}
    					
    	html += '</tr></thead><tbody>';
    	
    	for (let i = 0; i < data.normalized_result.length; i++) {
    		html += '<tr>';
    			html += '<td>' + (i + 1) + '</td>';
    			for (let key in data.normalized_result[i]) {
    				html += '<td>' + data.normalized_result[i][key] + '</td>';
    			}
    		html += '</tr>';
    	}
    			
    	html += '</tbody></table>';

    	html += '<h4>Matriks Solusi Ideal</h4>' +
            		'<table class="table table-bordered table-hover table-striped" style="width: 100% !important;">' +
            			'<thead>' +
            				'<tr>' +
            					'<th>-</th>';

        for (let key in data.solution_matrix.positive) {
        	html += '<th>' + key  + '</th>';
        }
    	html +=	'</tr></thead><tbody>';

    	for (let key in data.solution_matrix) {

    		html += '<tr>';
	    		html += '<td>' + key + '</td>';
    			for (let k in data.solution_matrix[key]) {
    				html += '<td>' + data.solution_matrix[key][k] + '</td>';
    			}
    		html += '</tr>';
    	}

		html += '</tbody></table>';

		html += '<h4>Jarak Solusi Ideal</h4>' +
            		'<table class="table table-bordered table-hover table-striped" style="width: 100% !important;">' +
            			'<thead>' +
            				'<tr>' +
            					'<th>-</th>' +
            					'<th>Jarak Positif</th>' +
            					'<th>Jarak Negatif</th>' +
            				'</tr>' +
            			'</thead>' +
            			'<tbody>';

        for (let i = 0; i < data.distance_result.length; i++) {
        	html += '<tr>';
        		html += '<td>' + (i + 1) + '</td>';
        		html += '<td>' + data.distance_result[i].positive + '</td>';
        		html += '<td>' + data.distance_result[i].negative + '</td>';
        	html += '</tr>';
        }

		html += '</tbody></table>';

		html += '<h4>Table Nilai Preferensi</h4>' +
            		'<table class="table table-bordered table-hover table-striped" style="width: 100% !important;">' +
            			'<thead>' +
            				'<tr>' +
            					'<th>-</th>' +
            					'<th>Preferensi</th>' +
            				'</tr>' +
            			'</thead>' +
            			'<tbody>';

        for (let i = 0; i < data.result.length; i++) {
        	html += '<tr>';
        		html += '<td>' + (i + 1) + '</td>';
        		html += '<td>' + data.result[i] + '</td>';
        	html += '</tr>';
        }
        
		html += '</tbody></table>';
    	
    	$('#calculation').html(html);
    		
	}
</script>

<script type="text/javascript">
	function initMap() {
		// koordinat palembang
		let lat = -2.990934;
		let lng = 104.7754;

		let map = new google.maps.Map(document.getElementById('map'), {
			center: {lat: lat, lng: lng},
			zoom: 12
		});

		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function(position) {
				let pos = {
					lat: position.coords.latitude,
					lng: position.coords.longitude
				};
			});
		}

		$('input[name=latitude]').val(lat);
		$('input[name=longitude]').val(lng);

		let input = document.getElementById('pac-input');
        let searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        let markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          let places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          let bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }

            $('input[name=latitude]').val(place.geometry.location.lat);
			$('input[name=longitude]').val(place.geometry.location.lng);
          });
          map.fitBounds(bounds);
        });

        function setMarker(latLng) {
        	// Clear out the old markers.
			markers.forEach(function(marker) {	
				marker.setMap(null);
			});
			markers = [];

			// Create a marker for each place.
            markers.push(new google.maps.Marker({
				map: map,
				position: latLng
            }));
        }

        map.addListener('click', function(e) {
        	let clickedLat = e.latLng.lat();
        	let clickedLng = e.latLng.lng();

        	setMarker({ lat: clickedLat, lng: clickedLng });

        	$('input[name=latitude]').val(clickedLat);
			$('input[name=longitude]').val(clickedLng);
        });


        $('input[name=latitude]').keyup(function() {
        	let latLng = new google.maps.LatLng($(this).val(), $('input[name=longitude]').val());
        	setMarker(latLng);
        	map.setCenter(latLng);
        });
		$('input[name=longitude]').keyup(function() {
			let latLng = new google.maps.LatLng($('input[name=latitude]').val(), $(this).val());
        	setMarker(latLng);
        	map.setCenter(latLng);
        });
	}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDV1CNPBI4qy_Wr5jDjKe0Pb40u9Tn27UA&libraries=places&callback=initMap" async defer></script>