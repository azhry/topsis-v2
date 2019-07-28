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
					<!-- <h3>Cari Sekolah</h3> -->
				</div>
				<div class="x_content">
					<div class="row">
						<div class="col-md-8">
							<?= form_open('app/append-filter') ?>

							<?php if (count($sekolah) > 0): ?>
							<?php  
								switch ($current_page)
								{
									case 0:
										?>
										
										<h4 class="text-center">Pilih akreditasi sekolah yang ingin dicari</h4>

										<div class="item form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="akreditasi">Akreditasi</label>
											<div class="col-md-9 col-sm-9 col-xs-12">
												<select id="akreditasi" name="akreditasi" class="form-control col-md-7 col-xs-12" required>
													<option value="">Pilih..</option>
													<option value="A">A</option>
													<option value="B">B</option>
													<option value="C">C</option>
													<option value="Belum Terakreditasi">Belum Terakreditasi</option>
												</select>
											</div>
										</div>

										<input type="hidden" name="current_page" value="0">
										<input type="hidden" name="next_page" value="1">

										<?php
										break;

									case 1:
										?>

										<h4 class="text-center">Pilih range biaya masuk sekolah yang ingin dicari</h4>

										<div class="item form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="biaya_masuk">Range Biaya Masuk</label>
											<div class="col-md-9 col-sm-9 col-xs-12">
												<select required id="biaya_masuk" name="biaya_masuk" class="form-control col-md-7 col-xs-12">
													<option value="">Pilih..</option>
													<?php $v = 0; for ($i = count($range['biaya_masuk']) - 1; $i >= 0; $i--): ?>
														<option value="<?= ++$v ?>"><?= 'Rp. ' . number_format($range['biaya_masuk'][$i]['min'], 2, ',', '.') . ' - ' . 'Rp. ' . number_format($range['biaya_masuk'][$i]['max'], 2, ',', '.') ?></option>
													<?php endfor; ?>
												</select>
											</div>
										</div>

										<input type="hidden" name="current_page" value="1">
										<input type="hidden" name="next_page" value="2">										

										<?php
										break;
								
									case 2:
										?>

										<h4 class="text-center">Pilih range biaya SPP bulanan sekolah yang ingin dicari</h4>

										<div class="item form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="spp_bulanan">Range Biaya SPP Bulanan</label>
											<div class="col-md-9 col-sm-9 col-xs-12">
												<select required id="spp_bulanan" name="spp_bulanan" class="form-control col-md-7 col-xs-12">
													<option value="">Pilih..</option>
													<?php $v = 0; for ($i = count($range['spp_bulanan']) - 1; $i >= 0; $i--): ?>
														<option value="<?= ++$v ?>"><?= 'Rp. ' . number_format($range['spp_bulanan'][$i]['min'], 2, ',', '.') . ' - ' . 'Rp. ' . number_format($range['spp_bulanan'][$i]['max'], 2, ',', '.') ?></option>
													<?php endfor; ?>
												</select>
											</div>
										</div>
										
										<input type="hidden" name="current_page" value="2">
										<input type="hidden" name="next_page" value="3">										

										<?php
										break;

									case 3:
										?>

										<h4 class="text-center">Cari sekolah yang memiliki fasilitas yang anda pilih</h4>

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

									                        <input type="checkbox" name="fasilitas[]" id="fasilitas10" value="Mushola / Masjid" class="flat" /> Mushola / Masjid
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
										
										<input type="hidden" name="current_page" value="3">
										<input type="hidden" name="next_page" value="4">										

										<?php
										break;

									case 4:
										?>
										
										<h4 class="text-center">Cari sekolah yang memiliki ekstrakurikuler yang anda pilih</h4>

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

									                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler9" value="Public Speaking" class="flat" /> Public Speaking
									                        <br/><br/>

									                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler10" value="Training" class="flat" /> Training
									                        <br/><br/>

									                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler11" value="Melukis" class="flat" /> Melukis
									                        <br/><br/>

									                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler12" value="Teater" class="flat" /> Teater
									                        <br/><br/>

									                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler25" value="Mewarnai" class="flat" /> Mewarnai
									                        <br/><br/>

									                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler26" value="Seni Tari" class="flat" /> Seni Tari
									                        <br/><br/>

									                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler27" value="Karate" class="flat" /> Karate
									                        <br/><br/>
														</div>

														<div class="col-md-6">
															<input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler13" value="Catur" class="flat" /> Catur
									                        <br/><br/>

									                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler14" value="Arabic Club" class="flat" /> Arabic Club
									                        <br/><br/>

									                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler15" value="Tahfidz Al-Qur`an" class="flat" /> Tahfidz Al-Qur`an
									                        <br/><br/>

									                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler16" value="Tahsin Al-Qur`an" class="flat" /> Tahsin Al-Qur`an
									                        <br/><br/>

									                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler17" value="Paskibra" class="flat" /> Paskibra
									                        <br/><br/>

									                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler18" value="Komputer" class="flat" /> Komputer
									                        <br/><br/>

									                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler19" value="Grup Seni Islam" class="flat" /> Grup Seni Islam
									                        <br/><br/>

									                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler20" value="Taekwondo" class="flat" /> Taekwondo
									                        <br/><br/>

									                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler21" value="Pencak Silat" class="flat" /> Pencak Silat
									                        <br/><br/>

									                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler22" value="Seni Musik" class="flat" /> Seni Musik
									                        <br/><br/>

									                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler23" value="Futsal" class="flat" /> Futsal
									                        <br/><br/>

									                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler24" value="PMR" class="flat" /> PMR
									                        <br/><br/>

									                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler28" value="Pramuka" class="flat" /> Pramuka
									                        <br/><br/>

									                        <input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler29" value="English Club" class="flat" /> English Club
									                        <br/><br/>
														</div>
													</div>
							                    </p>
											</div>
										</div>

										<input type="hidden" name="current_page" value="4">
										<input type="hidden" name="next_page" value="5">										

										<?php
										break;

									case 5:
										?>
										
										<h4 class="text-center">Pilih letak lokasi sekolah yang ingin dicari</h4>

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

										<input type="hidden" name="current_page" value="5">
										<input type="hidden" name="next_page" value="6">										

										<?php
										break;

									case 6:
										?>

										<h4 class="text-center">Pilih kriteria halaman parkir sekolah yang ingin dicari</h4>

										<div class="item form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="halaman_parkir">Halaman Parkir</label>
											<div class="col-md-9 col-sm-9 col-xs-12">
												<select required id="halaman_parkir" name="halaman_parkir" class="form-control col-md-7 col-xs-12">
													<option value="">Pilih..</option>
													<option value="Sangat Luas">Sangat Luas</option>
													<option value="Luas">Luas</option>
													<option value="Cukup Luas">Cukup Luas</option>
													<option value="Tidak Luas">Tidak Luas</option>
													<option value="Sangat Tidak Luas">Sangat Tidak Luas</option>
												</select>
											</div>
										</div>

										<input type="hidden" name="current_page" value="6">
										<input type="hidden" name="next_page" value="7">										

										<?php
										break;

									case 7:
										?>
										
										<div class="item form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="jarak">Jarak</label>
											<div class="col-md-9 col-sm-9 col-xs-12">
												<select id="jarak" name="jarak" class="form-control col-md-7 col-xs-12">
													<option value="">Pilih..</option>
													<?php $v = 0; for ($i = count($criteria->config['jarak']['values']) - 1; $i >= 0; $i--): ?>
														<?php if ($criteria->config['jarak']['values'][$i]['min'] == null): ?>
															<option value="<?= $criteria->config['jarak']['values'][$i]['value'] ?>"><?= '< ' . $criteria->config['jarak']['values'][$i]['max'] . ' km (' . $criteria->config['jarak']['values'][$i]['label'] . ')' ?></option>
														<?php elseif ($criteria->config['jarak']['values'][$i]['max'] == null): ?>
															<option value="<?= $criteria->config['jarak']['values'][$i]['value'] ?>"><?= '> ' . $criteria->config['jarak']['values'][$i]['min'] . ' km (' . $criteria->config['jarak']['values'][$i]['label'] . ')' ?></option>
														<?php else: ?>
															<option value="<?= $criteria->config['jarak']['values'][$i]['value'] ?>"><?= $criteria->config['jarak']['values'][$i]['min'] . ' km - ' . $criteria->config['jarak']['values'][$i]['max'] . ' km (' . $criteria->config['jarak']['values'][$i]['label'] . ')' ?></option>
														<?php endif; ?>
													<?php endfor; ?>
												</select>
											</div>
										</div>

										<br><br>										
										<div class="item form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="lokasi_sekolah">Peta <span id="jarak"></span></label>
											<input id="pac-input" class="controls" type="text" placeholder="Cari Lokasi"/>
											<div id="map" style="height: 250px;"></div>
										</div>

										<input type="hidden" name="current_page" value="7">
										<input type="hidden" name="next_page" value="8">						
										<input type="hidden" name="lat" id="lat">
										<input type="hidden" name="lng" id="lng">
										<div class="ln_solid"></div>				

										<?php
										break;
								
									case 8:
										?>

										<h3>Pencarian selesai. Silahkan klik Ulangi jika ingin melakukan pencarian lagi.</h3>

										<?php
										break;
								}
							?>
							<?php else: ?>
								<h3>Kriteria sekolah yang anda cari tidak ditemukan. Silahkan ulangi pencarian.</h3>
							<?php endif; ?>

							<br><br><br>
							<div class="item form-group" style="text-align: center;">
								<?php if ($current_page < 8 && count($sekolah) > 0): ?>
									<button type="submit" name="submit" value="Submit" class="btn btn-success">
										<i class="fa fa-search"></i> Cari
									</button>	
								<?php endif; ?>
								<a href="<?= base_url('app/cari2') ?>" type="button" class="btn btn-danger">
									<i class="fa fa-refresh"></i> Ulangi
								</a>
							</div>
							<?= form_close() ?>
						</div>
						<div class="col-md-4">
							<div class="promotion-section">
							    <div class="w-container promotion-container">
							    	<p><?= count($sekolah) . ' results found' ?></p>
									<div class="promo-flex" style="margin: 0 !important; overflow-y: scroll; height: 700px;">
										<div id="loader" style="display: none;"></div>
										<div style="height: 100%;" id="result">
											<?php foreach ($sekolah as $row): ?>
												<?php  
													$row = (array)$row;
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
												<a href="<?= base_url('app/detail-sekolah/' . $row['id']) ?>">
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

