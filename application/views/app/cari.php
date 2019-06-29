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
								<!-- <button class="btn red btn-xs" type="button" data-toggle="modal" href="#modal">Atur Bobot Pencarian</button> -->
								<button type="button" onclick="cari(); return false;" class="btn btn-success btn-xs">
									<i class="fa fa-search"></i> Cari
								</button>
								<!-- <button class="btn yellow btn-xs" type="button" data-toggle="modal" href="#perhitungan">Tampilkan Perhitungan</button> -->
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
										<select id="fasilitas" name="fasilitas" class="form-control col-md-7 col-xs-12">
											<option value="">Pilih..</option>
											<?php $v = 0; for ($i = count($criteria->config['fasilitas']['values']) - 1; $i >= 0; $i--): ?>
												<?php if ($criteria->config['fasilitas']['values'][$i]['min'] == null): ?>
													<option value="<?= ++$v ?>"><?= '< ' . $criteria->config['fasilitas']['values'][$i]['max'] . ' (' . $criteria->config['fasilitas']['values'][$i]['label'] . ')' ?></option>
												<?php elseif ($criteria->config['fasilitas']['values'][$i]['max'] == null): ?>
													<option value="<?= ++$v ?>"><?= '> ' . $criteria->config['fasilitas']['values'][$i]['min'] . ' (' . $criteria->config['fasilitas']['values'][$i]['label'] . ')' ?></option>
												<?php else: ?>
													<option value="<?= ++$v ?>"><?= $criteria->config['fasilitas']['values'][$i]['min'] . ' - ' . $criteria->config['fasilitas']['values'][$i]['max'] . ' (' . $criteria->config['fasilitas']['values'][$i]['label'] . ')' ?></option>
												<?php endif; ?>
											<?php endfor; ?>
										</select>
									</div>
								</div>

								<div class="item form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="ekstrakurikuler">Ekstrakurikuler</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<select id="ekstrakurikuler" name="ekstrakurikuler" class="form-control col-md-7 col-xs-12">
											<option value="">Pilih..</option>
											<?php $v = 0; for ($i = count($criteria->config['ekstrakurikuler']['values']) - 1; $i >= 0; $i--): ?>
												<?php if ($criteria->config['ekstrakurikuler']['values'][$i]['min'] == null): ?>
													<option value="<?= ++$v ?>"><?= '< ' . $criteria->config['ekstrakurikuler']['values'][$i]['max'] . ' (' . $criteria->config['ekstrakurikuler']['values'][$i]['label'] . ')' ?></option>
												<?php elseif ($criteria->config['ekstrakurikuler']['values'][$i]['max'] == null): ?>
													<option value="<?= ++$v ?>"><?= '> ' . $criteria->config['ekstrakurikuler']['values'][$i]['min'] . ' (' . $criteria->config['ekstrakurikuler']['values'][$i]['label'] . ')' ?></option>
												<?php else: ?>
													<option value="<?= ++$v ?>"><?= $criteria->config['ekstrakurikuler']['values'][$i]['min'] . ' - ' . $criteria->config['ekstrakurikuler']['values'][$i]['max'] . ' (' . $criteria->config['ekstrakurikuler']['values'][$i]['label'] . ')' ?></option>
												<?php endif; ?>
											<?php endfor; ?>
										</select>
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
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="jarak">Jarak</label>
									<div class="col-md-9 col-sm-9 col-xs-12">
										<select id="jarak" name="jarak" class="form-control col-md-7 col-xs-12">
											<option value="">Pilih..</option>
											<?php $v = 0; for ($i = count($criteria->config['jarak']['values']) - 1; $i >= 0; $i--): ?>
												<?php if ($criteria->config['jarak']['values'][$i]['min'] == null): ?>
													<option value="<?= $criteria->config['jarak']['values'][$i]['value'] ?>"><?= '< ' . $criteria->config['jarak']['values'][$i]['max'] . ' (' . $criteria->config['jarak']['values'][$i]['label'] . ')' ?></option>
												<?php elseif ($criteria->config['jarak']['values'][$i]['max'] == null): ?>
													<option value="<?= $criteria->config['jarak']['values'][$i]['value'] ?>"><?= '> ' . $criteria->config['jarak']['values'][$i]['min'] . ' (' . $criteria->config['jarak']['values'][$i]['label'] . ')' ?></option>
												<?php else: ?>
													<option value="<?= $criteria->config['jarak']['values'][$i]['value'] ?>"><?= $criteria->config['jarak']['values'][$i]['min'] . ' - ' . $criteria->config['jarak']['values'][$i]['max'] . ' (' . $criteria->config['jarak']['values'][$i]['label'] . ')' ?></option>
												<?php endif; ?>
											<?php endfor; ?>
										</select>
									</div>
								</div>

								<div class="item form-group">
									<label class="control-label col-md-3 col-sm-3 col-xs-12" for="lokasi_sekolah">Peta <span id="jarak"></span></label>
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

