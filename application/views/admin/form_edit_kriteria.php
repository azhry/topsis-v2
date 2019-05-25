<link href="<?= base_url('assets') ?>/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

<!-- PNotify -->
<link href="<?= base_url('assets') ?>/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
<link href="<?= base_url('assets') ?>/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">

<div class="page-fixed-main-content">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
	                <h2>Edit Informasi Kriteria</h2>
	            </div>
				<div class="x_content">
					<?= form_open_multipart('admin/edit-kriteria/' . $id, ['class' => 'form-horizontal form-label-left']) ?>
						<?= $this->session->flashdata('msg') ?>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="label">Label  <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="label" value="<?= $kriteria->kriteria ?>" class="form-control col-md-7 col-xs-12" data-validate-length-range="2" name="label" placeholder="Contoh: Biaya Masuk" required="required" type="text"/>
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="initial">Initial  <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="initial" value="<?= $kriteria->inisial ?>" class="form-control col-md-7 col-xs-12" data-validate-length-range="2" name="initial" placeholder="Contoh: BM" required="required" type="text"/>
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="key">Key  <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="key" value="<?= $kriteria->key ?>" class="form-control col-md-7 col-xs-12" data-validate-length-range="2" name="key" placeholder="Contoh: biaya_masuk" required="required" type="text"/>
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="weight">Weight <span class="required">*</span></label>
							<div class="col-md-3 col-sm-3 col-xs-12">
								<select name="weight" id="weight" required class="form-control col-md-7 col-xs-12">
									<?php for ($i = 0; $i < 5; $i++): ?>
										<option <?= $kriteria->bobot == $i + 1 ? 'selected' : '' ?> value="<?= $i + 1 ?>"><?= $i + 1 ?></option>
									<?php endfor; ?>
								</select>
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="exp">Exp <span class="required">*</span></label>
							<div class="col-md-3 col-sm-3 col-xs-12">
								<input <?= $kriteria->exp == 'Cost' ? 'checked' : '' ?> type="radio" name="exp" value="Cost"> Cost<br>
								<input <?= $kriteria->exp == 'Benefit' ? 'checked' : '' ?> type="radio" name="exp" value="Benefit"> Benefit<br>
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="type">Type <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select type="select" id="type" name="type" class="form-control col-md-7 col-xs-12" data-validate-length-range="1" required="required">
									<option value="">Pilih..</option>
									<option <?= $kriteria->type == 'range' ? 'selected' : '' ?> value="range">Range Angka</option>
									<option <?= $kriteria->type == 'option' ? 'selected' : '' ?> value="option">Opsi Pilihan</option>
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
			init();
		});
		init();
	});

	function init() {
		let type = $('#type').val();
		if (type === 'range') {
			$('#type-container').html('')
				.html('<div class="item form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="type"></label><div class="col-md-3 col-sm-3 col-xs-12" for="type"><button onclick="add_range();" type="button" class="btn btn-success"><i class="fa fa-plus"></i> Add</button></div></div>');
				<?php if ($kriteria->type == 'range'): ?>
					<?php foreach ($details as $detail): ?>
						add_range('<?= $detail->label ?>', <?= $detail->min ?>, <?= $detail->max ?>, <?= $detail->value ?>);
					<?php endforeach; ?>
				<?php endif; ?>
				add_range();
		} else if (type === 'option') {
			$('#type-container').html('')
				.html('<div class="item form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="type"></label><div class="col-md-3 col-sm-3 col-xs-12" for="type"><button onclick="add_option();" type="button" class="btn btn-success"><i class="fa fa-plus"></i> Add</button></div></div>');
				<?php if ($kriteria->type == 'option'): ?>
					<?php foreach ($details as $detail): ?>
						add_option('<?= $detail->label ?>', <?= $detail->value ?>);
					<?php endforeach; ?>
				<?php endif; ?>
				add_option();
		}
	}

	function add_range(label, min, max, value) {
		if (label == undefined) {
			label = '';
		}
		if (min == undefined) {
			min = '';
		}
		if (max == undefined) {
			max = '';
		}
		if (value == undefined) {
			value = '';
		}

		$('#type-container').append('<div class="item form-group">' +
			'<label class="control-label col-md-3 col-sm-3 col-xs-12" for="type"></label>' +
			'<div class="col-md-2 col-sm-2 col-xs-6">' +
				'<input type="text" name="range_label[]" value="' + label + '" class="form-control col-md-7 col-xs-12" placeholder="Label">' +
			'</div>' +
			'<div class="col-md-1 col-sm-1 col-xs-6">' +
				'<input type="number" name="range_min[]" value="' + min + '" min="0" step="any" class="form-control col-md-7 col-xs-12" placeholder="Min">' +
			'</div>' +
			'<div class="col-md-1 col-sm-1 col-xs-6">' +
				'<input type="number" name="range_max[]" value="' + max + '" min="0" step="any" class="form-control col-md-7 col-xs-12" placeholder="Max">' +
			'</div>' +
			'<div class="col-md-2 col-sm-2 col-xs-6">' +
				'<input type="number" name="range_value[]" value="' + value + '" min="0" step="any" class="form-control col-md-7 col-xs-12" placeholder="Value">' +
			'</div>' +
			'<div class="col-md-1 col-sm-1 col-xs-6"><button onclick="$(this).parent().parent().remove();" type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button></div>' +
		'</div>');
	}

	function add_option(label, value) {
		if (label == undefined) {
			label = '';
		}
		if (value == undefined) {
			value = '';
		}

		$('#type-container').append('<div class="item form-group">' +
			'<label class="control-label col-md-3 col-sm-3 col-xs-12" for="type"></label>' +
			'<div class="col-md-2 col-sm-2 col-xs-6">' +
				'<input type="text" name="option_label[]" value="' + label + '" class="form-control col-md-7 col-xs-12" placeholder="Label">' +
			'</div>' +
			'<div class="col-md-2 col-sm-2 col-xs-6">' +
				'<input type="number" name="option_value[]" value="' + value + '" min="0" step="any" class="form-control col-md-7 col-xs-12" placeholder="Value">' +
			'</div>' +
			'<div class="col-md-1 col-sm-1 col-xs-6"><button onclick="$(this).parent().parent().remove();" type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</button></div>' +
		'</div>');
	}
</script>