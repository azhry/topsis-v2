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
															<?php 
																$detail_fasilitas = json_decode($fasilitas_k->details);
																for ($i = 0; $i < count($detail_fasilitas) / 2; $i++): 
															?>
																<input type="checkbox" name="fasilitas[]" id="fasilitas<?= $i + 1 ?>" value="<?= $detail_fasilitas[$i]->label ?>" data-parsley-mincheck="1" class="flat" /> <?= $detail_fasilitas[$i]->label ?>
									                        	<br/><br/>

															<?php endfor; ?>
														</div>
														<div class="col-md-6">
															<?php 
																$detail_fasilitas = json_decode($fasilitas_k->details);
																for ($i = count($detail_fasilitas) / 2; $i < count($detail_fasilitas); $i++): 
															?>
																<input type="checkbox" name="fasilitas[]" id="fasilitas<?= $i + 1 ?>" value="<?= $detail_fasilitas[$i]->label ?>" data-parsley-mincheck="1" class="flat" /> <?= $detail_fasilitas[$i]->label ?>
									                        	<br/><br/>

															<?php endfor; ?>

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
															<?php 
																$detail_ekstrakurikuler = json_decode($ekstrakurikuler_k->details);
																for ($i = 0; $i < count($detail_ekstrakurikuler) / 2; $i++): 
															?>
																<input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler<?= $i + 1 ?>" value="<?= $detail_ekstrakurikuler[$i]->label ?>" data-parsley-mincheck="1" class="flat" /> <?= $detail_ekstrakurikuler[$i]->label ?>
									                        	<br/><br/>

															<?php endfor; ?>
														</div>
														<div class="col-md-6">
															<?php 
																$detail_ekstrakurikuler = json_decode($ekstrakurikuler_k->details);
																for ($i = count($detail_ekstrakurikuler) / 2; $i < count($detail_ekstrakurikuler); $i++): 
															?>
																<input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler<?= $i + 1 ?>" value="<?= $detail_ekstrakurikuler[$i]->label ?>" data-parsley-mincheck="1" class="flat" /> <?= $detail_ekstrakurikuler[$i]->label ?>
									                        	<br/><br/>

															<?php endfor; ?>

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
								<?php if ($current_page > 0): ?>
									<a type="button" href="<?= base_url('app/cari2/' . ($this->uri->segment(3) - 1)) ?>" class="btn btn-warning">
										<i class="fa fa-arrow-left"></i> Kembali
									</a>
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
	  			appendMarker({ lat: <?= $row->latitude ?>, lng: <?= $row->longitude ?> }, '<?= $row->nama_sekolah ?>');
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

        	let marked = true;	
	        const distance = vincentyGreatCircleDistance(lat, lng, latLng.lat, latLng.lng) / 1000;
	        dValue = $('#jarak').val();
        	if (dValue != undefined && dValue != '') {
        		console.log(sekolah + ":" + distance);
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
	        			if (distance > 2) {
	        				marked = false;
	        			}
	        			break;
	        	}	
        	}

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

	function toRad(n) {
	 return n * Math.PI / 180;
	};
	function vincentyGreatCircleDistance(lat1, lon1, lat2, lon2) {
	 var a = 6378137,
	     b = 6356752.3142,
	     f = 1 / 298.257223563, // WGS-84 ellipsoid params
	     L = toRad(lon2-lon1),
	     U1 = Math.atan((1 - f) * Math.tan(toRad(lat1))),
	     U2 = Math.atan((1 - f) * Math.tan(toRad(lat2))),
	     sinU1 = Math.sin(U1),
	     cosU1 = Math.cos(U1),
	     sinU2 = Math.sin(U2),
	     cosU2 = Math.cos(U2),
	     lambda = L,
	     lambdaP,
	     iterLimit = 100;
	 do {
	  var sinLambda = Math.sin(lambda),
	      cosLambda = Math.cos(lambda),
	      sinSigma = Math.sqrt((cosU2 * sinLambda) * (cosU2 * sinLambda) + (cosU1 * sinU2 - sinU1 * cosU2 * cosLambda) * (cosU1 * sinU2 - sinU1 * cosU2 * cosLambda));
	  if (0 === sinSigma) {
	   return 0; // co-incident points
	  };
	  var cosSigma = sinU1 * sinU2 + cosU1 * cosU2 * cosLambda,
	      sigma = Math.atan2(sinSigma, cosSigma),
	      sinAlpha = cosU1 * cosU2 * sinLambda / sinSigma,
	      cosSqAlpha = 1 - sinAlpha * sinAlpha,
	      cos2SigmaM = cosSigma - 2 * sinU1 * sinU2 / cosSqAlpha,
	      C = f / 16 * cosSqAlpha * (4 + f * (4 - 3 * cosSqAlpha));
	  if (isNaN(cos2SigmaM)) {
	   cos2SigmaM = 0; // equatorial line: cosSqAlpha = 0 (§6)
	  };
	  lambdaP = lambda;
	  lambda = L + (1 - C) * f * sinAlpha * (sigma + C * sinSigma * (cos2SigmaM + C * cosSigma * (-1 + 2 * cos2SigmaM * cos2SigmaM)));
	 } while (Math.abs(lambda - lambdaP) > 1e-12 && --iterLimit > 0);

	 if (!iterLimit) {
	  return NaN; // formula failed to converge
	 };

	 var uSq = cosSqAlpha * (a * a - b * b) / (b * b),
	     A = 1 + uSq / 16384 * (4096 + uSq * (-768 + uSq * (320 - 175 * uSq))),
	     B = uSq / 1024 * (256 + uSq * (-128 + uSq * (74 - 47 * uSq))),
	     deltaSigma = B * sinSigma * (cos2SigmaM + B / 4 * (cosSigma * (-1 + 2 * cos2SigmaM * cos2SigmaM) - B / 6 * cos2SigmaM * (-3 + 4 * sinSigma * sinSigma) * (-3 + 4 * cos2SigmaM * cos2SigmaM))),
	     s = b * A * (sigma - deltaSigma);
	 return s.toFixed(3); // round to 1mm precision
	};

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