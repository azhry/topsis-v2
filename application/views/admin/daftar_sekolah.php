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
                    <h2>Daftar Sekolah</h2>
                </div>
                <div class="x_content">
                    <a href="<?= base_url('admin/tambah-sekolah') ?>" class="btn green">
                        <i class="fa fa-plus"></i> Tambah Data
                    </a>
                    <br><br>
                    <table id="datatable-fixed-header" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Foto</th>
                                <th style="text-align: center;">Nama Sekolah</th>
                                <th style="text-align: center;">Akreditasi</th>
                                <th style="text-align: center;">Alamat</th>
                                <th style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($sekolah as $row): ?>
                                <?php  
                                    if (!file_exists($upload_dir . $row->id)) 
                                    {
                                        $foto = [];
                                    }
                                    else
                                    {
                                        $foto = array_values(array_diff(scandir($upload_dir . $row->id), ['.', '..']));    
                                    }
                                    
                                ?>
                                <tr>
                                    <td align="middle" style="vertical-align: middle;">
                                        <img src="<?= count($foto) > 0 ? base_url('assets/foto/sekolah-' . $row->id . '/' . $foto[0]) : 'http://placehold.it/100' ?>" width="100" height="100">
                                    </td>
                                    <td align="middle" style="vertical-align: middle;"><?= $row->nama_sekolah ?></td>
                                    <td align="middle" style="vertical-align: middle;"><?= $row->akreditasi ?></td>
                                    <td align="middle" style="vertical-align: middle;"><?= $row->alamat ?></td>
                                    <td align="middle" style="vertical-align: middle;">
                                        <a href="<?= base_url('admin/detail-sekolah/' . $row->id) ?>" type="button" class="btn btn-info btn-xs"><i class="fa fa-eye"></i>Detail</a>
                                        <a href="<?= base_url('admin/edit-sekolah/' . $row->id) ?>" type="button" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Edit</a>
                                        <a href="<?= base_url('admin/daftar-sekolah/' . $row->id) ?>" type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Hapus</a>
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