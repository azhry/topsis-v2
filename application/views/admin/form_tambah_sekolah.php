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
										<?php 
											$detail_fasilitas = json_decode($fasilitas->details);
											for ($i = 0; $i < count($detail_fasilitas) / 2; $i++): 
										?>
											<input type="checkbox" name="fasilitas[]" id="fasilitas<?= $i + 1 ?>" value="<?= $detail_fasilitas[$i]->label ?>" data-parsley-mincheck="1" class="flat" /> <?= $detail_fasilitas[$i]->label ?>
				                        	<br/><br/>

										<?php endfor; ?>
									</div>
									<div class="col-md-6">
										<?php 
											$detail_fasilitas = json_decode($fasilitas->details);
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
					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="ekstrakurikuler">Ekstrakurikuler <span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<p style="padding: 5px;">
								<div class="row">
									<div class="col-md-6">
										<?php 
											$detail_ekstrakurikuler = json_decode($ekstrakurikuler->details);
											for ($i = 0; $i < count($detail_ekstrakurikuler) / 2; $i++): 
										?>
											<input type="checkbox" name="ekstrakurikuler[]" id="ekstrakurikuler<?= $i + 1 ?>" value="<?= $detail_ekstrakurikuler[$i]->label ?>" data-parsley-mincheck="1" class="flat" /> <?= $detail_ekstrakurikuler[$i]->label ?>
				                        	<br/><br/>

										<?php endfor; ?>
									</div>
									<div class="col-md-6">
										<?php 
											$detail_ekstrakurikuler = json_decode($ekstrakurikuler->details);
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
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="halaman_parkir">Halaman Parkir <span class="required">*</span></label>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<select class="form-control col-md-7 col-xs-12" id="halaman_parkir" name="halaman_parkir" required>
								<option value="Sangat Luas">Sangat Luas</option>
								<option value="Luas">Luas</option>
								<option value="Cukup Luas">Cukup Luas</option>
								<option value="Tidak Luas">Tidak Luas</option>
								<option value="Sangat Tidak Luas">Sangat Tidak Luas</option>
							</select>
						</div>
					</div>

					<div class="item form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="jarak">Jarak (km)  <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input id="nama_sekolahjarak" class="form-control col-md-7 col-xs-12" data-validate-length-range="2" name="jarak" required="required" type="text"/>
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
							<input id="submit" name="submit" type="submit" class="btn btn-success" value="Save"/>
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