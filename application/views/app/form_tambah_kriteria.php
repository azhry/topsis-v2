<link href="<?= base_url('assets') ?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

<!-- PNotify -->
<link href="<?= base_url('assets') ?>/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
<link href="<?= base_url('assets') ?>/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">

<div class="page-fixed-main-content">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
	                <h2>Informasi Kriteria</h2>
	            </div>
				<div class="x_content">
					<?= form_open_multipart('admin/tambah-kriteria', ['class' => 'form-horizontal form-label-left']) ?>
						<?= $this->session->flashdata('msg') ?>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="label">Label  <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="label" class="form-control col-md-7 col-xs-12" data-validate-length-range="2" name="label" placeholder="Contoh: Biaya Masuk" required="required" type="text"/>
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="initial">Initial  <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="initial" class="form-control col-md-7 col-xs-12" data-validate-length-range="2" name="initial" placeholder="Contoh: BM" required="required" type="text"/>
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="key">Key  <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="key" class="form-control col-md-7 col-xs-12" data-validate-length-range="2" name="key" placeholder="Contoh: biaya_masuk" required="required" type="text"/>
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="weight">Weight <span class="required">*</span></label>
							<div class="col-md-3 col-sm-3 col-xs-12">
								<select name="weight" id="weight" required class="form-control col-md-7 col-xs-12">
									<?php for ($i = 0; $i < 5; $i++): ?>
										<option value="<?= $i + 1 ?>"><?= $i + 1 ?></option>
									<?php endfor; ?>
								</select>
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="exp">Exp <span class="required">*</span></label>
							<div class="col-md-3 col-sm-3 col-xs-12">
								<input type="radio" name="exp" value="Cost"> Cost<br>
								<input type="radio" name="exp" value="Benefit"> Benefit<br>
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">Type <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select type="select" id="type" name="type" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" required="required">
									<option value="">Pilih..</option>
									<option value="range">Range Angka</option>
									<option value="option">Opsi Pilihan</option>
								</select>
							</div>
						</div>
						<div id="type-container"></div>
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
</div>

<!-- validator -->
<script src="<?= base_url('assets') ?>/custom/js/validator.js"></script>

<!-- PNotify -->
<script src="<?= base_url('assets') ?>/vendors/pnotify/dist/pnotify.js"></script>
<script src="<?= base_url('assets') ?>/vendors/pnotify/dist/pnotify.buttons.js"></script>

<script src="<?= base_url('assets') ?>/vendors/iCheck/icheck.min.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$('#type').on('change', function() {
			let type = $('#type').val();
			if (type === 'range') {
				$('#type-container').html('')
					.html('<div class="item form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="type"></label><div class="col-md-3 col-sm-3 col-xs-12" for="type"><button onclick="add_range();" type="button" class="btn btn-success"><i class="fa fa-plus"></i> Add</button></div></div>');
					add_range();
			} else if (type === 'option') {
				$('#type-container').html('')
					.html('<div class="item form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="type"></label><div class="col-md-3 col-sm-3 col-xs-12" for="type"><button onclick="add_option();" type="button" class="btn btn-success"><i class="fa fa-plus"></i> Add</button></div></div>');
					add_option();
			}
		});
	});

	function add_range() {
		$('#type-container').append('<div class="item form-group">' +
			'<label class="control-label col-md-3 col-sm-3 col-xs-12" for="type"></label>' +
			'<div class="col-md-2 col-sm-2 col-xs-6">' +
				'<input type="text" name="range_label[]" required="required" class="form-control col-md-7 col-xs-12" placeholder="Label">' +
			'</div>' +
			'<div class="col-md-1 col-sm-1 col-xs-6">' +
				'<input type="number" name="range_min[]" required="required" min="0" step="any" class="form-control col-md-7 col-xs-12" placeholder="Min">' +
			'</div>' +
			'<div class="col-md-1 col-sm-1 col-xs-6">' +
				'<input type="number" name="range_max[]" required="required" min="0" step="any" class="form-control col-md-7 col-xs-12" placeholder="Max">' +
			'</div>' +
			'<div class="col-md-2 col-sm-2 col-xs-6">' +
				'<input type="number" name="range_value[]" required="required" min="0" step="any" class="form-control col-md-7 col-xs-12" placeholder="Value">' +
			'</div>' +
			'<div class="col-md-1 col-sm-1 col-xs-6"><button onclick="$(this).parent().parent().remove();" type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button></div>' +
		'</div>');
	}

	function add_option() {
		$('#type-container').append('<div class="item form-group">' +
			'<label class="control-label col-md-3 col-sm-3 col-xs-12" for="type"></label>' +
			'<div class="col-md-2 col-sm-2 col-xs-6">' +
				'<input type="text" name="option_label[]" required="required" class="form-control col-md-7 col-xs-12" placeholder="Label">' +
			'</div>' +
			'<div class="col-md-2 col-sm-2 col-xs-6">' +
				'<input type="number" name="option_value[]" required="required" min="0" step="any" class="form-control col-md-7 col-xs-12" placeholder="Value">' +
			'</div>' +
			'<div class="col-md-1 col-sm-1 col-xs-6"><button onclick="$(this).parent().parent().remove();" type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button></div>' +
		'</div>');
	}
</script>