<!-- PNotifyy -->
<script src="<?= base_url('assets') ?>/vendors/pnotify/dist/pnotify.js"></script>
<script src="<?= base_url('assets') ?>/vendors/pnotify/dist/pnotify.buttons.js"></script>

<script src="<?= base_url('assets') ?>/vendors/iCheck/icheck.min.js"></script>

<script type="text/javascript">
	// koordinat palembang
	var lat = -2.990934;
	var lng = 104.7754;
	var yourLocation = new google.maps.LatLng(lat, lng);
	var dValue = undefined;

	function initMap() {
		

		let map = new google.maps.Map(document.getElementById('map'), {
			center: {lat: lat, lng: lng},
			zoom: 12
		});

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

            $('#lat').val(place.geometry.location.lat);
			$('#lng').val(place.geometry.location.lng);
			setMarker(place.geometry.location);
			<?php foreach ($sekolah as $row): ?>
	  			appendMarker({ lat: <?= $row->latitude ?>, lng: <?= $row->longitude ?> });
	  		<?php endforeach; ?>
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

        function appendMarker(latLng, sekolah) {
        	yourLocation = new google.maps.LatLng(lat, lng);
        	let request = {
	        	origin: yourLocation,
	        	destination: latLng,
	        	travelMode: google.maps.TravelMode.DRIVING
	        };
	        let directionService = new google.maps.DirectionsService();
	        directionService.route(request, function(response, status) {
	        	
	        	if (response != null) {
	        		let marked = true;	
	        		const distance = parseFloat(response.routes[0].legs[0].distance.value / 1000);
		        	dValue = $('#jarak').val();
		        	if (dValue != undefined && dValue != '') {
		        		console.log(distance + ":" + dValue);
		        		dValue = parseInt(dValue);
		        		switch (dValue) {
			        		case 1:
			        			if (distance < 10.1) {
			        				marked = false;
			        			}
			        			break;

			        		case 2:
			        			if (distance < 8.1 || distance > 10) {
			        				marked = false;
			        			}
			        			break;

			        		case 3:
			        			if (distance < 4.1 || distance > 8) {
			        				marked = false;
			        			}
			        			break;

			        		case 4:
			        			if (distance < 2.1 || distance > 4) {
			        				marked = false;
			        			}
			        			break;

			        		case 5:
			        			console.log('5555---');
			        			if (distance > 2) {
			        				marked = false;
			        			}
			        			break;
			        	}	
		        	}
		        	console.log(marked);
		        	if (marked) {
		        		const infowindow = new google.maps.InfoWindow({
		        			content: '<h5>' + sekolah + '</h5>'
		        		});
		        		const marker = new google.maps.Marker({
							map: map,
							position: latLng,
							icon: 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png'
			            });
			            marker.addListener('click', function() {
				          	infowindow.open(map, marker);
				        });
			            markers.push(marker);	
		        	}
	        	}
	        	
	        });

            
        }

        if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function(position) {
				let pos = {
					lat: position.coords.latitude,
					lng: position.coords.longitude
				};
				lat = pos.lat;
				lng = pos.lng;
				$('#lat').val(lat);
	        	$('#lng').val(lng);
				setMarker(pos);
				<?php foreach ($sekolah as $row): ?>
		  			appendMarker({ lat: <?= $row->latitude ?>, lng: <?= $row->longitude ?> }, '<?= $row->nama_sekolah ?>');
		  		<?php endforeach; ?>
				// cari();
			});
		}
		else {
			let pos = {
				lat: lat,
				lng: lng
			};
			$('#lat').val(lat);
	        $('#lng').val(lng);
			setMarker(pos);
			<?php foreach ($sekolah as $row): ?>
	  			appendMarker({ lat: <?= $row->latitude ?>, lng: <?= $row->longitude ?> }, '<?= $row->nama_sekolah ?>');
	  		<?php endforeach; ?>
		}
        

        map.addListener('click', function(e) {
        	let clickedLat = e.latLng.lat();
        	let clickedLng = e.latLng.lng();
        	
        	lat = clickedLat;
        	lng = clickedLng;

        	setMarker({ lat: clickedLat, lng: clickedLng });
        	<?php foreach ($sekolah as $row): ?>
	  			appendMarker({ lat: <?= $row->latitude ?>, lng: <?= $row->longitude ?> }, '<?= $row->nama_sekolah ?>');
	  		<?php endforeach; ?>
        	
        	$('#lat').val(lat);
	        $('#lng').val(lng);
        });

        $('#jarak').on('change', function() {
        	const latlng = { lat: parseFloat($('#lat').val()), lng: parseFloat($('#lng').val()) };
        	console.log(latlng);
        	setMarker(latlng);
        	<?php foreach ($sekolah as $row): ?>
	  			appendMarker({ lat: <?= $row->latitude ?>, lng: <?= $row->longitude ?> }, '<?= $row->nama_sekolah ?>');
	  		<?php endforeach; ?>
        });
	}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDV1CNPBI4qy_Wr5jDjKe0Pb40u9Tn27UA&libraries=places&callback=initMap&libraries=places&language=id" async defer></script>

