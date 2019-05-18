<link href="<?= base_url('assets') ?>/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url('assets') ?>/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url('assets') ?>/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url('assets') ?>/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url('assets') ?>/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <h2>Daftar Kriteria</h2>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-8">
                        </div>
                        <div class="col-md-4">
                            <a href="<?= base_url('admin/tambah-kriteria') ?>" class="btn btn-success pull-right">
                                <i class="fa fa-plus-square"></i> Tambah Kriteria
                            </a>
                        </div>
                    </div>
                    <?= $this->session->flashdata('msg') ?>
                    <table id="datatable-fixed-header" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Label</th>
                                <th style="text-align: center;">Key</th>
                                <th style="text-align: center;">Type</th>
                                <th style="text-align: center;">Weight</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($kriteria as $row): ?>
                                <tr>
                                    <td align="middle" style="vertical-align: middle;">
                                        <?= $row->label ?>
                                    </td>
                                    <td align="middle" style="vertical-align: middle;"><?= $row->key ?></td>
                                    <td align="middle" style="vertical-align: middle;"><?= $row->type ?></td>
                                    <td align="middle" style="vertical-align: middle;"><?= $row->weight ?></td>
                                    <td align="middle" style="vertical-align: middle;">
                                        <a href="<?= base_url('admin/detail-kriteria/' . $row->id_kriteria) ?>" type="button" class="btn btn-info"><i class="fa fa-eye"></i> Detail</a>
                                        <a href="<?= base_url('admin/kriteria/' . $row->id_kriteria) ?>" type="button" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- DataTables -->
<script src="<?= base_url('assets') ?>/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets') ?>/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url('assets') ?>/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets') ?>/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/vendors/datatables.net-fixedheader/js/datatables.fixedHeader.min.js') ?>"></script>