<!-- PNotifyy -->
<script src="<?= base_url('assets') ?>/vendors/pnotify/dist/pnotify.js"></script>
<script src="<?= base_url('assets') ?>/vendors/pnotify/dist/pnotify.buttons.js"></script>

<script src="<?= base_url('assets') ?>/vendors/iCheck/icheck.min.js"></script>

<script type="text/javascript">
	// koordinat palembang
	var lat = -2.990934;
	var lng = 104.7754;

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

        if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function(position) {
				let pos = {
					lat: position.coords.latitude,
					lng: position.coords.longitude
				};
				lat = pos.lat;
				lng = pos.lng;
				setMarker(pos);
				cari();
			});
		}
		else {
			let pos = {
				lat: lat,
				lng: lng
			};
			setMarker(pos);
		}

		// let unsriLocation = new google.maps.LatLng(-2.986570, 104.731808);
  //       let request = {
  //       	origin: { lat: lat, lng: lng },
  //       	destination: unsriLocation,
  //       	travelMode: google.maps.TravelMode.DRIVING
  //       };

  //       let directionService = new google.maps.DirectionsService();
  //       directionService.route(request, function(response, status) {
  //       	$('#jarak').text('(' + (response.routes[0].legs[0].distance.value / 1000).toString().replace('.', ',') + ' km)');
  //       });
        

        map.addListener('click', function(e) {
        	let clickedLat = e.latLng.lat();
        	let clickedLng = e.latLng.lng();
        	
        	request = {
	        	origin: { lat: clickedLat, lng: clickedLng },
	        	destination: unsriLocation,
	        	travelMode: google.maps.TravelMode.DRIVING
	        };

	        directionService.route(request, function(response, status) {
	        	$('#jarak').text('(' + (response.routes[0].legs[0].distance.value / 1000).toString().replace('.', ',') + ' km)');
	        });

        	setMarker({ lat: clickedLat, lng: clickedLng });
        	lat = clickedLat;
        	lng = clickedLng;
        	cari();
        });
	}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDV1CNPBI4qy_Wr5jDjKe0Pb40u9Tn27UA&libraries=places&callback=initMap&libraries=places&sensor=false&language=id" async defer></script>

<script type="text/javascript">
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
		const data = {
			cari: true,
			biaya_masuk: $('#biaya_masuk').val(),
			spp_bulanan: $('#spp_bulanan').val(),
			akreditasi: $('#akreditasi').val(),
			fasilitas: $('#fasilitas').val(),
			ekstrakurikuler: $('#ekstrakurikuler').val(),
			lokasi: get_checkbox_values('lokasi') || [],
			lat: lat,
			lng: lng,
			jarak: $('#jarak').val()
		};

		<?php foreach ($kriteria as $row): ?>
			data['bobot_<?= $row->key ?>'] = <?= $row->bobot ?>;
		<?php endforeach; ?>

		$.ajax({
			url: '<?= base_url('app/rank') ?>',
			type: 'POST',
			data: data,
			beforeSend: function() {
				$('#result').css('display', 'none');
				$('#loader').css('display', 'block');
			},
			success: function(response) {
				console.log(response);
				let json = $.parseJSON(response);
				let data = json.rank;
				let session = json.session;
				console.log(json);

				$('#result').css('display', 'block');
				$('#loader').css('display', 'none');

				let html = '';
				for (let i = 0; i < data.length; i++) {
					html += '<a href="<?= base_url('app/detail-sekolah') ?>/' + data[i].id + '">' +
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
	
</script>