<script type="text/javascript">
	// let bobot = {};

	// function atur_bobot() {
	// 	aturBobot = true;
	// 	<?php foreach ($kriteria as $row): ?>
	// 		bobot['<?= $row->key ?>'] = $('#bobot_<?= $row->key ?>').val();
	// 		if (bobot['<?= $row->key ?>'] == '') {
	// 			aturBobot = false;
	// 		}
	// 	<?php endforeach; ?>
	// }

	// function cari() {
	// 	const data = {
	// 		cari: true,
	// 		biaya_masuk: $('#biaya_masuk').val(),
	// 		spp_bulanan: $('#spp_bulanan').val(),
	// 		akreditasi: $('#akreditasi').val(),
	// 		fasilitas: $('#fasilitas').val(),
	// 		ekstrakurikuler: $('#ekstrakurikuler').val(),
	// 		lokasi: get_checkbox_values('lokasi') || [],
	// 		lat: lat,
	// 		lng: lng,
	// 		jarak: $('#jarak').val()
	// 	};

	// 	<?php foreach ($kriteria as $row): ?>
	// 		data['bobot_<?= $row->key ?>'] = <?= $row->bobot ?>;
	// 	<?php endforeach; ?>

	// 	$.ajax({
	// 		url: '<?= base_url('app/rank') ?>',
	// 		type: 'POST',
	// 		data: data,
	// 		beforeSend: function() {
	// 			$('#result').css('display', 'none');
	// 			$('#loader').css('display', 'block');
	// 		},
	// 		success: function(response) {
	// 			console.log(response);
	// 			let json = $.parseJSON(response);
	// 			let data = json.rank;
	// 			let session = json.session;
	// 			console.log(json);

	// 			$('#result').css('display', 'block');
	// 			$('#loader').css('display', 'none');

	// 			let html = '';
	// 			for (let i = 0; i < data.length; i++) {
	// 				html += '<a href="<?= base_url('app/detail-sekolah') ?>/' + data[i].id + '">' +
	// 					'<div class="w-clearfix w-preserve-3d promo-card">' +
	// 							'<img width="100%" height="200" src="' + data[i].foto + '">' +
	// 							'<div class="blog-bar color-pink"></div>' +
	// 							'<div class="blog-post-text">' +
	// 								data[i].nama_sekolah +
	// 								'<div class="blog-description pink-text">' + data[i].biaya_masuk + '</div>' +
	// 								'<div class="blog-description blue-text"><small>' + Math.round(data[i].jarak, 2) + ' km</small></div>' +
	// 							'</div>' +
	// 						'</div>' +
	// 					'</a>';
	// 			}

	// 			$('#result').html((data.length > 0 ? html : '<p>Sekolah Tidak Ditemukan</p>'));
	// 		},
	// 		error: function(error) { 
	// 			console.log(error.responseText); 
	// 			$('#result').css('display', 'block');
	// 			$('#loader').css('display', 'none');	
	// 		}
	// 	});
	// }

	// function get_checkbox_values(name) {
	// 	return $('input[name="' + name + '"]:checked').map(function() { return $(this).val(); }).get();
	// }
	
</script>