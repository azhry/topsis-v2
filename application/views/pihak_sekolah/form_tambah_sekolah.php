<link href="<?= base_url('assets') ?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

<!-- PNotify -->
<link href="<?= base_url('assets') ?>/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
<link href="<?= base_url('assets') ?>/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">

<div class="page-fixed-main-content">
    <!-- BEGIN PAGE BASE CONTENT -->
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
                <h2>Informasi Sekolah</h2>
            </div>
			<div class="x_content">
				<?= form_open_multipart('admin/tambah-sekolah', ['class' => 'form-horizontal form-label-left']) ?>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="nama_sekolah">Nama Sekolah  <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input id="nama_sekolah" class="form-control col-md-7 col-xs-12" data-validate-length-range="2" name="nama_sekolah" required="required" type="text"/>
						</div>
					</div>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="alamat">Alamat Sekolah  <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<textarea class="form-control col-md-7 col-xs-12" required id="alamat" name="alamat"></textarea>
						</div>
					</div>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="telepon">Telepon  <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input id="telepon" class="form-control col-md-7 col-xs-12" data-validate-length-range="2" name="telepon" required="required" type="text"/>
						</div>
					</div>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="biaya_masuk">Biaya Masuk <span class="required">*</span></label>
						<div class="col-md-3 col-sm-3 col-xs-12 input-group" style="padding-left: 10px;">
							<span class="input-group-addon" aria-hidden="true">Rp.</span>
							<input type="number" id="biaya_masuk" name="biaya_masuk" required="required" min="1" class="form-control">
						</div>
					</div>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="spp_bulanan">SPP Bulanan <span class="required">*</span></label>
						<div class="col-md-3 col-sm-3 col-xs-12 input-group" style="padding-left: 10px;">
							<span class="input-group-addon" aria-hidden="true">Rp.</span>
							<input type="number" id="spp_bulanan" name="spp_bulanan" required="required" min="1" class="form-control">
						</div>
					</div>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="akreditasi">Akreditasi <span class="required">*</span></label>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<select class="form-control col-md-7 col-xs-12" id="akreditasi" name="akreditasi" required>
								<option value="A">A</option>
								<option value="B">B</option>
								<option value="C">C</option>
								<option value="Belum Terakreditasi">Belum Terakreditasi</option>
							</select>
						</div>
					</div>
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="fasilitas">Fasilitas <span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 col-xs-12">
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
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="ekstrakurikuler">Ekstrakurikuler <span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 col-xs-12">
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

					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="lokasi">Lokasi <span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 col-xs-12">
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
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="lokasi_sekolah">Koordinat Lokasi <span class="required">*</span></label>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<input type="number" step="any" name="latitude" required class="form-control col-md-7 col-xs-12"/>
							<input type="number" step="any" name="longitude" required class="form-control col-md-7 col-xs-12"/>
						</div>
					</div>

					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="lokasi_sekolah">Foto Sekolah <span class="required">*</span></label>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<input type="file" id="foto_sekolah" name="foto_sekolah[]" data-url="<?= base_url('admin/upload-handler') ?>" class="form-control col-md-7 col-xs-12" multiple>
						</div>
					</div>
					<div class="item form-group">
						<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
							<div class="progress" id="progress">
		                        <div class="progress-bar progress-bar-info bar" style="width: 0%;">0%</div>
		                    </div>
		                    <div class="x_panel">
		                    	<div class="x_content">
		                    		<ul class="list-unstyled msg_list" role="menu" id="list-files">
									</ul>	
		                    	</div>
		                    </div>
						</div>
					</div>
                  
					<div class="ln_solid"></div>
					<div class="form-group">
						<div class="col-md-6 col-md-offset-3">
							<button type="reset" class="btn btn-primary">Reset</button>
							<input id="submit" name="submit" type="submit" class="btn btn-success" value="Submit"/>
						</div>
					</div>
                <?= form_close() ?>
			</div>
		</div>
		
	</div>
</div>

<!-- validator -->
<script src="<?= base_url('assets') ?>/custom/js/validator.js"></script>

<!-- PNotify -->
<script src="<?= base_url('assets') ?>/vendors/pnotify/dist/pnotify.js"></script>
<script src="<?= base_url('assets') ?>/vendors/pnotify/dist/pnotify.buttons.js"></script>

<script src="<?= base_url('assets') ?>/vendors/iCheck/icheck.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/jQuery-File-Upload-9.23.0/js/vendor/jquery.ui.widget.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/jQuery-File-Upload-9.23.0/js/jquery.iframe-transport.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/jQuery-File-Upload-9.23.0/js/jquery.fileupload.js') ?>"></script>

<script type="text/javascript">
	function initMap() {
		// koordinat palembang
		let lat = -2.990934;
		let lng = 104.7754;

		let map = new google.maps.Map(document.getElementById('map'), {
			center: {lat: lat, lng: lng},
			zoom: 12
		});

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

	$(function () {

		<?php  
			$msg = $this->session->flashdata('msg');
			if (isset($msg)):
		?>

			new PNotify({
				title: 'Data Berhasil Disimpan',
				text: 'Informasi sekolah yang anda masukkan telah berhasil tersimpan',
				type: 'success',
				styling: 'bootstrap3'
			});

		<?php endif;  ?>

	    $('#foto_sekolah').fileupload({
	        dataType: 'json',
	        progressall: function (e, data) {
		        let progress = parseInt(data.loaded / data.total * 100, 10);
		        $('#progress .bar').css(
		            'width',
		            progress + '%'
		        ).text(progress + '%');

		        if (progress >= 100) {
		        	$('#progress .bar').removeClass('progress-bar-info')
		        		.addClass('progress-bar-success').text(progress + '% completed');
		        }
		    },
	        done: function (e, data) {
	        	console.log(data.result);
	        	let files = data.result['foto_sekolah'];
	        	let file = files[0];
	        	$('#list-files').append('<li>' +
					'<a>' +
						'<span class="image"><img style="width: 50px; height: 50px;" src="' + file.thumbnailUrl + '" alt="Uploaded Image" /></span>' +
						'<span>' +
							'<span>' + file.name + '</span>' +
						'</span>' +
						'<span class="message">' +
							Math.round((file.size / 1024) * 100) / 100 + ' KB' +
						'</span>' +
					'</a>' +
					'<input type="hidden" value="' + file.name + '" name="uploaded_files[]"/>' +
				'</li>');
	        }
	    });
	});
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDV1CNPBI4qy_Wr5jDjKe0Pb40u9Tn27UA&libraries=places&callback=initMap" async defer></script>