<link href="<?= base_url('assets') ?>/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url('assets') ?>/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url('assets') ?>/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url('assets') ?>/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="<?= base_url('assets') ?>/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

<div class="page-fixed-main-content">
    <!-- BEGIN PAGE BASE CONTENT -->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Daftar Pengguna</h2>
                </div>
                <div class="x_content">
                    <a href="<?= base_url('admin/tambah-pengguna') ?>" class="btn green">
                        <i class="fa fa-plus"></i> Tambah Data
                    </a>
                    <?= $this->session->flashdata('msg') ?>
                    <br><br>
                    <table id="datatable-fixed-header" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Nama</th>
                                <th style="text-align: center;">Jenis Kelamin</th>
                                <th style="text-align: center;">Email</th>
                                <th style="text-align: center;">Role</th>
                                <th style="text-align: center;">-</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($pengguna as $row): ?>
                                <tr>
                                    <td align="middle" style="vertical-align: middle;"><?= $row->nama ?></td>
                                    <td align="middle" style="vertical-align: middle;"><?= $row->jenis_kelamin ?></td>
                                    <td align="middle" style="vertical-align: middle;"><?= $row->email ?></td>
                                    <td align="middle" style="vertical-align: middle;"><?= $row->role->role ?></td>
                                    <td align="middle" style="vertical-align: middle;">
                                        <a href="<?= base_url('admin/detail-pengguna/' . $row->id) ?>" type="button" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Detail</a>
                                        <a href="<?= base_url('admin/edit-pengguna/' . $row->id) ?>" type="button" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                        <a href="<?= base_url('admin/daftar-pengguna/' . $row->id) ?>" type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE BASE CONTENT -->
</div>

<!-- DataTables -->
<script src="<?= base_url('assets') ?>/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets') ?>/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url('assets') ?>/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets') ?>/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/vendors/datatables.net-fixedheader/js/datatables.fixedHeader.min.js') ?>"></script>